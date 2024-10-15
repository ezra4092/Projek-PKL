<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('konten.dashboard',[
            'data' => Sertifikat::all(),
            'title' => 'Sertifikat'
        ]);
    }


    public function upload(){
        return view('template.upload',[
            'data' => Sertifikat::all(),
            'title' => 'Sertifikat'
        ]);
    }
}
