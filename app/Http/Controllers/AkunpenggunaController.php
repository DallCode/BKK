<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Users;
use App\Models\Aktivitas;
use Illuminate\Http\Request;

class AkunpenggunaController extends Controller
{
    public function index()
    {
        $users = Users::all(); // Mengambil semua data lowongan
        $users = Users::paginate(10);
        $aktivitas = Users::all();
        return view('Akunpengguna', compact('users', 'aktivitas')); // Mengirimkan data ke view
    }
}
