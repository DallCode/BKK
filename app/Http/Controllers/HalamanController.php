<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HalamanController extends Controller
{
    public function dashboard () {
        if (Auth::user()) {
            $role = Auth::user()->role;

            if ($role == 'Admin') {
                return view('dashboardAdmin');
            } else if ($role == 'Perusahaan') {
                return view('dashboardPerusahaan');
            } else if ($role == 'Alumni') {
                return view('alumni');
            }
        }
        return redirect()->route('login');
    }
}
