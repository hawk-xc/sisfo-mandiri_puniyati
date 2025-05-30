<x-app-layout>
    <div class="p-6">
        <div class="shadow-xl card bg-base-100">
            <div class="card-body">
                <div id="head" class="flex flex-row justify-between">
                    <h2 class="mb-6 text-2xl font-bold card-title">Tambah : Data Bidan</h2>
                    <a href="{{ route('bidan.index') }}" class="btn btn-neutral">
                        <i class="ri-arrow-go-back-line"></i> Kembali
                    </a>
                </div>
                <div id="form-body">
                    <form action="{{ route('bidan.store') }}" method="post" class="flex flex-col gap-2 p-10"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        {{-- input gambar --}}
                        <div class="flex-1">
                            <legend class="text-lg fieldset-legend">Gambar</legend>
                            <input id="image-input" name="bidan_picture" type="file" class="w-full file-input"
                                accept="image/*" />
                            @error('bidan_picture')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror

                            {{-- preview gambar --}}
                            <div class="mt-4">
                                <img id="image-preview" src="#" alt="Preview Gambar"
                                    class="hidden max-w-xs rounded-lg shadow" />
                            </div>
                        </div>

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
                            {{-- input alamat --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Alamat</legend>
                                <input type="text" name="alamat" class="w-full input" placeholder="Alamat"
                                    value="{{ old('alamat') }}" />
                                @error('alamat')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>
                            {{-- input no_telp --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">No telp</legend>
                                <input type="text" name="no_telp" class="w-full input" placeholder="no_telp"
                                    value="{{ old('no_telp') }}"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
                                @error('no_telp')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>
                            {{-- input jadwal praktek --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Jadwal Praktek</legend>
                                <select name="jadwal_praktek[]" id="jadwal-praktek"
                                    class="w-full input select2-custom-height" multiple>
                                    <option value="Senin"
                                        {{ collect(old('jadwal_praktek'))->contains('Senin') ? 'selected' : '' }}>Senin
                                    </option>
                                    <option value="Selasa"
                                        {{ collect(old('jadwal_praktek'))->contains('Selasa') ? 'selected' : '' }}>
                                        Selasa</option>
                                    <option value="Rabu"
                                        {{ collect(old('jadwal_praktek'))->contains('Rabu') ? 'selected' : '' }}>Rabu
                                    </option>
                                    <option value="Kamis"
                                        {{ collect(old('jadwal_praktek'))->contains('Kamis') ? 'selected' : '' }}>Kamis
                                    </option>
                                    <option value="Jumat"
                                        {{ collect(old('jadwal_praktek'))->contains('Jumat') ? 'selected' : '' }}>Jumat
                                    </option>
                                    <option value="Sabtu"
                                        {{ collect(old('jadwal_praktek'))->contains('Sabtu') ? 'selected' : '' }}>Sabtu
                                    </option>
                                    <option value="Minggu"
                                        {{ collect(old('jadwal_praktek'))->contains('Minggu') ? 'selected' : '' }}>
                                        Minggu</option>
                                </select>
                                @error('jadwal_praktek')
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
    @push('scripts')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#jadwal-praktek').select2({
                    placeholder: "Pilih hari praktek",
                    allowClear: true
                });
            });

            document.addEventListener('DOMContentLoaded', function() {
                const input = document.getElementById('image-input');
                const preview = document.getElementById('image-preview');

                input.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            preview.src = e.target.result;
                            preview.classList.remove('hidden');
                        }

                        reader.readAsDataURL(file);
                    } else {
                        preview.src = '#';
                        preview.classList.add('hidden');
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
