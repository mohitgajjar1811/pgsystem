<!-- Header Start -->
<div class="container-fluid bg-dark px-0 sticky-top">
    <div class="row gx-0">
        <div class="col-lg-3 bg-dark d-none d-lg-block">
            <a href="{{ route('index') }}" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                <h1 class="m-0 text-primary text-uppercase">SUNRISE PG</h1>
            </a>
        </div>
        <div class="col-lg-9">
            <div class="row gx-0 bg-white d-none d-lg-flex">
                <div class="col-lg-7 px-5 text-start">
                    <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                        <i class="fa fa-envelope text-primary me-2"></i>
                        <p class="mb-0">info@sunrise.com</p>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center py-2">
                        <i class="fa fa-phone-alt text-primary me-2"></i>
                        <p class="mb-0">+91 7016853819</p>
                    </div>
                </div>
                <div class="col-lg-5 px-5 text-end">
                    <div class="d-inline-flex align-items-center py-2">
                        @if(Auth::check())
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle d-flex align-items-center text-dark text-decoration-none" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                @if(Auth::user()->profile_image)
                                    <img src="{{ asset('profile_images/' . Auth::user()->profile_image) }}" alt="Avatar" class="rounded-circle me-2" style="width: 35px; height: 35px; object-fit: cover; border: 2px solid #FEA116;">
                                @else
                                    <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center text-white me-2" style="width: 35px; height: 35px; border: 2px solid #FEA116;">
                                        <i class="fa fa-user"></i>
                                    </div>
                                @endif
                                <span class="fw-bold">{{ Auth::user()->firstname }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="{{ route('profile') }}"><i class="fa fa-user-circle me-2 text-primary"></i> My Profile</a></li>
                                @if(Auth::user()->is_admin)
                                <li><a class="dropdown-item" href="/admin"><i class="fa fa-desktop me-2 text-primary"></i> Dashboard</a></li>
                                @endif
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="/logout"><i class="fa fa-sign-out-alt me-2"></i> Logout</a></li>
                            </ul>
                        </div>
                        @else
                        <button type="button" class="btn btn-primary rounded-pill px-4"><a href="/loadlogin" class="text-white text-decoration-none">Login</a></button>
                        @endif
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                <a href="{{ route('index') }}" class="navbar-brand d-block d-lg-none">
                    <h1 class="m-0 text-primary text-uppercase">SUNRISE PG</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="/#" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
                        <a href="/loadabout" class="nav-item nav-link {{ Request::is('loadabout') ? 'active' : '' }}">About</a>
                        <a href="/loadservice" class="nav-item nav-link {{ Request::is('loadservice') ? 'active' : '' }}">Services</a>
                        <a href="/loadroom" class="nav-item nav-link {{ Request::is('loadroom') ? 'active' : '' }}">Explore Rooms</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu rounded-0 m-0 shadow border-0 start-50 translate-middle-x">
                                <a href="/loadteam" class="dropdown-item">Our Team</a>
                                <a href="/loadappointment" class="dropdown-item">Appointment</a>
                                <a href="/loadtestimonial" class="dropdown-item">Testimonial</a>
                            </div>
                        </div>
                        <a href="/loadcontact" class="nav-item nav-link {{ Request::is('loadcontact') ? 'active' : '' }}">Contact</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Header End -->
