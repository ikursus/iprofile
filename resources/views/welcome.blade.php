<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengurusan Profil Kakitangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }
        .hero-section {
            background: linear-gradient(to right, #007bff, #0056b3);
            color: white;
            padding: 5rem 0;
            text-align: center;
        }
        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
        }
        .hero-section p {
            font-size: 1.25rem;
            margin-bottom: 2.5rem;
            opacity: 0.9;
        }
        .hero-section .btn-primary {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #333;
            font-weight: bold;
            padding: 0.75rem 1.5rem;
            font-size: 1.1rem;
        }
        .hero-section .btn-primary:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }
        .features-section {
            padding: 4rem 0;
            background-color: #f8f9fa;
        }
        .features-section h2 {
            color: #0056b3;
            font-weight: bold;
            margin-bottom: 3rem;
        }
        .feature-item {
            text-align: center;
            margin-bottom: 2rem;
            padding: 1.5rem;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .feature-item:hover {
            transform: translateY(-10px);
        }
        .feature-item i {
            font-size: 3.5rem;
            color: #007bff;
            margin-bottom: 1.5rem;
            display: block;
        }
        .feature-item h3 {
            font-size: 1.5rem;
            color: #0056b3;
            margin-bottom: 0.75rem;
        }
        #contact {
            padding: 4rem 0;
        }
        #contact h2 {
            color: #0056b3;
            font-weight: bold;
            margin-bottom: 3rem;
        }
        .footer {
            background-color: #343a40;
            color: white;
            padding: 2.5rem 0;
            text-align: center;
        }
        .navbar-brand {
            font-weight: bold;
            color: #0056b3 !important;
        }
        .navbar .nav-link.btn-primary {
            padding: 0.5rem 1rem;
        }
        .navbar .nav-link.btn-outline-primary {
            padding: 0.5rem 1rem;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-landmark me-2"></i>Jabatan Akauntan Negara</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Utama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Ciri-ciri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Hubungi Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary text-white ms-lg-2 mt-2 mt-lg-0" href="/login"><i class="fas fa-sign-in-alt me-1"></i>Log Masuk</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary ms-lg-2 mt-2 mt-lg-0" href="/register"><i class="fas fa-user-plus me-1"></i>Daftar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>Sistem Pengurusan Profil Kakitangan</h1>
            <p>Platform digital untuk mengurus maklumat profil kakitangan Jabatan Akauntan Negara Malaysia secara bersepadu, mudah dan selamat.</p>
            <a href="/register" class="btn btn-primary btn-lg"><i class="fas fa-rocket me-2"></i>Mulakan Sekarang</a>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features-section">
        <div class="container">
            <h2 class="text-center">Ciri-ciri Utama Sistem</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-item">
                        <i class="fas fa-users-cog"></i>
                        <h3>Pengurusan Profil Dinamik</h3>
                        <p>Kemaskini dan selenggara maklumat peribadi, perkhidmatan, dan pencapaian kakitangan dengan antaramuka mesra pengguna.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-item">
                        <i class="fas fa-search-plus"></i>
                        <h3>Carian Pintar & Analitik</h3>
                        <p>Akses pantas kepada data kakitangan dengan fungsi carian lanjutan dan laporan analitik untuk perancangan sumber manusia.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-item">
                        <i class="fas fa-shield-alt"></i>
                        <h3>Keselamatan Data Terjamin</h3>
                        <p>Perlindungan data peribadi kakitangan dengan teknologi enkripsi terkini dan pematuhan kepada standard keselamatan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5">
        <div class="container">
            <h2 class="text-center">Hubungi Kami</h2>
            <p class="text-center text-muted mb-5">Ada pertanyaan atau maklum balas? Sila hubungi pasukan sokongan kami.</p>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-6">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Penuh</label>
                            <input type="text" class="form-control" id="name" placeholder="Contoh: Ali bin Abu" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Emel</label>
                            <input type="email" class="form-control" id="email" placeholder="Contoh: ali@gov.my" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Mesej Anda</label>
                            <textarea class="form-control" id="message" rows="5" placeholder="Tuliskan pertanyaan anda di sini..." required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-paper-plane me-2"></i>Hantar Mesej</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p class="mb-0">&copy; 2024 Jabatan Akauntan Negara Malaysia. Hak Cipta Terpelihara.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>