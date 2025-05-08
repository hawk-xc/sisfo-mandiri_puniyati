<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) \Illuminate\Support\Str::uuid();
        });
    }

    protected $fillable = [
        'bidan_picture',
        'nama',
        'alamat',
        'no_telp',
        'jadwal_praktek',
        'uuid',
        'nik',
        'nama_kk',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'pendidikan',
        'pekerjaan',
        'penanggung_jawab',
        'golda'
    ];
}
