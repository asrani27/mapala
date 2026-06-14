<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Kegiatan</title>
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
        .filter-info {
            margin-bottom: 20px;
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
        <h1>LAPORAN KEGIATAN MAPALA</h1>
    </div>

    @if($mulai || $sampai)
    <div class="filter-info">
        <strong>Filter Tanggal:</strong>
        @if($mulai && $sampai)
            {{ \Carbon\Carbon::parse($mulai)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($sampai)->format('d/m/Y') }}
        @elseif($mulai)
            Dari: {{ \Carbon\Carbon::parse($mulai)->format('d/m/Y') }}
        @elseif($sampai)
            Sampai: {{ \Carbon\Carbon::parse($sampai)->format('d/m/Y') }}
        @endif
    </div>
    @endif

    <div class="print-date">Dicetak pada: {{ now()->format('d/m/Y H:i') }}</div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%">No</th>
                <th style="width: 20%">Judul</th>
                <th style="width: 12%">Tanggal</th>
                <th style="width: 18%">Lokasi</th>
                <th style="width: 15%">Penanggung Jawab</th>
                <th style="width: 20%">Deskripsi</th>
                <th style="width: 10%">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kegiatan as $key => $k)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $k->judul }}</td>
                <td>{{ $k->tanggal->format('d/m/Y') }}</td>
                <td>{{ $k->lokasi }}</td>
                <td>{{ $k->penanggung_jawab }}</td>
                <td>{{ Str::limit($k->deskripsi, 50) }}</td>
                <td>{{ $k->status }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center;">Tidak ada data kegiatan</td>
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
