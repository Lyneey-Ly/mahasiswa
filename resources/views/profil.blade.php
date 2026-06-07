<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light py-5">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <a href="{{ route('beranda') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="fa-solid fa-house me-1"></i> Dashboard
                    </a>
                    <span class="badge bg-success-subtle text-success border border-success-subtle py-2 px-3 rounded-pill">
                        <i class="fa-solid fa-circle-check me-1"></i> Data Terdaftar
                    </span>
                </div>

                @if (session('status'))
                    <div class="alert alert-success border-0 shadow-sm mb-4" role="alert">
                        <i class="fa-solid fa-circle-check me-2"></i> {{ session('status') }}
                    </div>
                @endif

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                    <div class="bg-primary p-4 text-white d-flex align-items-center gap-4">
                        <div class="rounded-circle bg-white d-flex align-items-center justify-content-center text-primary shadow" style="width: 80px; height: 80px; min-width: 80px;">
                            <i class="fa-solid fa-user-tie fs-1"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-1">{{ $user->name }}</h3>
                            <p class="mb-0 text-white-50"><i class="fa-regular fa-envelope me-1"></i> {{ $user->email }}</p>
                        </div>
                    </div>

                    <div class="card-body p-4 p-md-5">
                        <h5 class="fw-bold text-dark border-bottom pb-2 mb-4">
                            <i class="fa-solid fa-id-card text-primary me-2"></i> Data Identitas Diri
                        </h5>

                        <div class="row g-4">
                            <div class="col-md-6 border-bottom pb-2">
                                <span class="text-muted d-block small">Nomor Induk Kependudukan (NIK)</span>
                                <strong class="text-dark fs-5">{{ $user->mahasiswa->nik }}</strong>
                            </div>

                            <div class="col-md-6 border-bottom pb-2">
                                <span class="text-muted d-block small">No. Handphone</span>
                                <strong class="text-dark fs-5">{{ $user->mahasiswa->no_hp }}</strong>
                            </div>

                            <div class="col-md-6 border-bottom pb-2">
                                <span class="text-muted d-block small">Jenis Kelamin</span>
                                <strong class="text-dark fs-5">
                                    {{ $user->mahasiswa->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}
                                </strong>
                            </div>

                            <div class="col-md-6 border-bottom pb-2">
                                <span class="text-muted d-block small">Agama</span>
                                <strong class="text-dark fs-5">{{ $user->mahasiswa->agama }}</strong>
                            </div>

                            <div class="col-md-6 border-bottom pb-2">
                                <span class="text-muted d-block small">Tempat, Tanggal Lahir</span>
                                <strong class="text-dark fs-5">
                                    {{ $user->mahasiswa->tempat_lahir }}, {{ \Carbon\Carbon::parse($user->mahasiswa->tanggal_lahir)->translatedFormat('d F Y') }}
                                </strong>
                            </div>

                            <div class="col-md-6 border-bottom pb-2">
                                <span class="text-muted d-block small">Tahun Lulus Sekolah</span>
                                <strong class="text-dark fs-5">{{ $user->mahasiswa->lulusan_tahun }}</strong>
                            </div>

                            <div class="col-md-12">
                                <span class="text-muted d-block small">Alamat Rumah Lengkap</span>
                                <p class="text-dark fs-5 mb-0 fw-semibold">{{ $user->mahasiswa->alamat }}</p>
                            </div>
                        </div>

                        <div class="mt-5 d-flex gap-3">
                            <a href="{{ route('profil.edit') }}" class="btn btn-warning btn-lg fw-bold text-white px-4 flex-fill shadow-sm">
                                <i class="fa-solid fa-user-pen me-2"></i> Edit Data Diri
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>