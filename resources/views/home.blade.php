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


<!-- Status Data -->
<section class="status-data text-center">
    <h3>Status Data<br>Pada Pemadam Kebakaran</h3>
    <p>Lorem ipsum dolor sit amet consectetur. Elementum nisl duis tortor sed. Suspendisse lobortis vitae quis vehicula pellentesque sit id</p>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="status-box">
                    <p>Temperatur</p>
                    <h5>49°</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="status-box">
                    <p>Smoke Level</p>
                    <h5>55%</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="status-box">
                    <p>Water Pressure</p>
                    <h5>800 PSI</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="status-box">
                    <p>Baterai</p>
                    <h5>80%</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gambar Alat -->
<section class="gambar-alat text-center">
    <h4>Gambar Alat</h4>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="bg-secondary" style="height: 150px;"></div> <!-- Placeholder for image -->
            </div>
            <div class="col-md-4">
                <div class="bg-secondary" style="height: 150px;"></div> <!-- Placeholder for image -->
            </div>
            <div class="col-md-4">
                <div class="bg-secondary" style="height: 150px;"></div> <!-- Placeholder for image -->
            </div>
        </div>
        <button class="btn btn-dark mt-3">Button</button>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section container">
    <h4>Pertanyaan yang sering ditanyakan</h4>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                    Lorem ipsum dolor sit amet consectetur
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Lorem ipsum dolor sit amet consectetur. Pulvinar arcu mattis in at sodales condimentum.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                    Lorem ipsum dolor sit amet consectetur
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Lorem ipsum dolor sit amet consectetur. Pulvinar arcu mattis in at sodales condimentum.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="img/logo.png" alt="Logo" width="50" height="50">
                <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint elit officia consequat</p>
            </div>
            <div class="col-md-2">
                <h6>Heading</h6>
                <p>Link here</p>
                <p>Link here</p>
                <p>Link here</p>
                <p>Link here</p>
            </div>
            <div class="col-md-2">
                <h6>Heading</h6>
                <p>Link here</p>
                <p>Link here</p>
                <p>Link here</p>
                <p>Link here</p>
            </div>
            <div class="col-md-2">
                <h6>Heading</h6>
                <p>Link here</p>
                <p>Link here</p>
                <p>Link here</p>
                <p>Link here</p>
            </div>
            <div class="col-md-3">
                <h6>Connect with us</h6>
                <div>
                    <i class="bi bi-facebook"></i>
                    <i class="bi bi-twitter"></i>
                    <i class="bi bi-instagram"></i>
                    <i class="bi bi-linkedin"></i>
                </div>
            </div>
        </div>
    </div>
</footer>
@endsection

@section('js')

    <script>
        
    </script>
@endsection