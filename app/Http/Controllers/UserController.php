<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function main(){
        return view('konten.user',[
            'data' => User::all(),
            'title' => 'User'
        ]);
    }

    public function tambah(Request $request){
        $user = new User();
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->save();
        return redirect()->route('user')->with('dataTambah', 'Data Berhasil Di Tambah');
    }

    public function hapus(Request $request){
        $user = User::where('id', $request->id);
        $user->delete();
        return redirect()->route('user');

    }
}
