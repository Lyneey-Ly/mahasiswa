<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        
        <div class="card shadow-sm border-0" style="width: 100%; max-width: 400px;">
            <div class="card-body p-4">
                
                <h2 class="text-center mb-4 fw-bold">Login </h2>
                
                <form action="{{ route('postlogin') }}" method="POST">
                    @csrf



                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100 py-2">Masuk</button>
                </form>

                <div class="text-center mt-3">
                    <span class="text-muted small">Belum punya akun?</span>
                    <a href="{{ route('register') }}" class="text-decoration-none fw-bold small">Daftar sekarang</a>
                </div>

            </div>
        </div>
    </div>
    
</body>
</html>