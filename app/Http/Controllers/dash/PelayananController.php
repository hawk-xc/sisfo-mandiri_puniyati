<?php

namespace App\Http\Controllers\dash;

use App\DataTables\PelayananDataTable;
use App\Http\Controllers\Controller;
use App\Models\Pelayanan;
use Exception;
use Illuminate\Http\Request;

class PelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PelayananDataTable $dataTable)
    {
        return $dataTable->render('dashboard.masterdata.pelayanan.index', [
            'title' => 'Data Pelayanan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.masterdata.pelayanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelayanan' => 'required|string',
            'biaya' => 'required|numeric'
        ], [
            'nama_pelayanan.required' => 'Nama pelayanan wajib diisi.',
            'nama_pelayanan.string' => 'Nama pelayanan harus berupa teks.',
            'biaya.required' => 'Biaya wajib diisi.',
            'biaya.numeric' => 'Biaya harus berupa angka.'
        ]);

        try {
            Pelayanan::create([
                'nama' => $request->nama_pelayanan,
                'biaya' => $request->biaya
            ]);

            return redirect()->route('pelayanan.index')->with('success', 'Data Pelayanan berhasil disimpan.');
        }
        catch (Exception $e) {
            return redirect()->route('pelayanan.index')->with('error', 'Data Pelayanan gagal disimpan. -> ' . $e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Pelayanan::findOrFail($id);

        return view('dashboard.masterdata.pelayanan.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Pelayanan::findOrFail($id);

        $request->validate([
            'biaya' => 'required|numeric'
        ], [
            'biaya.required' => 'Biaya wajib diisi.',
            'biaya.numeric' => 'Biaya harus berupa angka.'
        ]);

        try {
            $data->biaya = $request->biaya;
            $data->save();

            return redirect()->route('pelayanan.index')->with('success', 'Data Pelayanan berhasil diubah.');
        }
        catch (Exception $e) {
            dd($e);
            return redirect()->route('pelayanan.index')->with('error', 'Data Pelayanan gagal diubah. -> ' . $e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
