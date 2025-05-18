<x-app-layout>
    <div class="p-6">
        <div class="shadow-xl card bg-base-100">
            <div class="card-body">
                <div id="head" class="flex flex-row justify-between">
                    <h2 class="mb-6 text-2xl font-bold card-title">Data Pemeriksaan Pasien : Detail</h2>
                    <a href="{{ route('pemeriksaan.index') }}" class="btn btn-outline btn-neutral">
                        <i class="ri-arrow-left-line"></i> Kembali
                    </a>
                </div>
                {{-- tanggal_pemeriksaan --}}
                <span class="text-lg">
                    Tanggal Pemeriksaan : {{ $data->created_at->translatedFormat('l, d F Y') }}
                </span>
                <div id="body">
                    <h2 class="py-2 text-lg font-semibold">Informasi Umum : </h2>
                    <div class="overflow-x-auto text-lg border rounded-box border-base-content/5 bg-base-100">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Nomor Rekam Medis</td>
                                    <td class="font-semibold">{{ $data->pendaftaran->no_rm }}</td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td>{{ $data->pendaftaran->pasien->nik ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Pasien</td>
                                    <td>{{ $data->pendaftaran->pasien->nama ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat Pasien</td>
                                    <td>{{ $data->pendaftaran->pasien->alamat ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>No Telp</td>
                                    <td>{{ $data->pendaftaran->pasien->no_telp ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h2 class="py-2 mt-2 text-lg font-semibold">Data Klinis : </h2>
                    <div class="p-4 overflow-x-auto text-lg border rounded-box border-base-content/5 bg-base-100">
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                            <!-- Tensi -->
                            <div class="flex items-center p-4 rounded-lg shadow bg-blue-50">
                                <i class="mr-4 text-3xl text-blue-600 ri-heart-pulse-line"></i>
                                <div>
                                    <div class="text-sm text-blue-800">Tensi</div>
                                    <div class="text-xl font-bold text-blue-900">{{ $data->tensi ?? '-' }} <span
                                            class="text-xs font-normal">MmHg</span></div>
                                </div>
                            </div>
                            <!-- Berat Badan -->
                            <div class="flex items-center p-4 rounded-lg shadow bg-green-50">
                                <i class="mr-4 text-3xl text-green-600 ri-body-scan-line"></i>
                                <div>
                                    <div class="text-sm text-green-800">Berat Badan</div>
                                    <div class="text-xl font-bold text-green-900">{{ $data->bb ?? '-' }} <span
                                            class="text-xs font-normal">Kg</span></div>
                                </div>
                            </div>
                            <!-- Tinggi Badan -->
                            <div class="flex items-center p-4 rounded-lg shadow bg-yellow-50">
                                <i class="mr-4 text-3xl text-yellow-600 ri-ruler-line"></i>
                                <div>
                                    <div class="text-sm text-yellow-800">Tinggi Badan</div>
                                    <div class="text-xl font-bold text-yellow-900">{{ $data->tb ?? '-' }} <span
                                            class="text-xs font-normal">Cm</span></div>
                                </div>
                            </div>
                            <!-- Suhu Badan -->
                            <div class="flex items-center p-4 rounded-lg shadow bg-red-50">
                                <i class="mr-4 text-3xl text-red-600 ri-thermometer-line"></i>
                                <div>
                                    <div class="text-sm text-red-800">Suhu Badan</div>
                                    <div class="text-xl font-bold text-red-900">{{ $data->suhu_badan ?? '-' }} <span
                                            class="text-xs font-normal">°C</span></div>
                                </div>
                            </div>
                            <!-- Saturasi Oksigen -->
                            <div class="flex items-center p-4 rounded-lg shadow bg-cyan-50">
                                <i class="mr-4 text-3xl ri-bubble-chart-line text-cyan-600"></i>
                                <div>
                                    <div class="text-sm text-cyan-800">Saturasi Oksigen</div>
                                    <div class="text-xl font-bold text-cyan-900">{{ $data->saturasi_oksigen ?? '-' }}
                                        <span class="text-xs font-normal">%</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Lingkar Lengan Atas -->
                            <div class="flex items-center p-4 rounded-lg shadow bg-purple-50">
                                <i class="mr-4 text-3xl text-purple-600 ri-measure-line"></i>
                                <div>
                                    <div class="text-sm text-purple-800">Lingkar Lengan Atas</div>
                                    <div class="text-xl font-bold text-purple-900">{{ $data->lila ?? '-' }} <span
                                            class="text-xs font-normal">Cm</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 class="py-2 mt-2 text-lg font-semibold">Informasi Pemeriksaan : </h2>
                    <div class="overflow-x-auto text-lg border rounded-box border-base-content/5 bg-base-100">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Pelayanan</td>
                                    <td>
                                        @if ($data->pelayanan)
                                            <span class="badge badge-success">
                                                {{ $data->pelayanan->nama }}
                                            </span>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bidan</td>
                                    <td>{{ $data->bidan->nama ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>keluhan</td>
                                    <td>{{ $data->keluhan ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Riwayat</td>
                                    <td>{{ $data->riwayat ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Riwayat Imunisasi</td>
                                    <td>{{ $data->riwayat_imunisasi ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Diagnosa</td>
                                    <td>{{ $data->diagnosa ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Tindakan</td>
                                    <td>{{ $data->tindakan ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Kontrol</td>
                                    <td>{{ $data->tanggal_kontrol ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h2 class="py-2 mt-2 text-lg font-semibold">Informasi Pemeriksaan Tambahan : </h2>
                    <div class="overflow-x-auto text-lg border rounded-box border-base-content/5 bg-base-100">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Hari Pertama Haid</td>
                                    <td>{{ $data->hpht ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>GPA (Gravida, Paritas, Abortus)</td>
                                    <td>{{ $data->gpa ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Umur Kehamilan</td>
                                    <td>{{ $data->umur_kehamilan ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Lingkar Perut</td>
                                    <td>{{ $data->lingkar_perut ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Tinggi Fundus</td>
                                    <td>{{ $data->tinggi_fundus ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Anak</td>
                                    <td>{{ $data->jumlah_anak ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Persalinan Terakhir</td>
                                    <td>{{ $data->persalinan_terakhir ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>DJJ (Denyut Jantung Janin/menit)</td>
                                    <td>{{ $data->djj ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Refla (Reflex Patella Ibu)</td>
                                    <td>{{ $data->refla ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Hasil lab ibu hamil</td>
                                    <td>{{ $data->lab ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Melahirkan</td>
                                    <td>{{ $data->tanggal_melahirkan ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Tempat Persalinan</td>
                                    <td>{{ $data->tempat_persalinan ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Bantu Persalinan</td>
                                    <td>{{ $data->bantu_persalinan ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Besar Rahim</td>
                                    <td>{{ $data->besar_rahim ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Cairan Keluar</td>
                                    <td>{{ $data->cairan_keluar ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Infeksi</td>
                                    <td>{{ $data->infeksi ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
