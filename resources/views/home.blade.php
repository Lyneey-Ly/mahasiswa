<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container py-1">
            <a class="navbar-brand fw-bold text-white" href="#">SIAKAD <span class="text-danger">Admin</span></a>
            <div class="ms-auto d-flex align-items-center gap-3">
                <span class="text-white-50">Admin: <strong>{{ Auth::user()->name }}</strong></span>
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-right-from-bracket"></i> Keluar</button>
                </form>
                <a href="{{ route('admin.laporan') }}" class="btn btn-info text-white btn-sm">
                    <i class="fa-solid fa-print"></i> Lihat Laporan
                </a>
            </div>
        </div>
    </nav>

    <main class="container py-5">
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm p-3 bg-white rounded-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted small fw-bold">TOTAL PENDAFTAR</span>
                            <h2 class="fw-black mb-0">{{ $totalPendaftar }}</h2>
                        </div>
                        <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-3"><i class="fa-solid fa-users"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm p-3 bg-white rounded-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted small fw-bold">MENUNGGU VERIFIKASI</span>
                            <h2 class="fw-black text-warning mb-0">{{ $menungguVerifikasi }}</h2>
                        </div>
                        <div class="bg-warning bg-opacity-10 text-warning p-3 rounded-3"><i class="fa-solid fa-hourglass-half"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm p-3 bg-white rounded-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted small fw-bold">DITERIMA (LUNAS)</span>
                            <h2 class="fw-black text-success mb-0">{{ $diterima }}</h2>
                        </div>
                        <div class="bg-success bg-opacity-10 text-success p-3 rounded-3"><i class="fa-solid fa-user-check"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">
                <h4 class="fw-bold mb-3"><i class="fa-solid fa-table-list text-danger me-2"></i>Daftar Pendaftaran</h4>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Nama</th>
                                <th>Status Pembayaran</th>
                                <th>Aksi / Bukti</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pendaftar as $mhs)
                            <tr>
                                <td>{{ $mhs->user->name ?? 'User Tidak Ditemukan' }}</td>
                                <td>
                                    @if($mhs->status_pembayaran == 'sudahdibyr')
                                        <span class="badge bg-success">Lunas</span>
                                    @elseif($mhs->status_pembayaran == 'blmdbyr')
                                        <span class="badge bg-warning">Menunggu</span>
                                    @else
                                        <span class="badge bg-secondary">Belum ada data</span>
                                    @endif
                                </td>
                                <td>
                                    @if($mhs->bukti_transfer)
                                        <a href="{{ asset('uploads/bukti_transfer/'.$mhs->bukti_transfer) }}" target="_blank" class="btn btn-sm btn-outline-primary">Lihat Bukti</a>
                                        
                                        @if($mhs->status_pembayaran == 'blmdbyr')
                                            <form action="{{ route('admin.verifikasi', $mhs->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success">Validasi Sekarang</button>
                                            </form>
                                        @endif
                                    @else
                                        <span class="text-muted small">Belum upload</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="3" class="text-center py-4">Belum ada data pendaftar.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>