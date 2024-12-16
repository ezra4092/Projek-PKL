<?php

namespace App\Http\Controllers;

use App\Mail\Reminder;
use App\Models\Sertifikat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Kirimreminder extends Controller
{
    // public function kirimreminder(Request $request)
    // {
    //     // dd($request->all());
    //     $idsertif = $request->nama_sertif;

    //     $startDate = now();
    //     $endDate = now()->addDays(30); // 30 hari dari hari ini
    //     $sertif = Sertifikat::where('nama_sertif', $idsertif)
    //         ->whereNotNull('tgl_kadaluwarsa') // Hanya yang memiliki tanggal kedaluwarsa
    //         ->whereBetween('tgl_kadaluwarsa', [$startDate, $endDate]) // Tanggal kedaluwarsa dalam rentang 30 hari ke depan
    //         ->with('user') // Pastikan untuk memuat relasi user
    //         ->get();

    //     if ($sertif->isEmpty()) {
    //         return redirect()->route('dashboard')->with('error', 'Tidak ada sertifikat yang perlu diingatkan.');
    //     }

    //     $emailsSent = [];
    //     foreach ($sertif as $s) {
    //         if ($s->user && $s->user->email) {
    //             Mail::to($s->user->email)->send(new Reminder($s));
    //             $emailsSent[] = $s->user->email; // Menyimpan email yang telah dikirim
    //         }
    //     }

    //     if (count($emailsSent) > 0) {
    //         return redirect()->route('dashboard')->with('success', 'Reminder berhasil dikirim ke: ' . implode(', ', $emailsSent) . '.');
    //     } else {
    //         return redirect()->route('dashboard')->with('error', 'Pengiriman email gagal, tidak ada email yang valid.');
    //     }
    // }

//     public function kirimreminder(Request $request)
// {
//     // dd($request->all());
//     $idsertif = $request->nama_sertif;

//     $startDate = now();
//     $endDate = now()->addDays(30);
//     $sertif = Sertifikat::where('nama_sertif', $idsertif)
//         ->whereNotNull('tgl_kadaluwarsa')
//         ->whereBetween('tgl_kadaluwarsa', [$startDate, $endDate])
//         ->with('user')
//         ->get();

//     if ($sertif->isEmpty()) {
//         return redirect()->route('dashboard')->with('error', 'Tidak ada sertifikat yang perlu diingatkan.');
//     }

//     // Ambil semua email dari tabel users
//     $users = User::whereNotNull('email')->get();

//     // Catat email yang dikirim
//     $emailsSent = [];

//     foreach ($sertif as $s) {
//         foreach ($users as $user) {
//             Mail::to($user->email)->send(new Reminder($s)); // Mengirim data sertifikat ke email pengguna
//             $emailsSent[] = $user->email;
//         }
//     }

//     // Response dengan daftar email yang dikirim
//     return redirect()->route('dashboard')->with('success', 'Reminder berhasil dikirim ke: ' . implode(', ', $emailsSent) . '.');
// }

public function kirimreminder(Request $request)
{
    // dd($request->all());
    $idsertif = $request->nama_sertif;

    $startDate = now();
    $endDate = now()->addDays(30);
    $sertif = Sertifikat::where('nama_sertif', $idsertif)
        ->whereNotNull('tgl_kadaluwarsa')
        ->whereBetween('tgl_kadaluwarsa', [$startDate, $endDate])
        ->with('user')
        ->get();

    if ($sertif->isEmpty()) {
        return redirect()->route('dashboard')->with('error', 'Tidak ada sertifikat yang perlu diingatkan.');
    }

    // Ambil semua email dari tabel users, kecuali pembuat data
    $creatorIds = $sertif->pluck('user_id')->unique(); // Ambil ID pembuat data
    $users = User::whereNotNull('email')
                 ->whereNotIn('id', $creatorIds) // Kecualikan pembuat data
                 ->get();

    // Catat email yang dikirim
    $emailsSent = [];

    // Mengirim email ke semua pengguna dengan CC ke pengguna lainnya
    foreach ($sertif as $s) {
        if ($s->user && $s->user->email) {
            $ccEmails = $users->pluck('email')->toArray(); // Semua email yang valid kecuali pembuat data
            Mail::to($s->user->email)
                ->cc($ccEmails)
                ->send(new Reminder($s));

            $emailsSent[] = $s->user->email;
        }
    }

    // Response dengan daftar email yang dikirim
    return redirect()->route('dashboard')->with('success', 'Reminder berhasil dikirim ke: ' . implode(', ', $emailsSent) . '.');
}

}


