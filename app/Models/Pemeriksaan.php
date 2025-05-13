<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;

    protected $table = 'pemeriksaan';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) \Illuminate\Support\Str::uuid();
        });
    }


    protected $fillable = [
        'pendaftaran_id',
        'pembayaran_id',
        'bidan_id',
        'pelayanan_id',
        'keluhan',
        'riwayat',
        'riwayat_imunisasi',
        'tensi',
        'bb',
        'tb',
        'suhu_badan',
        'saturasi_oksigen',
        'lila',
        'hpht',
        'gpa',
        'umur_kehamilan',
        'lingkar_perut',
        'tinggi_fundus',
        'jumlah_anak',
        'persalinan_terakhir',
        'djj',
        'refla',
        'lab',
        'tanggal_melahirkan',
        'tempat_persalinan',
        'bantu_persalinan',
        'besar_rahim',
        'cairan_keluar',
        'infeksi',
        'diagnosa',
        'tindakan',
        'tanggal_kontrol',
    ];

    public function pendaftaran()
    {
        return $this->hasOne(Pendaftaran::class, 'id', 'pendaftaran_id');
    }

    public function bidan()
    {
        return $this->hasOne(Bidan::class, 'id', 'bidan_id');
    }

    public function pelayanan()
    {
        return $this->hasOne(Pelayanan::class, 'id', 'pelayanan_id');
    }
}
