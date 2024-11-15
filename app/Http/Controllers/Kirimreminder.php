<?php

namespace App\Http\Controllers;

use App\Mail\Reminder;
use App\Models\Sertifikat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Kirimreminder extends Controller
{
    public function kirimreminder(Request $request)
    {
        // dd($request->all());
        $idsertif = $request->nama_sertif;

        $startDate = now();
        $endDate = now()->addDays(30); // 30 hari dari hari ini
        $sertif = Sertifikat::where('nama_sertif', $idsertif)
            ->whereNotNull('tgl_kadaluwarsa') // Hanya yang memiliki tanggal kedaluwarsa
            ->whereBetween('tgl_kadaluwarsa', [$startDate, $endDate]) // Tanggal kedaluwarsa dalam rentang 30 hari ke depan
            ->with('user') // Pastikan untuk memuat relasi user
            ->get();

        if ($sertif->isEmpty()) {
            return redirect()->route('dashboard')->with('error', 'Tidak ada sertifikat yang perlu diingatkan.');
        }

        $emailsSent = [];
        foreach ($sertif as $s) {
            if ($s->user && $s->user->email) {
                Mail::to($s->user->email)->send(new Reminder($s));
                $emailsSent[] = $s->user->email; // Menyimpan email yang telah dikirim
            }
        }

        if (count($emailsSent) > 0) {
            return redirect()->route('dashboard')->with('success', 'Reminder berhasil dikirim ke: ' . implode(', ', $emailsSent) . '.');
        } else {
            return redirect()->route('dashboard')->with('error', 'Pengiriman email gagal, tidak ada email yang valid.');
        }
    }
}


