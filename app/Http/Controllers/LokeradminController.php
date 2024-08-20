<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Loker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LokeradminController extends Controller
{
    public function index()
    {
        $perusahaanLogin = Perusahaan::where('username', Auth::user()->username)->first();

        $loker = Loker::all(); // Mengambil semua data lowongan
        $loker = Loker::paginate(10);
        // return view('Lokeradmin', compact('perusahaanLogin', 'loker'));
        return view('Lokeradmin', compact('loker')); // Mengirimkan data ke view
    }

    public function updateStatus(Request $request, $id)
{
    $lowongan = Loker::findOrFail($id);
    $lowongan->status = $request->status;
    $lowongan->save();

    return redirect()->back()->with('success', 'Status lowongan berhasil diubah.');
}

}
