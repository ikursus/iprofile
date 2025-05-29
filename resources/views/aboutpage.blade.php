<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Sistem Pengurusan Profil Kakitangan</title>
    @include('shared.head')
</head>
<body>
    <!-- Navbar -->
    @include('shared.navbar')

    <!-- About Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Tentang Sistem Ini</h2>
            <div class="row">
                <div class="col-md-6">
                    <h3><i class="fas fa-info-circle me-2"></i>Latar Belakang</h3>
                    <p>Sistem Pengurusan Profil Kakitangan Jabatan Akauntan Negara Malaysia dibangunkan untuk memudahkan pengurusan maklumat kakitangan secara digital dan terpusat.</p>
                </div>
                <div class="col-md-6">
                    <h3><i class="fas fa-bullseye me-2"></i>Objektif</h3>
                    <p>Menyediakan platform yang efisien untuk pengurusan data kakitangan, meningkatkan produktiviti dan memastikan keselamatan data.</p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <h3><i class="fas fa-users me-2"></i>Pasukan Kami</h3>
                    <p>Dibangunkan oleh Unit Teknologi Maklumat Jabatan Akauntan Negara dengan kerjasama pelbagai pihak berkepentingan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('shared.footer')
</body>
</html>