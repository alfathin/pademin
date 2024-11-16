@extends('template.admin.main')

@section('style')
    {{-- <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> --}}
@endsection

@section('content')

<div class="modal fade" data-bs-backdrop="static" id="modal_form_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_titleE">Edit User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_edit" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @method('PUT') --}}
                    <div class="mb-3">
                        <img height="100" width="100" id="imageS" src="" alt="">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Pilih Gambar :</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username : </label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email : </label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="form_edit" id="save"><i class="fa fa-user"></i> Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Content -->
<div class="content">
    <h3 class="mb-4">Admin Panel</h3>
    <table class="table table-striped mb-5">
        <thead>
            <tr>
                <th scope="col" class="text-center">Image</th>
                <th scope="col" class="text-center">Username</th>
                <th scope="col" class="text-center">Email</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)    
                <tr>
                    <td class="text-center"><img height="100px" width="100px" src="{{ asset($user->image) }}" alt=""></td>
                    <td class="text-center">{{ $user->username }}</td>
                    <td class="text-center">{{ $user->email }}</td>
                    <td class="text-end">
                        <div class="d-flex justify-content-end">
                            <form action="/role_admin/{{$user->id}}" method="POST" onsubmit="return confirm('Apakah Kamu Yakin Menjadikan Admin?')">
                                @csrf
                                <button type="submit" class="btn btn-success me-2">Jadikan Admin</button>
                            </form>
                            <button class="btn btn-warning me-2" onclick="editUser({{ $user->id }}, '{{ $user->username }}', '{{ $user->image }}', '{{ $user->email }}')">Edit</button>
                            <form action="/delete_user/{{$user->id}}" method="POST" onsubmit="return confirm('Apakah Kamu yakin Ingin Menghapus Ini?')">
                                @csrf
                                <button type="submit" class="btn btn-danger me-2">Delete</button>
                            </form>
                        </div>
                    </td>                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('js')

    <script>
        new DataTable('#myTable');

        function editUser(id, username, image, email) {
            $('#profile_id').val(id);
            $('#email').val(email);
            $('#username').val(username);
            $('#imageS').attr('src', image);
            $('#form_edit').attr('action', '/edit_user/' + id);
            $('#modal_form_edit').modal('show');
        }
    </script>
@endsection