<x-app-layout>
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                callToast('success', '{{ session('success') }}')
            })
        </script>
    @elseif (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                callToast('error', '{{ session('error') }}')
            })
        </script>
    @endif
    <div class="p-6">
        <div class="shadow-xl card bg-base-100">
            <div class="card-body">
                <div id="head" class="flex flex-row justify-between">
                    <h2 class="mb-6 text-2xl font-bold card-title">Data Pelayanan</h2>
                    <div>
                        {{-- <a href="{{ route('pelayanan.create') }}" class="btn btn-primary btn-sm">
                            <i class="ri-add-line"></i> Tambah data
                        </a> --}}
                        <button onclick="exportData('pelayanan', 'pdf')" class="btn btn-outline btn-neutral btn-sm">
                            <i class="ri-file-pdf-2-line"></i> Export PDF
                        </button>
                    </div>
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

        <script>
            function exportData(dataType, exportType) {
                const urlParams = new URLSearchParams(window.location.search);

                let url = `/dashboard/export/export/${dataType}?export_type=${exportType}`;

                if (urlParams.has('sort')) {
                    url += `&sort=${urlParams.get('sort')}`;
                }

                console.log('Export URL:', url);
                window.location.href = url;
            }
        </script>
    @endpush
</x-app-layout>
