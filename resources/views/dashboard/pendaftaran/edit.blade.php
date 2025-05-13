<x-app-layout>
    <div class="p-6">
        <div class="shadow-xl card bg-base-100">
            <div class="card-body">
                <div id="head" class="flex flex-row justify-between">
                    <h2 class="mb-6 text-2xl font-bold card-title">Edit : Data Pendaftaran</h2>
                    <a href="{{ route('pendaftaran.index') }}" class="btn btn-neutral">
                        <i class="ri-arrow-go-back-line"></i> Kembali
                    </a>
                </div>

                <div id="form-body">
                    <form action="{{ route('pendaftaran.update', $data->id) }}" method="post"
                        class="flex flex-col gap-2 p-10">
                        @csrf
                        @method('PUT')

                        <div class="flex-1">
                            {{-- input data RM (diubah menjadi input text disabled) --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">No RM</legend>
                                <input type="text" name="no_rm" id="no_rm" class="w-full bg-gray-100 input"
                                    value="{{ $data->no_rm }}" readonly>
                                @error('no_rm')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            {{-- input nama pasien --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Nama Pasien</legend>
                                <input type="text" name="nama" id="nama" class="w-full input"
                                    placeholder="Nama Pasien" value="{{ $data->pasien->nama }}" readonly>
                                @error('nama')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            {{-- input alamat pasien --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Alamat Pasien</legend>
                                <input type="text" name="alamat" id="alamat" class="w-full input"
                                    placeholder="Alamat Pasien" value="{{ $data->pasien->alamat }}" readonly>
                                @error('alamat')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            {{-- input NIK --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">NIK</legend>
                                <input type="text" name="nik" id="nik" class="w-full input"
                                    placeholder="NIK" value="{{ $data->pasien->nik }}" readonly>
                                @error('nik')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            {{-- input Nama KK --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Nama KK</legend>
                                <input type="text" name="nama_kk" id="nama_kk" class="w-full input"
                                    placeholder="Nama KK" value="{{ $data->pasien->nama_kk }}" readonly>
                                @error('nama_kk')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            {{-- input tempat lahir --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Tempat Lahir</legend>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="w-full input"
                                    placeholder="Tempat Lahir" value="{{ $data->pasien->tempat_lahir }}" readonly>
                                @error('tempat_lahir')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            {{-- input tanggal lahir --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Tanggal Lahir</legend>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="w-full input"
                                    placeholder="Tanggal Lahir" value="{{ $data->pasien->tanggal_lahir }}" readonly>
                                @error('tanggal_lahir')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            {{-- input agama --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Agama</legend>
                                <input type="text" name="agama" id="agama" class="w-full input"
                                    value="{{ ucfirst($data->pasien->agama) }}" readonly>
                                @error('agama')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            {{-- input Pendidikan --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Pendidikan</legend>
                                <input type="text" name="pendidikan" id="pendidikan" class="w-full input"
                                    value="{{ ucfirst($data->pasien->pendidikan) }}" readonly>
                                @error('pendidikan')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            {{-- input pekerjaan --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Pekerjaan</legend>
                                <input type="text" name="pekerjaan" id="pekerjaan" class="w-full input"
                                    value="{{ ucfirst($data->pasien->pekerjaan) }}" readonly>
                                @error('pekerjaan')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            {{-- input penanggung jawab --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Penanggung Jawab</legend>
                                <input type="text" name="penanggung_jawab" id="penanggung_jawab"
                                    class="w-full input" placeholder="Penanggung Jawab"
                                    value="{{ $data->pasien->penanggung_jawab }}" readonly>
                                @error('penanggung_jawab')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            {{-- input golda --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Golongan Darah</legend>
                                <input type="text" name="golda" id="golda" class="w-full input"
                                    value="{{ $data->pasien->golda }}" readonly>
                                @error('golda')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            {{-- input no_telp --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">No Telp</legend>
                                <input type="text" id="no_telp" name="no_telp" class="w-full input"
                                    placeholder="No Telp" value="{{ $data->pasien->no_telp }}" readonly>
                                @error('no_telp')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            {{-- input tanggal pendaftaran --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Tanggal Pendaftaran</legend>
                                <input type="date" name="tanggal" class="w-full input"
                                    placeholder="tanggal Pasien" value="{{ old('tanggal', $data->tanggal) }}">
                                @error('tanggal')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>

                            {{-- input jenis status --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Status</legend>
                                <select name="status" class="w-full select"
                                    disabled={{ $data->status === 'selesai' }}>
                                    <option value="" disabled>Pilih Status Pendaftaran</option>
                                    <option value="menunggu"
                                        {{ old('status', $data->status) == 'menunggu' ? 'selected' : '' }}>
                                        Menunggu
                                    </option>
                                    <option value="selesai"
                                        {{ old('status', $data->status) == 'selesai' ? 'selected' : '' }}>
                                        Selesai
                                    </option>
                                </select>
                                @error('status')
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
