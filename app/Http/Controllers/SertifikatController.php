<?php

namespace App\Http\Controllers;
use App\Models\Sertifikat;

use Illuminate\Http\Request;

class SertifikatController extends Controller
{
    public function main(){
        return view('konten.iso1',[
            'data' => Sertifikat::all(),
            'title' => 'Sertifikat'
        ]);
    }

    public function tambah(Request $request){
        $sertif = new Sertifikat();
        $sertif->nama_sertif= $request->nama_sertif;
        $sertif->no_sertif = $request->no_sertif;
        $sertif->tgl_terbit = $request->tgl_terbit;
        $sertif->tgl_kadaluwarsa = $request->tgl_kadaluwarsa;
        $sertif->instansi = $request->instansi;
        $sertif->jenis = $request->jenis;
        $sertif->save();
        return redirect()->route('main');

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

    public function hapus(Request $request){
        $sertif = Sertifikat::where('idsertif', $request->idsertif);
        $sertif->delete();
        return redirect()->route('main');
    }


    public function edit(Request $request){
        // dd($request->all());
        $sertif = Sertifikat::find($request->idsertif);
        $sertif->update([
            'nama_sertif' => $request->nama_sertif,
            'no_sertif' => $request->no_sertif,
            'tgl_terbit,' => $request->tgl_terbit,
            'tgl_kadaluwarsa' => $request->tgl_kadaluwarsa,
            'instansi' => $request->instansi,
            'jenis' => $request->jenis
        ]);
        $sertif->save();
        return redirect()->route('main');
    }
}
