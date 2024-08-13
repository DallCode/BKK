<?php

namespace App\Imports;

use App\Models\Alumni;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AlumniImport implements ToModel, WithHeadingRow
{
    use Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = Users::create([
            'email' => $row['email'],
            'password' => bcrypt($row['password']),
            'role' => 'Alumni'
        ]);

        return new Alumni([
            'nik'     => $row['nis'], // Gunakan nama header sesuai dengan file Excel
            'id_user'   => $user->id,
            'nama'    => $row['nama_lengkap'],
            'jurusan'   => $row['jurusan'],
            // 'jenis_kelamin' => $row['jenis_kelamin'],
            'tahun_lulus'   => $row['tahun_lulus'],
        ]);
    }
}
