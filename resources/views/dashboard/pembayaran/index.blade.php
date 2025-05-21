<x-app-layout>
    <div class="p-6">
        <div class="shadow-xl card bg-base-100">
            <div class="card-body">
                <div id="head" class="flex flex-row justify-between">
                    <h2 class="mb-6 text-2xl font-bold card-title">Data Pemeriksaan Pasien</h2>
                    <a href="{{ route('pemeriksaan.create') }}" class="btn btn-primary">
                        <i class="ri-add-line"></i> Tambah data
                    </a>
                </div>
                {{ $dataTable->table(['class' => 'w-full table table-zebra mt-2 hover:table-auto']) }}
            </div>
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}">
    @endpush

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src={{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}></script>
        <script src={{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}></script>
        <script src={{ asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}></script>
        <script src={{ asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}></script>
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush
</x-app-layout>
