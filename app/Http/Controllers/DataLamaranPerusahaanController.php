<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\Auth;

class DataLamaranPerusahaanController extends Controller
{
    public function index()
    {

        $perusahaanLogin = Perusahaan::where('username', Auth::user()->username)->first();
        return view('DataLamaranPerusahaan', compact('perusahaanLogin'));    }
}
