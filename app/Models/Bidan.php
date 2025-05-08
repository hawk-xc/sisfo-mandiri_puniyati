<?php

namespace App\Models;
use App\Models\Pemeriksaan;

use Illuminate\Database\Eloquent\Model;

class Bidan extends Model
{
    protected $table = 'bidan';

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
        'jadwal_praktek'
    ];

    public function pemeriksaan() {
        return $this->belongsTo(Pemeriksaan::class, 'bidan_id', 'id');
    }
}
