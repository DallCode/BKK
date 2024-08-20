<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Users;
use Illuminate\Http\Request;

class AkunpenggunaController extends Controller
{
    public function index()
    {
        $users = Users::all(); // Mengambil semua data lowongan
        $users = Users::paginate(10);
        return view('Akunpengguna', compact('users')); // Mengirimkan data ke view
    }
}
