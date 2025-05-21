<?php

namespace App\DataTables;

use App\Models\Pemeriksaan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PembayaranDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Pemeriksaan> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($pemeriksaan) {
                $editUrl = route('pemeriksaan.edit', $pemeriksaan->id);
                $showUrl = route('pemeriksaan.show', $pemeriksaan->id);
                $deleteUrl = route('pemeriksaanobat.delete', $pemeriksaan->id);

                return '<div class="flex space-x-2">
                    <a href="'.$showUrl.'" style="background-color: #3B82F6; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; font-size: 1rem; text-decoration: none; display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                        <i class="ri-eye-line"></i>
                    </a>
                    <a href="" target="_blank" style="background-color: #F59E42; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; font-size: 1rem; text-decoration: none; display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                        <i class="ri-file-pdf-line"></i>
                    </a>
                </div>';
            })
            ->editColumn('created_at', function($pemeriksaan) {
                return '<span class="badge badge-ghost">'.$pemeriksaan->created_at->format('d-m-Y H:i').'</span>';
            })
            ->addColumn('no_rm', function($pemeriksaan) {
                return $pemeriksaan->pendaftaran->no_rm;
            })
            ->addColumn('nama_pasien', function($pemeriksaan) {
                return optional($pemeriksaan->pendaftaran->pasien)->nama ?? '-';
            })
            ->addColumn('bidan', function($pemeriksaan) {
                return optional($pemeriksaan->bidan)->nama ?? '-';
            })
            ->addColumn('pelayanan', function($pemeriksaan) {
                return optional($pemeriksaan->pelayanan)->nama ?? '-';
            })
            ->addColumn('obat', function($pemeriksaan) {
                return $pemeriksaan->pemeriksaanObat->count() . " Obat" ?? '-';
            })
             ->addColumn('total_harga', function($pemeriksaan) {
                $totalHargaObat = $pemeriksaan->pemeriksaanObat->sum(function($item) {
                    return $item->obat ? $item->obat->harga_beli : 0;
                });

                $biayaPelayanan = $pemeriksaan->pelayanan->biaya;

                return 'Rp ' . number_format($totalHargaObat + $biayaPelayanan, 0, ',', '.');
            })
            ->editColumn('status', function($pemeriksaan) {
                $status = $pemeriksaan->pendaftaran->status ?? 'unknown';
                $statusClass = $status === 'selesai' ? 'badge-success' : 'badge-primary';
                return '<span class="badge '.$statusClass.'">'.ucfirst($status).'</span>';
            })

            ->rawColumns(['action', 'status', 'created_at', 'updated_at'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Pemeriksaan>
     */
    public function query(Pemeriksaan $model): QueryBuilder
    {
        return $model->newQuery()
            ->with([
                'pendaftaran',
                'pendaftaran.pasien',
                'bidan',
                'pelayanan'
            ]);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pendaftaran-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addTableClass('table-auto w-full border-collapse border border-gray-200 shadow-sm rounded-lg')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('print')
                    ->addClass('btn btn-warning')
                    ->text('<i class="fas fa-print"></i> Print'),
                Button::make('reload')
                    ->addClass('btn btn-accent')
                    ->text('<i class="fas fa-redo"></i> Reload')
            ])
            ->parameters([
                'language' => [
                    'url' => '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json'
                ],
                'responsive' => true,
                'autoWidth' => false,
                'lengthMenu' => [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, 'Semua']
                ],
                'dom' => "<'dt-controls-wrapper mb-6 p-4 flex flex-wrap justify-between items-center gap-4'lfB>rt<'dt-footer-wrapper mt-6'p>",

                'initComplete' => "function(settings, json) {
                    $(this.api().table().container()).addClass('rounded-lg p-2 border');
                }"
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')
                ->title('Pemeriksaan ID')
                ->addClass('font-medium'),
            Column::make('no_rm')
                ->title('No RM')
                ->addClass('font-medium'),
            Column::make('nama_pasien')
                ->title('Nama Pasien')
                ->addClass('font-medium'),
            Column::make('bidan')
                ->title('Nama Bidan')
                ->addClass('text-start'),
            Column::make('pelayanan')
                ->title('Pelayanan')
                ->addClass('text-start font-semibold'),
            Column::make('obat')
                ->title('Jumlah Obat')
                ->addClass('text-start font-semibold'),
            Column::make('status')
                ->title('Status')
                ->addClass('text-start font-semibold'),
            Column::make('total_harga')
                ->title('Total Harga')
                ->addClass('text-start font-semibold'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(180)
                ->addClass('text-start font-semibold'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Pembayaran_' . date('YmdHis');
    }
}
