<?php

namespace App\Console\Commands;

use App\Mail\Reminder;
use App\Mail\Reminder2;
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

        // Ambil semua email dari tabel users
        $users = User::whereNotNull('email')->get();
        $ccEmails = $users->pluck('email')->toArray();

        if ($sertif->isEmpty()) {
            foreach ($users as $user) {
                Mail::to($user->email)
                    ->cc(array_diff($ccEmails, [$user->email]))
                    ->send(new Reminder2($sertif)); // Email khusus untuk kondisi tidak ada sertifikat

                $this->info("Email pemberitahuan dikirim ke {$user->email} (tidak ada sertifikat yang kedaluwarsa).");
            }
            return;
        }

        // Jika ada sertifikat yang kedaluwarsa, kirim email pengingat seperti biasa
        $emailsSent = [];
        foreach ($sertif as $s) {
            if ($s->user && $s->user->email) {
                Mail::to($s->user->email)
                    ->cc(array_diff($ccEmails, [$s->user->email]))
                    ->send(new Reminder($s)); // Email pengingat sertifikat

                $emailsSent[] = $s->user->email;
            }
        }

        // Output daftar email yang dikirim
        $this->info('Reminder berhasil dikirim ke: ' . implode(', ', $emailsSent) . '.');
    }
}

