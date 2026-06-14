<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Keuangan</title>
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
        .summary {
            margin-top: 20px;
            padding: 15px;
            background-color: #f5f5f5;
            border: 1px solid #333;
        }
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }
        .summary-row:last-child {
            margin-bottom: 0;
        }
        .summary-label {
            font-weight: bold;
        }
        .positive {
            color: green;
        }
        .negative {
            color: red;
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
        <h1>LAPORAN KEUANGAN MAPALA</h1>
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
                <th style="width: 15%">Tanggal</th>
                <th style="width: 45%">Keterangan</th>
                <th style="width: 17%">Debit (Rp)</th>
                <th style="width: 18%">Kredit (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @forelse($keuangan as $key => $k)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ \Carbon\Carbon::parse($k->tanggal)->format('d/m/Y') }}</td>
                <td>{{ $k->keterangan }}</td>
                <td style="text-align: right;">{{ number_format($k->debit, 0, ',', '.') }}</td>
                <td style="text-align: right;">{{ number_format($k->kredit, 0, ',', '.') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center;">Tidak ada data keuangan</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="summary">
        <div class="summary-row">
            <span class="summary-label">Total Debit:</span>
            <span class="positive">Rp {{ number_format($totalDebit, 0, ',', '.') }}</span>
        </div>
        <div class="summary-row">
            <span class="summary-label">Total Kredit:</span>
            <span class="negative">Rp {{ number_format($totalKredit, 0, ',', '.') }}</span>
        </div>
        <div class="summary-row" style="border-top: 1px solid #333; padding-top: 10px; margin-top: 10px;">
            <span class="summary-label">Saldo Akhir:</span>
            <span class="{{ $saldoAkhir >= 0 ? 'positive' : 'negative' }}">Rp {{ number_format($saldoAkhir, 0, ',', '.') }}</span>
        </div>
    </div>

    <div class="footer">
        Banjarmasin, {{ now()->format('d F Y') }} <br />
        Mengetahui,<br />
        Bendahara
    </div>
</body>
</html>
