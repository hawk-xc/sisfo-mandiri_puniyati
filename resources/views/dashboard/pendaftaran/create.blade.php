<x-app-layout>
    <div class="p-6">
        <div class="shadow-xl card bg-base-100">
            <div class="card-body">
                <div id="head" class="flex flex-row justify-between">
                    <h2 class="mb-6 text-2xl font-bold card-title">Tambah : Data Pendaftaran</h2>
                    <a href="{{ route('pendaftaran.index') }}" class="btn btn-neutral">
                        <i class="ri-arrow-go-back-line"></i> Kembali
                    </a>
                </div>
                <div id="form-body">
                    <form action="{{ route('pendaftaran.store') }}" method="post" class="flex flex-col gap-2 p-10">
                        @csrf
                        @method('POST')

                        <div class="flex-1">
                            {{-- input data RM --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">No RM</legend>
                                <select name="no_rm" id="no_rm" class="w-full select" style="width: 100%">
                                    <option value="">Cari No RM atau Nama Pasien</option>
                                </select>
                                @error('no_rm')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            {{-- input nama pasien --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Nama Pasien</legend>
                                <input type="text" name="nama" id="nama" class="w-full input"
                                    placeholder="Nama Pasien" value="{{ old('nama') }}" />
                                @error('nama')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            {{-- input alamat pasien --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Alamat Pasien</legend>
                                <input type="text" name="alamat" id="alamat" class="w-full input"
                                    placeholder="Alamat Pasien" value="{{ old('alamat') }}" />
                                @error('alamat')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            {{-- input NIK --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">NIK</legend>
                                <input type="text" name="nik" id="nik" class="w-full input"
                                    placeholder="NIK" value="{{ old('nik') }}" />
                                @error('nik')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            {{-- input Nama KK --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Nama KK</legend>
                                <input type="text" name="nama_kk" id="nama_kk" class="w-full input"
                                    placeholder="Nama KK" value="{{ old('nama_kk') }}" />
                                @error('nama_kk')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            {{-- input tempat lahir --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Tempat Lahir</legend>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="w-full input"
                                    placeholder="Tempat Lahir" value="{{ old('tempat_lahir') }}" />
                                @error('tempat_lahir')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            {{-- input tanggal lahir --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Tanggal Lahir</legend>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="w-full input"
                                    placeholder="Tanggal Lahir" value="{{ old('tanggal_lahir') }}" />
                                @error('tanggal_lahir')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            {{-- input agama --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Agama</legend>
                                <select name="agama" class="w-full select">
                                    <option value="">Pilih Agama</option>
                                    @foreach (['islam', 'kristen', 'katolik', 'hindu', 'buddha', 'konghucu'] as $agama)
                                        <option value="{{ $agama }}"
                                            {{ old('agama') == $agama ? 'selected' : '' }}>
                                            {{ ucfirst($agama) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('agama')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            {{-- input Pendidikan --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Pendidikan</legend>
                                <select name="pendidikan" class="w-full select">
                                    <option value="">Pilih Pendidikan</option>
                                    @foreach (['belum sekolah', 'sd', 'smp/sltp', 'sma/slta', 'diploma i/ii/iii', 's1/s2/s3', 'lain-lain'] as $pendidikan)
                                        <option value="{{ $pendidikan }}"
                                            {{ old('pendidikan') == $pendidikan ? 'selected' : '' }}>
                                            {{ ucfirst($pendidikan) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('pendidikan')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            {{-- input pekerjaan --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Pekerjaan</legend>
                                <select name="pekerjaan" id="pekerjaan" class="w-full select">
                                    <option value="">Pilih Pekerjaan</option>
                                    @foreach (['wiraswasta', 'pns', 'ibu rumah tangga', 'pelajar', 'mahasiswa', 'petani', 'pedagang', 'tidak bekerja'] as $pekerjaan)
                                        <option value="{{ $pekerjaan }}"
                                            {{ old('pekerjaan') == $pekerjaan ? 'selected' : '' }}>
                                            {{ ucfirst($pekerjaan) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('pekerjaan')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            {{-- input penanggung jawab --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Penanggung Jawab</legend>
                                <input type="text" name="penanggung_jawab" id="penanggung_jawab"
                                    class="w-full input" placeholder="Penanggung Jawab"
                                    value="{{ old('penanggung_jawab') }}" />
                                @error('penanggung_jawab')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            {{-- input golda --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Golongan Darah</legend>
                                <select name="golda" id="golda" class="w-full select">
                                    <option value="">Pilih Golongan Darah</option>
                                    @foreach (['A', 'B', 'AB', 'O'] as $golda)
                                        <option value="{{ $golda }}"
                                            {{ old('golda') == $golda ? 'selected' : '' }}>
                                            {{ $golda }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('golda')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            {{-- input no_telp --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">No Telp</legend>
                                <input type="text" id="no_telp" name="no_telp" class="w-full input"
                                    placeholder="No Telp" value="{{ old('no_telp') }}" />
                                @error('no_telp')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            {{-- input tanggal pendaftaran --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Tanggal Pendaftaran</legend>
                                <input type="date" name="tanggal" class="w-full input"
                                    placeholder="tanggal Pasien"
                                    value="{{ old('tanggal', now()->format('Y-m-d')) }}" />
                                @error('tanggal')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            {{-- input jenis status --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Status</legend>
                                <select name="status" class="w-full select">
                                    <option value="" disabled selected>Pilih Status Pendaftaran</option>
                                    <option value="menunggu" {{ old('status') == 'menunggu' ? 'selected' : '' }}>
                                        Menunggu
                                    </option>
                                    <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai
                                    </option>
                                </select>
                                @error('jenis')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="flex flex-row justify-end mt-10">
                            <button type="submit" class="btn btn-primary">
                                <i class="ri-save-line"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <style>
            /* Style khusus untuk select2 no_rm */
            #no_rm+.select2 .select2-selection--single {
                height: 2.7rem !important;
                /* Sesuaikan dengan tinggi input lainnya */
                padding: 0.75rem !important;
                border-radius: 0.5rem !important;
                border: 1px solid #d1d5db !important;
                font-size: 1rem !important;
                line-height: 1.5 !important;
            }

            #no_rm+.select2 .select2-selection__arrow {
                height: 3.5rem !important;
            }

            #no_rm+.select2 .select2-selection__rendered {
                line-height: 0.5rem !important;
                padding-top: 0.5rem !important;
            }

            /* Style untuk input lainnya agar konsisten */
            .input,
            .select {
                height: 2.5rem;
                padding: 0.75rem;
                font-size: 1rem;
                line-height: 1;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                // Inisialisasi Select2
                $('#no_rm').select2({
                    placeholder: 'Cari No RM atau Nama Pasien',
                    minimumInputLength: 3,
                    language: {
                        inputTooShort: function() {
                            return 'Ketikkan minimal 3 karakter untuk mencari.';
                        }
                    },
                    ajax: {
                        url: '{{ route('dashboard.select2.pendaftaran') }}',
                        dataType: 'json',
                        delay: 250,
                        processResults: function(data) {
                            return {
                                results: data.results
                            };
                        },
                        cache: true
                    }
                });

                // Ketika no_rm dipilih
                $('#no_rm').on('select2:select', function(e) {
                    var data = e.params.data;

                    if (data.pasien) {
                        // Auto-fill data pasien
                        $('#nama').val(data.pasien.nama).prop('disabled', true);
                        $('#alamat').val(data.pasien.alamat).prop('disabled', true);
                        $('#nik').val(data.pasien.nik).prop('disabled', true);
                        $('#nama_kk').val(data.pasien.nama_kk).prop('disabled', true);
                        $('#tempat_lahir').val(data.pasien.tempat_lahir).prop('disabled', true);
                        $('#tanggal_lahir').val(data.pasien.tanggal_lahir).prop('disabled', true);
                        $('#agama').val(data.pasien.agama).prop('disabled', true);
                        $('#pendidikan').val(data.pasien.pendidikan).prop('disabled', true);
                        $('#pekerjaan').val(data.pasien.pekerjaan).prop('disabled', true);
                        $('#penanggung_jawab').val(data.pasien.penanggung_jawab).prop('disabled', true);
                        $('#no_telp').val(data.pasien.no_telp).prop('disabled', true);
                    }
                });

                // Ketika no_rm dihapus pilihannya
                $('#no_rm').on('select2:clear', function() {
                    // Enable semua input dan kosongkan
                    $('input[id!="no_rm"]').val('').prop('disabled', false);
                });
            });
        </script>
    @endpush
</x-app-layout>
