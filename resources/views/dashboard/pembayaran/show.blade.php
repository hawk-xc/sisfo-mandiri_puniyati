<x-app-layout>
    <div class="p-6">
        <div class="shadow-xl card bg-base-100">
            <!-- Header Nota -->
            <div class="card-body">
                <div class="flex justify-end w-full gap-2 mb-10">
                    <button onclick="exportData('pembayaran_detail', 'pdf')" class="btn btn-outline btn-neutral btn-sm">
                        <i class="ri-file-pdf-2-line"></i> Export PDF
                    </button>
                    <a href="{{ route('pembayaran.index') }}" class="btn btn-sm btn-outline btn-neutral">
                        <i class="ri-arrow-left-line"></i> Kembali
                    </a>
                </div>
                <div class="flex flex-col items-center justify-between mb-6 md:flex-row">
                    <div class="text-center md:text-left">
                        <h1 class="text-2xl font-bold uppercase">Bidan Praktik Mandiri Puniyati, A.Md Keb</h1>
                        <p class="text-sm">Dusun
                            Kalipelang RT01/RW 07, Desa Demakan, Kecamatan Mojolaban, Kabupaten
                            Sukoharjo.</p>
                        <p class="text-sm">Telp: +62 821-3439-7554</p>
                    </div>
                    <div class="mt-4 text-center md:mt-0 md:text-right">
                        <h2 class="text-xl font-semibold">NOTA PELAYANAN</h2>
                        <p class="text-sm">Id Pemeriksaan: {{ $data->id }}</p>
                        <p class="text-sm">Tanggal: {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
                    </div>
                </div>

                <!-- Data Pasien -->
                <div class="p-4 mb-6 border rounded-lg">
                    <h3 class="mb-2 text-lg font-semibold">Data Pasien</h3>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                        <div>
                            <p class="text-sm font-medium">Nama Pasien</p>
                            <p class="font-semibold">{{ $data->pendaftaran->pasien->nama }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium">No. RM</p>
                            <p class="font-semibold">{{ $data->pendaftaran->no_rm }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium">Bidan</p>
                            <p class="font-semibold">{{ $data->bidan->nama }}</p>
                        </div>
                    </div>
                </div>

                <!-- Detail Pelayanan -->
                <div class="mb-6 overflow-x-auto">
                    <h3 class="mb-4 text-lg font-semibold">Detail Pelayanan</h3>
                    <table class="table w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 text-left border">No</th>
                                <th class="px-4 py-2 text-left border">Jenis Pelayanan</th>
                                <th class="px-4 py-2 text-right border">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data dummy pelayanan -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border">1</td>
                                <td class="px-4 py-2 border">{{ $data->pelayanan->nama }}</td>
                                <td class="px-4 py-2 text-right border">Rp
                                    {{ number_format($data->pelayanan->biaya, 0, ',', '.') }}</td>
                            </tr>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Detail Obat -->
                <div class="mb-6 overflow-x-auto">
                    <h3 class="mb-4 text-lg font-semibold">Detail Obat</h3>
                    <table class="table w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 text-left border">No</th>
                                <th class="px-4 py-2 text-left border">Nama Obat</th>
                                <th class="px-4 py-2 text-right border">Harga Satuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->pemeriksaanObat as $key => $obat)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-2 border">{{ $key + 1 }}</td>
                                    <td class="px-4 py-2 border">{{ $obat->obat->nama }}</td>
                                    <td class="px-4 py-2 text-right border">Rp
                                        {{ number_format($obat->obat->harga_jual, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Total Pembayaran -->
                <div class="p-4 border rounded-lg">
                    <div class="flex justify-end">
                        <div class="w-full md:w-1/2">
                            <div class="flex justify-between py-2 border-b">
                                <span class="font-medium">Total Pelayanan:</span>
                                <span class="font-semibold">Rp
                                    {{ number_format($data->pelayanan->biaya, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="font-medium">Total Obat:</span>
                                <span class="font-semibold">
                                    Rp
                                    {{ number_format($data->pemeriksaanObat->sum(fn($obat) => $obat->obat->harga_jual), 0, ',', '.') }}
                                </span>
                            </div>
                            <div class="flex justify-between py-2 border-b">
                                <span class="font-medium">Diskon:</span>
                                <span class="font-semibold">Rp 0</span>
                            </div>
                            <div class="flex justify-between py-2 text-lg font-bold">
                                <span>Total Pembayaran:</span>
                                <span>Rp
                                    {{ number_format($data->pelayanan->biaya + $data->pemeriksaanObat->sum(fn($obat) => $obat->obat->harga_jual), 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Nota -->
                <div class="px-10 mt-8">
                    <div class="flex flex-col items-center justify-between md:flex-row">
                        <div class="mb-4 text-center md:mb-0">
                            <p class="mb-1">Pasien</p>
                            <div class="h-16 mt-8"></div>
                            <p class="font-medium">({{ $data->pendaftaran->pasien->nama }})</p>
                        </div>
                        <div class="text-center">
                            <p class="mb-1">Hormat Kami,</p>
                            <div class="h-16 mt-8"></div>
                            <p class="font-medium">(...............)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            function exportData(dataType, exportType) {
                const urlParams = new URLSearchParams(window.location.search);

                const currentUrl = window.location.pathname;
                const pemeriksaanId = currentUrl.split('/').pop();

                let url = `/dashboard/export/export/${dataType}?export_type=${exportType}&pemeriksaan_id=${pemeriksaanId}`;

                if (urlParams.has('sort')) {
                    url += `&sort=${urlParams.get('sort')}`;
                }

                console.log('Export URL:', url);
                window.location.href = url;
            }
        </script>
    @endpush
</x-app-layout>
