<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
// use App\Models\pengguna;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
USe Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function show () {
        if(!Auth::user()) {
            return view('auth.login');
        }
        return redirect()->back();
    }

    public function login (Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = Users::where('username', $request->username)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email tidak terdaftar pada aplikasi.');
        }

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'password yang anda masukan salah.');
        }

        Auth::login($user);
        $role = $user->role;


        return redirect()->route('dashboard', compact('role'));
    }

    public function logout () {
        Auth::logout();
        return redirect()->route('login');
    }
}
