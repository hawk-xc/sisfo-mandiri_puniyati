<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ $fileName }}</title>
    <style>
        /* Gunakan font serif yang tersedia secara universal */
        body {
            font-family: "Times New Roman", Times, serif;
            margin: 0;
            padding: 20px;
            color: #000;
        }

        /* Container utama untuk memusatkan konten */
        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        /* Header dengan logo dan teks */
        .header-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }

        .header-content {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 10px;
            width: 100%;
        }

        .logo-container {
            flex-shrink: 0;
            position: absolute;
            left: 13rem;
            top: 1rem;
        }

        .text-content {
            flex-grow: 1;
            margin-left: 1rem;
        }

        .header-title {
            margin: 0;
            font-size: 14pt;
            font-weight: bold;
            text-align: center;
        }

        .header-info {
            margin: 3px 0;
            font-size: 9pt;
            text-align: center;
        }

        .report-title {
            text-align: center;
            font-weight: bold;
            font-size: 12pt;
            margin: 15px 0;
            padding-top: 10px;
            border-top: 1px solid #000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 7pt;
            text-align: left;
            border: 1px solid #000;
            /* Garis lebih tegas */
            margin-top: 10px;
        }

        thead {
            background-color: #f0f0f0;
            /* Warna lebih netral */
            color: #000;
            text-transform: uppercase;
            border-bottom: 2px solid #000;
            /* Garis lebih tebal untuk header */
        }

        th,
        td {
            padding: 4px 8px;
            /* Padding lebih ketat */
            border-right: 1px solid #000;
            white-space: nowrap;
        }

        th:last-child,
        td:last-child {
            border-right: none;
        }

        th.no-column,
        td.no-column {
            width: 30px;
            /* Lebih sempit */
            padding: 4px 2px;
            text-align: center;
        }

        tbody tr {
            background-color: white;
            border-bottom: 1px solid #000;
        }

        tbody tr:last-child {
            border-bottom: none;
        }

        tbody td {
            color: #000;
            font-weight: normal;
            /* Tidak perlu bold untuk isi tabel */
        }

        .font-bold {
            font-weight: bold;
        }

        .empty-data {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 10px 0;
            font-style: italic;
        }

        /* Tambahan untuk tampilan yang lebih rapi */
        @page {
            margin: 1cm;
            size: A4 landscape;
        }
    </style>
</head>

<body>
    <div class="header-wrapper">
        <div class="header-content">
            <div class="logo-container">
                @php
                    $imagePath = public_path('assets/images/bidan_delima_logo.png');
                    $imageData = file_get_contents($imagePath);
                    $base64 = 'data:image/png;base64,' . base64_encode($imageData);
                @endphp
                <img src="{{ $base64 }}" alt="logo" style="height: 70px;">
            </div>
            <div class="text-content">
                <h1 class="header-title">BIDAN PRAKTIK MANDIRI PUNIYATI A.Md Keb</h1>
                <p class="header-info">Nomor SIPB: 0026/SIPB/33.11/VI/2019</p>
                <p class="header-info">Dusun Kalipelang, RT 01/RW 07, Desa Demakan, Kecamatan Mojolaban, Kabupaten
                    Sukoharjo</p>
            </div>
        </div>

        <div class="report-title">
            LAPORAN DATA PASIEN
        </div>

        @if ($dateRange)
            <p class="header-info">Rentang Tanggal: {{ $dateRange }}</p>
        @endif
        <p class="header-info">Tanggal Export: {{ $currentDate }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th class="no-column">No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Agama</th>
                <th>Pendidikan</th>
                <th>Pekerjaan</th>
                <th>Penanggung Jawab</th>
                <th>Golongan Darah</th>
                <th>No Telp</th>
                <th>Ditambahkan</th>
            </tr>
        </thead>
        <tbody>
            @php $counter = 0; @endphp
            @forelse ($data as $item)
                @php $counter++; @endphp
                <tr>
                    <td class="no-column">{{ $counter }}</td>
                    <td>{{ $item['NIK'] ?? '-' }}</td>
                    <td>{{ $item['Nama'] ?? '-' }}</td>
                    <td>{{ $item['Tempat Lahir'] ?? '-' }}</td>
                    <td>{{ $item['Tanggal Lahir'] ?? '-' }}</td>
                    <td>{{ $item['Alamat'] ?? '-' }}</td>
                    <td>{{ $item['Agama'] ?? '-' }}</td>
                    <td>{{ $item['Pendidikan'] ?? '-' }}</td>
                    <td>{{ $item['Pekerjaan'] ?? '-' }}</td>
                    <td>{{ $item['Penanggung Jawab'] ?? '-' }}</td>
                    <td>{{ $item['Golongan Darah'] ?? '-' }}</td>
                    <td>{{ $item['No Telp'] ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->created_at ?? '')->format('d/m/Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="12">
                        <div class="empty-data">
                            <span>Data Kosong!</span>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
