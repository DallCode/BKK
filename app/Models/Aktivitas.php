<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aktivitas extends Model
{
    use HasFactory;
    protected $table = 'aktivitas_users.';
    protected $fillable =['id_aktivitas_users', 'username', 'keterangan', 'tanggal'];

    public function pengguna () : BelongsTo {
        return $this->belongsTo(Users::class);
    }

    public function aktivitas(): HasMany
    {
        return $this->hasMany(Aktivitas::class, 'username', 'username');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id_aktivitas_users = self::generateKodeUnik();
        });
    }

    private static function generateKodeUnik()
    {
        $prefix = 'AU-'; // Bisa disesuaikan sesuai kebutuhan
        $lastRecord = self::orderBy('id_aktivitas_users', 'desc')->first();
        $lastNumber = $lastRecord ? intval(substr($lastRecord->id_lowongan_pekerjaan, strlen($prefix))) : 0;
        $newNumber = $lastNumber + 1;

        return $prefix . str_pad($newNumber, 6, '0', STR_PAD_LEFT);
    }
}
