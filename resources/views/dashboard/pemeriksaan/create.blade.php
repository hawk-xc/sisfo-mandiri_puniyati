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
                    <form action="{{ route('pemeriksaan.store') }}" method="post" class="flex flex-col gap-2 p-10"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="flex-1">
                            {{-- input nama --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Nama</legend>
                                <input type="text" name="nama" class="w-full input" placeholder="Nama"
                                    value="{{ old('nama') }}" />
                                @error('nama')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Keluhan</legend>
                                <input type="text" name="keluhan" class="w-full input" placeholder="Keluhan"
                                    value="{{ old('keluhan') }}" />
                                @error('keluhan')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Riwayat</legend>
                                <input type="text" name="riwayat" class="w-full input" placeholder="Riwayat"
                                    value="{{ old('riwayat') }}" />
                                @error('riwayat')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Riwayat Imunisasi</legend>
                                <input type="text" name="riwayat_imunisasi" class="w-full input"
                                    placeholder="Riwayat Imunisasi" value="{{ old('riwayat_imunisasi') }}" />
                                @error('riwayat_imunisasi')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Tensi</legend>
                                <input type="number" name="tensi" class="w-full input" placeholder="Tensi"
                                    value="{{ old('tensi') }}" />
                                @error('tensi')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Berat Badan (BB)</legend>
                                <input type="number" name="bb" class="w-full input" placeholder="Berat Badan"
                                    value="{{ old('bb') }}" />
                                @error('bb')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Tinggi Badan (TB)</legend>
                                <input type="number" name="tb" class="w-full input" placeholder="Tinggi Badan"
                                    value="{{ old('tb') }}" />
                                @error('tb')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Suhu Badan</legend>
                                <input type="number" name="suhu_badan" class="w-full input" placeholder="Suhu Badan"
                                    value="{{ old('suhu_badan') }}" />
                                @error('suhu_badan')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Saturasi Oksigen</legend>
                                <input type="number" name="saturasi_oksigen" class="w-full input"
                                    placeholder="Saturasi Oksigen" value="{{ old('saturasi_oksigen') }}" />
                                @error('saturasi_oksigen')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">LILA</legend>
                                <input type="number" name="lila" class="w-full input" placeholder="LILA"
                                    value="{{ old('lila') }}" />
                                @error('lila')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">HPHT</legend>
                                <input type="date" name="hpht" class="w-full input" placeholder="HPHT"
                                    value="{{ old('hpht') }}" />
                                @error('hpht')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">GPA</legend>
                                <input type="text" name="gpa" class="w-full input" placeholder="GPA"
                                    value="{{ old('gpa') }}" />
                                @error('gpa')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Umur Kehamilan</legend>
                                <input type="number" name="umur_kehamilan" class="w-full input"
                                    placeholder="Umur Kehamilan" value="{{ old('umur_kehamilan') }}" />
                                @error('umur_kehamilan')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Lingkar Perut</legend>
                                <input type="number" name="lingkar_perut" class="w-full input"
                                    placeholder="Lingkar Perut" value="{{ old('lingkar_perut') }}" />
                                @error('lingkar_perut')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Tinggi Fundus</legend>
                                <input type="number" name="tinggi_fundus" class="w-full input"
                                    placeholder="Tinggi Fundus" value="{{ old('tinggi_fundus') }}" />
                                @error('tinggi_fundus')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Jumlah Anak</legend>
                                <input type="number" name="jumlah_anak" class="w-full input"
                                    placeholder="Jumlah Anak" value="{{ old('jumlah_anak') }}" />
                                @error('jumlah_anak')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Persalinan Terakhir</legend>
                                <select name="persalinan_terakhir" class="w-full select">
                                    <option value="">Pilih Persalinan Terakhir</option>
                                    <option value="normal"
                                        {{ old('persalinan_terakhir') == 'normal' ? 'selected' : '' }}>Normal</option>
                                    <option value="caesar"
                                        {{ old('persalinan_terakhir') == 'caesar' ? 'selected' : '' }}>Caesar</option>
                                    <option value="bantuan_alat"
                                        {{ old('persalinan_terakhir') == 'bantuan_alat' ? 'selected' : '' }}>Bantuan
                                        Alat</option>
                                </select>
                                @error('persalinan_terakhir')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">DJJ</legend>
                                <input type="number" name="djj" class="w-full input" placeholder="DJJ"
                                    value="{{ old('djj') }}" />
                                @error('djj')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Refla</legend>
                                <input type="text" name="refla" class="w-full input" placeholder="Refla"
                                    value="{{ old('refla') }}" />
                                @error('refla')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Lab</legend>
                                <input type="text" name="lab" class="w-full input" placeholder="Lab"
                                    value="{{ old('lab') }}" />
                                @error('lab')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Tanggal Melahirkan</legend>
                                <input type="date" name="tanggal_melahirkan" class="w-full input"
                                    placeholder="Tanggal Melahirkan" value="{{ old('tanggal_melahirkan') }}" />
                                @error('tanggal_melahirkan')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Tempat Persalinan</legend>
                                <input type="text" name="tempat_persalinan" class="w-full input"
                                    placeholder="Tempat Persalinan" value="{{ old('tempat_persalinan') }}" />
                                @error('tempat_persalinan')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Bantu Persalinan</legend>
                                <select name="bantu_persalinan" class="w-full select">
                                    <option value="">Pilih Bantu Persalinan</option>
                                    <option value="dokter"
                                        {{ old('bantu_persalinan') == 'dokter' ? 'selected' : '' }}>Dokter</option>
                                    <option value="bidan" {{ old('bantu_persalinan') == 'bidan' ? 'selected' : '' }}>
                                        Bidan</option>
                                </select>
                                @error('bantu_persalinan')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Besar Rahim</legend>
                                <input type="text" name="besar_rahim" class="w-full input"
                                    placeholder="Besar Rahim" value="{{ old('besar_rahim') }}" />
                                @error('besar_rahim')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Cairan Keluar</legend>
                                <input type="text" name="cairan_keluar" class="w-full input"
                                    placeholder="Cairan Keluar" value="{{ old('cairan_keluar') }}" />
                                @error('cairan_keluar')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Infeksi</legend>
                                <input type="text" name="infeksi" class="w-full input" placeholder="Infeksi"
                                    value="{{ old('infeksi') }}" />
                                @error('infeksi')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Diagnosa</legend>
                                <input type="text" name="diagnosa" class="w-full input" placeholder="Diagnosa"
                                    value="{{ old('diagnosa') }}" />
                                @error('diagnosa')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Tindakan</legend>
                                <input type="text" name="tindakan" class="w-full input" placeholder="Tindakan"
                                    value="{{ old('tindakan') }}" />
                                @error('tindakan')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Tanggal Kontrol</legend>
                                <input type="date" name="tanggal_kontrol" class="w-full input"
                                    placeholder="Tanggal Kontrol" value="{{ old('tanggal_kontrol') }}" />
                                @error('tanggal_kontrol')
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
</x-app-layout>
