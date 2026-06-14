<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Anggota</title>
    <style>
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 10px;
            padding-bottom: 2px;
        }
        .header-content {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-bottom: 10px;
        }
        .header img {
            height: 60px;
            width: auto;
        }
        .header h1 {
            font-size: 18px;
            margin: 0 0 5px 0;
            color: #173124;
        }
        .header p {
            margin: 0;
            font-size: 11px;
            color: #666;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #173124;
            color: white;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f5f5f5;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 11px;
            color: #666;
        }
        .print-date {
            text-align: right;
            font-size: 10px;
            color: #999;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <table>
            <tr>
                <td style="text-align: left; width: 10%;border:0px;">
                    <img src="{{ public_path('logo/mapala.jpeg') }}" alt="Logo MAPALA">
                </td>
                <td style="text-align: center;border:0px;">
                    <div>
                        <h1>MANAJEMEN IWAPALAMIKA <br />BANJARMASIN</h1>
                        <p>Jl Pangeran Hidayatullah (Banua Anyar) <br />
                            Kalimantan Selatan</p>
                    </div>
                </td>
                <td style="text-align: left; width: 10%;border:0px;">
                </td>
            </tr>
        </table>
        <hr>
        <h1>LAPORAN ANGGOTA MAPALA</h1>
    </div>

    <div class="print-date">Dicetak pada: {{ now()->format('d/m/Y H:i') }}</div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%">No</th>
                <th style="width: 25%">Nama</th>
                <th style="width: 15%">NIM</th>
                <th style="width: 15%">Jurusan</th>
                <th style="width: 15%">Telepon</th>
                <th style="width: 25%">Alamat</th>
            </tr>
        </thead>
        <tbody>
            @forelse($anggota as $key => $a)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $a->nama }}</td>
                <td>{{ $a->nim }}</td>
                <td>{{ $a->jurusan }}</td>
                <td>{{ $a->telp }}</td>
                <td>{{ Str::limit($a->alamat, 30) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center;">Tidak ada data anggota</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Banjarmasin, {{ now()->format('d F Y') }} <br />
        Mengetahui,<br />
        Pengurus
    </div>
</body>
</html>
