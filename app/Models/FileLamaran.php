<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileLamaran extends Model
{
    use HasFactory;
    protected $table = 'file_lamaran';
    protected $fillable = ['id_lamaran','nama_file'];

    public function loker () : BelongsTo {
        return $this->belongsTo(Loker::class);
    }

    public function alumni () : BelongsTo {
        return $this->belongsTo(Alumni::class);
    }
}
