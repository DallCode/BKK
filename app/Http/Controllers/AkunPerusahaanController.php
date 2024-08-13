<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class AkunPerusahaanController extends Controller
{
    public function index()
    {
        $perusahaan = Perusahaan::all();
        return view('akunPerusahaan', compact('perusahaan'));
    }

    public function update(Request $request, $id)
{
    $perusahaan = Perusahaan::find($id);
    $perusahaan->nama = $request->input('nama');
    $perusahaan->bidang_usaha = $request->input('bidang_usaha');
    $perusahaan->no_telepon = $request->input('no_telepon');
    $perusahaan->alamat = $request->input('alamat');
    $perusahaan->save();

    return redirect()->route('perusahaan.index')->with('success', 'Data perusahaan berhasil diperbarui.');
}

public function destroy($id)
{
    $perusahaan = Perusahaan::find($id);
    $perusahaan->delete();

    return redirect()->route('perusahaan.index')->with('success', 'Data perusahaan berhasil dihapus.');
}

public function store(Request $request)
{

    $request->validate([
        'email' => 'required|string|max:255',
        'password' => 'required|string',
    ]);

    $pengguna = Users::create([
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
        'role' => 'Perusahaan',
    ]); 

    Perusahaan::create([
        'id_user' => $pengguna->id,
        'nama' => $request->input('nama'),
        'bidang_usaha' => $request->input('bidang_usaha'),
        'no_telepon' => $request->input('no_telepon'),
        'alamat' => $request->input('alamat'),
    ]);

    // Perusahaan::create($validated);
    return redirect('/akunperusahaan')->with('success', 'Data berhasil ditambahkan');
}

}
