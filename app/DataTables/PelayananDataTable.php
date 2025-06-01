<?php

namespace App\DataTables;

use App\Models\Pelayanan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PelayananDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Pelayanan> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            // ->addColumn('action', function($pelayanan) {
            //     $editUrl = route('pelayanan.edit', $pelayanan->id);
            //     $deleteUrl = route('pelayanan.destroy', $pelayanan->id);

            //     // <a href="'.$editUrl.'" style="background-color: #FFA500; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; font-size: 1rem; text-decoration: none; display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
            //             // <i class="ri-edit-line"></i>
            //         // </a>

            //     return '<div class="flex space-x-2">
            //         <form action="'.$deleteUrl.'" method="POST" onsubmit="return confirm(\'Yakin ingin menghapus data ini?\')">
            //             '.csrf_field().method_field('DELETE').'
            //             <button type="submit" style="background-color: #F34B3E; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; font-size: 1rem; display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
            //                 <i class="ri-delete-bin-line"></i>
            //             </button>
            //         </form>
            //     </div>';
            // })
            ->editColumn('created_at', function($pelayanan) {
                return '<span class="badge badge-ghost">'.$pelayanan->created_at->format('d-m-Y H:i').'</span>';
            })
            ->addColumn('nama_pelayanan', function($pelayanan) {
                return strtoupper($pelayanan->nama);
            })
            // ->editColumn('biaya', function($pelayanan) {
            //     return 'Rp. ' . number_format($pelayanan->biaya, 0, ',', '.');
            // })
            ->rawColumns(['action', 'created_at', 'updated_at']) // tambahkan 'biaya' jika ingin menampilkan raw HTML
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Pelayanan>
     */
    public function query(Pelayanan $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pelayanan-table')
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
            Column::make('nama_pelayanan')
                ->title('Nama Pelayanan')
                ->addClass('font-medium text-uppercase'),
            // Column::make('biaya')
            //     ->title('Biaya')
            //     ->addClass('text-start font-semibold'),
            Column::make('created_at')
                ->title('Dibuat')
                ->addClass('text-start font-semibold'),
            // Column::computed('action')
            //     ->exportable(false)
            //     ->printable(false)
            //     ->width(180)
            //     ->addClass('text-start font-semibold'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Pelayanan_' . date('YmdHis');
    }
}
