<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) \Illuminate\Support\Str::uuid();
        });
    }

    protected $fillable = [
        'nama',
        'jenis',
        'stok',
        'harga_beli',
        'harga_jual',
        // new column
        'kode_obat',
    ];

    public function pemeriksaanObat()
    {
        return $this->hasMany(PemeriksaanObat::class, 'obat_id');
    }
}
