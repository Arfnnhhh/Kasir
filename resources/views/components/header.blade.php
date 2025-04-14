@auth
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>
    .main-navbar {
        background-color: #2B2D31;
        font-family: 'Inter', sans-serif;
        color: white;
        border-bottom: 1px solid #1e1f22;
        padding: 0.5rem 1rem;
    }

    .navbar .nav-link,
    .navbar .nav-link-user {
        color: #ffffff !important;
        font-weight: 500;
        transition: color 0.2s ease;
    }

    .navbar .nav-link:hover,
    .navbar .nav-link-user:hover {
        color: #f2f3f5 !important;
    }

    .navbar .bi {
        font-size: 1.25rem;
    }

    .nav-link-user img {
        border-radius: 50%;
        width: 36px;
        height: 36px;
        object-fit: cover;
        border: 2px solid #444;
    }
</style>

<nav class="navbar navbar-expand-lg main-navbar">
    <!-- Sidebar Toggle -->
    <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg me-3">
        <i class="bi bi-list"></i>
    </a>

    <!-- Spacer -->
    <div class="flex-grow-1"></div>

    <!-- Right Side (User Dropdown remains unchanged) -->
    <ul class="navbar-nav ml-auto">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user d-flex align-items-center">
                <img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">
                    {{ substr(auth()->user()->name, 0, 10) }}
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">
                    Hi, {{ substr(auth()->user()->name, 0, 10) }}
                </div>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
@endauth
