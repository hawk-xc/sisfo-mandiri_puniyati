<?php

namespace App\Http\Controllers\dash;

use App\DataTables\PemeriksaanDataTable;
use App\Http\Controllers\Controller;
use App\Models\Pemeriksaan;
use App\Models\Pelayanan;
use App\Models\Bidan;
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
        $dataLayanan = Pelayanan::select(['id', 'nama'])->get();
        $dataBidan = Bidan::select(['id', 'nama'])->get();

        return view('dashboard.pemeriksaan.create', [
            'dataLayanan' => $dataLayanan,
            'dataBidan' => $dataBidan,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pelayananId = Pelayanan::findOrFail($request->input('pelayanan_id'));
        $bidanId = $request->input('bidan_id');
        $pendaftaranId = $request->input('pendaftaran_id');

        $request->validate([
            'diagnosa' => 'required|string',
            'tindakan' => 'required|string',
            'tanggal_kontrol' => 'nullable|date',
            'keluhan' => 'required|string',
            'riwayat' => 'nullable|string',
            'riwayat_imunisasi' => 'nullable|string',
            'tensi' => 'required|numeric',
            'bb' => 'nullable|numeric',
            'tb' => 'nullable|numeric',
            'suhu_badan' => 'nullable|numeric',
            'saturasi_oksigen' => 'nullable|numeric',
            'lila' => 'nullable|numeric'
        ], [
            'diagnosa.required' => 'Diagnosa wajib diisi.',
            'diagnosa.string' => 'Diagnosa harus berupa teks.',
            'tindakan.required' => 'Tindakan wajib diisi.',
            'tindakan.string' => 'Tindakan harus berupa teks.',
            'tanggal_kontrol.date' => 'Tanggal kontrol harus berupa tanggal yang valid.',
            'keluhan.required' => 'Keluhan wajib diisi.',
            'keluhan.string' => 'Keluhan harus berupa teks.',
            'riwayat.string' => 'Riwayat harus berupa teks.',
            'riwayat_imunisasi.string' => 'Riwayat imunisasi harus berupa teks.',
            'tensi.required' => 'Tensi wajib diisi.',
            'tensi.numeric' => 'Tensi harus berupa angka.',
            'bb.numeric' => 'Berat badan harus berupa angka.',
            'tb.numeric' => 'Tinggi badan harus berupa angka.',
            'suhu_badan.numeric' => 'Suhu badan harus berupa angka.',
            'saturasi_oksigen.numeric' => 'Saturasi oksigen harus berupa angka.',
            'lila.numeric' => 'LILA harus berupa angka.',
        ]);

        switch (strtolower($pelayananId->nama)) {
            case "anc":
                $request->validate([
                    "hpht" => "required|date",
                    "gpa" => "required|string",
                    "umur_kehamilan" => "required|numeric",
                    "lingkar_perut" => "required|numeric",
                    "tinggi_fundus" => "required|numeric",
                    "jumlah_anak" => "required|numeric",
                    "persalinan_terakhir" => "required|string",
                    "djj" => "required|numeric",
                    "refla" => "required|string",
                    "lab" => "required|string",
                ], [
                    "hpht.required" => "HPHT wajib diisi.",
                    "hpht.date" => "HPHT harus berupa tanggal yang valid.",
                    "gpa.required" => "GPA wajib diisi.",
                    "gpa.string" => "GPA harus berupa teks.",
                    "umur_kehamilan.required" => "Umur kehamilan wajib diisi.",
                    "umur_kehamilan.numeric" => "Umur kehamilan harus berupa angka.",
                    "lingkar_perut.required" => "Lingkar perut wajib diisi.",
                    "lingkar_perut.numeric" => "Lingkar perut harus berupa angka.",
                    "tinggi_fundus.required" => "Tinggi fundus wajib diisi.",
                    "tinggi_fundus.numeric" => "Tinggi fundus harus berupa angka.",
                    "jumlah_anak.required" => "Jumlah anak wajib diisi.",
                    "jumlah_anak.numeric" => "Jumlah anak harus berupa angka.",
                    "persalinan_terakhir.required" => "Persalinan terakhir wajib diisi.",
                    "persalinan_terakhir.string" => "Persalinan terakhir harus berupa teks.",
                    "djj.required" => "DJJ wajib diisi.",
                    "djj.numeric" => "DJJ harus berupa angka.",
                    "refla.required" => "Refla wajib diisi.",
                    "refla.string" => "Refla harus berupa teks.",
                    "lab.required" => "Lab wajib diisi.",
                    "lab.string" => "Lab harus berupa teks.",
                ]);
                break;
            case "ibu nifas":
                $request->validate([
                    "tanggal_melahirkan" => "required|date",
                    "tempat_persalinan" => "required|nullable",
                    "bantu_persalinan" => "required|in:dokter,bidan",
                    "besar_rahim" => "required|numeric",
                    "cairan_keluar" => "nullable|string",
                    "infeksi" => "nullable|string",
                ], [
                    "tanggal_melahirkan.required" => "Tanggal melahirkan wajib diisi.",
                    "tanggal_melahirkan.date" => "Tanggal melahirkan harus berupa tanggal yang valid.",
                    "tempat_persalinan.required" => "Tempat persalinan wajib diisi.",
                    "bantu_persalinan.required" => "Bantu persalinan wajib diisi.",
                    "bantu_persalinan.in" => "Bantu persalinan harus dokter atau bidan.",
                    "besar_rahim.required" => "Besar rahim wajib diisi.",
                    "besar_rahim.numeric" => "Besar rahim harus berupa angka.",
                    "cairan_keluar.string" => "Cairan keluar harus berupa teks.",
                    "infeksi.string" => "Infeksi harus berupa teks.",
                ]);
                break;
            case "kia":
                $request->validate([
                    "hpht" => "required|date",
                    "gpa" => "required|string",
                    "umur_kehamilan" => "required|numeric",
                    "lingkar_perut" => "required|numeric",
                    "tinggi_fundus" => "required|numeric",
                    "jumlah_anak" => "required|numeric",
                    "persalinan_terakhir" => "required|string",
                    "djj" => "required|numeric",
                    "refla" => "required|string",
                    "lab" => "required|string",
                ], [
                    "hpht.required" => "HPHT wajib diisi.",
                    "hpht.date" => "HPHT harus berupa tanggal yang valid.",
                    "gpa.required" => "GPA wajib diisi.",
                    "gpa.string" => "GPA harus berupa teks.",
                    "umur_kehamilan.required" => "Umur kehamilan wajib diisi.",
                    "umur_kehamilan.numeric" => "Umur kehamilan harus berupa angka.",
                    "lingkar_perut.required" => "Lingkar perut wajib diisi.",
                    "lingkar_perut.numeric" => "Lingkar perut harus berupa angka.",
                    "tinggi_fundus.required" => "Tinggi fundus wajib diisi.",
                    "tinggi_fundus.numeric" => "Tinggi fundus harus berupa angka.",
                    "jumlah_anak.required" => "Jumlah anak wajib diisi.",
                    "jumlah_anak.numeric" => "Jumlah anak harus berupa angka.",
                    "persalinan_terakhir.required" => "Persalinan terakhir wajib diisi.",
                    "persalinan_terakhir.string" => "Persalinan terakhir harus berupa teks.",
                    "djj.required" => "DJJ wajib diisi.",
                    "djj.numeric" => "DJJ harus berupa angka.",
                    "refla.required" => "Refla wajib diisi.",
                    "refla.string" => "Refla harus berupa teks.",
                    "lab.required" => "Lab wajib diisi.",
                    "lab.string" => "Lab harus berupa teks.",
                ]);
                break;
            case "kb":
                $request->validate([
                    "tanggal_melahirkan" => "required|date",
                    "tempat_persalinan" => "required|nullable",
                    "bantu_persalinan" => "required|in:dokter,bidan",
                    "besar_rahim" => "required|numeric",
                    "cairan_keluar" => "nullable|string",
                    "infeksi" => "nullable|string",
                ], [
                    "tanggal_melahirkan.required" => "Tanggal melahirkan wajib diisi.",
                    "tanggal_melahirkan.date" => "Tanggal melahirkan harus berupa tanggal yang valid.",
                    "tempat_persalinan.required" => "Tempat persalinan wajib diisi.",
                    "bantu_persalinan.required" => "Bantu persalinan wajib diisi.",
                    "bantu_persalinan.in" => "Bantu persalinan harus dokter atau bidan.",
                    "besar_rahim.required" => "Besar rahim wajib diisi.",
                    "besar_rahim.numeric" => "Besar rahim harus berupa angka.",
                    "cairan_keluar.string" => "Cairan keluar harus berupa teks.",
                    "infeksi.string" => "Infeksi harus berupa teks."
                ]);
                break;
        }

        try {
            $data = new Pemeriksaan;
            $data->pendaftaran_id = $pendaftaranId;
            $data->bidan_id = $bidanId;
            $data->pelayanan_id = $pelayananId->id;
            $data->keluhan = $request->input('keluhan');
            $data->riwayat = $request->input('riwayat');
            $data->riwayat_imunisasi = $request->input('riwayat_imunisasi');
            $data->tensi = $request->input('tensi');
            $data->bb = $request->input('bb');
            $data->tb = $request->input('tb');
            $data->suhu_badan = $request->input('suhu_badan');
            $data->saturasi_oksigen = $request->input('saturasi_oksigen');
            $data->lila = $request->input('lila');
            $data->hpht = $request->input('hpht');
            $data->gpa = $request->input('gpa');
            $data->umur_kehamilan = $request->input('umur_kehamilan');
            $data->lingkar_perut = $request->input('lingkar_perut');
            $data->tinggi_fundus = $request->input('tinggi_fundus');
            $data->jumlah_anak = $request->input('jumlah_anak');
            $data->persalinan_terakhir = $request->input('persalinan_terakhir');
            $data->djj = $request->input('djj');
            $data->refla = $request->input('refla');
            $data->lab = $request->input('lab');
            $data->tanggal_melahirkan = $request->input('tanggal_melahirkan');
            $data->tempat_persalinan = $request->input('tempat_persalinan');
            $data->bantu_persalinan = $request->input('bantu_persalinan');
            $data->besar_rahim = $request->input('besar_rahim');
            $data->cairan_keluar = $request->input('cairan_keluar');
            $data->infeksi = $request->input('infeksi');
            $data->diagnosa = $request->input('diagnosa');
            $data->tindakan = $request->input('tindakan');
            $data->tanggal_kontrol = $request->input('tanggal_kontrol');
            $data->save();

            return redirect()->route('pemeriksaan.index')->with('success', 'Berhasil menyimpan data Pemeriksaan baru!');
        }
        catch (Exception $e) {
            return redirect()->route('pemeriksaan.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Pemeriksaan::findOrFail($id);

        return view('dashboard.pemeriksaan.show', [
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
        $data = Pemeriksaan::findOrFail($id);

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
