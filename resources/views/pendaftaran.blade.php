<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f1f5f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .bg-gradient-primary {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
        }
        .form-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(30, 58, 138, 0.05);
            overflow: hidden;
        }
        .form-control, .form-select {
            border: 1px solid #cbd5e1;
            padding: 0.65rem 1rem;
            transition: all 0.2s ease-in-out;
            color: #334155;
        }
        .form-control:focus, .form-select:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15);
            background-color: #fff;
        }
        .section-divider {
            position: relative;
            margin: 2rem 0 1.5rem 0;
        }
        .section-title {
            background: #fff;
            padding-right: 15px;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #64748b;
            font-weight: 700;
            display: inline-block;
            position: relative;
            z-index: 2;
        }
        .section-line {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            height: 1px;
            background: #e2e8f0;
            z-index: 1;
        }
    </style>
</head>
<body class="min-h-screen d-flex align-items-center py-5">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                
                <div class="mb-4">
                    <a href="{{ route('beranda') }}" class="btn btn-white bg-white hover-bg-light text-slate-700 font-semibold px-4 py-2 rounded-3 shadow-sm border border-slate-200 text-decoration-none inline-flex align-items-center gap-2 text-sm style-button">
                        <i class="fa-solid fa-arrow-left text-muted"></i> <span>Kembali ke Beranda</span>
                    </a>
                </div>

                <div class="card form-card">
                    <div class="row g-0">
                        
                        <div class="col-lg-4 bg-gradient-primary text-white p-5 d-flex flex-col justify-content-between text-center text-lg-start">
                            <div>
                                <span class="fs-1 d-block mb-3 text-white-50 text-center text-lg-start">
                                    <i class="fa-solid fa-graduation-cap"></i>
                                </span>
                                <h3 class="fw-bold mb-3">Penerimaan Mahasiswa Baru</h3>
                                <p class="text-blue-100 small lh-lg mb-0">Satu langkah lagi untuk bergabung bersama komunitas akademik masa depan. Pastikan seluruh isian sesuai dengan data resmi KTP/KK Anda.</p>
                            </div>
                            <div class="mt-5 d-none d-lg-block border-top border-white-10 pt-4">
                                <div class="d-flex align-items-center gap-3 mb-3 small text-white-50">
                                    <i class="fa-solid fa-circle-check text-success"></i> Isi Formulir Biodata
                                </div>
                                <div class="d-flex align-items-center gap-3 mb-3 small text-white-50">
                                    <i class="fa-solid fa-circle text-warning"></i> Simpan & Peroleh Invoice
                                </div>
                                <div class="d-flex align-items-center gap-3 small text-white-50">
                                    <i class="fa-solid fa-circle text-secondary"></i> Verifikasi Pembayaran
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 bg-white p-4 p-md-5">
                            
                            <div class="mb-4">
                                <h2 class="fw-bold text-slate-800 mb-1" style="color: #0f172a;">Formulir Registrasi</h2>
                                <p class="text-muted small mb-0">Lengkapi berkas pendaftaran online mahasiswa baru secara berkala.</p>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger border-0 shadow-sm alert-dismissible fade show rounded-3" role="alert">
                                    <h6 class="fw-bold mb-2 small"><i class="fa-solid fa-triangle-exclamation me-2"></i> Periksa kembali kolom berikut:</h6>
                                    <ul class="mb-0 ps-3 small text-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <form action="{{ route('postpendaftaran') }}" method="POST">
                                @csrf

                                <div class="section-divider">
                                    <span class="section-title"><i class="fa-solid fa-user me-2 text-primary"></i> Data Pribadi</span>
                                    <div class="section-line"></div>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-semibold text-muted">Nomor Induk Kependudukan (NIK)</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-fingerprint"></i></span>
                                            <input type="text" name="nik" value="{{ old('nik') }}" class="form-control border-start-0 rounded-end-3 fs-6" placeholder="16 Digit NIK KTP" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small fw-semibold text-muted">Nomor Handphone (WhatsApp)</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-phone"></i></span>
                                            <input type="text" name="no_hp" value="{{ old('no_hp') }}" class="form-control border-start-0 rounded-end-3 fs-6" placeholder="0812XXXXXXXX" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small fw-semibold text-muted">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-select fs-6 rounded-3" required>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small fw-semibold text-muted">Agama</label>
                                        <input type="text" name="agama" value="{{ old('agama') }}" class="form-control fs-6 rounded-3" placeholder="Contoh: Islam" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small fw-semibold text-muted">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" class="form-control fs-6 rounded-3" placeholder="Kota Lahir" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small fw-semibold text-muted">Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="form-control fs-6 rounded-3" required>
                                    </div>
                                </div>

                                <div class="section-divider">
                                    <span class="section-title"><i class="fa-solid fa-school me-2 text-primary"></i> Tujuan Akademik</span>
                                    <div class="section-line"></div>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label class="form-label small fw-semibold text-muted">Tahun Kelulusan Sekolah (SMA/SMK/MA)</label>
                                        <input type="number" name="lulusan_tahun" value="{{ old('lulusan_tahun') }}" class="form-control fs-6 rounded-3" placeholder="Contoh: 2026" required>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label small fw-semibold text-muted">Pilihan Program Studi & Fakultas</label>
                                        <select name="program_studi_id" class="form-select fs-6 rounded-3" required>
                                            <option value="">-- Pilih Program Studi Tujuan --</option>
                                            @foreach($program_studi as $prodi)
                                                <option value="{{ $prodi->id }}" {{ old('program_studi_id') == $prodi->id ? 'selected' : '' }}>
                                                    {{ $prodi->namaProgramStudi }} — {{ $prodi->DataFakultas?->namaFakultas ?? 'Fakultas Tidak Ditemukan' }} (Biaya: Rp {{ number_format($prodi->biaya_pendaftaran, 0, ',', '.') }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label small fw-semibold text-muted">Alamat Rumah Lengkap</label>
                                        <textarea name="alamat" rows="3" class="form-control fs-6 rounded-3" placeholder="Tuliskan nama jalan, No. Rumah, RT/RW, Kecamatan, Kota/Kabupaten..." required>{{ old('alamat') }}</textarea>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold py-3 rounded-3 shadow-sm bg-gradient-primary border-0 fs-6">
                                        <i class="fa-solid fa-paper-plane me-2"></i> Kirim & Proses Berkas
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>