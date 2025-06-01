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
                <div class="flex flex-row justify-between">
                    <span class="flex flex-col text-lg">
                        <span>
                            Status <span
                                class="badge {{ $data->pendaftaran->status === 'selesai' ? 'badge-success' : 'badge-primary' }}">
                                {{ $data->pendaftaran->status }}</span>
                        </span>
                        <span>Tanggal Pemeriksaan : {{ $data->created_at->translatedFormat('l, d F Y') }}</span>
                    </span>
                    @if ($data->pendaftaran->status === 'menunggu')
                        <a href="{{ route('pendaftaranstatus.update', $data->pendaftaran->id) }}"
                            class="btn btn-outline btn-primary btn-sm"
                            onclick="return confirm('Yakin ingin mengubah status?')">Ubah status</a>
                    @endif

                </div>
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
                                <tr>
                                    <td>Keterangan Lain</td>
                                    <td>{{ $data->keterangan_lain ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @if (!$data->pelayanan->nama == 'umum')
                        <h2 class="py-2 mt-2 text-lg font-semibold">Informasi Pemeriksaan Tambahan : </h2>
                    @endif
                    <div class="mt-2 overflow-x-auto text-lg border rounded-box border-base-content/5 bg-base-100">
                        <table class="table">
                            <tbody>
                                {{-- anc, ibu hamil, kia --}}
                                @if ($data->pelayanan->nama == 'anc' || $data->pelayanan->nama == 'kia')
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
                                @elseif($data->pelayanan->nama == 'ibu nifas' || $data->pelayanan->nama == 'kb' || $data->pelayanan->nama == 'kia')
                                    {{-- ibu nifas, kb, kia --}}
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
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="flex flex-row items-center justify-between">
                        <h2 class="py-2 mt-2 text-lg font-semibold">Resep Obat : </h2>
                        <!-- The button to open modal -->
                        <button onclick="document.getElementById('tambah_resep_modal').showModal()"
                            class="btn btn-outline btn-primary btn-sm">
                            <i class="ri-add-line"></i> Tambah Resep Obat
                        </button>
                    </div>

                    <!-- Modal Tambah Resep Obat -->
                    <dialog id="tambah_resep_modal" class="modal">
                        <div class="modal-box">
                            <form id="form-resep-obat">
                                @csrf
                                <input type="hidden" name="pemeriksaan_id" value="{{ $data->id }}">

                                <h3 class="text-lg font-bold">Tambah Resep Obat</h3>
                                <div class="flex flex-col gap-2 py-4">
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text">Nama Obat</span>
                                        </label>
                                        <select id="obat_id" name="obat_id" class="w-full select2" required>
                                        </select>
                                    </div>
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text">Dosis</span>
                                        </label>
                                        <input type="text" name="dosis" placeholder="Masukkan dosis"
                                            class="w-full input input-bordered" required>
                                    </div>
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text">Keterangan</span>
                                        </label>
                                        <textarea name="keterangan" placeholder="Masukkan keterangan" class="w-full textarea textarea-bordered"></textarea>
                                    </div>
                                </div>
                                <div class="modal-action">
                                    <button type="button"
                                        onclick="document.getElementById('tambah_resep_modal').close()"
                                        class="btn">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                        <form method="dialog" class="modal-backdrop">
                            <button>close</button>
                        </form>
                    </dialog>

                    <!-- Modal Edit Resep Obat -->
                    <dialog id="edit_resep_modal" class="modal">
                        <div class="modal-box">
                            <form id="form-edit-resep">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="pemeriksaan_id" value="{{ $data->id }}">
                                <input type="hidden" name="resep_id" id="edit_resep_id">

                                <h3 class="text-lg font-bold">Edit Resep Obat</h3>
                                <div class="flex flex-col gap-2 py-4">
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text">Nama Obat</span>
                                        </label>
                                        <select id="edit_obat_id" name="obat_id" class="w-full select2" required>
                                        </select>
                                    </div>
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text">Dosis</span>
                                        </label>
                                        <input type="text" name="dosis" id="edit_dosis"
                                            placeholder="Masukkan dosis" class="w-full input input-bordered" required>
                                    </div>
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text">Keterangan</span>
                                        </label>
                                        <textarea name="keterangan" id="edit_keterangan" placeholder="Masukkan keterangan"
                                            class="w-full textarea textarea-bordered"></textarea>
                                    </div>
                                </div>
                                <div class="modal-action">
                                    <button type="button"
                                        onclick="document.getElementById('edit_resep_modal').close()"
                                        class="btn">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                        <form method="dialog" class="modal-backdrop">
                            <button>close</button>
                        </form>
                    </dialog>
                    {{ $dataTable->table(['class' => 'w-full table table-zebra mt-2 hover:table-auto']) }}
                </div>
            </div>
        </div>
    </div>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="{{ asset('vendor/laravel-js-routes/js/routes.js') }}"></script>
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
        <style>
            /* Atur z-index untuk select2 agar muncul di atas modal */
            .select2-container {
                z-index: 99999 !important;
                border: 1px solid slategray;
                border-radius: 0.5rem !important;
            }

            /* Atur tampilan select2 agar sesuai dengan tema DaisyUI */
            .select2-selection {
                min-height: 2.5rem;
                padding: 0.5rem;
                border: 1px solid hsl(var(--bc)/0.2) !important;
                border-radius: var(--rounded-btn, 0.5rem) !important;
            }

            .select2-selection--single {
                height: 2rem !important;
            }

            .select2-selection__rendered {
                line-height: 2rem !important;
            }

            .select2-selection__arrow {
                height: 2.5rem !important;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src={{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}></script>
        <script src={{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}></script>
        <script src={{ asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}></script>
        <script src={{ asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}></script>
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

        <script>
            $(document).ready(function() {
                // Inisialisasi Select2 untuk modal tambah
                $('#obat_id').select2({
                    theme: 'bootstrap-5',
                    placeholder: 'Pilih obat',
                    allowClear: true,
                    dropdownParent: $('#tambah_resep_modal'),
                    ajax: {
                        url: '{{ route('dashboard.select2.obat') }}',
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return {
                                search: params.term,
                                page: params.page || 1
                            };
                        },
                        processResults: function(data, params) {
                            params.page = params.page || 1;
                            return {
                                results: data.data,
                                pagination: {
                                    more: data.current_page < data.last_page
                                }
                            };
                        },
                        cache: true
                    },
                    minimumInputLength: 1
                });

                // Inisialisasi Select2 untuk modal edit
                $('#edit_obat_id').select2({
                    theme: 'bootstrap-5',
                    placeholder: 'Pilih obat',
                    allowClear: true,
                    dropdownParent: $('#edit_resep_modal'),
                    ajax: {
                        url: '{{ route('dashboard.select2.obat') }}',
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return {
                                search: params.term,
                                page: params.page || 1
                            };
                        },
                        processResults: function(data, params) {
                            params.page = params.page || 1;
                            return {
                                results: data.data,
                                pagination: {
                                    more: data.current_page < data.last_page
                                }
                            };
                        },
                        cache: true
                    },
                    minimumInputLength: 1
                });

                // Fungsi untuk membuka modal edit
                window.openEditModal = function(resepId) {
                    $.ajax({
                        url: route('pemeriksaanobat.edit', {
                            id: resepId
                        }),
                        type: 'GET',
                        success: function(response) {
                            $('#edit_resep_id').val(response.id);
                            $('#edit_dosis').val(response.dosis);
                            $('#edit_keterangan').val(response.keterangan);

                            if (response.obat) {
                                var option = new Option(response.obat.nama, response.obat.id, true,
                                    true);
                                $('#edit_obat_id').append(option).trigger('change');
                            }

                            document.getElementById('edit_resep_modal').showModal();
                        },
                        error: function(xhr) {
                            console.error('Error:', xhr.responseText);
                            alert('Gagal memuat data resep obat. Silakan cek konsol untuk detail.');
                        }
                    });
                };

                // Fungsi untuk menghapus resep obat
                window.deleteResepObat = function(resepId) {
                    if (confirm('Yakin ingin menghapus resep obat ini?')) {
                        $.ajax({
                            url: '/dashboard/pemeriksaanobat/' + resepId,
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                _method: 'DELETE'
                            },
                            success: function(response) {
                                alert('Resep obat berhasil dihapus');
                                if (window.LaravelDataTables && window.LaravelDataTables[
                                        "pemeriksaanobat-table"]) {
                                    window.LaravelDataTables["pemeriksaanobat-table"].ajax.reload();
                                }
                            },
                            error: function(xhr) {
                                alert('Gagal menghapus: ' + (xhr.responseJSON?.message ||
                                    'Terjadi kesalahan'));
                            }
                        });
                    }
                };

                // Handle form edit submission
                $('#form-edit-resep').on('submit', function(e) {
                    e.preventDefault();

                    let resepId = $('#edit_resep_id').val();
                    let formData = $(this).serialize();

                    $.ajax({
                        url: '/dashboard/pemeriksaanobat/' + resepId,
                        type: 'POST',
                        data: formData + '&_method=PUT',
                        beforeSend: function() {
                            $('button[type="submit"]', '#form-edit-resep').html(
                                '<span class="loading loading-spinner"></span> Mengupdate...');
                            $('button[type="submit"]', '#form-edit-resep').prop('disabled', true);
                        },
                        success: function(response) {
                            document.getElementById('edit_resep_modal').close();
                            alert('Resep obat berhasil diupdate');

                            // Refresh DataTable
                            if (window.LaravelDataTables && window.LaravelDataTables[
                                    "pemeriksaanobat-table"]) {
                                window.LaravelDataTables["pemeriksaanobat-table"].ajax.reload();
                            }
                        },
                        error: function(xhr) {
                            let errorMessage = xhr.responseJSON?.message ||
                                'Terjadi kesalahan saat mengupdate data';
                            alert(errorMessage);
                        },
                        complete: function() {
                            $('button[type="submit"]', '#form-edit-resep').html('Update');
                            $('button[type="submit"]', '#form-edit-resep').prop('disabled', false);
                        }
                    });
                });

                // Handle form tambah submission
                $('#form-resep-obat').on('submit', function(e) {
                    e.preventDefault();

                    let formData = $(this).serialize();

                    $.ajax({
                        url: '{{ route('pemeriksaanobat.store') }}',
                        type: 'POST',
                        data: formData,
                        beforeSend: function() {
                            $('button[type="submit"]', '#form-resep-obat').html(
                                '<span class="loading loading-spinner"></span> Menyimpan...');
                            $('button[type="submit"]', '#form-resep-obat').prop('disabled', true);
                        },
                        success: function(response) {
                            document.getElementById('tambah_resep_modal').close();
                            alert('Resep obat berhasil ditambahkan');

                            // Refresh DataTable
                            if (window.LaravelDataTables && window.LaravelDataTables[
                                    "pemeriksaanobat-table"]) {
                                window.LaravelDataTables["pemeriksaanobat-table"].ajax.reload();
                            }

                            // Reset form
                            $('#form-resep-obat')[0].reset();
                            $('#obat_id').val(null).trigger('change');
                        },
                        error: function(xhr) {
                            let errorMessage = xhr.responseJSON?.message ||
                                'Terjadi kesalahan saat menyimpan data';
                            alert(errorMessage);
                        },
                        complete: function() {
                            $('button[type="submit"]', '#form-resep-obat').html('Simpan');
                            $('button[type="submit"]', '#form-resep-obat').prop('disabled', false);
                        }
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>
