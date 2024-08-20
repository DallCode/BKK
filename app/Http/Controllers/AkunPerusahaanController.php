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
        $perusahaan = Perusahaan::paginate(10);
        return view('akunPerusahaan', compact('perusahaan'));
    }

    public function update(Request $request, string $username)
{


    $perusahaan = Perusahaan::find($username);

    if ($request->has('status')) {
        $perusahaan->update(['status' => $request->input('status')]);
        return redirect()->back()->with(['toast' => 'true', 'status' => 'success', 'message' => 'Berhasil Mengubah Status']);
    }
    // return $perusahaan;
    $perusahaan->nama = $request->input('nama');
    $perusahaan->bidang_usaha = $request->input('bidang_usaha');
    $perusahaan->no_telepon = $request->input('no_telepon');
    $perusahaan->alamat = $request->input('alamat');
    $perusahaan->save();

    return redirect()->route('perusahaan.index')->with('success', 'Data perusahaan berhasil diperbarui.');
}

public function destroy($username)
{
    $perusahaan = Perusahaan::find($username);
    $perusahaan->delete();

    return redirect()->route('perusahaan.index')->with('success', 'Data perusahaan berhasil dihapus.');
}

public function store(Request $request)
{

    // return $request;
    $request->validate([
        'username' => 'required|string|max:255',
        'password' => 'required|string',
    ]);

    $pengguna = Users::create([
        'username' => $request->input('username'),
        'password' => Hash::make($request->input('password')),
        'role' => 'Perusahaan',
    ]);

    Perusahaan::create([
        'id_data_perusahaan' => $pengguna->id_data_perusahaan ,
        'username' => $pengguna->username,
        'nama' => $request->input('nama'),
        'bidang_usaha' => $request->input('bidang_usaha'),
        'no_telepon' => $request->input('no_telepon'),
        'alamat' => $request->input('alamat'),
    ]);

    // Perusahaan::create($validated);
    return redirect('/akunperusahaan')->with('success', 'Data berhasil ditambahkan');
}

}
