<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }
    public function login()
    {
        return view('loginpage');
    }
    public function registerprocess(Request $request)
    {
        $create = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nama' => $request->nama,
            'no_telp' => $request->nomortelepon,
            'golongandarah' => $request->gol_darah
        ]);

        return redirect('/login');
    }
    public function loginprocess(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Email atau password salah');
        }
        Auth::login($user);
        return redirect('/home');
    }
    public function homepage()
    {
        return view('homepage');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/homepage');
    }
}
