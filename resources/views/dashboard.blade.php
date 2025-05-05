<x-app-layout>
    <div>
        <div class="flex flex-col gap-5 mx-auto">
            <div id="dashboard-greet" class="max-w-full p-5 bg-white rounded-sm shadow-sm">
                <h1 class="text-2xl font-extrabold text-slate-700">Selamat datang, {{ auth()->user()->name }}</h1>
            </div>
            <div id="dashboard-card" class="flex flex-row w-full overflow-hidden md:gap-8 max-sm:gap-2 max-sm:p-2">
                <div class="dashboard-card">
                    <div class="dashboard-card-content">
                        <span class="text-sm text-gray-600">Pendaftaran Pasien</span>
                        <h1 class="text-3xl font-extrabold">120</h1>
                    </div>
                    <x-image src="{{ asset('assets/images/icons/lansia.png') }}" alt="lansia-logo"
                        class="w-20 ml-auto max-sm:hidden" />
                </div>
                <div class="dashboard-card">
                    <div class="dashboard-card-content">
                        <span class="text-sm text-gray-600">Total Pemeriksaan</span>
                        <h1 class="text-3xl font-extrabold">223</h1>
                    </div>
                    <x-image src="{{ asset('assets/images/icons/check.png') }}" alt="cek_kesehatan-logo"
                        class="w-20 ml-auto max-sm:hidden" />
                </div>
                <div class="dashboard-card">
                    <div class="dashboard-card-content">
                        <span class="text-sm text-gray-600">Total Bidan</span>
                        <h1 class="text-3xl font-extrabold">22</h1>
                    </div>
                    <x-image src="{{ asset('assets/images/icons/pj.png') }}" alt="pj-logo"
                        class="w-20 ml-auto max-sm:hidden" />
                </div>
            </div>
            <div id="information" class="flex flex-col max-w-full gap-3 p-3 bg-white shadow-sm">
                <span>
                    Bidan Praktik Mandiri Puniyati A.Md Keb terletak di Dusun Kalipelang RT01/RW 07, Desa Demakan,
                    Kecamatan Mojolaban, Kabupaten Sukoharjo. Pada tahun 2017 Bidan Puniyati A.Md Keb dalam
                    mengaplikasikan ilmu kebidanan agar bermanfaat bagi masyarakat dan untuk meningkatkan kesehatan
                    masyarakat mulai mencari persyaratan yang digunakan untuk membuka lahan praktik Bidan Praktik
                    Mandiri, setelah proses yang panjang Bidan Puniyati A.Md Keb telah memiliki Izin Praktik pada tahun
                    2019 dengan dengan Nomor SIPB: 0026/SIPB/33.11/VI/2019.
                    Bidan Praktik Mandiri Puniyati A.Md Keb terdapat 5 pelayanan yang tersedia yaitu:
                </span>
                <span>
                    Bidan Praktik Mandiri Puniyati A.Md Keb terdapat 5 pelayanan yang tersedia yaitu:
                    <ol class="pl-5 list-disc">
                        <li class="list-item">Pelayanan ANC</li>
                        <li class="list-item">Pelayanan KIA</li>
                        <li class="list-item">Pelayanan Ibu Nifas</li>
                        <li class="list-item">Pelayanan KB</li>
                        <li class="list-item">Pelayanan Umum.</li>
                    </ol>
                </span>
                <span>
                    Bidan Praktik Mandiri Puniyati A.Md Keb Mojolaban memiliki jam praktik sebagai berikut:
                    <ol class="pl-5 list-disc">
                        <li class="list-item">Pagi hari jam 06.00-08.00</li>
                        <li class="list-item">Sore hari jam 17.00-19.00</li>
                    </ol>
                </span>
            </div>
            <div id="visimission" class="flex flex-row max-w-full gap-3">
                <div class="flex-1 p-3 bg-white shadow-sm">
                    <h3 class="font-semibold">Visi</h3>
                    <span>
                        Menjadi tenaga kesehatan yang mampu memanfaatkan ilmu dan keterampilan secara optimal demi
                        memberikan manfaat nyata bagi masyarakat.
                    </span>
                </div>
                <div class="flex-1 p-3 bg-white shadow-sm">
                    <h3 class="font-semibold">Misi</h3>
                    <ol class="pl-5 list-decimal">
                        <li class="list-item">Mengaplikasikan ilmu kebidanan untuk meningkatkan kesehatan ibu dan anak
                            di lingkungan
                            sekitar.</li>
                        <li class="list-item">Memberikan pelayanan kesehatan yang ramah, profesional, dan mudah diakses
                            oleh
                            masyarakat.</li>
                        <li class="list-item">Terus belajar dan mengembangkan diri untuk meningkatkan kualitas
                            pelayanan.</li>
                        <li class="list-item">Membangun hubungan yang harmonis dengan masyarakat demi terciptanya
                            lingkungan yang
                            sehat.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
