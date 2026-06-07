<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pembayaran Pendaftaran Lunas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .report-card {
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            padding: 40px;
        }
        .kop-surat {
            border-bottom: 3px double #2c3e50;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .table th {
            background-color: #f1f5f9 !important;
            color: #334155;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }
        .table td {
            vertical-align: middle;
            color: #475569;
        }
        .ttd-section {
            margin-top: 50px;
            float: right;
            text-align: center;
            width: 250px;
        }
        .ttd-space {
            height: 80px;
        }
        @media print {
            body {
                background-color: #ffffff;
                padding: 0 !important;
            }
            .report-card {
                border: none;
                box-shadow: none;
                padding: 0;
            }
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>
<body class="p-4 p-md-5">

    <div class="container max-w-5xl">
        
        <div class="d-flex justify-content-between align-items-center mb-4 no-print">
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary px-4 rounded-3">
                <i class="fa-solid fa-arrow-left me-2"></i> Kembali
            </a>
            <button onclick="window.print()" class="btn btn-primary px-4 rounded-3 shadow-sm">
                <i class="fa-solid fa-print me-2"></i> Cetak Laporan Resmi
            </button>
        </div>

        <div class="report-card">
            
            <div class="kop-surat d-flex align-items-center gap-4">
                <div class="no-print d-none d-sm-block">
                    <i class="fa-solid fa-graduation-cap text-primary" style="font-size: 3.5rem;"></i>
                </div>
                <div class="flex-grow-1 text-center text-sm-start">
                    <h1 class="h3 fw-bold text-uppercase tracking-wide mb-1" style="color: #1e3a8a;">Universitas College Mandiri</h1>
                    <p class="text-muted small mb-0">
                        Jl. Kampus Utama No. 45, Gedung Rektorat Lt. 2, Bandung<br>
                        Telp: (022) 1234567 | Website: www.college-mandiri.ac.id | Email: info@college.ac.id
                    </p>
                </div>
            </div>

            <div class="text-center my-4">
                <h4 class="fw-bold text-uppercase mb-1" style="color: #1e293b; letter-spacing: 0.5px;">Laporan Pendaftar Lunas</h4>
                <p class="text-muted small">Periode: {{ date('F Y') }}</p>
            </div>

            <div class="table-responsive">
                <table class="table table-hover border align-middle mb-0">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 5%;">No</th>
                            <th class="text-start" style="width: 25%;">Nama Mahasiswa</th>
                            <th class="text-start" style="width: 25%;">Fakultas</th>
                            <th class="text-start" style="width: 25%;">Program Studi</th>
                            <th style="width: 10%;">Tgl Bayar</th>
                            <th class="text-end" style="width: 10%;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pendaftarLunas as $index => $data)
                        <tr>
                            <td class="text-center fw-semibold text-muted">{{ $index + 1 }}</td>
                            <td class="text-start fw-bold text-dark">{{ $data->user?->name ?? '-' }}</td>
                            <td class="text-start">{{ $data->DataFakultas?->namaFakultas ?? '-' }}</td>
                            <td class="text-start">
                                <span class="badge bg-light text-primary border border-primary-subtle px-2 py-1.5 font-monospace fs-7">
                                    {{ $data->DataProgramStudi?->namaProgramStudi ?? '-' }}
                                </span>
                            </td>
                            <td class="text-center text-secondary small">{{ $data->updated_at->format('d/m/Y') }}</td>
                            <td class="text-end fw-bold text-success">Rp {{ number_format($data->harga_bayar, 0, ',', '.') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted small italic">
                                <i class="fa-solid fa-folder-open d-block fs-3 mb-2 text-slate-300"></i>
                                Belum ada data pendaftar yang lunas.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($pendaftarLunas->count() > 0)
            <div class="clearfix">
                <div class="ttd-section">
                    <p class="mb-0 small text-muted">Bandung, {{ date('d F Y') }}</p>
                    <p class="fw-medium text-dark">Petugas Administrasi,</p>
                    <div class="ttd-space"></div>
                    <p class="fw-bold text-dark border-bottom pb-1 mb-0">{{ Auth::user()->name }}</p>
                    <p class="text-muted small" style="font-size: 0.75rem;">Tim Verifikator PMB</p>
                </div>
            </div>
            @endif

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>