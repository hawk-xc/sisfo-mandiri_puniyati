<?php

namespace App\Http\Controllers\dash;

use App\DataTables\ObatDataTable;
use App\Http\Controllers\Controller;
use App\Models\Obat;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ObatDataTable $dataTable)
    {
        return $dataTable->render('dashboard.masterdata.obat.index', [
            'title' => 'Data Obat'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.masterdata.obat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'jenis' => 'required|string',
            'stok' => 'required|integer',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
        ], [
            'nama.required' => 'Nama obat wajib diisi.',
            'nama.string' => 'Nama obat harus berupa teks.',
            'jenis.required' => 'Jenis obat wajib diisi.',
            'jenis.string' => 'Jenis obat harus berupa teks.',
            'stok.required' => 'Stok obat wajib diisi.',
            'stok.integer' => 'Stok obat harus berupa angka.',
            'harga_beli.required' => 'Harga beli wajib diisi.',
            'harga_beli.numeric' => 'Harga beli harus berupa angka.',
            'harga_jual.required' => 'Harga jual wajib diisi.',
            'harga_jual.numeric' => 'Harga jual harus berupa angka.',
        ]);

        try {
            $data = new Obat;
            $data->nama = $request->nama;
            $data->jenis = $request->jenis;
            $data->stok = $request->stok;
            $data->harga_beli = $request->harga_beli;
            $data->harga_jual = $request->harga_jual;
            $data->save();

            return redirect()->route('obat.index')->with('success', 'Data Obat berhasil disimpan!');
        } catch (Exception $e) {
            return redirect()->route('obat.index')->with('error', 'Data Obat gagal disimpan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Obat::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Obat::findOrFail($id);

        return view('dashboard.masterdata.obat.edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|unique:obat,nama,' . $id,
            'jenis' => 'required|string',
            'stok' => 'required|integer',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
        ], [
            'nama.unique' => 'Nama obat sudah terdaftar.',
            'nama.required' => 'Nama obat wajib diisi.',
            'nama.string' => 'Nama obat harus berupa teks.',
            'jenis.required' => 'Jenis obat wajib diisi.',
            'jenis.string' => 'Jenis obat harus berupa teks.',
            'stok.required' => 'Stok obat wajib diisi.',
            'stok.integer' => 'Stok obat harus berupa angka.',
            'harga_beli.required' => 'Harga beli wajib diisi.',
            'harga_beli.numeric' => 'Harga beli harus berupa angka.',
            'harga_jual.required' => 'Harga jual wajib diisi.',
            'harga_jual.numeric' => 'Harga jual harus berupa angka.',
        ]);

        try {
            $data = Obat::findOrFail($id);
            $data->nama = $request->nama;
            $data->jenis = $request->jenis;
            $data->stok = $request->stok;
            $data->harga_beli = $request->harga_beli;
            $data->harga_jual = $request->harga_jual;
            $data->save();

            return redirect()->route('obat.index')->with('success', 'Data Obat berhasil diubah!');
        } catch (Exception $e) {
            return redirect()->route('obat.index')->with('error', 'Data Obat gagal diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Obat::findOrFail($id);

        try {
            $data->delete();

            return redirect()->route('obat.index')->with('success', 'Berhasil hapus data Obat terkait!');
        } catch (Exception $e) {
            return redirect()->route('obat.index')->with('error', 'Gagal menghapus data Obat!');
        }
    }

    /**
     * Handle Select2
     */
    public function select2(Request $request)
    {
        $search = $request->search;

        $obats = Obat::when($search, function($query) use ($search) {
                $query->where('nama', 'like', '%'.$search.'%');
            })
            ->select('id', 'nama as text', 'stok')
            ->paginate(10);

        return response()->json([
            'data' => $obats->items(),
            'next_page_url' => $obats->nextPageUrl()
        ]);
    }
}
