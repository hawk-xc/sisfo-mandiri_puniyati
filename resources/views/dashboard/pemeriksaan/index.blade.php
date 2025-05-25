<x-app-layout>
    <div class="p-6">
        <div class="shadow-xl card bg-base-100">
            <div class="card-body">
                <div id="head" class="flex flex-row justify-between">
                    <h2 class="mb-6 text-2xl font-bold card-title">Data Pemeriksaan Pasien</h2>
                    <div>
                        <a href="{{ route('pemeriksaan.create') }}" class="btn btn-primary btn-sm">
                            <i class="ri-add-line"></i> Tambah data
                        </a>
                        <button onclick="exportData('pemeriksaan', 'pdf')" class="btn btn-outline btn-neutral btn-sm">
                            <i class="ri-file-pdf-2-line"></i> Export PDF
                        </button>
                    </div>
                </div>

                <!-- Tambahkan form filter di sini -->
                <div class="p-4 mb-6 bg-gray-100 rounded-lg">
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
                        <div>
                            <label class="block mb-2 text-sm font-medium">Status</label>
                            <select id="status-filter" class="w-full select2-filter">
                                <option value="">Semua Status</option>
                                <option value="selesai">Selesai</option>
                                <option value="proses">Proses</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium">Pelayanan</label>
                            <select id="pelayanan-filter" class="w-full select2-filter">
                                <option value="">Semua Pelayanan</option>
                                @foreach ($pelayananOptions as $pelayanan)
                                    <option value="{{ $pelayanan->id }}">{{ $pelayanan->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium">Rentang Tanggal</label>
                            <input type="text" id="date-range" class="w-full h-7 input input-bordered"
                                placeholder="Pilih rentang tanggal">
                        </div>
                        <div class="flex items-end gap-2">
                            <button onclick="applyFilters()" class="btn btn-primary btn-sm">
                                <i class="ri-filter-line"></i> Filter
                            </button>
                            <button onclick="resetFilters()" class="btn btn-outline btn-sm">
                                <i class="ri-refresh-line"></i> Reset
                            </button>
                        </div>
                    </div>
                </div>

                {{ $dataTable->table(['class' => 'w-full table table-zebra mt-2 hover:table-auto']) }}
            </div>
        </div>
        <style>
            .select2-container--default .select2-selection--single {
                height: 36px;
                padding-top: 3px;
                border: 1px solid #e2e8f0;
                border-radius: 0.375rem;
            }

            .select2-container--default .select2-selection--single .select2-selection__arrow {
                height: 34px;
            }

            .select2-container--default .select2-selection--single .select2-selection__rendered {
                line-height: 30px;
            }

            .daterangepicker {
                z-index: 1051 !important;
            }

            .select2-container {
                z-index: 1052 !important;
            }
        </style>
    </div>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}">
        <!-- Select2 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.css" rel="stylesheet" />
    @endpush

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src={{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}></script>
        <script src={{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}></script>
        <script src={{ asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}></script>
        <script src={{ asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}></script>
        <!-- Select2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.min.js"></script>

        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

        <script>
            $(document).ready(function() {
                // Inisialisasi Select2
                $('.select2-filter').select2({
                    placeholder: "Pilih...",
                    allowClear: true
                });

                // Inisialisasi Date Range Picker
                $('#date-range').daterangepicker({
                    locale: {
                        format: 'YYYY-MM-DD',
                        separator: ' s/d ',
                        applyLabel: 'Pilih',
                        cancelLabel: 'Batal',
                        fromLabel: 'Dari',
                        toLabel: 'Sampai',
                        customRangeLabel: 'Custom',
                        daysOfWeek: ['Mg', 'Sn', 'Sl', 'Rb', 'Km', 'Jm', 'Sb'],
                        monthNames: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
                            'September', 'Oktober', 'November', 'Desember'
                        ],
                        firstDay: 1
                    },
                    opens: 'right',
                    autoUpdateInput: false
                });

                $('#date-range').on('apply.daterangepicker', function(ev, picker) {
                    $(this).val(picker.startDate.format('YYYY-MM-DD') + ' s/d ' + picker.endDate.format(
                        'YYYY-MM-DD'));
                });

                $('#date-range').on('cancel.daterangepicker', function(ev, picker) {
                    $(this).val('');
                });
            });

            function applyFilters() {
                const status = $('#status-filter').val();
                const pelayanan = $('#pelayanan-filter').val();
                const dateRange = $('#date-range').val();

                let table = window.LaravelDataTables['pendaftaran-table'];

                table.ajax.url('{{ route('pemeriksaan.index') }}?status=' + status + '&pelayanan=' + pelayanan +
                    '&date_range=' + dateRange).load();
            }

            function resetFilters() {
                $('#status-filter').val(null).trigger('change');
                $('#pelayanan-filter').val(null).trigger('change');
                $('#date-range').val('');

                let table = window.LaravelDataTables['pendaftaran-table'];
                table.ajax.url('{{ route('pemeriksaan.index') }}').load();
            }

            // function exportData(dataType, exportType) {
            //     const status = $('#status-filter').val();
            //     const pelayanan = $('#pelayanan-filter').val();
            //     const dateRange = $('#date-range').val();

            //     let url = `/dashboard/export/export/${dataType}?export_type=${exportType}`;

            //     if (status) {
            //         url += `&status=${status}`;
            //     }
            //     if (pelayanan) {
            //         url += `&pelayanan=${pelayanan}`;
            //     }
            //     if (dateRange) {
            //         url += `&date_range=${dateRange}`;
            //     }

            //     console.log('Export URL:', url);
            //     window.location.href = url;
            // }

            function exportData(dataType, exportType) {
                const status = $('#status-filter').val();
                const pelayanan = $('#pelayanan-filter').val();
                const dateRange = $('#date-range').val();

                let url = `/dashboard/export/export/${dataType}?export_type=${exportType}`;

                // Tambahkan parameter filter
                if (status) {
                    url += `&status=${status}`;
                }
                if (pelayanan) {
                    url += `&pelayanan=${pelayanan}`;
                }
                if (dateRange) {
                    url += `&date_range=${encodeURIComponent(dateRange)}`;
                }

                console.log('Export URL:', url);
                window.location.href = url;
            }
        </script>
    @endpush
</x-app-layout>
