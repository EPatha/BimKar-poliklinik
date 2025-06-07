<!-- filepath: resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistem Informasi Poliklinik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f7f9;
            font-family: 'Arial', sans-serif;
        }
        .hero-poliklinik {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 4px 24px rgba(44,62,80,0.08);
            padding: 40px 30px 30px 30px;
            margin-top: 40px;
        }
        .logo-udinus {
            width: 120px;
            height: 120px;
            object-fit: contain;
            margin-bottom: 20px;
        }
        .cta-btn {
            border-radius: 30px;
            padding: 10px 32px;
            font-weight: bold;
            font-size: 1rem;
        }
        .feature-list li {
            margin-bottom: 12px;
            font-size: 1.05rem;
        }
        .feature-list span {
            color: #198754;
            font-weight: bold;
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">
        <div class="container">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    @if (Route::has('login'))
                        @auth
                        @else
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container hero-poliklinik text-center">
        <img src="{{ asset('Logo_udinus.jpg') }}" alt="Logo UDINUS" class="logo-udinus mx-auto d-block">
        <h1 class="fw-bold text-success mb-3">Sistem Informasi Poliklinik UDINUS</h1>
        <p class="mb-4 text-secondary">
            Selamat datang di Sistem Informasi Poliklinik UDINUS.<br>
            Silakan login atau register untuk mengakses layanan poliklinik secara online.
        </p>
        <div class="mb-4">
            <a href="{{ route('login') }}" class="btn btn-success cta-btn me-2">Login</a>
            <a href="{{ route('register') }}" class="btn btn-outline-success cta-btn">Register</a>
        </div>
        <ul class="feature-list list-unstyled text-start mx-auto" style="max-width: 400px;">
            <li><span>•</span>Pendaftaran Pasien & Dokter</li>
            <li><span>•</span>Manajemen Jadwal Periksa</li>
            <li><span>•</span>Manajemen Obat & Resep</li>
            <li><span>•</span>Riwayat Pemeriksaan Pasien</li>
        </ul>
    </div>

    <?php if(session('success')): ?>
        <div 
            x-data="{ show: true }" 
            x-show="show" 
            x-init="setTimeout(() => show = false, 3000)" 
            x-transition 
            class="alert alert-success position-fixed top-0 start-50 translate-middle-x mt-4"
            style="z-index:9999; min-width:300px;"
        >
            {{ session('success') }}
        </div>
    <?php endif; ?>

    <footer class="footer mt-5 py-3 bg-success text-white text-center">
        <div class="container">
            &copy; <script>document.write(new Date().getFullYear())</script> Poliklinik UDINUS. All Rights Reserved.
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>