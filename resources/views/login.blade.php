<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Sistem Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .login-card {
            border: none;
            border-radius: 24px;
            box-shadow: 0 10px 40px rgba(15, 23, 42, 0.04);
            background: #ffffff;
            overflow: hidden;
        }
        .login-header-accent {
            height: 6px;
            background: linear-gradient(90deg, #3b82f6 0%, #1e3a8a 100%);
        }
        .input-group-text {
            background-color: #f8fafc;
            border-edge: none;
            color: #94a3b8;
            padding-left: 1.25rem;
            padding-right: 0.75rem;
        }
        .form-control {
            padding: 0.75rem 1rem;
            border-color: #e2e8f0;
            color: #334155;
            font-size: 0.95rem;
        }
        .form-control::placeholder {
            color: #94a3b8;
        }
        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.12);
            background-color: #ffffff;
        }
        .input-group .form-control:focus + .input-group-text,
        .input-group .form-control:focus ~ .input-group-text {
            border-color: #3b82f6;
        }
        .btn-login {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            border: none;
            padding: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            border-radius: 12px;
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            opacity: 0.95;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.25);
        }
    </style>
</head>
<body>

    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        
        <div class="card login-card w-100" style="max-width: 420px;">
            <div class="login-header-accent"></div>
            
            <div class="card-body p-4 p-md-5">
                
                <div class="text-center mb-4">
                    <div class="d-inline-flex align-items-center justify-content-center bg-light text-primary rounded-circle mb-3" style="width: 60px; height: 60px;">
                        <i class="fa-solid fa-graduation-cap fs-3"></i>
                    </div>
                    <h2 class="fw-bold text-dark mb-1" style="letter-spacing: -0.5px;">Selamat Datang</h2>
                    <p class="text-muted small">Silakan masuk ke akun pendaftaran Anda</p>
                </div>
                
                <form action="{{ route('postlogin') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-secondary">Alamat Email</label>
                        <div class="input-group">
                            <span class="input-group-text border-end-0"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" name="email" class="form-control border-start-0 rounded-end-3" placeholder="nama@email.com" required autocomplete="email">
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <label class="form-label small fw-semibold text-secondary mb-0">Password</label>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text border-end-0"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="password" class="form-control border-start-0 rounded-end-3" placeholder="••••••••" required>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-login w-100 text-white rounded-3">
                        Masuk ke Akun <i class="fa-solid fa-arrow-right-to-bracket ms-2 small"></i>
                    </button>
                </form>

                <div class="text-center mt-4 pt-2 border-top border-light">
                    <span class="text-muted small">Belum memiliki akun?</span>
                    <a href="{{ route('register') }}" class="text-decoration-none fw-bold small ms-1 text-primary">Daftar Sekarang</a>
                </div>

            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>