@auth
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>
    body {
        font-family: 'Inter', system-ui, sans-serif;
    }

    .main-sidebar {
        background-color: #2B2D31 !important;
        min-height: 100vh;
        color: #fff;
        font-size: 0.95rem;
        font-weight: 500;
    }

    .sidebar-brand {
        font-size: 1.2rem;
        font-weight: 600;
        color: #fff;
        letter-spacing: 0.5px;
    }

    .sidebar-menu li a {
        padding: 0.75rem 1rem;
        border-radius: 6px;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        color: #dbdee1;
        text-decoration: none;
        transition: background 0.2s ease;
    }

    .sidebar-menu li a:hover,
    .sidebar-menu li.active a,
    .sidebar-menu li a.bg-gradient {
        background-color: #404249;
        color: #fff;
    }

    .sidebar-label {
        font-size: 0.95rem;
    }

    .menu-header {
        margin-top: 1rem;
        font-size: 0.75rem;
        color: #8e9297;
    }

    .bi {
        font-size: 1.2rem;
    }
</style>

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand text-center py-4">
            <a href="{{ url('home') }}" class="text-white fw-bold">Cashier App</a>
        </div>
        <ul class="sidebar-menu px-3">
            <li class="menu-header">Main</li>
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a class="nav-link {{ Request::is('home') ? 'bg-gradient' : '' }}" href="{{ url('home') }}">
                    <i class="bi bi-house-door"></i>
                    <span class="sidebar-label">Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Management</li>
            <li class="{{ Request::is('product') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('#') }}">
                    <i class="bi bi-box-seam"></i>
                    <span class="sidebar-label">Produk</span>
                </a>
            </li>
            <li class="{{ Request::is('sales') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('#') }}">
                    <i class="bi bi-receipt"></i>
                    <span class="sidebar-label">Penjualan</span>
                </a>
            </li>

            <li class="menu-header">Users</li>
            <li class="{{ Request::is('user') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('#') }}">
                    <i class="bi bi-person-gear"></i>
                    <span class="sidebar-label">User</span>
                </a>
            </li>
            <li class="{{ Request::is('members') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('#') }}">
                    <i class="bi bi-people"></i>
                    <span class="sidebar-label">Member</span>
                </a>
            </li>
            <li class="menu-header">Tools</li>
            <li class="{{ Request::is('product') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('#') }}">
                    <i class="bi bi-box"></i>
                    <span class="sidebar-label">Produk</span>
                </a>
            </li>
            <li class="{{ Request::is('sales') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('#') }}">
                    <i class="bi bi-cash-stack"></i>
                    <span class="sidebar-label">Penjualan</span>
                </a>
            </li>
            <li class="{{ Request::is('members') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('#') }}">
                    <i class="bi bi-people-fill"></i>
                    <span class="sidebar-label">Member</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
@endauth
