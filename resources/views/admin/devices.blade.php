@extends('template.admin.main')

@section('style')
    {{-- <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> --}}
@endsection

@section('content')

<div class="modal fade" data-bs-backdrop="static" id="modal_form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_title">Tambah Alat</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="mb-3">
                        <label for="nama_device" class="form-label">Nama Alat : </label>
                        <input type="text" class="form-control" id="name" placeholder="Nama Alat" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="suhu" class="form-label">Tekanan Air : </label>
                        <input type="number" class="form-control" id="water_pressure" placeholder="kPa " name="water_pressure">
                    </div>
                    <div class="mb-3">
                        <label for="level_asap" class="form-label">Persentase Batre : </label>
                        <input type="number" class="form-control" id="battery_percentage" placeholder="(1-100)%" name="battery_percentage">    
                    </div>
                    <div class="mb-3">
                        <label for="level_asap" class="form-label">Sensitivitas Servo : </label>
                        <input type="number" class="form-control" id="servo_setting" placeholder="(1-100)%" name="servo_setting">    
                    </div>
                    <select class="form-select" name="room_id" id="room_id" aria-label="Default select example">
                        <option value="" selected>-</option>
                        @foreach ($rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                        @endforeach
                    </select>                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" form="form" id="save"><i class="fa fa-user"></i> Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" data-bs-backdrop="static" id="modal_form_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_titleE">Add Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_edit" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_device" class="form-label">Nama Alat : </label>
                        <input type="text" class="form-control" id="nameE" placeholder="Nama Alat" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="suhu" class="form-label">Tekanan Air : </label>
                        <input type="number" class="form-control" id="water_pressureE" placeholder="kPa " name="water_pressure">
                    </div>
                    <div class="mb-3">
                        <label for="level_asap" class="form-label">Persentase Batre : </label>
                        <input type="number" class="form-control" id="battery_percentageE" placeholder="(1-100)%" name="battery_percentage">    
                    </div>
                    <div class="mb-3">
                        <label for="level_asap" class="form-label">Sensitivitas Servo : </label>
                        <input type="number" class="form-control" id="servo_settingE" placeholder="(1-100)%" name="servo_setting">    
                    </div>
                    <select class="form-select" name="room_id" id="room_idE" aria-label="Default select example">
                        <option value="" selected>-</option>
                        @foreach ($rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                        @endforeach
                    </select>                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" form="form_edit" id="save"><i class="fa fa-user"></i> Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>

<!-- Content -->
<div class="content">
    <h3 class="mb-4">Admin Panel</h3>
    <div class="text-end">
        <button type="button" class="btn btn-success mb-5" data-bs-toggle="modal" data-bs-target="#modal_form">
            Tambah Alat
        </button>
    </div>
    <table class="table table-striped mb-5">
        <thead>
            <tr>
            <th scope="col" class="text-center">Nama Alat</th>
            <th scope="col" class="text-center">Tekanan Air (kPa)</th>
            <th scope="col" class="text-center">Persentase Batre (%)</th>
            <th scope="col" class="text-center">Sensivitas Servo (%)</th>
            <th scope="col" class="text-center">Lokasi Alat Terpasang</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($devices as $device)    
                <tr>
                    <td class="text-center">{{ $device->name }}</td>
                    <td class="text-center">{{ $device->water_pressure }}</td>
                    <td class="text-center">{{ $device->battery_percentage }}</td>
                    <td class="text-center">{{ $device->servo_setting }}</td>
                    <td class="text-center">{{ optional($device->room)->name }}</td>
                    <td class="justify-content-end d-flex gap-2">
                        <form action="/delete_device/{{$device->id}}" method="POST" onsubmit="return confirm('Apakah Kamu yakin Ingin Menghapus Ini?')">
                            @csrf
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                        <button class="btn btn-warning" onclick="editDevice({{ $device->id }}, '{{ $device->name }}', '{{ $device->water_pressure }}', '{{ $device->battery_percentage }}', '{{ $device->servo_setting }}', '{{ optional($device->room)->id }}')">Ubah</button>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('js')

    <script>
        function editDevice(id, name, water, battery, servo, roomId) {
            $('#modal_titleE').text('Edit Alat');
            $('#device_idE').val(id);
            $('#nameE').val(name);
            $('#water_pressureE').val(water);
            $('#battery_percentageE').val(battery);
            $('#servo_settingE').val(servo);
            $('#room_idE').val(roomId);
            $('#form_edit').attr('action', '/edit_device/' + id);
            $('#modal_form_edit').modal('show');
        }
    </script>
@endsection