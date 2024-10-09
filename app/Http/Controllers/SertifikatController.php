<?php

namespace App\Http\Controllers;
use App\Models\Sertifikat;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class SertifikatController extends Controller
{
    public function main(){
        return view('konten.iso1',[
            'data' => Sertifikat::all(),
            'title' => 'Sertifikat'
        ]);
    }

    public function tambah(Request $request) {
        $request->validate([
            'dokumen' => 'required|mimes:doc,docx,pdf,jpg,jpeg,png,xls,xlsx,ppt,pptx|max:2048', // Atur tipe file dan ukuran maksimum
        ]);

        if ($request->hasFile('dokumen')) {
            // Buat nama file unik dengan waktu dan nama asli file
            $fileName = $request->file('dokumen')->getClientOriginalName();
            // Simpan file ke folder public/dokumen
            $request->file('dokumen')->move(public_path('dokumen'), $fileName);
        }

        // Simpan data sertifikat ke database
        $sertif = new Sertifikat();
        $sertif->nama_sertif = $request->nama_sertif;
        $sertif->no_sertif = $request->no_sertif;
        $sertif->tgl_terbit = $request->tgl_terbit;
        $sertif->tgl_kadaluwarsa = $request->tgl_kadaluwarsa;
        $sertif->instansi = $request->instansi;
        $sertif->jenis = $request->jenis;
        $sertif->dokumen = 'dokumen/' . $fileName; // Simpan path file ke kolom dokumen
        $sertif->save();

        return redirect()->route('main')->with('success', 'Sertifikat berhasil ditambahkan.');
    }

    public function hapus(Request $request) {
        dd($request->all());
        // $idsertif = $request->idsertif;
        // $sertif = Sertifikat::where('idsertif', $idsertif)->first();
        // $filePath = public_path($sertif->dokumen);

        // // Hapus file dan data sertifikat
        // if (File::exists($filePath)) {
        //     File::delete($filePath);
        // }

        // // Hapus data sertifikat dari database
        // $sertif->delete();

        // return redirect()->route('main')->with('success', 'Sertifikat dan dokumen berhasil dihapus.');
    }


    public function edit(Request $request, $idsertif) {
        // dd($request->all());
        $request->validate([
            'dokumen' => 'required|mimes:doc,docx,pdf,jpg,jpeg,png,xls,xlsx,ppt,pptx|max:2048',// Atur tipe file dan ukuran maksimum
        ]);

        // Cari sertifikat berdasarkan id
        $sertif = Sertifikat::find($idsertif);

        if ($sertif) {
            // Hapus file lama jika ada
            if (File::exists(public_path($sertif->dokumen))) {
                File::delete(public_path($sertif->dokumen));
            }

            // Buat nama file baru dengan ID sertifikat dan ekstensi yang sesuai
            $fileExtension = $request->file('dokumen')->getClientOriginalName();
            $fileName = $sertif->idsertif . '.' . $fileExtension;

            // Upload file baru dan replace yang lama
            $request->file('dokumen')->move(public_path('dokumen'), $fileName);

            $sertif->nama_sertif = $request->nama_sertif;
            $sertif->no_sertif = $request->no_sertif;
            $sertif->tgl_terbit = $request->tgl_terbit;
            $sertif->tgl_kadaluwarsa = $request->tgl_kadaluwarsa;
            $sertif->instansi = $request->instansi;
            $sertif->jenis = $request->jenis;
            $sertif->dokumen = 'dokumen/' . $fileName;
            $sertif->save();
        }

        return redirect()->route('main')->with('success', 'Sertifikat berhasil diperbarui dengan dokumen baru.');
    }

}
