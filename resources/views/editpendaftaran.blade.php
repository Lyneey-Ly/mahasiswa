<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pendaftaran</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .card-header-gradient {
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
            color: white;
        }
    </style>
</head>
<body class="bg-light py-5">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <div class="mb-4">
                    <a href="{{ route('profil') }}" class="btn btn-link link-secondary text-decoration-none p-0 fw-semibold">
                        <i class="fa-solid fa-arrow-left me-1"></i> Batal, Kembali ke Profil
                    </a>
                </div>

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-header-gradient p-4 text-center">
                        <span class="fs-1 d-block mb-2 text-white">
                            <i class="fa-solid fa-user-gear"></i>
                        </span>
                        <h2 class="fw-bold mb-1">Edit Data Diri</h2>
                        <p class="mb-0 text-white-50">Perbarui data Anda di bawah ini dengan benar</p>
                    </div>

                    <div class="card-body p-4 p-md-5 bg-white">
                        
                        @if ($errors->any())
                            <div class="alert alert-danger border-0 shadow-sm alert-dismissible fade show" role="alert">
                                <ul class="mb-0 ps-3 small">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('profil.update') }}" method="POST">
                            @csrf
                            @method('PUT') <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-secondary">NIK</label>
                                    <input type="text" name="nik" value="{{ old('nik', $mahasiswa->nik) }}" class="form-control form-control-lg fs-6 rounded-3" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-secondary">No. Handphone</label>
                                    <input type="text" name="no_hp" value="{{ old('no_hp', $mahasiswa->no_hp) }}" class="form-control form-control-lg fs-6 rounded-3" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-secondary">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-select form-select-lg fs-6 rounded-3" required>
                                        <option value="L" {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="P" {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-secondary">Agama</label>
                                    <input type="text" name="agama" value="{{ old('agama', $mahasiswa->agama) }}" class="form-control form-control-lg fs-6 rounded-3" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-secondary">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $mahasiswa->tempat_lahir) }}" class="form-control form-control-lg fs-6 rounded-3" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-secondary">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $mahasiswa->tanggal_lahir) }}" class="form-control form-control-lg fs-6 rounded-3" required>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label fw-bold text-secondary">Tahun Lulusan Sekolah</label>
                                    <input type="number" name="lulusan_tahun" value="{{ old('lulusan_tahun', $mahasiswa->lulusan_tahun) }}" class="form-control form-control-lg fs-6 rounded-3" required>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label fw-bold text-secondary">Alamat Lengkap</label>
                                    <textarea name="alamat" rows="3" class="form-control fs-6 rounded-3" required>{{ old('alamat', $mahasiswa->alamat) }}</textarea>
                                </div>
                            </div>

                            <div class="mt-5 d-grid">
                                <button type="submit" class="btn btn-warning btn-lg fw-bold py-3 rounded-3 text-white shadow-sm">
                                    <i class="fa-solid fa-floppy-disk me-2"></i> Simpan Perubahan
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