<x-app-layout>
    <div class="p-6">
        <div class="shadow-xl card bg-base-100">
            <div class="card-body">
                <div id="head" class="flex flex-row justify-between">
                    <h2 class="mb-6 text-2xl font-bold card-title">Tambah : Data Pelayanan</h2>
                    <a href="{{ route('pelayanan.index') }}" class="btn btn-neutral">
                        <i class="ri-arrow-go-back-line"></i> Kembali
                    </a>
                </div>
                <div id="form-body">
                    <form action="{{ route('pelayanan.store') }}" method="post" class="flex flex-col gap-2 p-10">
                        @csrf
                        @method('POST')

                        <div class="flex-1">
                            {{-- input nama pelayanan --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Nama Pelayanan</legend>
                                <select name="nama_pelayanan" class="w-full select">
                                    <option value="" disabled selected>Pilih Nama Pelayanan</option>
                                    <option value="anc" {{ old('nama') == 'anc' ? 'selected' : '' }}>ANC</option>
                                    <option value="kia" {{ old('nama') == 'kia' ? 'selected' : '' }}>KIA</option>
                                    <option value="ibu nifas" {{ old('nama') == 'ibu nifas' ? 'selected' : '' }}>Ibu
                                        Nifas</option>
                                    <option value="kb" {{ old('nama') == 'kb' ? 'selected' : '' }}>KB</option>
                                    <option value="umum" {{ old('nama') == 'umum' ? 'selected' : '' }}>Umum</option>
                                </select>
                                @error('nama')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </fieldset>
                            {{-- input biaya --}}
                            <fieldset class="fieldset">
                                <legend class="text-lg fieldset-legend">Biaya</legend>

                                <label class="w-full input">
                                    <input type="text" name="biaya" id="biaya" value="{{ old('biaya') }}"
                                        class="grow" placeholder="Masukkan biaya dalam Rupiah" />
                                </label>

                                @error('biaya')
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
            const biayaInput = document.getElementById('biaya');

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

            biayaInput.addEventListener('input', function(e) {
                const rawValue = e.target.value.replace(/[^,\d]/g, '');
                e.target.value = formatRupiah(rawValue, 'Rp ');
            });

            // Remove 'Rp ' before submitting form
            const form = biayaInput.closest('form');
            if (form) {
                form.addEventListener('submit', function() {
                    biayaInput.value = biayaInput.value.replace(/[^,\d]/g, '');
                });
            }
        });
    </script>
    {{-- @endpush --}}
</x-app-layout>
