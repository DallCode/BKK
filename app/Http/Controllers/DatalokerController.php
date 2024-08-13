<?php

namespace App\Http\Controllers;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DatalokerController extends Controller
{
    public function index()
    {
        $perusahaanLogin = Perusahaan::where('id_user', Auth::id())->first();
        return view('dataloker', compact('perusahaanLogin'));
}
}
