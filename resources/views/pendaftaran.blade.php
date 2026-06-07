<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .card-header-gradient {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            color: white;
        }
        .form-control:focus, .form-select:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
        }
    </style>
</head>
<body class="bg-light min-h-screen d-flex align-items-center py-5">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <div class="mb-4">
                    <a href="{{ route('beranda') }}" class="btn btn-link link-secondary text-decoration-none p-0 fw-semibold">
                        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Dashboard
                    </a>
                </div>

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-header-gradient p-4 text-center">
                        <span class="fs-1 d-block mb-2 text-white-50">
                            <i class="fa-solid fa-id-card-clip"></i>
                        </span>
                        <h2 class="fw-bold mb-1">Formulir Pendaftaran</h2>
                        <p class="mb-0 text-white-50">Lengkapi data pribadi Anda dengan benar untuk proses verifikasi berkas</p>
                    </div>

                    <div class="card-body p-4 p-md-5 bg-white">
                        
                        @if ($errors->any())
                            <div class="alert alert-danger border-0 shadow-sm alert-dismissible fade show" role="alert">
                                <h6 class="fw-bold"><i class="fa-solid fa-triangle-exclamation me-2"></i> Periksa kembali isian Anda:</h6>
                                <ul class="mb-0 ps-3 small">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('postpendaftaran') }}" method="POST">
                            @csrf

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-secondary">
                                        <i class="fa-solid fa-fingerprint text-primary me-1"></i> NIK (Nomor Induk Kependudukan)
                                    </label>
                                    <input type="text" name="nik" value="{{ old('nik') }}" class="form-control form-control-lg fs-6 rounded-3" placeholder="16 Digit NIK" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-secondary">
                                        <i class="fa-solid fa-phone text-primary me-1"></i> No. Handphone
                                    </label>
                                    <input type="text" name="no_hp" value="{{ old('no_hp') }}" class="form-control form-control-lg fs-6 rounded-3" placeholder="Contoh: 0812XXXXXXXX" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-secondary">
                                        <i class="fa-solid fa-venus-mars text-primary me-1"></i> Jenis Kelamin
                                    </label>
                                    <select name="jenis_kelamin" class="form-select form-select-lg fs-6 rounded-3" required>
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-secondary">
                                        <i class="fa-solid fa-hands-praying text-primary me-1"></i> Agama
                                    </label>
                                    <input type="text" name="agama" value="{{ old('agama') }}" class="form-control form-control-lg fs-6 rounded-3" placeholder="Contoh: Islam, Kristen, Konghucu" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-secondary">
                                        <i class="fa-solid fa-map-location-dot text-primary me-1"></i> Tempat Lahir
                                    </label>
                                    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" class="form-control form-control-lg fs-6 rounded-3" placeholder="Kota / Kabupaten Lahir" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-secondary">
                                        <i class="fa-solid fa-calendar-days text-primary me-1"></i> Tanggal Lahir
                                    </label>
                                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="form-control form-control-lg fs-6 rounded-3" required>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label fw-bold text-secondary">
                                        <i class="fa-solid fa-graduation-cap text-primary me-1"></i> Tahun Lulusan Sekolah
                                    </label>
                                    <input type="number" name="lulusan_tahun" value="{{ old('lulusan_tahun') }}" class="form-control form-control-lg fs-6 rounded-3" placeholder="Contoh: 2025" required>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label fw-bold text-secondary">
                                        <i class="fa-solid fa-house-chimney text-primary me-1"></i> Alamat Lengkap
                                    </label>
                                    <textarea name="alamat" rows="3" class="form-control fs-6 rounded-3" placeholder="Tulis alamat rumah lengkap saat ini beserta RT/RW..." required>{{ old('alamat') }}</textarea>
                                </div>
                            </div>

                            <div class="mt-5 d-grid">
                                <button type="submit" class="btn btn-primary btn-lg fw-bold py-3 rounded-3 shadow-sm">
                                    <i class="fa-solid fa-paper-plane me-2"></i> Kirim Pendaftaran
                                </button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>