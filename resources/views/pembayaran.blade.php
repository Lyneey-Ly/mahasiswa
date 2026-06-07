<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Pendaftaran</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-100 font-sans antialiased text-slate-800">

    <div class="max-w-4xl mx-auto my-10 px-4">
        
        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('beranda') }}" class="inline-flex items-center gap-2 bg-white hover:bg-slate-50 text-slate-700 font-semibold px-4 py-2 rounded-xl transition shadow-sm border border-slate-200 text-sm">
                <i class="fa-solid fa-arrow-left text-slate-500"></i> Kembali ke Beranda
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-slate-200">
            
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-6 text-white text-center">
                <i class="fa-solid fa-wallet text-4xl mb-2"></i>
                <h1 class="text-2xl font-bold tracking-tight">Invoice & Bukti Pembayaran</h1>
                <p class="text-blue-100 text-sm mt-1">Silakan selesaikan pembayaran untuk mengaktifkan akun mahasiswa Anda</p>
            </div>

            <div class="p-8 space-y-8">
                
                @if($pembayaran->status_pembayaran === 'blmdbyr' && !$pembayaran->bukti_transfer)
                    <div class="bg-amber-50 border-l-4 border-amber-500 p-4 rounded-r-xl flex items-start gap-3">
                        <i class="fa-solid fa-circle-exclamation text-amber-500 mt-1 text-lg"></i>
                        <div>
                            <h3 class="font-semibold text-amber-800">Menunggu Pembayaran</h3>
                            <p class="text-amber-700 text-sm mt-0.5">Transfer tepat sesuai nominal ke rekening di bawah, lalu upload foto struk/bukti transfernya.</p>
                        </div>
                    </div>
                @elseif($pembayaran->status_pembayaran === 'blmdbyr' && $pembayaran->bukti_transfer)
                    <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-xl flex items-start gap-3">
                        <i class="fa-solid fa-clock text-blue-500 mt-1 text-lg"></i>
                        <div>
                            <h3 class="font-semibold text-blue-800">Sedang Diverifikasi</h3>
                            <p class="text-blue-700 text-sm mt-0.5">Bukti transfer Anda sudah dikirim. Mohon tunggu team Administrator memeriksa data Anda.</p>
                        </div>
                    </div>
                @else
                    <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-r-xl flex items-start gap-3">
                        <i class="fa-solid fa-circle-check text-emerald-500 mt-1 text-lg"></i>
                        <div>
                            <h3 class="font-semibold text-emerald-800">Pembayaran Lunas</h3>
                            <p class="text-emerald-700 text-sm mt-0.5">Selamat! Pembayaran Anda telah divalidasi oleh admin. Anda resmi terdaftar.</p>
                        </div>
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 space-y-3">
                        <h2 class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-2">Detail Pendaftaran</h2>
                        <div class="flex justify-between border-b border-slate-200 pb-2">
                            <span class="text-slate-500 text-sm">Nama Lengkap</span>
                            <span class="font-medium text-slate-700">{{ Auth::user()->name }}</span>
                        </div>
                        <div class="flex justify-between border-b border-slate-200 pb-2">
                            <span class="text-slate-500 text-sm">Fakultas</span>
                            <span class="font-medium text-slate-700">{{ $pembayaran->DataFakultas?->namaFakultas ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between pb-2">
                            <span class="text-slate-500 text-sm">Program Studi</span>
                            <span class="font-medium text-slate-700">{{ $pembayaran->DataProgramStudi?->namaProgramStudi ?? '-' }}</span>
                        </div>
                    </div>

                    <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 flex flex-col justify-between">
                        <div>
                            <h2 class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-3">Rekening Pembayaran</h2>
                            <p class="text-sm text-slate-700 font-semibold flex items-center gap-2">
                                <i class="fa-solid fa-building-columns text-blue-600"></i> Bank Mandiri (VA)
                            </p>
                            <p class="text-xl font-mono text-blue-700 font-bold tracking-md my-1">8873 0812 3456 7890</p>
                            <p class="text-xs text-slate-400">Atas Nama: Universitas College Mandiri</p>
                        </div>
                        <div class="mt-4 pt-3 border-t border-slate-200 flex justify-between items-baseline">
                            <span class="text-slate-600 font-medium text-sm">Total Tagihan:</span>
                            <span class="text-2xl font-black text-indigo-600">Rp {{ number_format($pembayaran->harga_bayar, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>

                @if($pembayaran->status_pembayaran === 'blmdbyr' && !$pembayaran->bukti_transfer)
                    <div class="border-t border-slate-200 pt-6">
                        <h2 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                            <i class="fa-cloud-arrow-up fa-solid text-blue-600"></i> Upload Bukti Transfer
                        </h2>
                        
                        <form action="{{ route('postpembayaran') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                            @csrf
                            <div class="flex flex-col items-center justify-center border-2 border-dashed border-slate-300 rounded-xl p-6 bg-slate-50 hover:bg-slate-100 transition cursor-pointer relative group">
                                <input type="file" name="bukti_transfer" class="absolute inset-0 opacity-0 w-full h-full cursor-pointer" required>
                                <i class="fa-solid fa-image text-slate-400 text-4xl mb-2 group-hover:text-blue-500 transition"></i>
                                <span class="text-sm font-medium text-slate-600">Klik atau seret file gambar struk di sini</span>
                                <span class="text-xs text-slate-400 mt-1">Format: JPG, JPEG, PNG (Maks. 2MB)</span>
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2.5 rounded-xl transition shadow-sm flex items-center gap-2 text-sm">
                                    <i class="fa-solid fa-paper-plane"></i> Kirim Bukti Pembayaran
                                </button>
                            </div>
                        </form>
                    </div>
                @endif

            </div>
        </div>
    </div>

</body>
</html>