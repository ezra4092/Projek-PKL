<?php

namespace App\Http\Controllers;
use App\Models\Sertifikat;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $isoJenis = [
            'ISO 9001 : 2015',
            'ISO 14001 : 2015',
            'ISO 27001 : 2015',
            'ISO 37001 : 2016',
            'ISO 17025 : 2017',
            'ISO 45001 : 2018'
        ];

        $startDate = now();
        $endDate = now()->addDays(30); // 30 hari setelah hari ini

        $sertif = Sertifikat::whereIn('jenis', $isoJenis)
        ->whereNotNull('tgl_kadaluwarsa') // Mengabaikan data yang tidak memiliki tgl_kadaluwarsa
        ->whereBetween('tgl_kadaluwarsa', [$startDate, $endDate]) // Mengambil data yang kadaluwarsa dalam rentang 15 hari sebelum dan sesudah hari ini
        ->get();

        return view('konten.dashboard', [
            'data' => $sertif,
            'title' => 'Sertifikat'
        ]);
    }

    public function documentation()
    {
        return view('documentation');
    }

    public function eror(){
        return view('eror');
    }


}
