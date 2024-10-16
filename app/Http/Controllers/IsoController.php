<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use Illuminate\Http\Request;

class IsoController extends Controller
{
    public function iso1() {
        $sertif = Sertifikat::where('jenis', 'ISO 9001 : 2015')->get();
        return view('iso.iso1', [
            'data' => $sertif,
            'title' => 'Sertifikat'
        ]);
    }

    public function iso2() {
        $sertif = Sertifikat::where('jenis', 'ISO 14001 : 2015')->get();
        return view('iso.iso2', [
            'data' => $sertif,
            'title' => 'Sertifikat'
        ]);
    }

    public function iso3() {
        $sertif = Sertifikat::where('jenis', 'ISO 27001 : 2015')->get();
        return view('iso.iso3', [
            'data' => $sertif,
            'title' => 'Sertifikat'
        ]);
    }

    public function iso4() {
        $sertif = Sertifikat::where('jenis', 'ISO 37001 : 2016')->get();
        return view('iso.iso4', [
            'data' => $sertif,
            'title' => 'Sertifikat'
        ]);
    }

    public function iso5() {
        $sertif = Sertifikat::where('jenis', 'ISO 17025 : 2017')->get();
        return view('iso.iso5', [
            'data' => $sertif,
            'title' => 'Sertifikat'
        ]);
    }

    public function iso6() {
        $sertif = Sertifikat::where('jenis', 'ISO 45001 : 2018')->get();
        return view('iso.iso6', [
            'data' => $sertif,
            'title' => 'Sertifikat'
        ]);
    }
}
