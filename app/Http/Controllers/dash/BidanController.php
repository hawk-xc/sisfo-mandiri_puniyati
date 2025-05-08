<?php

namespace App\Http\Controllers\dash;

use App\DataTables\BidanDataTable;
use App\Http\Controllers\Controller;
use App\Models\Bidan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BidanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BidanDataTable $dataTable)
    {
        return $dataTable->render('dashboard.masterdata.bidan.index', [
            'title' => 'Data Bidan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.masterdata.bidan.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'bidan_picture' => 'nullable|file|image|max:2048', // opsional, bisa disesuaikan
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'no_telp' => 'required|string',
            'jadwal_praktek.*' => 'nullable|string'
        ], [
            'bidan_picture.nullable' => 'Foto bidan bersifat opsional.',
            'bidan_picture.image' => 'File harus berupa gambar.',
            'bidan_picture.max' => 'Ukuran gambar maksimal 2MB.',
            'nama.required' => 'Nama bidan wajib diisi.',
            'nama.string' => 'Nama bidan harus berupa teks.',
            'alamat.required' => 'Alamat bidan wajib diisi.',
            'alamat.string' => 'Alamat bidan harus berupa teks.',
            'no_telp.required' => 'Nomor telepon bidan wajib diisi.',
            'no_telp.string' => 'Nomor telepon bidan harus berupa teks.',
            'jadwal_praktek.*.nullable' => 'Jadwal praktek bersifat opsional.',
            'jadwal_praktek.*.string' => 'Jadwal praktek harus berupa teks.'
        ]);

        try {
            // Ubah array jadwal_praktek menjadi string dipisah koma
            $jadwalPraktek = implode(',', $request->input('jadwal_praktek', []));

            $filename = null;

            // Jika ada file bidan_picture diupload
            if ($request->hasFile('bidan_picture')) {
                $file = $request->file('bidan_picture');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('bidan_', $filename, 'public');
            }

            // Simpan ke database
            Bidan::create([
                'bidan_picture' => $filename,
                'nama' => $request->input('nama'),
                'alamat' => $request->input('alamat'),
                'no_telp' => $request->input('no_telp'),
                'jadwal_praktek' => $jadwalPraktek
            ]);

            return redirect()->route('bidan.index')->with('success', 'Data bidan berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('bidan.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    // disable show method
    // public function show(string $id)
    // {
    //     $data = Bidan::findOrFail($id);

    //     return view('dashboard.masterdata.bidan.show', [
    //         'data' => $data
    //     ]);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Bidan::findOrFail($id);

        return view('dashboard.masterdata.bidan.edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'bidan_picture' => 'nullable|file|image|max:2048',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'no_telp' => 'required|string',
            'jadwal_praktek.*' => 'nullable|string'
        ], [
            'bidan_picture.nullable' => 'Foto bidan bersifat opsional.',
            'bidan_picture.image' => 'File harus berupa gambar.',
            'bidan_picture.max' => 'Ukuran gambar maksimal 2MB.',
            'nama.required' => 'Nama bidan wajib diisi.',
            'nama.string' => 'Nama bidan harus berupa teks.',
            'alamat.required' => 'Alamat bidan wajib diisi.',
            'alamat.string' => 'Alamat bidan harus berupa teks.',
            'no_telp.required' => 'Nomor telepon bidan wajib diisi.',
            'no_telp.string' => 'Nomor telepon bidan harus berupa teks.',
            'jadwal_praktek.*.nullable' => 'Jadwal praktek bersifat opsional.',
            'jadwal_praktek.*.string' => 'Jadwal praktek harus berupa teks.'
        ]);

        try {
            $bidan = Bidan::findOrFail($id);

            $filename = $bidan->bidan_picture;

            // Jika user upload gambar baru
            if ($request->hasFile('bidan_picture')) {
                $file = $request->file('bidan_picture');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('bidan_', $filename, 'public');
            }

            $jadwalPraktek = implode(',', $request->input('jadwal_praktek', []));

            $bidan->update([
                'bidan_picture' => $filename,
                'nama' => $request->input('nama'),
                'alamat' => $request->input('alamat'),
                'no_telp' => $request->input('no_telp'),
                'jadwal_praktek' => $jadwalPraktek
            ]);

            return redirect()->route('bidan.index')->with('success', 'Data bidan berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('bidan.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Bidan::findOrFail($id);

        if (isset($data)) {
            try {
                $data->delete();

                return redirect()->route('bidan.index')->with('success', 'Data bidan berhasil dihapus.');
            } catch (Exception $e) {
                return redirect()->route('bidan.index')->with('error', 'Data bidan gagal dihapus.');
            }
        }
    }
}
