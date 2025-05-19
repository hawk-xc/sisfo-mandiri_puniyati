<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemeriksaanObat extends Model
{
    protected $table = 'pemeriksaan_obat';

    protected $fillable = [
        'pemeriksaan_id',
        'obat_id',
        'dosis',
        'keterangan'
    ];

    public function pemeriksaan()
    {
        return $this->belongsTo(Pemeriksaan::class);
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
}
