<?php

namespace App\DataTables;

use App\Models\Bidan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BidanDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Bidan> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($bidan) {
                $editUrl = route('bidan.edit', $bidan->id);
                $deleteUrl = route('bidan.destroy', $bidan->id);

                return '<div class="flex space-x-2">
                    <a href="'.$editUrl.'" style="background-color: #FFA500; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; font-size: 1rem; text-decoration: none; display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                        <i class="ri-edit-line"></i> Edit
                    </a>
                    <form action="'.$deleteUrl.'" method="POST" onsubmit="return confirm(\'Yakin ingin menghapus data ini?\')">
                        '.csrf_field().method_field('DELETE').'
                        <button type="submit" style="background-color: #F34B3E; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; font-size: 1rem; display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                            <i class="ri-delete-bin-line"></i> Hapus
                        </button>
                    </form>
                </div>';
            })
            ->editColumn('created_at', function($bidan) {
                return '<span class="badge badge-ghost">'.$bidan->created_at->format('d-m-Y H:i').'</span>';
            })
            ->editColumn('updated_at', function($bidan) {
                return '<span class="badge badge-ghost">'.$bidan->updated_at->format('d-m-Y H:i').'</span>';
            })
            ->rawColumns(['action', 'created_at', 'updated_at'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Bidan>
     */
    public function query(Bidan $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
{
    return $this->builder()
        ->setTableId('bidan-table')
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
            Column::make('nama')
                ->addClass('font-medium'),
            Column::make('no_telp')
                ->title('No. Telp')
                ->addClass('text-start'),
            Column::make('jadwal_praktek')
                ->title('Jadwal Praktek')
                ->addClass('text-start font-semibold'),
            Column::make('created_at')
                ->title('Dibuat')
                ->addClass('text-start font-semibold'),
            Column::make('updated_at')
                ->title('Diupdate')
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
        return 'bidan_' . date('YmdHis');
    }
}
