<?php

namespace App\Http\Controllers;
use App\Models\Sertifikat;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class SertifikatController extends Controller
{

    public function tambah(Request $request) {
        $request->validate([
            'dokumen' => 'required|mimes:doc,docx,pdf,jpg,jpeg,png,xls,xlsx,ppt,pptx|max:2048',
        ]);

        if ($request->hasFile('dokumen')) {
            $fileName = $request->file('dokumen')->getClientOriginalName();
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

        switch ($sertif->jenis) {
            case 'Sertifikat CSR':
                return redirect()->route('csr')->with('success', 'Sertifikat berhasil ditambahkan.');
            case 'Sertifkat HSE':
                return redirect()->route('hse')->with('success', 'Sertifikat berhasil ditambahkan.');
            case 'Penghargaan':
                return redirect()->route('penghargaan')->with('success', 'Sertifikat berhasil ditambahkan.');
            case 'Proper':
                return redirect()->route('proper')->with('success', 'Sertifikat berhasil ditambahkan.');
            case 'SWA':
                return redirect()->route('swa')->with('success', 'Sertifikat berhasil ditambahkan.');
            case 'SNI Award':
                return redirect()->route('sni_award')->with('success', 'Sertifikat berhasil ditambahkan.');
            case 'ISO 9001 : 2015':
                return redirect()->route('iso1')->with('success', 'Sertifikat berhasil ditambahkan.');
            case 'ISO 14001 : 2015':
                return redirect()->route('iso2')->with('success', 'Sertifikat berhasil ditambahkan.');
            case 'ISO 27001 : 2015':
                return redirect()->route('iso3')->with('success', 'Sertifikat berhasil ditambahkan.');
            case 'ISO 37001 : 2016':
                return redirect()->route('iso4')->with('success', 'Sertifikat berhasil ditambahkan.');
            case 'ISO 17025 : 2017':
                return redirect()->route('iso5')->with('success', 'Sertifikat berhasil ditambahkan.');
            case 'ISO 45001:2018':
                return redirect()->route('iso6')->with('success', 'Sertifikat berhasil ditambahkan.');
            default:
                return redirect()->route('dashboard')->with('success', 'Sertifikat berhasil ditambahkan.');
        }
    }

    public function hapus(Request $request) {
        // dd($request->all());
        $idsertif = $request->idsertif;
        $sertif = Sertifikat::where('idsertif', $idsertif)->first();
        $filePath = public_path($sertif->dokumen);

        // Hapus file dan data sertifikat
        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        // Hapus data sertifikat dari database
        $sertif->delete();

        switch ($sertif->jenis) {
            case 'Sertifikat CSR':
                return redirect()->route('csr')->with('success', 'Sertifikat berhasil dihapus.');
            case 'Sertifkat HSE':
                return redirect()->route('hse')->with('success', 'Sertifikat berhasil dihapus.');
            case 'Penghargaan':
                return redirect()->route('penghargaan')->with('success', 'Sertifikat berhasil dihapus.');
            case 'Proper':
                return redirect()->route('proper')->with('success', 'Sertifikat berhasil dihapus.');
            case 'SWA':
                return redirect()->route('swa')->with('success', 'Sertifikat berhasil dihapus.');
            case 'SNI Award':
                return redirect()->route('sni_award')->with('success', 'Sertifikat berhasil dihapus.');
            case 'ISO 9001 : 2015':
                return redirect()->route('iso1')->with('success', 'Sertifikat berhasil dihapus.');
            case 'ISO 14001 : 2015':
                return redirect()->route('iso2')->with('success', 'Sertifikat berhasil dihapus.');
            case 'ISO 27001 : 2015':
                return redirect()->route('iso3')->with('success', 'Sertifikat berhasil dihapus.');
            case 'ISO 37001 : 2016':
                return redirect()->route('iso4')->with('success', 'Sertifikat berhasil dihapus.');
            case 'ISO 17025 : 2017':
                return redirect()->route('iso5')->with('success', 'Sertifikat berhasil dihapus.');
            case 'ISO 45001:2018':
                return redirect()->route('iso6')->with('success', 'Sertifikat berhasil dihapus.');
            default:
                return redirect()->route('dashboard')->with('success', 'Sertifikat berhasil dihapus.');
        }
    }


    public function edit(Request $request) {
        //dd($request->all());
        $request->validate([
            'dokumen' => 'required|mimes:doc,docx,pdf,jpg,jpeg,png,xls,xlsx,ppt,pptx|max:2048',// Atur tipe file dan ukuran maksimum
        ]);

        $idsertif = $request->idsertif;
        $sertif = Sertifikat::where('idsertif', $idsertif)->first();

        if ($sertif) {
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

        switch ($sertif->jenis) {
            case 'Sertifikat CSR':
                return redirect()->route('csr')->with('success', 'Sertifikat berhasil diperbarui.');
            case 'Sertifkat HSE':
                return redirect()->route('hse')->with('success', 'Sertifikat berhasil diperbarui.');
            case 'Penghargaan':
                return redirect()->route('penghargaan')->with('success', 'Sertifikat berhasil diperbarui.');
            case 'Proper':
                return redirect()->route('proper')->with('success', 'Sertifikat berhasil diperbarui.');
            case 'SWA':
                return redirect()->route('swa')->with('success', 'Sertifikat berhasil diperbarui.');
            case 'SNI Award':
                return redirect()->route('sni_award')->with('success', 'Sertifikat berhasil diperbarui.');
            case 'ISO 9001 : 2015':
                return redirect()->route('iso1')->with('success', 'Sertifikat berhasil diperbarui.');
            case 'ISO 14001 : 2015':
                return redirect()->route('iso2')->with('success', 'Sertifikat berhasil diperbarui.');
            case 'ISO 27001 : 2015':
                return redirect()->route('iso3')->with('success', 'Sertifikat berhasil diperbarui.');
            case 'ISO 37001 : 2016':
                return redirect()->route('iso4')->with('success', 'Sertifikat berhasil diperbarui.');
            case 'ISO 17025 : 2017':
                return redirect()->route('iso5')->with('success', 'Sertifikat berhasil diperbarui.');
            case 'ISO 45001:2018':
                return redirect()->route('iso6')->with('success', 'Sertifikat berhasil diperbarui.');
            default:
                return redirect()->route('dashboard')->with('success', 'Sertifikat berhasil diperbarui.');
        }
    }

}
