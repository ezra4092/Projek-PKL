<?php

namespace App\Http\Controllers;
use App\Models\Sertifikat;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class SertifikatController extends Controller
{
    public function main(){
        return view('konten.dashboard1',[
            'data' => Sertifikat::all(),
            'title' => 'Sertifikat'
        ]);
    }

    public function tambah(Request $request){
        $this->validate($request, [
            'nama_sertif' => 'required|string|max:255',
            'dokumen' => 'required|mimes:doc,docx,pdf,xls,xlsx,ppt,pptx|max:2048', // Maksimal 2MB
        ]);
            $sertif = new Sertifikat();
            $sertif->nama_sertif = $request->nama_sertif;
            $sertif->no_sertif = $request->no_sertif;
            $sertif->tgl_terbit = $request->tgl_terbit;
            $sertif->tgl_kadaluwarsa = $request->tgl_kadaluwarsa;
            $sertif->instansi = $request->instansi;
            $sertif->jenis = $request->jenis;
            if ($request->file('dokumen')){
                $file = $request->file('dokumen');
                $nama_sertif_bersih = preg_replace('/[^A-Za-z0-9\-]/', '_', $request->nama_sertif);
                $nama_file = $nama_sertif_bersih . '_' . date('Ymdhis') . '.' . $file->getClientOriginalExtension();
                $file->move('dokumen', $nama_file);
                $sertif->dokumen = $nama_file;

            }
            $sertif->save();

            return redirect()->route('main')->with('success', 'Data sertifikat berhasil ditambahkan');
        }
    }
