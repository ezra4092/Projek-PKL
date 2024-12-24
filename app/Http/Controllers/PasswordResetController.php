<?php

namespace App\Http\Controllers;

use App\Mail\ResetPW;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Stringable;

class PasswordResetController extends Controller
{
    public function show(){
        return view ('lupa-pw');
    }

    public function kirimlink(Request $request){
        $request->validate(['email' => 'required|email']);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return back()->with('error', 'Email tidak ditemukan.');
    }
    $token = bin2hex(random_bytes(20));
    $user->token = $token;
    $user->save();

    $resetLink = url('/reset-password?token=' . $token);

    // Kirim email
    Mail::to($user->email)->send(new ResetPW($resetLink));

    return redirect('/')->with('success', 'Link reset password telah dikirim ke email Anda.');
}

    public function resetform(Request $request){
        $token = $request->query('token');
        $user = User::where('token', $token)->first();
        if (!$user) {
        return redirect('/')->with('error', 'Token tidak valid.');
    }

    return view('reset-pw', ['data' => $user]);

    }

    public function resetpw(Request $request){
        $token = $request->input('token');
        if (!$token) {
            return redirect('/')->with('error', 'Token tidak ditemukan.');
        }

        $request->validate([
            'password' => 'required|min:8',
        ]);

        $user = User::where('token', $token)->first();

        if (!$user) {
            return redirect('/')->with('error', 'Token tidak valid.');
        }
        $user->password = Hash::make($request->password);
        $user->token = null;
        $user->save();
        return redirect('/')->with('success', 'Password berhasil direset.');
    }

}
