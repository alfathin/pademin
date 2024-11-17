<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pademin - {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @yield('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="icon" href="{{asset('img/logo.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/fontawesome.min.css" integrity="sha512-UuQ/zJlbMVAw/UU8vVBhnI4op+/tFOpQZVT+FormmIEhRSCnJWyHiBbEVgM4Uztsht41f3FzVWgLuwzUqOObKw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body{
            background-color: #f0f4fa;
        }
        .navbar-custom {
        background-color: #f8f9fa;
        padding: 10px 20px;
        box-shadow: 0 2px 2px rgba(0, 0, 0, 0.5);
        }
        .navbar-brand img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        }
        .btn-dashboard {
        background-color: black;
        color: white;
        font-weight: lighter;
        border: none;
        padding: 5px 15px;
        border-radius: 5px;
        }
        .btn-keluar {
        background-color: rgb(184, 6, 6);
        color: white;
        font-weight: lighter;
        border: none;
        padding: 5px 15px;
        border-radius: 5px;
        }
        .footer {
            margin-top: 100px;
            background-color: #343a40;
            color: white;
            padding: 40px 0;
        }
    </style>
</head>
<body>

@if(session()->has('success'))
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ session('success') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endif

<!-- Modal untuk Error Alert -->
@if(session()->has('loginError'))
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="errorModalLabel">Error</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ session('loginError') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="errorModalLabel">Error</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endif

<nav class="navbar navbar-custom sticky-top">
    <div class="container">
      <a class="navbar-brand me-5" href="#">
        <img src="{{asset('img/logo.png')}}" alt="Logo"> <!-- Ganti 'your-logo.png' dengan path gambar logo Anda -->
      </a>
  
      <!-- Tambahkan mx-auto untuk menempatkan menu di tengah -->
      <ul class="navbar-nav d-flex flex-row mx-auto">
        <li class="nav-item me-5">
          <a class="nav-link" href="/">Beranda</a>
        </li>
        @auth  
          <li class="nav-item me-5">
            <a class="nav-link" href="/rooms">Pemantauan</a>
          </li>
        @endauth
      </ul>
  
      <div class="d-flex align-items-center"> <!-- ms-auto dihapus agar link berada di tengah -->
        @auth    
          <form action="/logout" method="POST" class="me-2">
              @csrf
              <button class="btn btn-keluar">Keluar</button>
          </form>
          <a href="/profile" class="btn btn-dashboard"><i class="bi bi-person"></i></a>
        @endauth
  
        @unless (Auth::check())
          <form action="/login" method="GET">
              @csrf
              <button class="btn btn-dashboard">Masuk</button>
          </form>
        @endunless
      </div>
    </div>
  </nav>
   

    @yield('content')



 <!-- Footer -->
 <footer class="footer">
    <div class="container text-center">
        <p>&copy; 2024 Copyright Pademin. All rights reserved.</p>
    </div>
</footer>

    <div class="js">
        @yield('js')
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
        @if(session()->has('success'))
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        @endif

        @if(session()->has('loginError'))
            var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
            errorModal.show();
        @endif
        @if ($errors->any())
            var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
            errorModal.show();
        @endif
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
</body>
</html>
