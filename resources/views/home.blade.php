@extends('template.main')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')


<!-- Main Section -->
<section class="main-section container">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h2>Kontrol Pemadam Kebakaranmu!</h2>
            @if (Auth::check())
                <p>Lihat untuk Pemantauan Status Ruangan dan Alat</p>
                <form  action="/pantau" method="GET">
                    <button type="submit" class="btn btn-dark">Pemantauan</button>
                </form>
            @else
                <p>Masuk untuk Pemantauan Status Ruangan dan Alat</p>
                <form  action="/login" method="GET">
                    <button type="submit" class="btn btn-dark">Masuk</button>
                </form>
            @endif      
        </div>
        <div class="col-md-6">
            <div style="height: 450px; width: 100%;">
                <img src="{{ asset('img/gedung.png') }}" alt="Gambar Alat" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
        </div>
    </div>
</section>

<!-- Deskripsi Website -->
<section class="deskripsi-website container mt-5">
    <h4 class="text-center mb-4">Deskripsi Website</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Fitur Pemantauan Alat</h5>
                    <p>Website ini menyediakan fitur pemantauan kondisi alat, seperti:</p>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check-circle-fill text-success"></i> Pembacaan kekuatan tekanan pompa.</li>
                        <li><i class="bi bi-check-circle-fill text-success"></i> Pengaturan sensitivitas kontroler terhadap pergerakan servo.</li>
                        <li><i class="bi bi-check-circle-fill text-success"></i> Monitoring kapasitas baterai untuk memastikan ketersediaan daya yang cukup selama kondisi darurat.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Fitur Pemantauan Ruangan</h5>
                    <p>Selain itu, website ini juga memungkinkan pemantauan kondisi ruangan, termasuk:</p>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check-circle-fill text-success"></i> Pengukuran suhu ruangan secara real-time.</li>
                        <li><i class="bi bi-check-circle-fill text-success"></i> Deteksi level asap un.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-4">
        <p>Dengan berbagai fitur ini, website ini bertujuan untuk membantu pengguna memantau dan mengelola sistem pemadam kebakaran dengan lebih efisien, sehingga dapat merespons situasi darurat dengan lebih cepat dan akurat.</p>
    </div>
</section>




<!-- Gambar Alat -->
<section class="gambar-alat text-center">
    <h4 class="mb-3">Gambar Alat</h4>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('img/1.png') }}" alt="Gambar Alat 1" class="img-fluid" style="height: 150px; object-fit: cover;"> <!-- Gambar pertama -->
            </div>
            <div class="col-md-4">
                <img src="{{ asset('img/2.png') }}" alt="Gambar Alat 2" class="img-fluid" style="height: 150px; object-fit: cover;"> <!-- Gambar kedua -->
            </div>
            <div class="col-md-4">
                <img src="{{ asset('img/logo.png') }}" alt="Gambar Alat 3" class="img-fluid" style="height: 150px; object-fit: cover;"> <!-- Gambar ketiga -->
            </div>
        </div>
    </div>
</section>


@endsection

@section('js')

    <script>
        
    </script>
@endsection