<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Sedikit sentuhan custom untuk gradient banner */
        .hero-banner {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            border-radius: 1rem;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .hero-banner::before {
            content: "";
            position: absolute;
            top: -20%;
            right: -10%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }
        .step-box {
            transition: transform 0.2s;
        }
        .step-box:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-white bg-white shadow-sm border-bottom">
        <div class="container py-1">
            <a class="navbar-brand d-flex align-items-center gap-2 fw-bold text-dark" href="#">
                <span class="badge bg-primary p-2">
                    <i class="fa-solid fa-graduation-cap fs-5"></i>
                </span>
                <span>SIAKAD <span class="text-primary">College</span></span>
            </a>
            <div class="ms-auto d-flex align-items-center gap-3">
                <span class="text-muted d-none d-md-inline">Selamat datang, <strong>{{ Auth::user()->name }}</strong></span>
                
                <a href="{{ route('profil') }}">profile</a>

                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm fw-bold">
                        <i class="fa-solid fa-right-from-bracket"></i> Keluar
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <main class="container py-5">
        
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i> {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="hero-banner p-4 p-md-5 mb-5 shadow-sm">
            <div class="row align-items-center">
                <div class="col-lg-8 space-y-3">
                    <span class="badge bg-white text-primary mb-3 fw-bold text-uppercase px-3 py-2">
                        Penerimaan Mahasiswa Baru 2026
                    </span>
                    <h1 class="display-5 fw-black text-white">
                        Satu Langkah Lagi Menuju Masa Depanmu!
                    </h1>
                    <p class="lead text-white-50 my-3">
                        Selamat bergabung di Civitas Akademika! Silakan lengkapi berkas dan formulir pendaftaran mahasiswa baru untuk mengaktifkan akun akademikmu secara penuh.
                    </p>
                    <div class="mt-4">
                        @if(!Auth::user()->mahasiswa)
                            <a href="{{ route('pendaftaran') }}" class="btn btn-light btn-lg text-primary fw-bold px-4 py-3 shadow-sm">
                                Isi Formulir Sekarang <i class="fa-solid fa-arrow-right ms-2"></i>
                            </a>
                        @else
                            <button class="btn btn-success btn-lg fw-bold px-4 py-3 shadow-sm" disabled>
                                <i class="fa-solid fa-circle-check me-2"></i> Sudah Terdaftar
                            </button>
                        @endif
                    </div>
                </div>

                <div class="col-lg-4 d-none d-lg-flex justify-content-center">
                    <div class="rounded-circle bg-white bg-opacity-10 d-flex align-items-center justify-content-center border border-white border-opacity-25" style="width: 220px; height: 220px;">
                        <i class="fa-solid fa-user-astronaut display-1 text-white-50"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm p-4">
            <div class="card-body">
                <h4 class="card-title fw-bold text-dark mb-4 d-flex align-items-center gap-2">
                    <i class="fa-solid fa-list-check text-primary"></i> Alur Tahapan Registrasi
                </h4>
                
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 step-box h-100 bg-light">
                            <div class="d-flex align-items-start gap-3">
                                <span class="badge bg-primary bg-opacity-10 text-primary fs-5 fw-bold px-3 py-2 rounded-3">1</span>
                                <div>
                                    <h5 class="fw-bold mb-1 text-dark">Buat Akun</h5>
                                    <p class="text-muted small mb-2">Registrasi akun email & password untuk bisa masuk ke dalam sistem penerimaan.</p>
                                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill">
                                        <i class="fa-solid fa-check me-1"></i> Selesai
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 step-box h-100 bg-light">
                            <div class="d-flex align-items-start gap-3">
                                @if(!Auth::user()->mahasiswa)
                                    <span class="badge bg-primary text-white fs-5 fw-bold px-3 py-2 rounded-3">2</span>
                                @else
                                    <span class="badge bg-primary bg-opacity-10 text-primary fs-5 fw-bold px-3 py-2 rounded-3">2</span>
                                @endif
                                <div>
                                    <h5 class="fw-bold mb-1 text-dark">Lengkapi Data Diri</h5>
                                    <p class="text-muted small mb-2">Isi formulir pendaftaran mahasiswa (NIK, Alamat, Kontak, dll.) dengan data valid.</p>
                                    @if(!Auth::user()->mahasiswa)
                                        <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle rounded-pill">
                                            <i class="fa-solid fa-spinner fa-spin me-1"></i> Sedang Berjalan
                                        </span>
                                    @else
                                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill">
                                            <i class="fa-solid fa-check me-1"></i> Selesai
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 step-box h-100 bg-light">
                            <div class="d-flex align-items-start gap-3">
                                <span class="badge bg-secondary bg-opacity-10 text-secondary fs-5 fw-bold px-3 py-2 rounded-3">3</span>
                                <div>
                                    <h5 class="fw-bold mb-1 text-dark">Verifikasi Berkas</h5>
                                    <p class="text-muted small mb-2">Sistem dan tim admin akan memverifikasi berkas pendaftaran Anda untuk proses administrasi.</p>
                                    @if(!Auth::user()->mahasiswa)
                                        <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill">
                                            Belum Tersedia
                                        </span>
                                    @else
                                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill">
                                            Menunggu Verifikasi
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>