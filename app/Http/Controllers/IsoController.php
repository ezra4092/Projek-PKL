<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use Illuminate\Http\Request;

class IsoController extends Controller
{
    public function iso1(){
        return view('iso.iso1',[
            'data' => Sertifikat::where('jenis', 'ISO 9001 : 2015')->get(),
            'title' => 'Sertifikat'
        ]);
    }
}
