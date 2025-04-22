<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventDash - Your Smart Calendar</title>

    @vite('resources/css/app.css')

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- AOS Animation -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
    /* Active link styling */
    .nav-link{
        color: black !important;
    }
    .nav-link.active {
        background-color: #fcf8e7; /* Light yellow background for active link */   
        color: #000; /* Black text for active link */
        font-weight: 600; /* Bold text for active link */
        border-radius: 0;
        border-left: 5px solid #f5df3b;
        padding-left: 10px;
    }

    /* Hover effect for links */
    .nav-link:hover {
        background-color: rgb(251, 249, 244); /* Slightly darker yellow on hover */
        color: black !important; /* Ensure text remains black */
    }
    </style>
</head>
<body>
    <!-- 🌈 Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="navbar-brand d-flex align-items-center" href="/">
                <i class="bi bi-rocket-takeoff-fill fs-2 me-2" style="color:rgb(250, 218, 10);"></i>
                <span class="fs-3 text-black">EventDash</span>
            </a>

            <!-- Toggler for mobile view -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('tasks.index') ? 'active' : '' }}" href="{{ route('tasks.index') }}">
                            <i class="bi bi-list-check nav-icon"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('tasks.calendar') ? 'active' : '' }}" href="{{ route('tasks.calendar') }}">
                            <i class="bi bi-calendar3 nav-icon"></i> Event Calendar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('timesheets.index') ? 'active' : '' }}" href="{{ route('timesheets.index') }}">
                            <i class="bi bi-clock-history nav-icon"></i> My Tracking
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('report.index') ? 'active' : '' }}" href="{{ route('report.index') }}">
                            <i class="bi bi-graph-up nav-icon"></i> My Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <i class="bi bi-speedometer2 nav-icon"></i> Dashboard
                        </a>
                    </li>
                </ul>

                <!-- User Dropdown -->
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-black text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle fs-4 me-2"></i>
                        <span>{{ Auth::user()->name ?? 'User' }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i> Profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> Settings</a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- 💡 Main Content -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- 🧠 Scripts -->
    @yield('scripts')

    <!-- Bootstrap & AOS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>AOS.init();</script>
</body>
</html>