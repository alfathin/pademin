@extends('template.main')

@section('style')
    {{-- <link rel="stylesheet" href="{{ asset('css/login.css') }}"> --}}
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

<div class="modal fade" data-bs-backdrop="static" id="modal_form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_title">Ganti Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form" method="POST" action="{{ route('profile') }}" enctype="multipart/form-data">
                @csrf
                    <div class="mb-3">
                        <label for="nama_ruangan" class="form-label">Password Sebelumnya : </label>
                        <input type="password" class="form-control" placeholder="Password Sebelumnya" name="password1" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_ruangan" class="form-label">Password Baru : </label>
                        <input type="password" class="form-control" placeholder="Password Baru" name="password2" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_ruangan" class="form-label">Ketik Ulang Password : </label>
                        <input type="password" class="form-control" placeholder="Ketik Ulang Password" name="password3" required>
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

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm p-5">
                <div class="card-body">
                    <!-- Header Section -->
                    <div class="text-center mb-5">
                        <img src="{{ Auth::user()->image }}" alt="Profile Picture" class="rounded-circle mb-3" style="width: 150px; height: 150px;">
                        <h4 class="fw-bold">{{ Auth::user()->username }}</h4>
                    </div>

                    <!-- Information Section -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <h6 class="fw-bold">Email:</h6>
                            <p>{{ Auth::user()->email }}</p>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="text-center mt-4">
                        <button class="btn btn-primary me-2" onclick="editUser({{ Auth::user()->id }}, '{{ Auth::user()->username }}', '{{ Auth::user()->image }}', '{{ Auth::user()->email }}')">Edit Profile</button>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal_form">
                            Ganti Password
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script>
        function editUser(id, username, image, email) {
            $('#profile_id').val(id);
            $('#email').val(email);
            $('#username').val(username);
            $('#imageS').attr('src', image);
            $('#form_edit').attr('action', '/edit_profile/' + id);
            $('#modal_form_edit').modal('show');
        }
    </script>
@endsection