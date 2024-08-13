<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardperusahaanController extends Controller
{
    public function index()
    {
        $perusahaanLogin = Perusahaan::where('username', Auth::user()->username)->first();
        return view('dashboardPerusahaan', compact('perusahaanLogin'));
    }
}
