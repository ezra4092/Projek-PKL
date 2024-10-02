<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function main(){
        return view('template.sertif',[
            'data' => Sertifikat::all(),
            'title' => 'Sertifikat'
        ]);
    }

    public function sertif(){
        return view('template.sertif');
    }


    public function upload(){
        return view('template.upload',[
            'data' => Sertifikat::all(),
            'title' => 'Sertifikat'
        ]);
    }

    public function uploadproses(Request $request){
        $sertif = new Sertifikat();
        $sertif->nama_sertif= $request->nama_sertif;
        $sertif->no_sertif = $request->no_sertif;
        $sertif->tgl_terbit = $request->tgl_terbit;
        $sertif->tgl_kadaluwarsa = $request->tgl_kadaluwarsa;
        $sertif->instansi = $request->instansi;
        $sertif->jenis = $request->jenis;
        $sertif->save();

        // $filesertif = $request->file('file');
        // echo 'File Name: ' . $filesertif->getClientOriginalName();
        // echo '<br>';
        // echo 'File Extension: ' .$filesertif->getClientOriginalExtension();
        // echo '<br>';
        // echo 'File Real Path: ' .$filesertif->getRealPath();
        // echo '<br>';
        // echo 'File Size: ' . $filesertif->getSize();
        // echo '<br>';
        // echo 'File Mime Type: ' .$filesertif->getMimeType();
        // $destinationPath = "sertif";

        // if ($filesertif->move($destinationPath, $filesertif->getClientOriginalName())){
        //     echo "Upload file berhasil";
        // }
        // else {
        //     echo "Upload file gagal";
        // }
    }
}
