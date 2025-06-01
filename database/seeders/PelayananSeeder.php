<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pelayanan;
use Illuminate\Support\Str;

class PelayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelayanan::insert([
            ['uuid' => Str::uuid(), 'nama' => 'usg', 'created_at' => date('Y-m-d H:i:s')],
            ['uuid' => Str::uuid(), 'nama' => 'vaksinasi', 'created_at' => date('Y-m-d H:i:s')],
            ['uuid' => Str::uuid(), 'nama' => 'anc', 'created_at' => date('Y-m-d H:i:s')],
            ['uuid' => Str::uuid(), 'nama' => 'kia', 'created_at' => date('Y-m-d H:i:s')],
            ['uuid' => Str::uuid(), 'nama' => 'ibu nifas', 'created_at' => date('Y-m-d H:i:s')],
            ['uuid' => Str::uuid(), 'nama' => 'kb', 'created_at' => date('Y-m-d H:i:s')],
            ['uuid' => Str::uuid(), 'nama' => 'umum', 'created_at' => date('Y-m-d H:i:s')],
        ]);
    }
}
