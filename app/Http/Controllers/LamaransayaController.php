<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumni;
use Illuminate\Support\Facades\Auth;

class LamaransayaController extends Controller
{
    public function index()
    {
        $alumniLogin = Alumni::where('id_user', Auth::id())->first();
        return view('Lamaransaya', compact('alumniLogin'));
    }
}
