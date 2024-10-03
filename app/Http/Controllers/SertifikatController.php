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
        $this->validate($request, [
            'nama_sertif' => 'required|string|max:255', // Validasi nama sertif
            'dokumen' => 'required|mimes:doc,docx,pdf,xls,xlsx,ppt,pptx|max:2048', // Maksimal 2MB
        ]);

        if ($request->hasFile('dokumen')) {
            // Ambil file dokumen
            $dokumen = $request->file('dokumen');

            // Bersihkan nama sertifikat dari karakter yang tidak valid
            $nama_sertif_bersih = preg_replace('/[^A-Za-z0-9\-]/', '_', $request->nama_sertif);

            // Buat nama file dengan format nama_sertif + timestamp + ekstensi file
            $nama_dokumen = $nama_sertif_bersih . '_' . date('Ymdhis') . '.' . $dokumen->getClientOriginalExtension();

            // Pindahkan file ke folder dokumen di public/dokumen
            $destinationPath = public_path('dokumen/');
            if (!$dokumen->move($destinationPath, $nama_dokumen)) {
                return back()->with('error', 'Upload file gagal');
            }
            $sertif = new Sertifikat();
            $sertif->nama_sertif = $request->nama_sertif;
            $sertif->no_sertif = $request->no_sertif;
            $sertif->tgl_terbit = $request->tgl_terbit;
            $sertif->tgl_kadaluwarsa = $request->tgl_kadaluwarsa;
            $sertif->instansi = $request->instansi;
            $sertif->jenis = $request->jenis;
            $sertif->dokumen = $nama_dokumen;
            $sertif->save();

            return redirect()->route('main')->with('success', 'Data sertifikat berhasil ditambahkan');
        } else {
            return back()->with('error', 'File dokumen tidak ditemukan');
        }
    }

    public function hapus(Request $request){
        $sertif = Sertifikat::where('idsertif', $request->idsertif);
        $sertif->delete();
        return redirect()->route('main');
    }

    public function edit(Request $request){
    $this->validate($request, [
        'nama_sertif' => 'required|string|max:255', // Validasi nama sertif
        'dokumen' => 'required|mimes:doc,docx,pdf,xls,xlsx,ppt,pptx|max:2048', // Maksimal 2MB
    ]);

    // Cek apakah ada file yang diupload
    if ($request->hasFile('dokumen')) {
        // Ambil file dokumen
        $dokumen = $request->file('dokumen');

        // Bersihkan nama sertifikat dari karakter yang tidak valid
        $nama_sertif_bersih = preg_replace('/[^A-Za-z0-9\-]/', '_', $request->nama_sertif);

        // Buat nama file dengan format nama_sertif + timestamp + ekstensi file
        $nama_dokumen = $nama_sertif_bersih . '_' . date('Ymdhis') . '.' . $dokumen->getClientOriginalExtension();

        // Pindahkan file ke folder dokumen di public/dokumen
        $destinationPath = public_path('dokumen/');
        if (!$dokumen->move($destinationPath, $nama_dokumen)) {
            return back()->with('error', 'Upload file gagal');
        }
    }
    $sertif = Sertifikat::where($request->id_sertif);
    $dataUpdate = [
        'nama_sertif' => $request->nama_sertif,
        'no_sertif' => $request->no_sertif,
        'tgl_terbit' => $request->tgl_terbit,
        'tgl_kadaluwarsa' => $request->tgl_kadaluwarsa,
        'instansi' => $request->instansi,
        'jenis' => $request->jenis,
        'dokumen' => $nama_dokumen
    ];
    $sertif->update($dataUpdate);
    return redirect()->route('main')->with('success', 'Data sertifikat berhasil diperbarui');
}
}
