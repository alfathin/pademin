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
                return redirect()->intended('/admin_dashboard')->with('success', $msg);
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

    public function view(){
        return view('admin.users', [
            'title' => 'Users',
            'users' => User::where('role', 'user')->get()
        ]);
    }

    public function postEdit(Request $request, $id){
        $user = User::findOrFail($id);
        $request->validate([
            'username' => 'required|max:50|unique:users,username,' . $user->id,
            'email' => 'required|email|max:100|unique:users,email,'. $user->id,
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $user->username = $request->username;
        $user->email = $request->email;
        $user->username = $request->username;


        if ($request->hasFile('image')) {
            if ($user->image && file_exists(public_path($user->image))) {
                unlink(public_path($user->image)); // Menghapus file dari direktori publik
            }

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('user'), $imageName);

            $user->image = 'user/' . $imageName;
        } else {
            unset($request->image);
        }

        $user->save();
        return redirect('/admin_users')->with('success', 'Data user berhasil diubah!');
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('admin_users')->with('success', 'Data user berhasil dihapus.');
    }

    public function admin($id){
        $user = User::findOrFail($id);
        $user->role = 'admin';
        $user->save();
        return redirect('admin_users')->with('success', 'Berhasil Menjadikan admin.');
    }

    public function userView() {
        return view('profile', [
            'title' => 'Profile',
        ]);
    }

    public function editProfile(Request $request, $id){
        $user = User::findOrFail($id);
        $request->validate([
            'username' => 'required|max:50|unique:users,username,' . $user->id,
            'email' => 'required|email|max:100|unique:users,email,'. $user->id,
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $user->username = $request->username;
        $user->email = $request->email;
        $user->username = $request->username;


        if ($request->hasFile('image')) {
            if ($user->image && file_exists(public_path($user->image))) {
                unlink(public_path($user->image)); // Menghapus file dari direktori publik
            }

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('user'), $imageName);

            $user->image = 'user/' . $imageName;
        } else {
            unset($request->image);
        }

        $user->save();
        return redirect('/profile')->with('success', 'Data user berhasil diubah!');
    }

    public function ubahPassword(Request $request){
        try {
            $request->validate([
                'password1' => 'required|min:8',
                'password2' => 'required|min:8',
                'password3' => 'required|min:8',
            ]);
            if (!Hash::check($request->password1, Auth::user()->password)) {
                return back()->with('loginError', 'Password lama anda salah!');
            }
            if ($request->password2 != $request->password3) {
                return back()->with('loginError', 'Password baru anda tidak sesuai!');
            }
            $user = Auth::user();
            $user->password = Hash::make($request->password3);
            $user->save();
            return redirect('/profile')->with('success', 'Berhasil Mengubah password.');
    
        } catch (ValidationException $e) {
            return redirect()->back()
                             ->withErrors($e->validator)
                             ->withInput();
        }
    }
}
