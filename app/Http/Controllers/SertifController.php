<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class SertifController extends Controller
{
    public function csr(){
        return view('konten.csr',[
            'data' => Sertifikat::where('jenis', 'Sertifikat CSR')->get(),
            'title' => 'CSR'
        ]);
    }

    public function hse(){
        return view('konten.hse',[
            'data' => Sertifikat::where('jenis', 'Sertifikat HSE')->get(),
            'title' => 'HSE'
        ]);
    }

    public function penghargaan(){
        return view('konten.penghargaan',[
            'data' => Sertifikat::where('jenis', 'Penghargaan')->get(),
            'title' => 'Penghargaan'
        ]);
    }

    public function proper() {
        return view('konten.proper',[
            'data' => Sertifikat::where('jenis', 'Proper')->get(),
            'title' => 'Proper'
        ]);
    }

    public function swa() {
        return view('konten.swa',[
            'data' => Sertifikat::where('jenis', 'SWA')->get(),
            'title' => 'SWA'
        ]);
    }

    public function sni_award() {
        return view('konten.sni-award',[
            'data' => Sertifikat::where('jenis', 'SNI Award')->get(),
            'title' => 'SNI Award'
        ]);
    }

    public function dokumen(){
        return view('dokumen');
    }
}
