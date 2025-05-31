<?php

namespace App\Http\Controllers;

use \App\Models\Pemeriksaan;
use App\Http\Controllers\Controller;
use App\Models\Bidan;
use App\Models\Pasien;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'pasien_count' => Pasien::get()->count(),
            'pemeriksaan_count' => Pemeriksaan::get()->count(),
            'bidan_count' => Bidan::get()->count()
        ];

        return view('dashboard',
    ['data' => $data]);
    }
}
