@extends('template.admin.main')

@section('style')
    {{-- <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> --}}
@endsection

@section('content')

<!-- Content -->
<div class="content">
    <h3 class="mb-4">Admin Panel</h3>
    <div class="row">
        @foreach ($rooms as $room)         
            <div class="col-md-3">
            <div class="container mt-5">
                <a href="/admin_monitoring/{{ $room->id }}" class="text-decoration-none text-dark">
                <div class="d-flex align-items-center p-3 border rounded bg-light">
                    <i class="bi bi-house-door-fill me-3" style="font-size: 2.5rem;"></i>
                    <span class="fs-7">{{ $room->name }} </span>
                </div>
                </a>
            </div>
            </div>
        @endforeach
    </div>
</div>

@endsection

@section('js')

@endsection