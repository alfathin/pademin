<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function login(Request $request) {
        $data = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        $msg = 'Selamat datang '. $request->username;

        if (Auth::attempt($data)) {

            if (Auth::user()->role == 'admin') {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard')->with('success', $msg);
            }
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', $msg);
        }
        return back()->with('loginError', 'Username atau Password Salah!');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function register(Request $request) {
        try {
            $registerData = $request->validate([
                'username' => 'required|unique:users,username|max:50',
                'email' => 'required|email|unique:users,email|max:100',
                'password' => 'required|min:8',
            ]);
            $registerData['password'] = Hash::make($registerData['password']);
            $registerData['role'] = 'user';
            User::create($registerData);
            return redirect('/login')->with('success', 'Pendaftaran Telah Berhasil, Silahkan Login!');
    
        } catch (ValidationException $e) {
            return redirect()->back()
                             ->withErrors($e->validator)
                             ->withInput();
        }
    }
}
