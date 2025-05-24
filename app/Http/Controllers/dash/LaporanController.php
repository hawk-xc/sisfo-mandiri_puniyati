<?php

namespace App\Http\Controllers\dash;

use App\Http\Controllers\Controller;
use App\Models\Bidan;
use App\Models\Lansia;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Pelayanan;
use App\Models\Pemeriksaan;
use App\Models\Pendaftaran;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    // Daftar heading untuk masing-masing jenis data
    protected $exportHeadings = [
        'bidan' => [
            'Nama',
            'No Telp',
            'Jadwal Praktek'
        ],
        'obat' => [
            'Nama',
            'Jenis',
            'Stok'
        ],
        'pasien' => [
            'Nama',
            'Alamat',
            'Penanggung Jawab',
            'No Telp'
        ],
        'pelayanan' => [
            'Nama',
            'Biaya'
        ],
        'pendaftaran' => [
            'No RM',
            'Nama Pasien',
            'Alamat',
            'Status'
        ],
        'pemeriksaan' => [
            'No RM',
            'Nama Pasien',
            'Nama Bidan',
            'Pelayanan',
            'Keluhan',
            'Status'
        ],
        'pembayaran' => [
            'Id Pemeriksaan',
            'No RM',
            'Nama Pasien',
            'Nama Bidan',
            'Pelayanan',
            'Jumlah Obat',
            'Status',
            'Total Harga'
        ],
        'pembayaran_detail' => [
            'Id Pemeriksaan',
            'No RM',
            'Nama Pasien',
            'Nama Bidan',
            'Pelayanan',
            'Biaya Pelayanan',
            'Obat',
            'Status',
            'Total Harga'
        ]
    ];

    // Daftar view untuk PDF export
    protected $exportViews = [
        'bidan' => 'dashboard.export.bidan_pdf',
        'obat' => 'dashboard.export.obat_pdf',
        'pasien' => 'dashboard.export.pasien_pdf',
        'pelayanan' => 'dashboard.export.pelayanan_pdf',
        'pendaftaran' => 'dashboard.export.pendaftaran_pdf',
        'pemeriksaan' => 'dashboard.export.pemeriksaan_pdf',
        'pembayaran' => 'dashboard.export.pembayaran_pdf',
        'pembayaran_detail' => 'dashboard.export.pembayaran_detail_pdf'
    ];

    // Daftar nama file untuk export
    protected $exportFileNames = [
        'bidan' => 'data-bidan',
        'obat' => 'data-obat',
        'pasien' => 'data-pasien',
        'pelayanan' => 'data-pelayanan',
        'pendaftaran' => 'data-pendaftaran',
        'pemeriksaan' => 'data-pemeriksaan-lansia',
        'pembayaran' => 'data-pembayaran',
        'pembayaran_detail' => 'pembayaran-detail'
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.Laporan.index');
    }

    // Method untuk export data
    public function export(Request $request, $dataType)
    {
        $exportType = $request->export_type ?? 'excel';

        // Validasi tipe data
        if (!array_key_exists($dataType, $this->exportHeadings)) {
            return back()->with('error', 'Jenis data tidak valid');
        }

        // Ambil data sesuai jenis
        $data = $this->getExportData($dataType, $request);

        if ($exportType === 'excel') {
            return $this->exportToExcel($dataType, $data);
        } elseif ($exportType === 'pdf') {
            return $this->exportToPdf($dataType, $data);
        }

        return back()->with('error', 'Format export tidak valid');
    }

    // Method untuk mendapatkan data
    protected function getExportData($dataType, Request $request)
    {
        switch ($dataType) {
            case 'pemeriksaan':
                return $this->getPemeriksaanData($request);
            case 'bidan':
                return $this->getBidanData($request);
            case 'obat':
                return $this->getObatData($request);
            case 'pasien':
                return $this->getPasienData($request);
            case 'pelayanan':
                return $this->getPelayananData($request);
            case 'pendaftaran':
                return $this->getPendaftaranData($request);
            case 'pembayaran':
                return $this->getPembayaranData($request);
            case 'pembayaran_detail':
                return $this->getPembayaranDetail($request);
            default:
                return collect();
        }
    }

    protected function parseDateRange($dateRange)
    {
        if (empty($dateRange)) {
            return null;
        }

        // Coba kedua format pemisah
        $dates = explode(' to ', $dateRange);
        if (count($dates) !== 2) {
            $dates = explode(' - ', $dateRange);
        }

        if (count($dates) === 2) {
            try {
                return [
                    'start' => \Carbon\Carbon::parse(trim($dates[0]))->startOfDay(),
                    'end' => \Carbon\Carbon::parse(trim($dates[1]))->endOfDay()
                ];
            } catch (\Exception $e) {
                Log::error('Error parsing date range: ' . $e->getMessage());
            }
        }

        return null;
    }


    // Method untuk mendapatkan data pemeriksaan
    protected function getPemeriksaanData(Request $request)
    {
        $query = Pemeriksaan::query()->with(['bidan', 'pendaftaran', 'pelayanan', 'pemeriksaanObat']);

        $sortDirection = $request->get('sort', 'desc') === 'asc' ? 'asc' : 'desc';
        $query->orderBy('created_at', $sortDirection);

        $dates = $this->parseDateRange($request->date_range);
        if ($dates) {
            $query->whereBetween('created_at', [$dates['start'], $dates['end']]);
        }

        return $query->get(['pemeriksaan.*']);
    }

    protected function getPasienData(Request $request)
    {
        $query = Pasien::query();

        $sortDirection = $request->get('sort', 'desc') === 'asc' ? 'asc' : 'desc';
        $query->orderBy('nama', $sortDirection);

        $dates = $this->parseDateRange($request->date_range);
        if ($dates) {
            $query->whereBetween('created_at', [$dates['start'], $dates['end']]);
        }

        return $query->get(['pasien.*']);
    }

    protected function getBidanData(Request $request)
    {
        $query = Bidan::query();

        $sortDirection = $request->get('sort', 'desc') === 'asc' ? 'asc' : 'desc';
        $query->orderBy('nama', $sortDirection);

        $dates = $this->parseDateRange($request->date_range);
        if ($dates) {
            $query->whereBetween('created_at', [$dates['start'], $dates['end']]);
        }

        return $query->get(['bidan.*']);
    }

    protected function getObatData(Request $request)
    {
        $query = Obat::query();

        $sortDirection = $request->get('sort', 'desc') === 'asc' ? 'asc' : 'desc';
        $query->orderBy('nama', $sortDirection);

        $dates = $this->parseDateRange($request->date_range);
        if ($dates) {
            $query->whereBetween('created_at', [$dates['start'], $dates['end']]);
        }

        return $query->get(['obat.*']);
    }

    protected function getPendaftaranData(Request $request)
    {
        $query = Pendaftaran::query()->with('pasien');

        $sortDirection = $request->get('sort', 'desc') === 'asc' ? 'asc' : 'desc';
        $query->orderBy('tanggal', $sortDirection);

        $dates = $this->parseDateRange($request->date_range);
        if ($dates) {
            $query->whereBetween('created_at', [$dates['start'], $dates['end']]);
        }

        return $query->get(['pendaftaran.*']);
    }

    protected function getPelayananData(Request $request)
    {
        $query = Pelayanan::query();

        $sortDirection = $request->get('sort', 'desc') === 'asc' ? 'asc' : 'desc';
        $query->orderBy('nama', $sortDirection);

        $dates = $this->parseDateRange($request->date_range);
        if ($dates) {
            $query->whereBetween('created_at', [$dates['start'], $dates['end']]);
        }

        return $query->get(['pelayanan.*']);
    }

    protected function getPembayaranData(Request $request)
    {
        $query = Pemeriksaan::query()->with(['bidan', 'pendaftaran', 'pelayanan', 'pemeriksaanObat']);

        $sortDirection = $request->get('sort', 'desc') === 'asc' ? 'asc' : 'desc';
        $query->orderBy('created_at', $sortDirection);

        $dates = $this->parseDateRange($request->date_range);
        if ($dates) {
            $query->whereBetween('created_at', [$dates['start'], $dates['end']]);
        }

        return $query->get(['pemeriksaan.*']);
    }

    protected function getPembayaranDetail(Request $request)
    {
        $query = Pemeriksaan::query()->with([
            'bidan',
            'pendaftaran.pasien',
            'pelayanan',
            'pemeriksaanObat.obat'
        ]);

        if ($request->has('pemeriksaan_id')) {
            $query->where('id', $request->pemeriksaan_id);
        }

        $sortDirection = $request->get('sort', 'desc') === 'asc' ? 'asc' : 'desc';
        $query->orderBy('created_at', $sortDirection);

        $dates = $this->parseDateRange($request->date_range);
        if ($dates) {
            $query->whereBetween('created_at', [$dates['start'], $dates['end']]);
        }

        return $query->get();
    }

    // Method untuk export Excel
    protected function exportToExcel($dataType, $data)
    {
        $formattedData = $this->formatDataForExport($dataType, $data);
        $headings = $this->exportHeadings[$dataType];
        $fileName = $this->exportFileNames[$dataType] . '.xlsx';

        // Gunakan fully qualified namespace
        return \Maatwebsite\Excel\Facades\Excel::download(
            new class($formattedData, $headings) {
                protected $data;
                protected $headings;

                public function __construct($data, $headings)
                {
                    $this->data = collect($data);
                    $this->headings = $headings;
                }

                public function collection()
                {
                    return $this->data;
                }

                public function headings(): array
                {
                    return $this->headings;
                }
            },
            $fileName
        );
    }

    // Method untuk export PDF
    // Previous Version
    // protected function exportToPdf($dataType, $data)
    // {
    //     $formattedData = $this->formatDataForExport($dataType, $data);
    //     $currentDate = now()->format('d-m-Y');

    //     $pdf = PDF::loadView($this->exportViews[$dataType], [
    //         'data' => $formattedData,
    //         'heading' => $this->exportHeadings[$dataType],
    //         'fileName' => $this->exportFileNames[$dataType],
    //         'currentDate' => $currentDate,
    //         'dateRange' => request()->date_range ?? null
    //     ])->setPaper('a4', 'landscape');

    //     return $pdf->download($this->exportFileNames[$dataType] . '-' . now()->format('Ymd') . '.pdf');
    // }

    // New Version
    protected function exportToPdf($dataType, $data)
    {
        $formattedData = $this->formatDataForExport($dataType, $data);
        $currentDate = now()->format('d-m-Y');

        // For pembayaran_detail, use the first item if we have a specific ID
        $pdfData = ($dataType === 'pembayaran_detail' && request()->has('pemeriksaan_id'))
            ? $formattedData->first()
            : $formattedData;

        $pdf = PDF::loadView($this->exportViews[$dataType], [
            'data' => $pdfData,
            'heading' => $this->exportHeadings[$dataType],
            'fileName' => $this->exportFileNames[$dataType],
            'currentDate' => $currentDate,
            'dateRange' => request()->date_range ?? null
        ])->setPaper('a4', 'landscape');

        return $pdf->download($this->exportFileNames[$dataType] . '-' . now()->format('Ymd') . '.pdf');
    }

    // Method untuk format data sebelum di-export
    protected function formatDataForExport($dataType, $data)
    {
        switch ($dataType) {
            case 'pemeriksaan':
                return $data->map(function ($item, $index) {
                    return [
                        'No' => $index + 1,
                        'No RM' => $item->pendaftaran->no_rm,
                        'Nama Pasien' => $item->pendaftaran->pasien->nama,
                        'Nama Bidan' => $item->bidan->nama,
                        'Pelayanan' => $item->pelayanan->nama,
                        'Keluhan' => $item->keluhan,
                        'Obat Diberikan' => $item->pemeriksaanObat->count(),
                        'Status' => $item->pendaftaran->status,
                    ];
                });
            case 'pasien':
                return $data->map(function ($item, $index) {
                    return [
                        'No' => $index + 1,
                        'Nama' => $item->nama,
                        'Alamat' => $item->alamat,
                        'Penanggung Jawab' => $item->penanggung_jawab,
                        'No Telp' => $item->no_telp,
                    ];
                });
            case 'bidan':
                return $data->map(function ($item, $index) {
                    return [
                        'No' => $index + 1,
                        'Nama' => $item->nama,
                        'No Telp' => $item->no_telp,
                        'Jadwal Praktek' => $item->jadwal_praktek,
                    ];
                });
            case 'pelayanan':
                return $data->map(function ($item, $index) {
                    return [
                        'No' => $index + 1,
                        'Nama' => $item->nama,
                        'Biaya' => 'Rp. ' . number_format($item->biaya, 0, ',', '.'),
                    ];
                });
            case 'obat':
                return $data->map(function ($item, $index) {
                    return [
                        'No' => $index + 1,
                        'Nama' => $item->nama,
                        'Jenis' => $item->jenis,
                        'Stok' => $item->stok,
                        'Harga Beli' => 'Rp. ' . number_format($item->harga_beli, 0, ',', '.'),
                        'Harga Jual' => 'Rp. ' . number_format($item->harga_jual, 0, ',', '.'),
                    ];
                });
            case 'pendaftaran':
                return $data->map(function ($item, $index) {
                    return [
                        'No' => $index + 1,
                        'No RM' => $item->no_rm,
                        'Nama Pasien' => $item->pasien->nama,
                        'Alamat' => $item->pasien->alamat,
                        'Status' => $item->status,
                        'Tanggal Pendaftaran' => $item->tanggal
                    ];
                });
            case 'pembayaran':
                return $data->map(function ($item, $index) {
                    return [
                        'No' => $index + 1,
                        'No Pemeriksaan' => $item->id,
                        'No RM' => $item->pendaftaran->no_rm,
                        'Nama Pasien' => $item->pendaftaran->pasien->nama,
                        'Nama Bidan' => $item->bidan->nama,
                        'Pelayanan' => $item->pelayanan->nama,
                        'Jumlah Obat' => $item->pemeriksaanObat->count(),
                        'Status' => $item->pendaftaran->status,
                        'Total Harga' =>  'Rp ' . number_format($item->pemeriksaanObat->sum(function($item) {
                            return $item->obat ? $item->obat->harga_beli : 0;
                        }) + $item->pelayanan->biaya, 0, ',', '.'),
                        'Tanggal Pendaftaran' => $item->tanggal
                    ];
                });
            case 'pembayaran_detail':
                return $data->map(function ($item, $index) {
                    $obatData = $item->pemeriksaanObat->map(function ($pemeriksaanObat) {
                        return [
                            'id' => $pemeriksaanObat->obat->id ?? null,
                            'nama' => $pemeriksaanObat->obat->nama ?? '-',
                            'jenis' => $pemeriksaanObat->obat->jenis ?? '-',
                            'harga_jual' => $pemeriksaanObat->obat->harga_jual ?? 0,
                            'dosis' => $pemeriksaanObat->dosis ?? '-',
                            'keterangan' => $pemeriksaanObat->keterangan ?? '-'
                        ];
                    })->values()->all();

                    $data = collect([
                        'No' => $index + 1,
                        'Id Pemeriksaan' => $item->id,
                        'No RM' => $item->pendaftaran->no_rm ?? '-',
                        'Nama Pasien' => $item->pendaftaran->pasien->nama ?? '-',
                        'Nama Bidan' => $item->bidan->nama ?? '-',
                        'Pelayanan' => $item->pelayanan->nama ?? '-',
                        'Biaya Pelayanan' => $item->pelayanan->biaya ?? 0,
                        'Obat' => $obatData,
                        'Status' => $item->pendaftaran->status ?? '-',
                        'Total Harga' => ($item->pelayanan->biaya ?? 0) +
                                        $item->pemeriksaanObat->sum(function($po) {
                                            return $po->obat ? $po->obat->harga_jual : 0;
                                        })
                    ]);
                    return $data->toArray();
                });
            default:
                return $data;
        }
    }
}
