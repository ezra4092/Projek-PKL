<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }


    public function upload(){
        return view('template.upload',[
            'data' => Sertifikat::all(),
            'title' => 'Sertifikat'
        ]);
    }

}
