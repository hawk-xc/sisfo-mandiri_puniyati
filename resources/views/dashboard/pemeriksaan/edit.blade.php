<x-app-layout>
    <div class="p-6">
        <div class="shadow-xl card bg-base-100">
            <div class="card-body">
                <div id="head" class="flex flex-row justify-between">
                    <h2 class="mb-6 text-2xl font-bold card-title">Tambah : Data Pemeriksaan</h2>
                    <a href="{{ route('pemeriksaan.index') }}" class="btn btn-neutral">
                        <i class="ri-arrow-go-back-line"></i> Kembali
                    </a>
                </div>
                <div id="form-body">
                    <form action="{{ route('pemeriksaan.update', $data->id) }}" method="post"
                        class="flex flex-col gap-2 p-10">
                        @csrf
                        @method('PUT')

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

                            <input type="hidden" name="pendaftaran_id" id="pendaftaran_id"
                                value="{{ old('pendaftaran_id') }}" />

                            {{-- input nama pasien --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Nama Pasien</legend>
                                <input type="text" name="nama" id="nama" class="w-full input"
                                    placeholder="Nama Pasien"
                                    value="{{ old('nama', $data->pendaftaran->pasien->nama) }}" disabled />
                                @error('nama')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            {{-- input alamat pasien --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Alamat Pasien</legend>
                                <input type="text" name="alamat" id="alamat" class="w-full input"
                                    placeholder="Alamat Pasien"
                                    value="{{ old('alamat', $data->pendaftaran->pasien->alamat) }}" disabled />
                                @error('alamat')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Data Bidan</legend>
                                <select name="bidan_id" class="w-full select">
                                    <option value="">Pilih bidan yang bertugas</option>
                                    @foreach ($dataBidan as $bidan)
                                        <option value="{{ $bidan->id }}"
                                            {{ old('bidan_id', $data->bidan->id) == $bidan->id ? 'selected' : '' }}>
                                            {{ $bidan->nama }}</option>
                                    @endforeach
                                </select>
                                @error('bidan_id')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Data Pelayanan</legend>
                                <select name="pelayanan_id" id="pelayanan_id" class="w-full select">
                                    <option value="">Pilih Pelayanan</option>
                                    @foreach ($dataLayanan as $layanan)
                                        <option value="{{ $layanan->id }}"
                                            {{ old('pelayanan_id', $data->pelayanan->id) == $layanan->id ? 'selected' : '' }}>
                                            {{ $layanan->nama }}</option>
                                    @endforeach
                                </select>
                                @error('pelayanan_id')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Keluhan</legend>
                                <textarea name="keluhan" class="w-full input" placeholder="Keluhan" style="min-height: 100px;">{{ old('keluhan', $data->keluhan) }}</textarea>
                                @error('keluhan')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Riwayat</legend>
                                <input type="text" name="riwayat" class="w-full input" placeholder="Riwayat"
                                    value="{{ old('riwayat', $data->riwayat ?? '') }}" />
                                @error('riwayat')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Riwayat Imunisasi</legend>
                                <input type="text" name="riwayat_imunisasi" class="w-full input"
                                    placeholder="Riwayat Imunisasi"
                                    value="{{ old('riwayat_imunisasi', $data->riwayat_imunisasi ?? '') }}" />
                                @error('riwayat_imunisasi')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Tensi</legend>
                                <label class="w-full input">
                                    MmHg
                                    <input type="number" name="tensi" class="w-full input" placeholder="Tensi"
                                        value="{{ old('tensi', $data->tensi ?? '') }}" />
                                </label>
                                @error('tensi')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Berat Badan (BB)</legend>
                                <label class="w-full input">
                                    Kg
                                    <input type="number" name="bb" class="w-full input" placeholder="Berat Badan"
                                        value="{{ old('bb', $data->bb ?? '') }}" />
                                </label>
                                @error('bb')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Tinggi Badan (TB)</legend>
                                <label class="w-full input">
                                    Cm
                                    <input type="number" name="tb" class="w-full input"
                                        placeholder="Tinggi Badan" value="{{ old('tb', $data->tb ?? '') }}" />
                                </label>
                                @error('tb')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Suhu Badan</legend>
                                <label class="w-full input">
                                    °C
                                    <input type="number" name="suhu_badan" class="w-full input"
                                        placeholder="Suhu Badan"
                                        value="{{ old('suhu_badan', $data->suhu_badan ?? '') }}" />
                                </label>
                                @error('suhu_badan')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Saturasi Oksigen</legend>
                                <label class="w-full input">
                                    %
                                    <input type="number" name="saturasi_oksigen" class="w-full input"
                                        placeholder="Saturasi Oksigen"
                                        value="{{ old('saturasi_oksigen', $data->saturasi_oksigen ?? '') }}" />
                                </label>
                                @error('saturasi_oksigen')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Lingkar Lengan Atas</legend>
                                <label class="w-full input">
                                    Cm
                                    <input type="number" name="lila" class="w-full input"
                                        placeholder="Lingkar Lengan Atas"
                                        value="{{ old('lila', $data->lila ?? '') }}" />
                                </label>
                                @error('lila')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            {{-- Ibu Hamil, ANC --}}
                            <div id="anc-kia-form" class="relative hidden p-4 mt-8 border border-gray-300 rounded-md">
                                <span class="absolute px-2 text-lg font-medium text-gray-700 bg-white -top-3 left-4">
                                    Form Ibu Hamil, ANC, KIA
                                </span>
                                <fieldset class="fieldset">
                                    <legend class="text-lg fieldset-legend">Hari Pertama Haid</legend>
                                    <input type="date" name="hpht" class="w-full input"
                                        placeholder="Hari Pertama Haid "
                                        value="{{ old('hpht', $data->hpht ?? '') }}" />
                                    @error('hpht')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </fieldset>

                                <fieldset class="fieldset">
                                    <legend class="text-lg fieldset-legend">GPA (Gravida, Paritas, Abortus)</legend>
                                    <input type="text" name="gpa" class="w-full input"
                                        placeholder="GPA (Gravida, Paritas, Abortus)"
                                        value="{{ old('gpa', $data->gpa ?? '') }}" />
                                    @error('gpa')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </fieldset>

                                <fieldset class="fieldset">
                                    <legend class="text-lg fieldset-legend">Umur Kehamilan</legend>
                                    <input type="number" name="umur_kehamilan" class="w-full input"
                                        placeholder="Umur Kehamilan diberi satuan (Minggu)"
                                        value="{{ old('umur_kehamilan', $data->umur_kehamilan ?? '') }}" />
                                    @error('umur_kehamilan')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </fieldset>

                                <fieldset class="fieldset">
                                    <legend class="text-lg fieldset-legend">Lingkar Perut</legend>
                                    <input type="number" name="lingkar_perut" class="w-full input"
                                        placeholder="Lingkar Perut"
                                        value="{{ old('lingkar_perut', $data->lingkar_perut ?? '') }}" />
                                    @error('lingkar_perut')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </fieldset>

                                <fieldset class="fieldset">
                                    <legend class="text-lg fieldset-legend">Tinggi Fundus</legend>
                                    <label class="w-full input">
                                        Cm
                                        <input type="number" name="tinggi_fundus" class="w-full input"
                                            placeholder="Tinggi Fundus"
                                            value="{{ old('tinggi_fundus', $data->tinggi_fundus ?? '') }}" />
                                    </label>
                                    @error('tinggi_fundus')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </fieldset>

                                <fieldset class="fieldset">
                                    <legend class="text-lg fieldset-legend">Jumlah Anak</legend>
                                    <input type="number" name="jumlah_anak" class="w-full input"
                                        placeholder="Jumlah Anak"
                                        value="{{ old('jumlah_anak', $data->jumlah_anak ?? '') }}" />
                                    @error('jumlah_anak')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </fieldset>

                                <fieldset class="fieldset">
                                    <legend class="text-lg fieldset-legend">Persalinan Terakhir</legend>
                                    <select name="persalinan_terakhir" class="w-full select">
                                        <option value="">Pilih Persalinan Terakhir</option>
                                        <option value="normal"
                                            {{ old('persalinan_terakhir', $data->persalinan_terakhir ?? '') == 'normal' ? 'selected' : '' }}>
                                            Normal
                                        </option>
                                        <option value="caesar"
                                            {{ old('persalinan_terakhir', $data->persalinan_terakhir ?? '') == 'caesar' ? 'selected' : '' }}>
                                            Caesar
                                        </option>
                                        <option value="bantuan_alat"
                                            {{ old('persalinan_terakhir', $data->persalinan_terakhir ?? '') == 'bantuan_alat' ? 'selected' : '' }}>
                                            Bantuan
                                            Alat</option>
                                    </select>
                                    @error('persalinan_terakhir')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </fieldset>

                                <fieldset class="fieldset">
                                    <legend class="text-lg fieldset-legend">DJJ (Denyut Jantung Janin/menit)</legend>
                                    <input type="number" name="djj" class="w-full input"
                                        placeholder="DJJ (Denyut Jantung Janin/menit)"
                                        value="{{ old('djj', $data->djj ?? '') }}" />
                                    @error('djj')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </fieldset>

                                <fieldset class="fieldset">
                                    <legend class="text-lg fieldset-legend">Refla (Reflex Patella Ibu)</legend>
                                    <input type="text" name="refla" class="w-full input"
                                        placeholder="Refla (Reflex Patella Ibu)"
                                        value="{{ old('refla', $data->refla ?? '') }}" />
                                    @error('refla')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </fieldset>

                                <fieldset class="fieldset">
                                    <legend class="text-lg fieldset-legend">Hasil lab ibu hamil</legend>
                                    <input type="text" name="lab" class="w-full input"
                                        placeholder="Hasil lab ibu hamil"
                                        value="{{ old('lab', $data->lab ?? '') }}" />
                                    @error('lab')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>

                            {{-- Ibu nifas/KB/KIA --}}
                            <div id="nifas-kb-form"
                                class="relative hidden p-4 mt-8 border border-gray-300 rounded-md">
                                <span class="absolute px-2 text-lg font-medium text-gray-700 bg-white -top-3 left-4">
                                    Form Ibu nifas/KB, KIA
                                </span>
                                <fieldset class="fieldset">
                                    <legend class="text-lg fieldset-legend">Tanggal Melahirkan</legend>
                                    <input type="date" name="tanggal_melahirkan" class="w-full input"
                                        placeholder="Tanggal Melahirkan"
                                        value="{{ old('tanggal_melahirkan', $data->tanggal_melahirkan ?? '') }}" />
                                    @error('tanggal_melahirkan')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </fieldset>

                                <fieldset class="fieldset">
                                    <legend class="text-lg fieldset-legend">Tempat Persalinan</legend>
                                    <input type="text" name="tempat_persalinan" class="w-full input"
                                        placeholder="Tempat Persalinan"
                                        value="{{ old('tempat_persalinan', $data->tempat_persalinan ?? '') }}" />
                                    @error('tempat_persalinan')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </fieldset>

                                <fieldset class="fieldset">
                                    <legend class="text-lg fieldset-legend">Bantu Persalinan</legend>
                                    <select name="bantu_persalinan" class="w-full select">
                                        <option value="">Pilih Bantu Persalinan</option>
                                        <option value="dokter"
                                            {{ old('bantu_persalinan', $data->bantu_persalinan ?? '') == 'dokter' ? 'selected' : '' }}>
                                            Dokter</option>
                                        <option value="bidan"
                                            {{ old('bantu_persalinan', $data->bantu_persalinan ?? '') == 'bidan' ? 'selected' : '' }}>
                                            Bidan</option>
                                    </select>
                                    @error('bantu_persalinan')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </fieldset>

                                <fieldset class="fieldset">
                                    <legend class="text-lg fieldset-legend">Besar Rahim</legend>
                                    <input type="text" name="besar_rahim" class="w-full input"
                                        placeholder="Besarnya rahim setelah melahirkan"
                                        value="{{ old('besar_rahim', $data->besar_rahim ?? '') }}" />
                                    @error('besar_rahim')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </fieldset>

                                <fieldset class="fieldset">
                                    <legend class="text-lg fieldset-legend">Cairan Keluar</legend>
                                    <input type="text" name="cairan_keluar" class="w-full input"
                                        placeholder="Darah nifas"
                                        value="{{ old('cairan_keluar', $data->cairan_keluar ?? '') }}" />
                                    @error('cairan_keluar')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </fieldset>

                                <fieldset class="fieldset">
                                    <legend class="text-lg fieldset-legend">Infeksi</legend>
                                    <input type="text" name="infeksi" class="w-full input"
                                        placeholder="Infeksi pasca lahiran"
                                        value="{{ old('infeksi', $data->infeksi ?? '') }}" />
                                    @error('infeksi')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>

                            {{-- Penatalaksanaan --}}
                            <div id="penatalaksanaan-form"
                                class="relative p-4 mt-8 border border-gray-300 rounded-md">
                                <span class="absolute px-2 text-lg font-medium text-gray-700 bg-white -top-3 left-4">
                                    Form Penatalaksanaan
                                </span>
                                <fieldset class="fieldset">
                                    <legend class="text-lg fieldset-legend">Diagnosa</legend>
                                    <input type="text" name="diagnosa" class="w-full input"
                                        placeholder="Diagnosa yang diberikan bidan pada pasien"
                                        value="{{ old('diagnosa', $data->diagnosa ?? '') }}" />
                                    @error('diagnosa')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </fieldset>

                                <fieldset class="fieldset">
                                    <legend class="text-lg fieldset-legend">Tindakan</legend>
                                    <input type="text" name="tindakan" class="w-full input"
                                        placeholder="Tindakan yang diberikan"
                                        value="{{ old('tindakan', $data->tindakan ?? '') }}" />
                                    @error('tindakan')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </fieldset>

                                <fieldset class="fieldset">
                                    <legend class="text-lg fieldset-legend">Tanggal Kontrol</legend>
                                    <input type="date" name="tanggal_kontrol" class="w-full input"
                                        placeholder="Tanggal Kontrol"
                                        value="{{ old('tanggal_kontrol', $data->tanggal_kontrol ?? '') }}" />
                                    @error('tanggal_kontrol')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </fieldset>

                                <fieldset class="fieldset">
                                    <legend class="text-lg fieldset-legend">Keterangan Lain</legend>
                                    <textarea name="keterangan_lain" class="w-full input" placeholder="Keterangan Lain" style="min-height: 100px;">{{ old('keterangan_lain', $data->keterangan_lain ?? '') }}</textarea>
                                    @error('keterangan_lain')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </fieldset>
                            </div>
                        </div>
                        <div class="flex flex-row justify-end mt-10">
                            <button type="submit" class="btn btn-primary">
                                <i class="ri-save-line"></i> Update
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
            #no_rm+.select2 .select2-selection--single {
                height: 2.7rem !important;
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

                $('#no_rm').on('select2:select', function(e) {
                    var data = e.params.data;

                    if (data.pasien) {
                        $('#pendaftaran_id').val(data._id);
                        $('#nama').val(data.pasien.nama).prop('disabled', true);
                        $('#alamat').val(data.pasien.alamat).prop('disabled', true);
                    }
                });

                $('#no_rm').on('select2:clear', function() {
                    $('input[id!="no_rm"]').val('').prop('disabled', false);
                });

                function toggleFormsBasedOnService() {
                    const selectedService = $('#pelayanan_id option:selected').text().trim().toUpperCase();
                    console.log(selectedService);
                    const ancKiaForm = $('#anc-kia-form');
                    const nifasKbForm = $('#nifas-kb-form');

                    ancKiaForm.addClass('hidden');
                    nifasKbForm.addClass('hidden');

                    if (selectedService === 'ANC') {
                        ancKiaForm.removeClass('hidden');
                    } else if (selectedService === 'IBU NIFAS' || selectedService === 'KB') {
                        nifasKbForm.removeClass('hidden');
                    } else if (selectedService === 'KIA') {
                        ancKiaForm.removeClass('hidden');
                        nifasKbForm.removeClass('hidden');
                    }
                }

                $('#pelayanan_id').on('change', toggleFormsBasedOnService);

                toggleFormsBasedOnService();
            });
        </script>
    @endpush
</x-app-layout>
