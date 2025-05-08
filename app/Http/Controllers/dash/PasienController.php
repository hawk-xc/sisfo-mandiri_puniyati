<?php

namespace App\Http\Controllers\dash;

use App\Models\Pasien;
use App\DataTables\PasienDataTable;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PasienDataTable $dataTable)
    {
        return $dataTable->render('dashboard.masterdata.pasien.index', [
            'title' => 'Data Pasien'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.masterdata.pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|string',
            'nama_kk' => 'required|string|max:50|unique:pasien,nik',
            'nama' => 'required|string|max:50',
            'tempat_lahir' => 'nullable|string|max:20',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string',
            'agama' => 'required|in:islam,kristen,katolik,hindu,buddha,konghucu',
            'pendidikan' => 'required|in:belum sekolah,sd,smp/sltp,sma/slta,diploma i/ii/iii,s1/s2/s3,lain-lain',
            'pekerjaan' => 'required|in:wiraswasta,pns,ibu rumah tangga,pelajar,mahasiswa,petani,pedagang,tidak bekerja',
            'penanggung_jawab' => 'required|string|max:50',
            'golda' => 'required|in:A,B,AB,O',
            'no_telp' => 'required|string|max:13',
        ], [
            'nik.required' => 'NIK wajib diisi.',
            'nama_kk.required' => 'Nama Kepala Keluarga wajib diisi.',
            'nama.required' => 'Nama wajib diisi.',
            'nama.max' => 'Nama tidak boleh lebih dari 50 karakter.',
            'tempat_lahir.max' => 'Tempat lahir tidak boleh lebih dari 20 karakter.',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
            'agama.required' => 'Agama wajib diisi.',
            'agama.in' => 'Agama yang dipilih tidak valid.',
            'pendidikan.required' => 'Pendidikan wajib diisi.',
            'pendidikan.in' => 'Pendidikan yang dipilih tidak valid.',
            'pekerjaan.required' => 'Pekerjaan wajib diisi.',
            'pekerjaan.in' => 'Pekerjaan yang dipilih tidak valid.',
            'penanggung_jawab.required' => 'Penanggung jawab wajib diisi.',
            'penanggung_jawab.max' => 'Penanggung jawab tidak boleh lebih dari 50 karakter.',
            'golda.required' => 'Golongan darah wajib diisi.',
            'golda.in' => 'Golongan darah yang dipilih tidak valid.',
            'no_telp.required' => 'Nomor telepon wajib diisi.',
            'no_telp.max' => 'Nomor telepon tidak boleh lebih dari 13 karakter.',
        ]);

        try {
            $data = new Pasien;
            $data->nik = $request->nik;
            $data->nama_kk = $request->nama_kk;
            $data->nama = $request->nama;
            $data->tempat_lahir = $request->tempat_lahir;
            $data->tanggal_lahir = $request->tanggal_lahir;
            $data->alamat = $request->alamat;
            $data->agama = $request->agama;
            $data->pendidikan = $request->pendidikan;
            $data->pekerjaan = $request->pekerjaan;
            $data->penanggung_jawab = $request->penanggung_jawab;
            $data->golda = $request->golda;
            $data->no_telp = $request->no_telp;
            $data->save();

            return redirect()->route('pasien.index')->with('success', 'Berhasil menyimpan data Pasien');
        } catch (Exception $e) {
            return redirect()->route('pasien.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Pasien::findOrFail($id);

        return view('dashboard.masterdata.pasien.show', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Pasien::findOrFail($id);

        return view('dashboard.masterdata.pasien.edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nik' => 'required|string',
            'nama_kk' => 'required|string|max:50',
            'nama' => 'required|string|max:50',
            'tempat_lahir' => 'nullable|string|max:20',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string',
            'agama' => 'required|in:islam,kristen,katolik,hindu,buddha,konghucu',
            'pendidikan' => 'required|in:belum sekolah,sd,smp/sltp,sma/slta,diploma i/ii/iii,s1/s2/s3,lain-lain',
            'pekerjaan' => 'required|in:wiraswasta,pns,ibu rumah tangga,pelajar,mahasiswa,petani,pedagang,tidak bekerja',
            'penanggung_jawab' => 'required|string|max:50',
            'golda' => 'required|in:A,B,AB,O',
            'no_telp' => 'required|string|max:13',
        ], [
            'nik.required' => 'NIK wajib diisi.',
            'nama_kk.required' => 'Nama Kepala Keluarga wajib diisi.',
            'nama.required' => 'Nama wajib diisi.',
            'nama.max' => 'Nama tidak boleh lebih dari 50 karakter.',
            'tempat_lahir.max' => 'Tempat lahir tidak boleh lebih dari 20 karakter.',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
            'agama.required' => 'Agama wajib diisi.',
            'agama.in' => 'Agama yang dipilih tidak valid.',
            'pendidikan.required' => 'Pendidikan wajib diisi.',
            'pendidikan.in' => 'Pendidikan yang dipilih tidak valid.',
            'pekerjaan.required' => 'Pekerjaan wajib diisi.',
            'pekerjaan.in' => 'Pekerjaan yang dipilih tidak valid.',
            'penanggung_jawab.required' => 'Penanggung jawab wajib diisi.',
            'penanggung_jawab.max' => 'Penanggung jawab tidak boleh lebih dari 50 karakter.',
            'golda.required' => 'Golongan darah wajib diisi.',
            'golda.in' => 'Golongan darah yang dipilih tidak valid.',
            'no_telp.required' => 'Nomor telepon wajib diisi.',
            'no_telp.max' => 'Nomor telepon tidak boleh lebih dari 13 karakter.',
        ]);

        try {
            $data = Pasien::findOrFail($id);
            $data->nik = $request->nik;
            $data->nama_kk = $request->nama_kk;
            $data->nama = $request->nama;
            $data->tempat_lahir = $request->tempat_lahir;
            $data->tanggal_lahir = $request->tanggal_lahir;
            $data->alamat = $request->alamat;
            $data->agama = $request->agama;
            $data->pendidikan = $request->pendidikan;
            $data->pekerjaan = $request->pekerjaan;
            $data->penanggung_jawab = $request->penanggung_jawab;
            $data->golda = $request->golda;
            $data->no_telp = $request->no_telp;
            $data->save();

            return redirect()->route('pasien.index')->with('success', 'Berhasil memperbarui data Pasien');
        } catch (Exception $e) {
            return redirect()->route('pasien.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pasien::findOrFail($id);

        try {
            $data->delete();

            return redirect()->route('pasien.index')->with('success', 'Berhasil hapus data Pasien terkait!');
        } catch (Exception $e) {
            return redirect()->route('pasien.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
