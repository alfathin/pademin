@extends('template.admin.main')

@section('style')
    {{-- <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> --}}
@endsection

@section('content')

<div class="modal fade" data-bs-backdrop="static" id="modal_form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_title">Add Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="mb-3">
                        <label for="nama_ruangan" class="form-label">Nama Ruangan : </label>
                        <input type="text" class="form-control" id="name" placeholder="Nama Ruangan" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="suhu" class="form-label">Suhu : </label>
                        <input type="number" class="form-control" id="temperature" placeholder="Celcius " name="temperature">
                    </div>
                    <div class="mb-3">
                        <label for="level_asap" class="form-label">Level Asap: </label>
                        <input type="number" class="form-control" id="smoke_level" placeholder="Level Asap" name="smoke_level">    
                    </div>
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
                    <label for="nama_ruangan" class="form-label">Nama Ruangan : </label>
                    <input type="text" class="form-control" id="room_nameE" placeholder="Nama Ruangan" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="suhu" class="form-label">Suhu : </label>
                    <input type="number" class="form-control" id="temperatureE" placeholder="Celcius " name="temperature">
                </div>
                <div class="mb-3">
                    <label for="level_asap" class="form-label">Level Asap: </label>
                    <input type="number" class="form-control" id="smoke_levelE" placeholder="Level Asap" name="smoke_level">    
                </div>
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
            Tambah Ruangan
        </button>
    </div>
    <table class="table table-striped mb-5">
        <thead>
            <tr>
            <th scope="col" class="text-center">Nama Ruangan</th>
            <th scope="col" class="text-center">Suhu</th>
            <th scope="col" class="text-center">Level Asap</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)    
                <tr>
                    <td class="text-center">{{ $room->name }}</td>
                    <td class="text-center">{{ $room->temperature }}</td>
                    <td class="text-center">{{ $room->smoke_level }}</td>
                    <td class="justify-content-end d-flex gap-2">
                        <form action="/delete_room/{{$room->id}}" method="POST" onsubmit="return confirm('Apakah Kamu yakin Ingin Menghapus Ini?')">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <button class="btn btn-warning" onclick="editRoom({{ $room->id }}, '{{ $room->name }}', '{{ $room->temperature }}', '{{ $room->smoke_level }}')">Edit</button>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('js')

    <script>
        function deleteRoom(roomId) {
            if (confirm('Apakah Kamu yakin Ingin Menghapus Ini?')) {
                fetch(`/delete_room/${roomId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
            }
            location.reload();
        }

        function editRoom(id, name, temperature, smoke_level) {
            $('#modal_titleE').text('Edit Ruangan');
            $('#room_idE').val(id);
            $('#room_nameE').val(name);
            $('#temperatureE').val(temperature);
            $('#smoke_levelE').val(smoke_level);
            $('#form_edit').attr('action', '/edit_room/' + id);
            $('#modal_form_edit').modal('show');
        }
    </script>
@endsection