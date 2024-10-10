<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use Illuminate\Http\Request;

class SertifController extends Controller
{
    public function csr(){
        $csr = Sertifikat::where('jenis', 'Sertifikat CSR');
        return view('konten.csr', compact('csr'));
    }

    public function csr2(){
        return view('konten.csr',[
            'data' => Sertifikat::where('jenis', 'Sertifikat CSR'),
            'title' => 'Sertifikat'
        ]);
    }
}
