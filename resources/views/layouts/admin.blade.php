<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin & Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="shortcut icon" href="{{ asset('admin_assets/img/icons/icon-48x48.png') }}" />

    <title>@yield('title', 'Admin Dashboard') | Sunrise PG</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('admin_assets/css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* === VIRJA EXACT MATCH === */
        *, body { font-family: 'Inter', sans-serif !important; }
        body { background-color: #f8fafc; }

        /* ---- SIDEBAR ---- */
        .sidebar { background-color: #1e293b !important; border-right: none !important; width: 175px !important; min-width: 175px !important; }
        .sidebar-content { background-color: #1e293b !important; height: auto !important; min-height: 0 !important; }
        #sidebar { background-color: #1e293b !important; width: 175px !important; }
        /* Remove blank bottom space from simplebar */
        .sidebar-content.js-simplebar, .simplebar-content-wrapper, .simplebar-content { height: auto !important; overflow: visible !important; }

        /* Brand area */
        .sidebar-brand {
            background-color: #1e293b !important;
            padding: 1.125rem 1.25rem !important;
            border-bottom: 1px solid #273549 !important;
            display: flex !important;
            align-items: center !important;
            text-decoration: none !important;
        }

        /* CATALOG-style section headers */
        .sidebar-header {
            color: #64748b !important;
            font-size: 0.65rem !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.1em !important;
            padding: 1.25rem 1.25rem 0.375rem !important;
            margin: 0 !important;
            line-height: 1 !important;
        }

        /* Nav links */
        .sidebar-nav { padding: 0.25rem 0 !important; }
        .sidebar-item { margin: 2px 0 !important; }
        .sidebar-link {
            display: flex !important;
            align-items: center !important;
            gap: 0.75rem !important;
            color: #94a3b8 !important;
            font-size: 0.8125rem !important;
            font-weight: 500 !important;
            padding: 0.5625rem 1rem !important;
            border-radius: 0 !important;
            text-decoration: none !important;
            transition: background-color 0.15s, color 0.15s !important;
            white-space: nowrap !important;
        }
        .sidebar-link:hover {
            background-color: rgba(255,255,255,0.06) !important;
            color: #cbd5e1 !important;
        }
        /* Active state: Virja shows selected item with darker bg, white text */
        .sidebar-item.active > .sidebar-link {
            background-color: rgba(255,255,255,0.1) !important;
            color: #f1f5f9 !important;
            font-weight: 600 !important;
        }

        /* Icons in sidebar */
        .sidebar-link svg {
            width: 16px !important;
            height: 16px !important;
            min-width: 16px !important;
            flex-shrink: 0 !important;
            stroke-width: 1.75px !important;
        }

        /* ---- TOP NAVBAR ---- */
        .navbar,
        .navbar-bg,
        nav.navbar {
            background-color: #ffffff !important;
            border-bottom: 1px solid #e2e8f0 !important;
            box-shadow: none !important;
            min-height: 52px !important;
        }

        /* ---- MAIN CONTENT ---- */
        .main { background-color: #f8fafc !important; }
        .content { padding: 1.5rem 1.75rem !important; }

        /* Wrapper sidebar-specific adjustments */
        .wrapper .main { margin-left: 175px !important; }
    </style>
    @yield('extra_css')
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar">
            <div class="sidebar-content">
                <a class="sidebar-brand" href="/admin">
                    <span style="color: #ffffff; font-weight: 700; font-size: 0.95rem; letter-spacing: 0.5px;">SUNRISE</span>
                    <span style="color: #ef4444; font-weight: 700; font-size: 0.95rem; margin-left: 4px;">ADMIN</span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-item {{ Request::is('admin') ? 'active' : '' }}">
                        <a class="sidebar-link" href="/admin">
                            <i data-feather="grid"></i> <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ Request::is('admin/showroom') || Request::is('admin/addroom') ? 'active' : '' }}">
                        <a class="sidebar-link" href="/admin/showroom">
                            <i data-feather="home"></i> <span>Rooms</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ Request::is('admin/showteam') || Request::is('admin/addteam') ? 'active' : '' }}">
                        <a class="sidebar-link" href="/admin/showteam">
                            <i data-feather="users"></i> <span>Team</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ Request::is('admin/showtest') || Request::is('admin/addtest') ? 'active' : '' }}">
                        <a class="sidebar-link" href="/admin/showtest">
                            <i data-feather="star"></i> <span>Testimonials</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ Request::is('admin/shownews') ? 'active' : '' }}">
                        <a class="sidebar-link" href="/admin/shownews">
                            <i data-feather="send"></i> <span>Newsletter</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ Request::is('admin/showbooking') ? 'active' : '' }}">
                        <a class="sidebar-link" href="/admin/showbooking">
                            <i data-feather="list"></i> <span>Bookings</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ Request::is('admin/showregistration') ? 'active' : '' }}">
                        <a class="sidebar-link" href="/admin/showregistration">
                            <i data-feather="user-plus"></i> <span>Registrations</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ Request::is('admin/showorder') ? 'active' : '' }}">
                        <a class="sidebar-link" href="/admin/showorder">
                            <i data-feather="shopping-cart"></i> <span>Orders</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ Request::is('admin/showcheckout') ? 'active' : '' }}">
                        <a class="sidebar-link" href="/admin/showcheckout">
                            <i data-feather="check-circle"></i> <span>Checkouts</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ Request::is('admin/showcontact') ? 'active' : '' }}">
                        <a class="sidebar-link" href="/admin/showcontact">
                            <i data-feather="mail"></i> <span>Contact Messages</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ Request::is('admin/showappointment') ? 'active' : '' }}">
                        <a class="sidebar-link" href="/admin/showappointment">
                            <i data-feather="calendar"></i> <span>Appointments</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ Request::is('admin/showlogin') ? 'active' : '' }}">
                        <a class="sidebar-link" href="/admin/showlogin">
                            <i data-feather="log-in"></i> <span>Login Records</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg py-2">
                <a class="sidebar-toggle d-flex d-lg-none ms-2">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown">
                                <span class="text-muted small me-2">Welcome, <strong class="text-dark">admin</strong></span>
                                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center text-muted" style="width: 32px; height: 32px; background-color: #eee !important; font-weight: 700; font-size: 0.8rem;">A</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                                <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content p-4">
                <div class="container-fluid p-0">
                    @yield('content')
                </div>
            </main>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('admin_assets/js/app.js') }}"></script>
    @yield('extra_js')
</body>

</html>
