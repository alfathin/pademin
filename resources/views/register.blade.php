@extends('template.main')

@section('style')
    {{-- <link rel="stylesheet" href="{{ asset('css/register.css') }}"> --}}
@endsection

@section('content')


<div class="container container-custom">
  <!-- Left Section -->
  <div class="left-section">
    <h2 class="fw-bold">Pademin</h2>
    <p>Aplikasi Pendukung IGNISGUARD VECTOR</p>
    <form action="/">
        <button class="btn btn-read-more">Tentang Kami</button>
    </form>
  </div>

  <!-- Right Section -->
  <div class="right-section">
    <h3 class="fw-bold text-center">Daftar</h3>
    <p class="text-center">Daftar untuk Memulai</p>
    <form method="POST">
    @csrf
      <div class="mb-3">
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-person"></i></span>
          <input type="text" name="username" class="form-control form-control-custom" placeholder="Username" required>
        </div>
      </div>
      <div class="mb-3">
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-envelope"></i></span>
          <input type="email" name="email" class="form-control form-control-custom" placeholder="Alamat Email" required>
        </div>
      </div>
      <div class="mb-3">
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-lock"></i></span>
          <input type="password" name="password" class="form-control form-control-custom" placeholder="Kata Sandi" required>
        </div>
      </div>
      <p class="text-center">Sudah punya akun? <a style="text-decoration: none;" href="/login">Masuk</a></p>
      <button type="submit" class="btn btn-custom">Daftar</button>
    </form>
  </div>
</div>
@endsection

@section('js')

<script>
    
</script>
@endsection