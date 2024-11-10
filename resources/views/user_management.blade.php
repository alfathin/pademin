@extends('template.main')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/management.css') }}">
@endsection

@section('content')
<div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="logo">
                <img src="https://img.icons8.com/ios-filled/50/000000/fire-extinguisher.png" alt="Logo">
            </div>
            <nav class="nav-icons">
                <a href="#"><img src="https://img.icons8.com/ios-filled/24/000000/speedometer.png" alt="Dashboard Icon"></a>
                <a href="#"><img src="https://img.icons8.com/ios-filled/24/000000/user.png" alt="User Icon"></a>
                <a href="#"><img src="https://img.icons8.com/ios-filled/24/000000/settings.png" alt="Settings Icon"></a>
                <a href="#"><img src="https://img.icons8.com/ios-filled/24/000000/exit.png" alt="Logout Icon"></a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="content">
            <header>
                <h1>User Management</h1>
                <div class="user-icon">
                    <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="User Icon">
                </div>
            </header>

            <!-- User Cards Grid -->
            <div class="user-grid">
                <div class="user-card">
                    <img src="https://randomuser.me/api/portraits/men/10.jpg" alt="User Avatar" class="user-avatar">
                    <h3>Smith</h3>
                    <button class="view-user-btn">View User</button>
                </div>
                <div class="user-card">
                    <img src="https://randomuser.me/api/portraits/women/20.jpg" alt="User Avatar" class="user-avatar">
                    <h3>Jolia</h3>
                    <button class="view-user-btn">View User</button>
                </div>
                <div class="user-card">
                    <img src="https://randomuser.me/api/portraits/men/30.jpg" alt="User Avatar" class="user-avatar">
                    <h3>Walley D</h3>
                    <button class="view-user-btn">View User</button>
                </div>
                <div class="user-card">
                    <img src="https://randomuser.me/api/portraits/men/40.jpg" alt="User Avatar" class="user-avatar">
                    <h3>Smith</h3>
                    <button class="view-user-btn">View User</button>
                </div>
                <div class="user-card">
                    <img src="https://randomuser.me/api/portraits/women/50.jpg" alt="User Avatar" class="user-avatar">
                    <h3>Jolia</h3>
                    <button class="view-user-btn">View User</button>
                </div>
                <div class="user-card">
                    <img src="https://randomuser.me/api/portraits/men/60.jpg" alt="User Avatar" class="user-avatar">
                    <h3>Walley D</h3>
                    <button class="view-user-btn">View User</button>
                </div>
                <div class="user-card">
                    <img src="https://randomuser.me/api/portraits/men/70.jpg" alt="User Avatar" class="user-avatar">
                    <h3>Smith</h3>
                    <button class="view-user-btn">View User</button>
                </div>
                <div class="user-card">
                    <img src="https://randomuser.me/api/portraits/women/80.jpg" alt="User Avatar" class="user-avatar">
                    <h3>Jolia</h3>
                    <button class="view-user-btn">View User</button>
                </div>
                <div class="user-card">
                    <img src="https://randomuser.me/api/portraits/men/90.jpg" alt="User Avatar" class="user-avatar">
                    <h3>Walley D</h3>
                    <button class="view-user-btn">View User</button>
                </div>
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <button class="page-btn">&lt;</button>
                <button class="page-btn">&gt;</button>
            </div>
        </main>
    </div>
@endsection

@section('js')

    <script>
        
    </script>
@endsection