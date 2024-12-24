<?php

namespace App\Http\Controllers;
use App\Models\Sertifikat;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index() {
        $isoJenis = [
            'ISO 9001 : 2015',
            'ISO 14001 : 2015',
            'ISO 27001 : 2015',
            'ISO 37001 : 2016',
            'ISO 17025 : 2017',
            'ISO 45001 : 2018'
        ];

        $startDate = now();
        $endDate = now()->addDays(30); // 30 hari setelah hari ini

        $sertif = Sertifikat::whereIn('jenis', $isoJenis)
        ->whereNotNull('tgl_kadaluwarsa') // Mengabaikan data yang tidak memiliki tgl_kadaluwarsa
        ->whereBetween('tgl_kadaluwarsa', [$startDate, $endDate]) // Mengambil data yang kadaluwarsa dalam rentang 30 hari sebelum dan sesudah hari ini
        ->get();

        return view('konten.dashboard', [
            'data' => $sertif,
            'title' => 'Dashboard'
        ]);
    }

    public function documentation()
    {
        return view('documentation');
    }

    public function eror(){
        return view('eror');
    }

    public function profile2(){
        return view('konten.profile');
    }

    public function profile($id){
        //dd($request->all());
        $user = User::where('id', $id)->firstorfail();
        return view ('konten.profile', compact('user'));
    }

    public function updateprofile(Request $request, $id) {
        $user = User::find($id);

        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->username = $request->username;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect("profile/{$id}")->with('success', 'Profile berhasil diupdate.');
    }


}
