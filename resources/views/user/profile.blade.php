<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>My Profile - Sunrise PG</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
    <!-- Favicon -->
    <link href="{{ asset('user/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('user/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('user/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
    
    <style>
        .profile-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }
        .profile-header {
            background: linear-gradient(135deg, #FEA116 0%, #ff8c00 100%);
            padding: 2rem;
            text-align: center;
            color: white;
        }
        .profile-avatar {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid white;
            margin-bottom: 1rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .nav-pills .nav-link {
            border-radius: 50px;
            padding: 0.8rem 1.5rem;
            color: #666;
            font-weight: 500;
            transition: all 0.3s;
        }
        .nav-pills .nav-link.active {
            background-color: #FEA116;
            color: white;
            box-shadow: 0 4px 10px rgba(254, 161, 22, 0.3);
        }
        .form-control {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            border: 1px solid #eee;
        }
        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(254, 161, 22, 0.25);
            border-color: #FEA116;
        }
        .btn-update {
            background-color: #FEA116;
            color: white;
            border-radius: 10px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            border: none;
            transition: all 0.3s;
        }
        .btn-update:hover {
            background-color: #e69014;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            color: white;
        }
        .booking-item {
            border-left: 5px solid #FEA116;
            background: #fcfcfc;
            border-radius: 10px;
            padding: 1.25rem;
            margin-bottom: 1rem;
            transition: all 0.3s;
        }
        .booking-item:hover {
            transform: translateX(5px);
            box-shadow: 5px 5px 15px rgba(0,0,0,0.05);
        }
        .section-title-sm {
            position: relative;
            display: inline-block;
            margin-bottom: 1.5rem;
            font-weight: 700;
        }
        .section-title-sm::after {
            content: '';
            position: absolute;
            width: 50%;
            height: 3px;
            background: #FEA116;
            bottom: -5px;
            left: 0;
        }
        .password-field-container {
            position: relative;
        }
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #666;
            z-index: 10;
            transition: color 0.3s;
        }
        .password-toggle:hover {
            color: #FEA116;
        }
    </style>
</head>
<body>
    <div class="container-fluid bg-white p-0">
        @include('user.header')

        <!-- Profile Start -->
        <div class="container-fluid py-5">
            <div class="container">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show rounded-pill px-4 mb-4" role="alert">
                        <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show rounded-pill px-4 mb-4" role="alert">
                        <i class="fa fa-exclamation-circle me-2"></i> {{ $errors->first() }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="row g-5">
                    <div class="col-lg-4">
                        <div class="profile-card">
                            <div class="profile-header">
                                @if($user->profile_image)
                                    <img src="{{ asset('profile_images/' . $user->profile_image) }}" alt="User Avatar" class="profile-avatar">
                                @else
                                    <div class="profile-avatar bg-white d-flex align-items-center justify-content-center mx-auto">
                                        <i class="fa fa-user fa-5x text-primary"></i>
                                    </div>
                                @endif
                                <h3 class="mb-0">{{ $user->firstname }} {{ $user->lastname }}</h3>
                                <p class="mb-0 opacity-75">{{ $user->email }}</p>
                            </div>
                            <div class="p-4 bg-white">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <button class="nav-link active text-start mb-2" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab"><i class="fa fa-user me-2"></i> Personal Details</button>
                                    <button class="nav-link text-start mb-2" id="v-pills-bookings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-bookings" type="button" role="tab"><i class="fa fa-bed me-2"></i> My Bookings</button>
                                    <button class="nav-link text-start mb-2" id="v-pills-password-tab" data-bs-toggle="pill" data-bs-target="#v-pills-password" type="button" role="tab"><i class="fa fa-lock me-2"></i> Change Password</button>
                                    <button class="nav-link text-start mb-2 text-danger" id="v-pills-delete-tab" data-bs-toggle="pill" data-bs-target="#v-pills-delete" type="button" role="tab"><i class="fa fa-trash-alt me-2"></i> Delete Account</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="tab-content" id="v-pills-tabContent">
                            <!-- Personal Details Tab -->
                            <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel">
                                <div class="bg-white p-5 rounded shadow-sm">
                                    <h4 class="section-title-sm">Edit Personal Details</h4>
                                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $user->firstname }}" placeholder="First Name">
                                                    <label for="firstname">First Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $user->lastname }}" placeholder="Last Name">
                                                    <label for="lastname">Last Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="Email Address">
                                                    <label for="email">Email Address</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="phoneno" name="phoneno" 
                                                           value="{{ $user->phoneno }}" placeholder="Phone Number"
                                                           pattern="[0-9]{10}" maxlength="10" minlength="10" 
                                                           oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);" 
                                                           title="Phone number must be exactly 10 digits" required>
                                                    <label for="phoneno">Phone Number</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="profile_image" class="form-label fw-bold">Change Profile Picture</label>
                                                <input class="form-control" type="file" id="profile_image" name="profile_image">
                                                <small class="text-muted">Allowed: JPG, PNG. Max 2MB.</small>
                                            </div>
                                            <div class="col-12 mt-4">
                                                <button type="submit" class="btn btn-update">Save Changes</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- My Bookings Tab -->
                            <div class="tab-pane fade" id="v-pills-bookings" role="tabpanel">
                                <div class="bg-white p-5 rounded shadow-sm">
                                    <h4 class="section-title-sm">My Orders & Bookings</h4>
                                    
                                    @if($orders->count() > 0 || $bookings->count() > 0)
                                        @if($orders->count() > 0)
                                            <h5 class="mb-3 text-muted">Confirmed Orders</h5>
                                            <div class="row g-3 mb-4">
                                                @foreach($orders as $order)
                                                    <div class="col-12">
                                                        <div class="booking-item d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <h5 class="mb-1 text-primary">{{ $order->roomname }}</h5>
                                                                <p class="mb-0 text-muted small"><i class="fa fa-bed me-1"></i> {{ $order->beds }} Beds</p>
                                                                <p class="mb-0 text-muted small"><i class="fa fa-calendar-alt me-1"></i> Amount: ₹{{ $order->amt }}</p>
                                                            </div>
                                                            <div class="text-end">
                                                                <span class="badge bg-success rounded-pill px-3 py-2">Paid</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif

                                        @if($bookings->count() > 0)
                                            <h5 class="mb-3 text-muted">Pending Visits / Bookings</h5>
                                            <div class="row g-3">
                                                @foreach($bookings as $booking)
                                                    <div class="col-12">
                                                        <div class="booking-item d-flex justify-content-between align-items-center border-info">
                                                            <div>
                                                                <h5 class="mb-1 text-info">{{ $booking->roomname }}</h5>
                                                                <p class="mb-0 text-muted small"><i class="fa fa-users me-1"></i> {{ $booking->adult }} Adults</p>
                                                                <p class="mb-0 text-muted small"><i class="fa fa-clock me-1"></i> Joining: {{ $booking->joiningdate }}</p>
                                                            </div>
                                                            <div class="text-end">
                                                                <span class="badge bg-info rounded-pill px-3 py-2 text-white">Visit Scheduled</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    @else
                                        <div class="text-center py-5">
                                            <i class="fa fa-calendar-times fa-4x text-light mb-3"></i>
                                            <h5>No bookings found yet.</h5>
                                            <a href="/loadroom" class="btn btn-primary mt-3">Explore Rooms</a>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Change Password Tab -->
                            <div class="tab-pane fade" id="v-pills-password" role="tabpanel">
                                <div class="bg-white p-5 rounded shadow-sm">
                                    <h4 class="section-title-sm">Change Password</h4>
                                    <form action="{{ route('profile.password') }}" method="POST">
                                        @csrf
                                        <div class="row g-4">
                                            <div class="col-12">
                                                <div class="form-floating password-field-container">
                                                    <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current Password">
                                                    <label for="current_password">Current Password</label>
                                                    <i class="fa fa-eye password-toggle" onclick="togglePassword('current_password', this)"></i>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating password-field-container">
                                                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password">
                                                    <label for="new_password">New Password</label>
                                                    <i class="fa fa-eye password-toggle" onclick="togglePassword('new_password', this)"></i>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating password-field-container">
                                                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" placeholder="Confirm New Password">
                                                    <label for="new_password_confirmation">Confirm New Password</label>
                                                    <i class="fa fa-eye password-toggle" onclick="togglePassword('new_password_confirmation', this)"></i>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-update">Update Password</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Delete Account Tab -->
                            <div class="tab-pane fade" id="v-pills-delete" role="tabpanel">
                                <div class="bg-white p-5 rounded shadow-sm">
                                    <h4 class="section-title-sm text-danger">Delete Account</h4>
                                    <div class="alert alert-warning border-0 shadow-none mb-4">
                                        <i class="fa fa-exclamation-triangle me-2"></i> <strong>Warning!</strong> This action is permanent and cannot be undone. All your bookings and data will be lost.
                                    </div>
                                    <p>Are you sure you want to delete your account?</p>
                                    <form action="{{ route('profile.delete') }}" method="POST" onsubmit="return confirm('Wait! Are you absolutely sure? This cannot be undone.');">
                                        @csrf
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-danger rounded-pill px-5 py-3">Yes, Delete My Account Permanentely</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Profile End -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('user/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('user/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('user/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('user/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('user/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('user/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('user/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('user/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('user/js/main.js') }}"></script>

    <script>
        function togglePassword(inputId, icon) {
            const input = document.getElementById(inputId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
