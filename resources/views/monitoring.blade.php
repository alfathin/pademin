@extends('template.main')

@section('style')
    {{-- <link rel="stylesheet" href="{{ asset('css/management.css') }}"> --}}
@endsection

@section('content')

<div class="container">
    <h2 class="text-center mb-4 mt-4">Status Ruangan {{ $room->name }}</h2>
    <div class="row gy-4">
    <!-- Temperatur -->
        <div class="col-md-4">
            <div class="card">
            <div class="status-circle">{{ $room->temperature }}°C</div>
            <h5>Temperatur</h5>
            </div>
        </div>
        <!-- Smoke Level -->
        <div class="col-md-4">
            <div class="card">
            <div class="status-circle">{{ $room->smoke_level }}%</div>
            <h5>Smoke Level</h5>
            </div>
        </div>
    </div>

    @foreach ($monitorings as $monitoring)
    {{-- <div class="container my-5"> --}}
        <h2 class="text-center mb-4 mt-5">Monitoring Alat {{ $monitoring->device->name ?? '' }}</h2>
        <div class="row gy-4">
            <div class="col-md-4">
                <div class="card">
                <div class="status-circle">{{ $monitoring->device->water_pressure ?? '' }}</div>
                <h5>Water Pressure</h5>
                <p class="text-muted">{{ $monitoring->device ? $monitoring->device->water_pressure . ' bar' : 'No Device' }}</p>
                </div>
            </div>
            <!-- Baterai -->
            <div class="col-md-6">
                <div class="card">
                <div class="status-circle">{{ $monitoring->device->battery_percentage ?? '' }}%</div>
                <h5>Baterai</h5>
                <p class="text-muted">{{ $monitoring->device ? $monitoring->device->battery_percentage . '%' : 'No Device' }}</p>
                </div>
            </div>
            <!-- Sensitivitas Servo -->
            <div class="col-md-6">
                <div class="card">
                <div class="slider-container">
                    <input type="range" class="form-range" disabled value="{{ $monitoring->device->servo_setting ?? 'No Device' }}" min="0" max="100">
                </div>
                <h5>Sensitivitas Servo</h5>
                <p class="text-muted">{{ $monitoring->device ? $monitoring->device->servo_setting . '%' : 'No Device' }}</p>
                </div>
            </div>
        </div>
    {{-- </div> --}}
@endforeach
</div>

@endsection

@section('js')
    
@endsection