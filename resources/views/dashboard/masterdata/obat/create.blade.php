<x-app-layout>
    <div class="p-6">
        <div class="shadow-xl card bg-base-100">
            <div class="card-body">
                <div id="head" class="flex flex-row justify-between">
                    <h2 class="mb-6 text-2xl font-bold card-title">Tambah : Data Obat</h2>
                    <a href="{{ route('obat.index') }}" class="btn btn-neutral">
                        <i class="ri-arrow-go-back-line"></i> Kembali
                    </a>
                </div>
                <div id="form-body">
                    <form action="{{ route('obat.store') }}" method="post" class="flex flex-col gap-2 p-10">
                        @csrf
                        @method('POST')

                        <div class="flex-1">
                            {{-- input nama obat --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Nama Obat</legend>
                                <input type="text" name="nama" class="w-full input" placeholder="Nama Obat"
                                    value="{{ old('nama') }}" />
                                @error('nama')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>
                            {{-- input jenis obat --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Jenis Obat</legend>
                                <select name="jenis" class="w-full select">
                                    <option value="" disabled selected>Pilih Jenis Obat</option>
                                    <option value="tablet" {{ old('jenis') == 'tablet' ? 'selected' : '' }}>Tablet
                                    </option>
                                    <option value="sirup" {{ old('jenis') == 'sirup' ? 'selected' : '' }}>Sirup
                                    </option>
                                    <option value="kapsul" {{ old('jenis') == 'kapsul' ? 'selected' : '' }}>Kapsul
                                    </option>
                                    <option value="salep" {{ old('jenis') == 'salep' ? 'selected' : '' }}>Salep
                                    </option>
                                    <option value="injeksi" {{ old('jenis') == 'injeksi' ? 'selected' : '' }}>Injeksi
                                    </option>
                                    <option value="suppositoria" {{ old('jenis') == 'suppositoria' ? 'selected' : '' }}>
                                        Suppositoria</option>
                                </select>
                                @error('jenis')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>
                            {{-- input stok --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Jumlah Stok Obat</legend>
                                <input type="number" name="stok" class="w-full input" placeholder="Stok Obat"
                                    value="{{ old('stok') }}" />
                                @error('stok')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>
                            {{-- input Harga Beli --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Harga Beli</legend>

                                <label class="w-full input">
                                    <input type="text" name="harga_beli" id="harga_beli"
                                        value="{{ old('harga_beli') }}" class="grow"
                                        placeholder="Masukkan harga_beli dalam Rupiah" />
                                </label>

                                @error('harga_beli')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Harga Jual</legend>

                                <label class="w-full input">
                                    <input type="text" name="harga_jual" id="harga_jual"
                                        value="{{ old('harga_jual') }}" class="grow"
                                        placeholder="Masukkan harga_jual dalam Rupiah" />
                                </label>

                                @error('harga_jual')
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
    {{-- @push('script') --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hargaBeliInput = document.getElementById('harga_beli');
            const hargaJualInput = document.getElementById('harga_jual');

            function formatRupiah(angka, prefix = 'Rp ') {
                let number_string = angka.replace(/[^,\d]/g, '').toString();
                let split = number_string.split(',');
                let sisa = split[0].length % 3;
                let rupiah = split[0].substr(0, sisa);
                let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    let separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix + rupiah;
            }

            hargaBeliInput.addEventListener('input', function(e) {
                const rawValue = e.target.value.replace(/[^,\d]/g, '');
                e.target.value = formatRupiah(rawValue, 'Rp ');
            });

            hargaJualInput.addEventListener('input', function(e) {
                const rawValue = e.target.value.replace(/[^,\d]/g, '');
                e.target.value = formatRupiah(rawValue, 'Rp ');
            });

            // Remove 'Rp ' before submitting form
            const formHargaBeli = hargaBeliInput.closest('form');
            if (formHargaBeli) {
                formHargaBeli.addEventListener('submit', function() {
                    hargaBeliInput.value = hargaBeliInput.value.replace(/[^,\d]/g, '');
                });
            }

            const formHargaJual = hargaJualInput.closest('form');
            if (formHargaJual) {
                formHargaJual.addEventListener('submit', function() {
                    hargaJualInput.value = hargaJualInput.value.replace(/[^,\d]/g, '');
                });
            }
        });
    </script>
    {{-- @endpush --}}
</x-app-layout>
