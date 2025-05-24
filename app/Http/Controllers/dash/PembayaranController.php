<?php

namespace App\Http\Controllers\dash;

use App\DataTables\PembayaranDataTable;
use App\Http\Controllers\Controller;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PembayaranDataTable $dataTable)
    {
        return $dataTable->render('dashboard.pembayaran.index', [
            'title' => 'Data Pemeriksaan'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Pemeriksaan::findOrFail($id);

        return view('dashboard.pembayaran.show', ['data' => $data]);
    }
}
