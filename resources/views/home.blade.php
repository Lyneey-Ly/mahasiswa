<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD - Admin Panel</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">

    <!-- NAVBAR ADMIN -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container py-1">
            <a class="navbar-brand d-flex align-items-center gap-2 fw-bold text-white" href="#">
                <span class="badge bg-danger p-2">
                    <i class="fa-solid fa-user-shield fs-5"></i>
                </span>
                <span>SIAKAD <span class="text-danger">Admin</span></span>
            </a>
            <div class="ms-auto d-flex align-items-center gap-3">
                <span class="text-white-50 d-none d-md-inline">Administrator: <strong>{{ Auth::user()->name }}</strong></span>
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm fw-bold">
                        <i class="fa-solid fa-right-from-bracket"></i> Keluar
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="container py-5">
        <!-- Toast Notifikasi Login -->
        @if (session('status'))
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                <i class="fa-solid fa-bullhorn me-2"></i> {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row g-4 mb-5">
            <!-- Card Stat 1 -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm p-3 bg-white rounded-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted d-block small fw-bold text-uppercase">Total Pendaftar</span>
                            <h2 class="fw-black text-dark mb-0 mt-1">1,240</h2>
                        </div>
                        <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-3 fs-3">
                            <i class="fa-solid fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card Stat 2 -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm p-3 bg-white rounded-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted d-block small fw-bold text-uppercase">Menunggu Verifikasi</span>
                            <h2 class="fw-black text-warning mb-0 mt-1">84</h2>
                        </div>
                        <div class="bg-warning bg-opacity-10 text-warning p-3 rounded-3 fs-3">
                            <i class="fa-solid fa-hourglass-half"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card Stat 3 -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm p-3 bg-white rounded-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted d-block small fw-bold text-uppercase">Diterima</span>
                            <h2 class="fw-black text-success mb-0 mt-1">1,156</h2>
                        </div>
                        <div class="bg-success bg-opacity-10 text-success p-3 rounded-3 fs-3">
                            <i class="fa-solid fa-user-check"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PANEL UTAMA ADMIN -->
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">
                <h4 class="fw-bold mb-3 text-dark"><i class="fa-solid fa-table-list text-danger me-2"></i>Daftar Pendaftaran Mahasiswa Baru</h4>
                <p class="text-muted">Gunakan panel ini untuk memvalidasi berkas, mengubah status kelulusan, dan memantau akun mahasiswa baru.</p>
                <hr>
                <div class="alert alert-light border text-center py-4" role="alert">
                    <i class="fa-solid fa-circle-info fs-3 text-muted mb-2 d-block"></i>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>