<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Nota Pembayaran Detail</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
            line-height: 1.5;
        }

        .header {
            width: 100%;
            margin-bottom: 20px;
        }

        .header-left {
            float: left;
            width: 60%;
        }

        .header-right {
            float: right;
            width: 40%;
            text-align: right;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        h1,
        h2,
        h3 {
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
        }

        h2 {
            font-size: 16px;
            font-weight: bold;
        }

        h3 {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .border-bottom {
            border-bottom: 1px solid #ddd;
        }

        .total-section {
            width: 50%;
            margin-left: auto;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            padding: 5px 0;
            border-bottom: 1px solid #ddd;
        }

        .footer {
            margin-top: 50px;
            width: 100%;
        }

        .footer-section {
            width: 45%;
            display: inline-block;
            vertical-align: top;
        }

        .signature-space {
            height: 60px;
            margin-top: 30px;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    <div class="clearfix header">
        <div class="header-left">
            <h1>Bidan Praktik Mandiri Puniyati, A.Md Keb</h1>
            <p>Dusun Kalipelang RT01/RW 07, Desa Demakan, Kecamatan Mojolaban, Kabupaten Sukoharjo.</p>
            <p>Telp: +62 821-3439-7554</p>
        </div>
        <div class="header-right">
            <h2>NOTA PELAYANAN</h2>
            <p>Id Pemeriksaan: {{ $data['Id Pemeriksaan'] ?? '-' }}</p>
            <p>Tanggal: {{ $currentDate }}</p>
        </div>
    </div>

    <!-- Data Pasien -->
    <div style="border: 1px solid #ddd; padding: 7px; margin-bottom: 20px; border-radius: 5px;">
        <h3>Data Pasien</h3>
        <table style="border: none;">
            <tr>
                <td style="border: none; width: 33%;">
                    <p style="font-weight: bold; margin: 0;">Nama Pasien</p>
                    <p style="margin: 0;">{{ $data['Nama Pasien'] ?? '-' }}</p>
                </td>
                <td style="border: none; width: 33%;">
                    <p style="font-weight: bold; margin: 0;">No. RM</p>
                    <p style="margin: 0;">{{ $data['No RM'] ?? '-' }}</p>
                </td>
                <td style="border: none; width: 33%;">
                    <p style="font-weight: bold; margin: 0;">Bidan</p>
                    <p style="margin: 0;">{{ $data['Nama Bidan'] ?? '-' }}</p>
                </td>
            </tr>
        </table>
    </div>

    <!-- Detail Pelayanan -->
    <h3>Detail Pelayanan</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Pelayanan</th>
                <th class="text-right">Harga</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>{{ $data['Pelayanan'] ?? '-' }}</td>
                <td class="text-right">Rp
                    {{ isset($data['Biaya Pelayanan']) ? number_format($data['Biaya Pelayanan'], 0, ',', '.') : '0' }}
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Detail Obat -->
    <h3>Detail Obat</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Obat</th>
                <th>Jenis</th>
                <th class="text-right">Harga Satuan</th>
                <th>Dosis</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalHargaObat = 0;
            @endphp

            @forelse (($data['Obat'] ?? []) as $key => $obat)
                @php
                    $totalHargaObat += $obat['harga_jual'] ?? 0;
                @endphp
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $obat['nama'] ?? '-' }}</td>
                    <td>{{ $obat['jenis'] ?? '-' }}</td>
                    <td class="text-right">Rp
                        {{ isset($obat['harga_jual']) ? number_format($obat['harga_jual'], 0, ',', '.') : '0' }}
                    </td>
                    <td>{{ $obat['dosis'] ?? '-' }}</td>
                    <td>{{ $obat['keterangan'] ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data obat</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Total Pembayaran -->
    <div style="border: 1px solid #ddd; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
        <div style="width: 50%; margin-left: auto;">
            <div class="total-row">
                <span style="font-weight: bold;">Total Pelayanan:</span>
                <span style="font-weight: bold;">Rp
                    {{ isset($data['Biaya Pelayanan']) ? number_format($data['Biaya Pelayanan'], 0, ',', '.') : '0' }}</span>
            </div>
            <div class="total-row">
                <span style="font-weight: bold;">Total Obat:</span>
                <span style="font-weight: bold;">Rp {{ number_format($totalHargaObat, 0, ',', '.') }}</span>
            </div>
            <div class="total-row">
                <span style="font-weight: bold;">Diskon:</span>
                <span style="font-weight: bold;">Rp 0</span>
            </div>
            <div class="total-row" style="font-size: 14px; font-weight: bold; border-bottom: none;">
                <span>Total Pembayaran:</span>
                <span>Rp {{ number_format(($data['Biaya Pelayanan'] ?? 0) + $totalHargaObat, 0, ',', '.') }}</span>
            </div>
        </div>
    </div>
</body>

</html>
