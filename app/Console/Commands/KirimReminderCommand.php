<?php

namespace App\Console\Commands;

use App\Mail\Reminder;
use App\Models\Sertifikat;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class KirimReminderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kirim:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengirim reminder sertifikat yang akan segera kedaluwarsa';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $startDate = now();
        $endDate = now()->addDays(30);

        // Ambil sertifikat yang perlu diingatkan
        $sertif = Sertifikat::whereNotNull('tgl_kadaluwarsa')
            ->whereBetween('tgl_kadaluwarsa', [$startDate, $endDate])
            ->with('user')
            ->get();

        if ($sertif->isEmpty()) {
            $this->info('Tidak ada sertifikat yang perlu diingatkan.');
            return;
        }

        // Ambil semua email dari tabel users, kecuali pembuat data
        $creatorIds = $sertif->pluck('user_id')->unique();
        $users = User::whereNotNull('email')
                     ->whereNotIn('id', $creatorIds)
                     ->get();

        // Catat email yang dikirim
        $emailsSent = [];

        // Mengirim email ke semua pengguna dengan CC ke pengguna lainnya
        foreach ($sertif as $s) {
            if ($s->user && $s->user->email) {
                $ccEmails = $users->pluck('email')->toArray();
                Mail::to($s->user->email)
                    ->cc($ccEmails)
                    ->send(new Reminder($s));

                $emailsSent[] = $s->user->email;
            }
        }

        // Output daftar email yang dikirim
        $this->info('Reminder berhasil dikirim ke: ' . implode(', ', $emailsSent) . '.');
    }
}

