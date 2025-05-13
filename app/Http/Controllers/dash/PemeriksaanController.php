<?php

namespace App\Http\Controllers\dash;

use App\DataTables\PemeriksaanDataTable;
use App\Http\Controllers\Controller;
use App\Models\Pemeriksaan;
use Exception;
use Illuminate\Http\Request;

class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PemeriksaanDataTable $dataTable)
    {
        return $dataTable->render('dashboard.pemeriksaan.index', [
            'title' => 'Data Pemeriksaan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pemeriksaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Pemeriksaan::findOrFail($id)->with(['pasien', 'bidan', 'pelayanan'])->first();
        return view('dashboard.pemeriksaan.show', [
            'title' => 'Detail Pemeriksaan',
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Pemeriksaan::findOrFail($id);

        return view('dashboard.pemeriksaan.edit', [
            'title' => 'Edit Pemeriksaan',
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pemeriksaanId = $id;

        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pemeriksaan::findOrFail($id);

        try {
            $data->delete();

            return redirect()->route('pemeriksaan.index')->with('success', 'Data Pemeriksaan Berhasil Dihapus');
        } catch (Exception $e) {
            return redirect()->route('pemeriksaan.index')->with('error', 'Data Pemeriksaan Gagal Dihapus');
        }
    }
}
