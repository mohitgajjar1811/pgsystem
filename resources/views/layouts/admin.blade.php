<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') | Sunrise PG</title>

    {{-- Google Fonts: Inter --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Tailwind CSS (built via Vite) --}}
    @vite(['resources/css/app.css'])

    {{-- Feather Icons --}}
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        /* Feather icon sizing inside nav */
        .nav-icon { width: 16px; height: 16px; display: inline-block; vertical-align: middle; stroke-width: 2; }
    </style>

    @yield('extra_css')
</head>

<body class="bg-slate-50 text-gray-800">

    <div class="flex h-screen overflow-hidden">

        {{-- ========== SIDEBAR ========== --}}
        <aside class="w-48 flex-shrink-0 bg-gray-900 flex flex-col" style="width: 192px;">

            {{-- Brand --}}
            <a href="/admin" class="flex items-center px-5 py-4 border-b border-gray-700 no-underline flex-shrink-0">
                <span class="text-white font-bold text-sm tracking-wide">SUNRISE</span>
                <span class="text-red-500 font-bold text-sm ml-1">ADMIN</span>
            </a>

            {{-- Navigation --}}
            <nav class="flex-1 overflow-y-auto py-2">
                <ul class="list-none m-0 p-0">

                    {{-- Dashboard --}}
                    <li>
                        <a href="/admin"
                           class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium no-underline transition-colors duration-150
                                  {{ Request::is('admin') ? 'bg-gray-800 text-white border-l-4 border-red-500' : 'text-gray-400 hover:bg-gray-800 hover:text-gray-200 border-l-4 border-transparent' }}">
                            <i data-feather="grid" class="nav-icon"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    {{-- Rooms --}}
                    <li>
                        <a href="/admin/showroom"
                           class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium no-underline transition-colors duration-150
                                  {{ Request::is('admin/showroom') || Request::is('admin/addroom') ? 'bg-gray-800 text-white border-l-4 border-red-500' : 'text-gray-400 hover:bg-gray-800 hover:text-gray-200 border-l-4 border-transparent' }}">
                            <i data-feather="home" class="nav-icon"></i>
                            <span>Rooms</span>
                        </a>
                    </li>

                    {{-- Team --}}
                    <li>
                        <a href="/admin/showteam"
                           class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium no-underline transition-colors duration-150
                                  {{ Request::is('admin/showteam') || Request::is('admin/addteam') ? 'bg-gray-800 text-white border-l-4 border-red-500' : 'text-gray-400 hover:bg-gray-800 hover:text-gray-200 border-l-4 border-transparent' }}">
                            <i data-feather="users" class="nav-icon"></i>
                            <span>Team</span>
                        </a>
                    </li>

                    {{-- Testimonials --}}
                    <li>
                        <a href="/admin/showtest"
                           class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium no-underline transition-colors duration-150
                                  {{ Request::is('admin/showtest') || Request::is('admin/addtest') ? 'bg-gray-800 text-white border-l-4 border-red-500' : 'text-gray-400 hover:bg-gray-800 hover:text-gray-200 border-l-4 border-transparent' }}">
                            <i data-feather="star" class="nav-icon"></i>
                            <span>Testimonials</span>
                        </a>
                    </li>

                    {{-- Newsletter --}}
                    <li>
                        <a href="/admin/shownews"
                           class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium no-underline transition-colors duration-150
                                  {{ Request::is('admin/shownews') ? 'bg-gray-800 text-white border-l-4 border-red-500' : 'text-gray-400 hover:bg-gray-800 hover:text-gray-200 border-l-4 border-transparent' }}">
                            <i data-feather="send" class="nav-icon"></i>
                            <span>Newsletter</span>
                        </a>
                    </li>

                    {{-- Bookings --}}
                    <li>
                        <a href="/admin/showbooking"
                           class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium no-underline transition-colors duration-150
                                  {{ Request::is('admin/showbooking') ? 'bg-gray-800 text-white border-l-4 border-red-500' : 'text-gray-400 hover:bg-gray-800 hover:text-gray-200 border-l-4 border-transparent' }}">
                            <i data-feather="list" class="nav-icon"></i>
                            <span>Bookings</span>
                        </a>
                    </li>

                    {{-- Registrations --}}
                    <li>
                        <a href="/admin/showregistration"
                           class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium no-underline transition-colors duration-150
                                  {{ Request::is('admin/showregistration') ? 'bg-gray-800 text-white border-l-4 border-red-500' : 'text-gray-400 hover:bg-gray-800 hover:text-gray-200 border-l-4 border-transparent' }}">
                            <i data-feather="user-plus" class="nav-icon"></i>
                            <span>Registrations</span>
                        </a>
                    </li>

                    {{-- Orders --}}
                    <li>
                        <a href="/admin/showorder"
                           class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium no-underline transition-colors duration-150
                                  {{ Request::is('admin/showorder') ? 'bg-gray-800 text-white border-l-4 border-red-500' : 'text-gray-400 hover:bg-gray-800 hover:text-gray-200 border-l-4 border-transparent' }}">
                            <i data-feather="shopping-cart" class="nav-icon"></i>
                            <span>Orders</span>
                        </a>
                    </li>

                    {{-- Checkouts --}}
                    <li>
                        <a href="/admin/showcheckout"
                           class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium no-underline transition-colors duration-150
                                  {{ Request::is('admin/showcheckout') ? 'bg-gray-800 text-white border-l-4 border-red-500' : 'text-gray-400 hover:bg-gray-800 hover:text-gray-200 border-l-4 border-transparent' }}">
                            <i data-feather="check-circle" class="nav-icon"></i>
                            <span>Checkouts</span>
                        </a>
                    </li>

                    {{-- Contact Messages --}}
                    <li>
                        <a href="/admin/showcontact"
                           class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium no-underline transition-colors duration-150
                                  {{ Request::is('admin/showcontact') ? 'bg-gray-800 text-white border-l-4 border-red-500' : 'text-gray-400 hover:bg-gray-800 hover:text-gray-200 border-l-4 border-transparent' }}">
                            <i data-feather="mail" class="nav-icon"></i>
                            <span>Contact</span>
                        </a>
                    </li>

                    {{-- Appointments --}}
                    <li>
                        <a href="/admin/showappointment"
                           class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium no-underline transition-colors duration-150
                                  {{ Request::is('admin/showappointment') ? 'bg-gray-800 text-white border-l-4 border-red-500' : 'text-gray-400 hover:bg-gray-800 hover:text-gray-200 border-l-4 border-transparent' }}">
                            <i data-feather="calendar" class="nav-icon"></i>
                            <span>Appointments</span>
                        </a>
                    </li>

                    {{-- Login Records --}}
                    <li>
                        <a href="/admin/showlogin"
                           class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium no-underline transition-colors duration-150
                                  {{ Request::is('admin/showlogin') ? 'bg-gray-800 text-white border-l-4 border-red-500' : 'text-gray-400 hover:bg-gray-800 hover:text-gray-200 border-l-4 border-transparent' }}">
                            <i data-feather="log-in" class="nav-icon"></i>
                            <span>Login Records</span>
                        </a>
                    </li>

                </ul>
            </nav>

            {{-- Logout at bottom --}}
            <div class="flex-shrink-0 border-t border-gray-700">
                <a href="/logout"
                   class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-gray-400 no-underline hover:bg-red-900/40 hover:text-white transition-colors duration-150">
                    <i data-feather="log-out" class="nav-icon"></i>
                    <span>Logout</span>
                </a>
            </div>

        </aside>

        {{-- ========== MAIN CONTENT ========== --}}
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">

            {{-- Top Navbar --}}
            <header class="bg-white border-b border-gray-100 flex items-center justify-between px-6" style="min-height: 52px;">
                <div class="text-sm font-medium text-gray-500">
                    @yield('title', 'Dashboard')
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-sm text-gray-500">Welcome, <strong class="text-gray-800 font-semibold">admin</strong></span>
                    <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-xs font-bold text-gray-600 cursor-pointer hover:bg-gray-300 transition-colors">
                        A
                    </div>
                </div>
            </header>

            {{-- Page Content --}}
            <main class="flex-1 overflow-y-auto bg-slate-50 p-6">
                @yield('content')
            </main>

        </div>
    </div>

    {{-- Feather Icons Init --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            feather.replace();
        });
    </script>

    @yield('extra_js')
</body>

</html>
