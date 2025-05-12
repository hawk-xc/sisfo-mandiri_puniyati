<?php

namespace App\Models;

use App\Models\Pemeriksaan;
use App\Models\Pasien;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) \Illuminate\Support\Str::uuid();
        });
    }

    protected $fillable = [
        'pasien_id',
        'no_rm',
        'tanggal',
        'status',
        'uuid'
    ];

    public function pasien()
    {
        return $this->hasOne(Pasien::class, 'id', 'pasien_id');
    }

    public function pemeriksaan()
    {
        return $this->belongsTo(Pemeriksaan::class, 'id', 'pendaftaran_id');
    }
}
