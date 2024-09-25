<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function main(){
        return view('template.main');
    }


    public function upload(){
        return view('template.upload');
    }

    public function uploadproses(Request $request){
        $file = new File();
        $file->nama_sertif= $request->nama;
        $file->no_sertif = $request->no_sertif;
        $file->tgl_terbit = $request->tgl_terbit;
        $file->tgl_kadaluwarsa = $request->tgl_terbit;
        $file->jenis = $request->jenis;
        $file->save();
        $file->file = $request->file;
        // echo 'File Name: ' . $file->getClientOriginalName();
        // echo '<br>';
        // echo 'File Extension: ' .$file->getClientOriginalExtension();
        // echo '<br>';
        // echo 'File Real Path: ' .$file->getRealPath();
        // echo '<br>';
        // echo 'File Size: ' . $file->getSize();
        // echo '<br>';
        // echo 'File Mime Type: ' .$file->getMimeType();
        $destinationPath = "sertif";

        if ($file->move($destinationPath, $file->getClientOriginalName())){
            echo "Upload file berhasil";
        }
        else {
            echo "Upload file gagal";
        }
    }
}
