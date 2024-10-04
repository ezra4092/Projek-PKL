<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use Illuminate\Http\Request;

class HseController extends Controller
{
    public function index(){
        return view('konten.hse',[
            'data' => Sertifikat::where('jenis', 'Sertifikat HSE')->get(),
            'title' => 'Sertifikat'
        ]);
    }
}
