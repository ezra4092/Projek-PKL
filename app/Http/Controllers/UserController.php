<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return view('konten.user',[
            'data' => User::all(),
            'title' => 'User'
        ]);
    }

    public function tambah(Request $request){
        $user = new User();
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password =  Hash::make($request->password);
        $user->save();
        return redirect()->route('user')->with(['tambah' => true, 'message' => 'Akun Berhasil ditambah']);
    }

    public function hapus(Request $request){
        $user = User::find($request->id);
        $user->delete();
        return redirect()->route('user')->with(['delete' => true, 'message' => 'Akun Berhasil dihapus']);
    }

    public function edit(Request $request){
        // dd($request->all());
        $akun = User::find($request->id);
        if ($request->password == null){
                $akun->nama = $request->nama;
                $akun->username = $request->username;
                $akun->save();
            }
        else {
            $akun->nama = $request->nama;
            $akun->username = $request->username;
            $akun->password = $request->password;
            $akun->save();
        }
        return redirect()->route('user')->with(['edit' => true, 'message' => 'Akun Berhasil diedit']);
    }

}

