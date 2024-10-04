<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use Illuminate\Http\Request;

class CsrController extends Controller
{
    public function index(){
        return view('konten.csr',[
            'data' => Sertifikat::where('jenis', 'Sertifikat CSR')->get(),
            'title' => 'Sertifikat'
        ]);
    }
}
