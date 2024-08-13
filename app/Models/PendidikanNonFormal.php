<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanNonFormal extends Model
{
    use HasFactory;
    protected $table = 'riwayat_pendidikan_formal';
    protected $fillable =[
        'id_riwayat_pendidikan_non_formal',
        'nik',
        'nama_lembaga',
        'alamat',
        'kursus',
        'tanggal',
        ];

    public function alumni () : BelongsTo {
        return $this->belongsTo(Alumni::class);
    }
}
