@extends('template.main')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')

<!-- Hero Section -->
<section class="hero-section d-flex align-items-center text-center text-white bg-dark" style="min-height: 80vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold">Pantau Pemadam Kebakaranmu dengan Mudah!</h1>
                <p class="lead mt-3">Login untuk mengakses fitur pemantauan lengkap</p>
                <form action="{{ Auth::check() ? '/pantau' : '/login' }}" method="GET">
                    <button type="submit" class="btn btn-primary btn-lg mt-3">
                        {{ Auth::check() ? 'Mulai Pemantauan' : 'Login Sekarang' }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>


<!-- About Section -->
<section class="about-section py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Kenapa Memilih Kami?</h2>
        <div class="row text-center">
            <div class="col-md-4">
                <div class="card shadow-sm p-3">
                    <i class="bi bi-gear-fill display-4 text-primary mb-3"></i>
                    <h5 class="fw-bold">Pemantauan Alat</h5>
                    <p class="text-muted">Pantau kondisi alat seperti tekanan pompa, sensitivitas kontroler, dan kapasitas baterai.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm p-3">
                    <i class="bi bi-house-door-fill display-4 text-success mb-3"></i>
                    <h5 class="fw-bold">Pemantauan Ruangan</h5>
                    <p class="text-muted">Pantau suhu ruangan secara real-time dan deteksi level asap untuk keamanan maksimal.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm p-3">
                    <i class="bi bi-speedometer2 display-4 text-danger mb-3"></i>
                    <h5 class="fw-bold">Respon Cepat</h5>
                    <p class="text-muted">Meningkatkan kecepatan dalam merespons situasi darurat dengan data yang akurat.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section bg-light py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Fitur Unggulan</h2>
        <div class="row g-4">
            <!-- Fitur Pemantauan Alat -->
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Pemantauan Alat</h5>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-check-circle-fill text-primary"></i> Tekanan pompa</li>
                            <li><i class="bi bi-check-circle-fill text-primary"></i> Sensitivitas kontroler servo</li>
                            <li><i class="bi bi-check-circle-fill text-primary"></i> Monitoring kapasitas baterai</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Fitur Pemantauan Ruangan -->
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Pemantauan Ruangan</h5>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-check-circle-fill text-success"></i> Pengukuran suhu real-time</li>
                            <li><i class="bi bi-check-circle-fill text-success"></i> Deteksi level asap</li>
                            <!-- Tambahkan dummy list untuk keselarasan -->
                            <li class="invisible"><i class="bi bi-check-circle-fill"></i> Placeholder</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="gallery-section text-center py-5">
    <div class="container">
        <h2 class="fw-bold mb-5">Gambar Alat</h2>
        <div class="row g-4 justify-content-center">
            @foreach (['1.png', '2.png', 'logo.png'] as $image)
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="ratio ratio-1x1">
                            <img src="{{ asset("img/$image") }}" 
                                 class="card-img-top img-fluid rounded" 
                                 alt="Gambar Alat" 
                                 style="object-fit: cover;">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="cta-section bg-primary text-white text-center py-5 mt-4">
    <div class="container">
        <h2 class="fw-bold">Siap untuk Meningkatkan Keamanan Anda?</h2>
        <p class="lead">Gabung dengan sistem kami untuk pengalaman pemantauan yang mudah dan efisien.</p>
        <a href="/register" class="btn btn-light btn-lg">Daftar Sekarang</a>
    </div>
</section>

@endsection

@section('js')
    <script>
        
    </script>
@endsection
