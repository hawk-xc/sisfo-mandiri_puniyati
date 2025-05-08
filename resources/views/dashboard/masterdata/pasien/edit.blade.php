<x-app-layout>
    <div class="p-6">
        <div class="shadow-xl card bg-base-100">
            <div class="card-body">
                <div id="head" class="flex flex-row justify-between">
                    <h2 class="mb-6 text-2xl font-bold card-title">Edit : Data Pasien</h2>
                    <a href="{{ route('pasien.index') }}" class="btn btn-neutral">
                        <i class="ri-arrow-go-back-line"></i> Kembali
                    </a>
                </div>
                <div id="form-body">
                    <form action="{{ route('pasien.update', $data->id) }}" method="post"
                        class="flex flex-col gap-2 p-10">
                        @csrf
                        @method('PUT')

                        <div class="flex-1">
                            <div role="alert" class="my-2 alert">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    class="w-6 h-6 stroke-info shrink-0">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>No Rekam Medis akan dibuat secara otomatis</span>
                            </div>
                            {{-- input nik --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">NIK</legend>
                                <input type="text" name="nik" class="w-full input" placeholder="NIK"
                                    value="{{ old('nik', $data->nik) }}" />
                                @error('nik')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>
                            {{-- input nama_kk --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Nama KK</legend>
                                <input type="text" name="nama_kk" class="w-full input" placeholder="Nama KK"
                                    value="{{ old('nama_kk', $data->nama_kk) }}" />
                                @error('nama_kk')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>
                            {{-- input nama --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Nama</legend>
                                <input type="text" name="nama" class="w-full input" placeholder="Nama"
                                    value="{{ old('nama', $data->nama) }}" />
                                @error('nama')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>
                            {{-- input alamat --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Alamat</legend>
                                <input type="text" name="alamat" class="w-full input" placeholder="alamat"
                                    value="{{ old('alamat', $data->alamat) }}" />
                                @error('alamat')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>
                            {{-- input tempat_lahir --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Tempat Lahir</legend>
                                <input type="text" name="tempat_lahir" class="w-full input"
                                    placeholder="Tempat Lahir"
                                    value="{{ old('tempat_lahir', $data->tempat_lahir) }}" />
                                @error('tempat_lahir')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>
                            {{-- input tanggal_lahir --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Tanggal Lahir</legend>
                                <input type="date" name="tanggal_lahir" class="w-full input"
                                    value="{{ old('tanggal_lahir', $data->tanggal_lahir) }}" />
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
                                            {{ old('agama', $data->agama) == $agama ? 'selected' : '' }}>
                                            {{ ucfirst($agama) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('agama')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>
                            {{-- input pendidikan --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Pendidikan</legend>
                                <select name="pendidikan" class="w-full select">
                                    <option value="">Pilih Pendidikan</option>
                                    @foreach (['belum sekolah', 'sd', 'smp/sltp', 'sma/slta', 'diploma i/ii/iii', 's1/s2/s3', 'lain-lain'] as $pendidikan)
                                        <option value="{{ $pendidikan }}"
                                            {{ old('pendidikan', $data->pendidikan) == $pendidikan ? 'selected' : '' }}>
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
                                <select name="pekerjaan" class="w-full select">
                                    <option value="">Pilih Pekerjaan</option>
                                    @foreach (['wiraswasta', 'pns', 'ibu rumah tangga', 'pelajar', 'mahasiswa', 'petani', 'pedagang', 'tidak bekerja'] as $pekerjaan)
                                        <option value="{{ $pekerjaan }}"
                                            {{ old('pekerjaan', $data->pekerjaan) == $pekerjaan ? 'selected' : '' }}>
                                            {{ ucfirst($pekerjaan) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('pekerjaan')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>
                            {{-- input penanggung_jawab --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Penanggung Jawab</legend>
                                <input type="text" name="penanggung_jawab" class="w-full input"
                                    placeholder="Penanggung Jawab"
                                    value="{{ old('penanggung_jawab', $data->penanggung_jawab) }}" />
                                @error('penanggung_jawab')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>
                            {{-- input golda --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Golongan Darah</legend>
                                <select name="golda" class="w-full select">
                                    <option value="">Pilih Golongan Darah</option>
                                    @foreach (['A', 'B', 'AB', 'O'] as $golda)
                                        <option value="{{ $golda }}"
                                            {{ old('golda', $data->golda) == $golda ? 'selected' : '' }}>
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
                                <input type="text" name="no_telp" class="w-full input" placeholder="No Telp"
                                    value="{{ old('no_telp', $data->no_telp) }}" />
                                @error('no_telp')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="flex flex-row justify-end mt-10">
                            <button type="submit" class="btn btn-primary">
                                <i class="ri-save-line"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('styles')
        <style>
            /* Atur tinggi elemen hasil Select2 */
            .select2-container--default .select2-selection--multiple {
                padding: 0.5rem;
                border-radius: 0.5rem;
                border: 1px solid #d1d5db;
            }

            /* Ukuran teks dan chip */
            .select2-container--default .select2-selection--multiple .select2-selection__choice {
                font-size: 1rem;
                padding: 0.25rem 0.5rem;
            }
        </style>
    @endpush
</x-app-layout>
