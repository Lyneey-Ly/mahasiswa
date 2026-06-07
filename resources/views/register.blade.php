   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container d-flex align-items-center justify-content-center min-vh-100 my-5">
        <div class="card shadow-sm p-4" style="width: 100%; max-width: 500px;">
            <div class="card-body">
                <h2 class="text-center mb-4 fw-bold text-primary">Daftar r</h2>
                <p class="text-center text-muted mb-4">Silahkan lengkapi data diri Anda</p>
                
                <form action="{{ route('postregister') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                      




                    
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>

                  
                    <button type="submit" class="btn btn-primary w-100 mb-3">Daftar Sekarang</button>
                    
                    <div class="text-center">
                        <span class="small">Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none">Login di sini</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>
</body>
</html>