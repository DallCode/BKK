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
            'username' => $row['username'],
            'password' => bcrypt($row['password']),
            'role' => 'Alumni'
        ]);

        return new Alumni([
            'nik'     => $row['nik'], // Gunakan nama header sesuai dengan file Excel
            'username'   => $user->username,
            'nama'    => $row['nama'],
            'jurusan'   => $row['jurusan'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'tahun_lulus'   => $row['tahun_lulus'],
        ]);
    }
}
