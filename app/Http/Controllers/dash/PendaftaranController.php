<?php

namespace App\Http\Controllers\dash;

use App\DataTables\PendaftaranDataTable;
use App\Http\Controllers\Controller;
use App\Models\Pasien;
use App\Models\Pendaftaran;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PendaftaranDataTable $dataTable)
    {
        return $dataTable->render('dashboard.pendaftaran.index', [
            'title' => 'Data Pelayanan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pendaftaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $noRm = Pendaftaran::where('no_rm', $request->input('no_rm'))->first();

        if ($noRm->exists()) {
            $request->validate([
                'tanggal' => 'required|date',
                'status' => 'required|in:selesai,menunggu'
            ], [
                [
                    'tanggal.required' => 'Tanggal harus diisi.',
                    'tanggal.date' => 'Tanggal harus berupa format tanggal yang valid.',
                    'status.required' => 'Status harus diisi.',
                    'status.in' => 'Status harus berupa salah satu dari: selesai, menunggu.'
                ]
            ]);

            try {
                $data = new Pendaftaran;
                $data->no_rm = $noRm->no_rm;
                $data->pasien_id = $noRm->pasien->id;
                $data->tanggal = $request->tanggal;
                $data->status = $request->status;

                $data->save();

                return redirect()->route('pendaftaran.index')->with('success', 'Berhasil menyimpan data Pendaftaran');
            } catch (Exception $e) {
                return redirect()->route('pendaftaran.index')->with('error', 'gagal menyimpan data Pendaftaran');
            }
        } else {
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
                'tanggal' => 'required|date',
                'status' => 'required|in:selesai,menunggu'
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
                'tanggal.required' => 'Tanggal harus diisi.',
                'tanggal.date' => 'Tanggal harus berupa format tanggal yang valid.',
                'status.required' => 'Status harus diisi.',
                'status.in' => 'Status harus berupa salah satu dari: selesai, menunggu.'
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

                $dataPendaftaran = new Pendaftaran;
                $dataPendaftaran->pasien_id = $data->id;
                $dataPendaftaran->no_rm = 'RM-' . str_pad((Pendaftaran::max('id') ?? 0) + 1, 3, '0', STR_PAD_LEFT);
                $dataPendaftaran->tanggal = $request->tanggal;
                $dataPendaftaran->status = $request->status;
                $dataPendaftaran->save();

                return redirect()->route('pendaftaran.index')->with('success', 'Berhasil menyimpan data Pendaftaran');
            } catch (Exception $e) {
                return redirect()->route('pendaftaran.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Pendaftaran::findOrFail($id)->first()->with('pasien');

        return view('dashboard.pendaftaran.show', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Pendaftaran::with('pasien')->findOrFail($id);

        return view('dashboard.pendaftaran.edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
                'tanggal' => 'required|date',
                'status' => 'required|in:selesai,menunggu'
        ], [
            [
                'tanggal.required' => 'Tanggal harus diisi.',
                'tanggal.date' => 'Tanggal harus berupa format tanggal yang valid.',
                'status.required' => 'Status harus diisi.',
                'status.in' => 'Status harus berupa salah satu dari: selesai, menunggu.'
            ]
        ]);

        try {
            $data = Pendaftaran::findOrFail($id);

            $data->tanggal = $request->tanggal;
            $data->status = $request->status;

            $data->save();

            return redirect()->route('pendaftaran.index')->with('success', 'Berhasil update data Pendaftaran');
        } catch (Exception $e) {
            return redirect()->route('pendaftaran.index')->with('error', 'Gagal update data Pendaftaran');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pendaftaran::findOrFail($id);

        try {
            $data->delete();

            return redirect()->route('pendaftaran.index')->with('success', 'Berhasil menghapus data Pendaftaran');
        } catch (Exception $e) {
            return redirect()->route('pendaftaran.index')->with('error', 'Gagal menghapus data Pendaftaran!');
        }
    }

    public function selectRm(Request $request)
    {
        $search = $request->get('q');

        $data = Pendaftaran::with('pasien')
            ->where('no_rm', 'like', '%' . $search)
            ->first();

        if ($data) {
            $data = [
            [
                'id' => $data->no_rm,
                'text' => $data->no_rm . ' - ' . $data->pasien->nama,
                'pasien' => $data->pasien
            ]
            ];
        } else {
            $data = [];
        }

        return response()->json(['results' => $data]);
    }
}
