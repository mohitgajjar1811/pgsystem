<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Booking</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('user/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap"
          rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('user/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet"/>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('user/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
</head>

<body>
<div class="container-fluid bg-white p-0">
    <!-- Spinner Start -->
    <div id="spinner"
         class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    @include('user.header')


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-1.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container-fluid text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Booking</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="/#">Home</a></li>
                        <!--                            <li class="breadcrumb-item"><a href="#">Pages</a></li>-->
                        <li class="breadcrumb-item text-white active" aria-current="page">Booking</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Booking Start -->
    <!--        <div class="container-fluid booking pb-5 wow fadeIn" data-wow-delay="0.1s">-->
    <!--            <div class="container">-->
    <!--                <div class="bg-white shadow" style="padding: 35px;">-->
    <!--                    <div class="row g-2">-->
    <!--                        <div class="col-md-10">-->
    <!--                            <div class="row g-2">-->
    <!--                                <div class="col-md-3">-->
    <!--                                    <div class="date" id="date1" data-target-input="nearest">-->
    <!--                                        <input type="text" class="form-control datetimepicker-input"-->
    <!--                                            placeholder="Check in" data-target="#date1" data-toggle="datetimepicker" />-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                                <div class="col-md-3">-->
    <!--                                    <div class="date" id="date2" data-target-input="nearest">-->
    <!--                                        <input type="text" class="form-control datetimepicker-input" placeholder="Check out" data-target="#date2" data-toggle="datetimepicker"/>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                                <div class="col-md-3">-->
    <!--                                    <select class="form-select">-->
    <!--                                        <option selected>Adult</option>-->
    <!--                                        <option value="1">Adult 1</option>-->
    <!--                                        <option value="2">Adult 2</option>-->
    <!--                                        <option value="3">Adult 3</option>-->
    <!--                                    </select>-->
    <!--                                </div>-->
    <!--                                <div class="col-md-3">-->
    <!--                                    <select class="form-select">-->
    <!--                                        <option selected>Child</option>-->
    <!--                                        <option value="1">Child 1</option>-->
    <!--                                        <option value="2">Child 2</option>-->
    <!--                                        <option value="3">Child 3</option>-->
    <!--                                    </select>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <div class="col-md-2">-->
    <!--                            <button class="btn btn-primary w-100">Submit</button>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!-- Booking End -->


    <!-- Booking Start -->
    <div class="container-fluid py-5">
        <div class="container-fluid">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Room Booking</h6>
                <h1 class="mb-5">Book A <span class="text-primary text-uppercase">Luxury Room</span></h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s"
                                 src="{{ asset('user/img/about-001.jpg') }}" style="margin-top: 25%;">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s"
                                 src="{{ asset('user/img/about-002.jpg') }}">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s"
                                 src="{{ asset('user/img/about-003.jpg') }}">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s"
                                 src="{{ asset('user/img/about-004.jpg') }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
<!--                        <form method="post" action="/checkout/{{ $price }}">-->
                        <form id="bookingForm" method="post" action="">
                            @csrf
                            <input type="hidden" id="remainingBeds" value="{{ $remaining }}">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                                        <label data-model-name="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                                        <label data-model-name="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="mobileno"
                                               placeholder="Your Mobile Number" required>
                                        <label data-model-name="mobileno">Your Mobile Number</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" name="joiningdate" placeholder="Date" required min="{{ date('Y-m-d') }}">
                                        <label data-model-name="joiningdate">Date</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label data-model-name="adult">Selected Room</label>
                                    <div class="form-floating">
                                        <input type="text" id="selectedroom" name="adult" class="form-control datetimepicker-input"
                                               value="{{ $data }}" readonly>
                                    </div>
                                </div>
                                @php
                                    $maxBeds = 6;
                                    if (preg_match('/(\d+)/', $data, $matches)) {
                                        $maxBeds = (int)$matches[1];
                                    }
                                @endphp
                                <div class="col-12">
                                    <div class="form-floating position-relative">
                                        <select id="dropdown" name="specialrequest"
                                                class="form-control datetimepicker-input"
                                                style="background-color: #f8f9fa; padding-right: 30px; appearance: none; -webkit-appearance: none;">
                                            <option value="">Please Select Room Beds</option>
                                            @for ($i = 1; $i <= $maxBeds; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                        <span class="arrow"
                                              style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); pointer-events: none; color: #333;">&#9660;</span>
                                        <!-- Unicode character for down arrow -->
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" value="Book Now" class="btn btn-primary w-100 py-3">Book Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->


    @include('user.footer')


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<!-- JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
</body>

</html>
<script>
    document.getElementById("bookingForm").addEventListener("submit", function(e) {
        if (!this.checkValidity()) {
             // Let the browser show the default validation messages for required fields
             return;
        }

        var selected = parseInt(document.getElementById("dropdown").value);
        var remaining = parseInt(document.getElementById("remainingBeds").value);

        if (!selected) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Required',
                text: 'Please select the number of beds.',
                confirmButtonColor: '#FEA116'
            });
            return;
        }

        if (selected > remaining) {
            e.preventDefault();
            Swal.fire({
                icon: 'warning',
                title: 'Not Enough Beds!',
                text: 'Only ' + remaining + ' bed(s) available for this room.',
                confirmButtonColor: '#FEA116'
            });
        }
    });

    document.getElementById("dropdown").addEventListener("change", function() {
        // Get the selected value
        var selectedValue = this.value;

        // Store the selected value in localStorage
        localStorage.setItem("selectedValue", selectedValue);
    });
     var selectedRoomValue = document.getElementById("selectedroom").value;

    // Store the value in localStorage
    localStorage.setItem("selectedRoom", selectedRoomValue);
</script>