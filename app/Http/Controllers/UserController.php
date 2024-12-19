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
        $user->email = $request->email;
        $user->password =  Hash::make($request->password);
        $user->privilages = $request->privilages;
        $user->save();
        return redirect()->route('user')->with('success', 'Akun berhasil ditambahkan.');
    }

    public function hapus(Request $request){
        // dd($request->all());
        $delete = $request->id;
        $akun = User::where('id', $delete);
        $akun->delete();
        return redirect()->route('user')->with('success', 'Akun berhasil dihapus.');
    }

    public function edit(Request $request){
        // dd($request->all());
        $akun = User::find($request->id);
        if ($request->password == null){
            if($request->privilages == null){
                $akun->nama = $request->nama;
                $akun->username = $request->username;
                $akun->email = $request->email;
                $akun->save();
            } else {
                $akun->nama = $request->nama;
                $akun->username = $request->username;
                $akun->username = $request->username;
                $akun->email = $request->email;
                $akun->privilages = $request->privilages;
                $akun->save();
            }
        } else {
            $akun->nama = $request->nama;
            $akun->username = $request->username;
            $akun->privilages = $request->privilages;
            $akun->password = $request->password;
            $akun->email = $request->email;
            $akun->save();
        }
        return redirect()->route('user')->with('success', 'Akun berhasil diedit.');
    }

}

