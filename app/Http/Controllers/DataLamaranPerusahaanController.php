<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\Auth;

class DataLamaranPerusahaanController extends Controller
{
    public function index()
    {
        $perusahaanLogin = Perusahaan::where('id_user', Auth::id())->first();
        return view('DataLamaranPerusahaan', compact('perusahaanLogin'));    }
}
