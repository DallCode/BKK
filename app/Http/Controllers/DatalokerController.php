<?php

namespace App\Http\Controllers;
use App\Models\Perusahaan;
use App\Models\Loker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DatalokerController extends Controller
{
    public function index()
    {

        $perusahaanLogin = Perusahaan::where('username', Auth::user()->username)->first();

        $loker = Loker::all(); // Mengambil semua data lowongan
        return view('dataLoker', compact('perusahaanLogin', 'loker'));
        // return view('dataLoker', compact('loker')); // Mengirimkan data ke view
}

public function store(Request $request)
{
    $request->validate([
        'jabatan_pekerjaan' => 'required|string|max:255',
        'jenis_waktu_pekerjaan' => 'required',
        'tanggal_akhir' => 'required|string',
        'deskripsi' => 'required|string',
    ]);

    // return Auth::user()->perusahaan->id_data_perusahaan;
    Loker::create([
        'id_data_perusahaan' => Auth::user()->perusahaan->id_data_perusahaan,
        'jabatan' => $request->jabatan_pekerjaan,
        'jenis_waktu_pekerjaan' => $request->jenis_waktu_pekerjaan,
        'deskripsi' => $request->deskripsi,
        'tanggal_akhir' => $request->tanggal_akhir,
        'status' => 'Tertunda'
    ]);

    return redirect()->back()->with('success', 'Lowongan pekerjaan berhasil ditambahkan!');
}

public function show($id_lowongan_pekerjaan)
{
    // Dapatkan ID perusahaan yang sedang login (misalnya dari sesi atau autentikasi)
    $id_data_perusahaan = Auth()->user()->perusahaan->id_data_perusahaan; // Sesuaikan dengan cara Anda mendapatkan ID perusahaan

    // Cari lowongan berdasarkan ID dan pastikan juga sesuai dengan ID perusahaan
    $loker = Loker::where('id_lowongan_pekerjaan', $id_lowongan_pekerjaan)
                    ->where('id_data_perusahaan', $id_data_perusahaan)
                    ->firstOrFail();

    // Jika ditemukan, tampilkan view dengan data lowongan
    return view('lowongan.show', compact('loker'));
}


public function update(Request $request, $id_lowongan_pekerjaan)
{

    // return $request;
    // $request->validate([
    //     'status' => 'required|in:Tertunda,Dipublikasi,Tidak Dipublikasi',
    // ]);



    $lowongan = Loker::findOrFail($id_lowongan_pekerjaan);

    $lowongan->jabatan = $request->jabatan;
    $lowongan->jenis_waktu_pekerjaan = $request->jenis_waktu_pekerjaan;
    $lowongan->deskripsi = $request->deskripsi;
    $lowongan->tanggal_akhir = $request->tanggal_akhir;
    // $lowongan->status = $request->status;

    $lowongan->save();

    return redirect()->route('lowongan.index')->with('success', 'Data lowongan berhasil diperbarui');
}

}
