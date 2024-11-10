<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

abstract class Controller
{
    public function login(Request $request) {
        $data = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
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
        $registerData = $request->validate([
            'name' => ['required'],
            'username' => ['required','unique:users'],
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        //$registerData['password'] = Hash::make($registerData['password']);

        User::create($registerData);

        return redirect('/')->with('success', 'Registrasion Was Successfull! Please Login');
    }
}
