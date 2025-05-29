<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami - Sistem Pengurusan Profil Kakitangan</title>
    @include('shared.head')
</head>
<body>
    <!-- Navbar -->
    @include('shared.navbar')

    <!-- Contact Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Hubungi Kami</h2>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h3><i class="fas fa-map-marker-alt me-2"></i>Alamat</h3>
                    <p>Jabatan Akauntan Negara Malaysia<br>Aras G, Blok C7, Kompleks C<br>Pusat Pentadbiran Kerajaan Persekutuan<br>62502 Putrajaya</p>
                </div>
                <div class="col-md-6 mb-4">
                    <h3><i class="fas fa-phone me-2"></i>Telefon</h3>
                    <p>03-8888 8888</p>
                    <h3 class="mt-4"><i class="fas fa-envelope me-2"></i>Emel</h3>
                    <p>helpdesk@anm.gov.my</p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <h3><i class="fas fa-clock me-2"></i>Waktu Operasi</h3>
                    <p>Isnin - Jumaat: 8:00 pagi - 5:00 petang</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('shared.footer')
</body>
</html>