@extends('template.admin.main')

@section('style')
    {{-- <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> --}}
@endsection

@section('content')

<!-- Content -->
<div class="content">
    <h3 class="mb-4">Admin Panel</h3>
    <div class="text-end">
        <form method="POST">
            @csrf
            <button type="submit" class="btn btn-success mb-5">
                Monitoring
            </button>
        </form>
    </div>
    <table class="table table-striped mb-5">
        <thead>
            <tr>
                <th scope="col" class="text-center">Nama Ruangan</th>
                <th scope="col" class="text-center">Suhu</th>
                <th scope="col" class="text-center">Level Asap</th>
                <th scope="col" class="text-center">Nama Alat</th>
                <th scope="col" class="text-center">Tekanan Air</th>
                <th scope="col" class="text-center">Persentase Batre</th>
                <th scope="col" class="text-center">Sensivitas Servo</th>
                <th scope="col" class="text-center">Tanggal</th>
                <th scope="col" class="text-center">Waktu</th>
            </tr>
        </thead>
        <tbody>
            @foreach($monitorings as $monitoring)
            <tr>
                <td class="text-center">{{ $monitoring->room->name }}</td> <!-- Nama Ruangan -->
                <td class="text-center">{{ $monitoring->temperature }}°C</td> <!-- Suhu -->
                <td class="text-center">{{ $monitoring->smoke_level }}</td> <!-- Level Asap -->
                <td class="text-center">
                    {{ $monitoring->device->name ?? 'Tidak Ada Alat' }} <!-- Nama Alat -->
                </td>
                <td class="text-center">
                    {{ $monitoring->water_pressure ?? 'N/A' }} bar <!-- Tekanan Air -->
                </td>
                <td class="text-center">
                    {{ $monitoring->battery_percentage ?? 'N/A' }}% <!-- Persentase Batre -->
                </td>
                <td class="text-center">
                    {{ $monitoring->servo_sensitivity ?? 'N/A' }} <!-- Sensitivitas Servo -->
                </td>
                <td class="text-center">{{ $monitoring->created_at->format('Y-m-d') }}</td> <!-- Tanggal -->
                <td class="text-center">{{ $monitoring->created_at->format('H:i') }}</td> <!-- Waktu -->
            </tr>
        @endforeach
        </tbody>
    </table>    
</div>
@endsection

@section('js')

@endsection