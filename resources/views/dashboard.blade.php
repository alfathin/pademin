@extends('template.admin.main')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('content')
        <!-- Content -->
    <div class="content">
        <h3 class="mb-4">Admin Panel</h3>
        <div class="row g-3">
            <div class="col-md-3">
                <div class="card card-custom">
                    <div class="d-flex align-items-center">
                        <div class="circle">10°C</div>
                        <div class="ms-3">
                            <h6>Temperatur</h6>
                            <small class="text-muted">AMAN</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-custom">
                    <div class="d-flex align-items-center">
                        <div class="circle">2%</div>
                        <div class="ms-3">
                            <h6>Smoke Level</h6>
                            <small class="text-muted">AMAN</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-custom">
                    <div class="d-flex align-items-center">
                        <div class="circle">30%</div>
                        <div class="ms-3">
                            <h6>Water Pressure</h6>
                            <small class="text-muted">200 PSI</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-custom">
                    <div class="d-flex align-items-center">
                        <div class="circle">11%</div>
                        <div class="ms-3">
                            <h6>Baterai</h6>
                            <small class="text-muted">Kritis, Perlu diisi</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-custom">
                    <h6>Sensitivitas Servo</h6>
                    <div class="slider-container mt-2">
                        <input type="range" class="slider" value="20">
                        <span>20%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script>
        
    </script>
@endsection