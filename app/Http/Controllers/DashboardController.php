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

    public function edit(Request $request){
        $this->validate($request, [
            'nama_sertif' => 'required|string|max:255',
            'dokumen' => 'required|mimes:doc,docx,pdf,xls,xlsx,ppt,pptx|max:2048', // Maksimal 2MB
        ]);
        $sertif = Sertifikat::where('id_sertif', $request->id_sertif);
            $sertif->nama_sertif = $request->nama_sertif;
            $sertif->no_sertif = $request->no_sertif;
            $sertif->tgl_terbit = $request->tgl_terbit;
            $sertif->tgl_kadaluwarsa = $request->tgl_kadaluwarsa;
            $sertif->instansi = $request->instansi;
            $sertif->jenis = $request->jenis;
            if ($request->file('dokumen')) {
                // Ambil file dari request
                $file = $request->file('dokumen');

                // Bersihkan nama sertifikat dari karakter khusus
                $nama_sertif_bersih = preg_replace('/[^A-Za-z0-9\-]/', '_', $request->nama_sertif);

                // Buat nama file baru dengan timestamp dan ekstensi asli
                $nama_file = $nama_sertif_bersih . '_' . date('YmdHis') . '.' . $file->getClientOriginalExtension();

                // Pindahkan file baru ke folder 'dokumen'
                $file->move(public_path('dokumen'), $nama_file);

                // Hapus file lama jika ada
                if ($sertif->dokumen && File::exists(public_path('dokumen/' . $sertif->dokumen))) {
                    File::delete(public_path('dokumen/' . $sertif->dokumen));
                }

                // Simpan nama file baru ke database
                $sertif->dokumen = $nama_file;
            }

            $sertif->update();
        }
}
