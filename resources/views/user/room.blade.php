<!DOCTYPE html>

<html lang="en">


<head>
    <meta charset="utf-8">
    <title>Rooms</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('user/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?fuser/amily=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap"
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
                <h1 class="display-3 text-white mb-3 animated slideInDown">Rooms</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="/#">Home</a></li>
                        <!--                        <li class="breadcrumb-item"><a href="#">Pages</a></li>-->
                        <li class="breadcrumb-item text-white active" aria-current="page">Rooms</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!--        &lt;!&ndash; Booking Start &ndash;&gt;-->
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
    <!--        &lt;!&ndash; Booking End &ndash;&gt;-->

    <!--Room Start -->

    <div class="container-fluid py-5">
        <div class="container-fluid">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Our Rooms</h6>
                <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Rooms</span></h1>
            </div>
            <div class="row g-4">
                @foreach($data as $i)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="room-item shadow rounded overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid" src="{{ asset('img_uploads/' . $i->image) }}" alt="">
                            <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">{{ $i->price }}</small>
                        </div>

                        <div class="p-4 mt-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="mb-0">{{ $i->title }}</h5>
                                <h5 class="mb-0">
                                    <span style="background-color: {{ $i->remaining_beds > 0 ? '#22c55e' : '#ef4444' }}; color: white; padding: 4px 12px; border-radius: 50px; font-weight: 600; font-size: 14px; box-shadow: 0 2px 4px {{ $i->remaining_beds > 0 ? 'rgba(34, 197, 94, 0.3)' : 'rgba(239, 68, 68, 0.3)' }};">Remaining Beds: {{ max(0, $i->remaining_beds) }}</span>
                                </h5>

                                <!--                            <div class="ps-2">-->
                                <!--                                <small class="fa fa-star text-primary"></small>-->
                                <!--                                <small class="fa fa-star text-primary"></small>-->
                                <!--                                <small class="fa fa-star text-primary"></small>-->
                                <!--                                <small class="fa fa-star text-primary"></small>-->
                                <!--                                <small class="fa fa-star text-primary"></small>-->
                                <!--                            </div>-->
                            </div>
                            <div class="d-flex mb-3">
                                <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>{{ $i->bed }}</small>
                                <small><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>
                            </div>
                            <p class="text-body mb-3">{{ $i->detail }}</p>
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-sm btn-primary rounded py-2 px-2" href="/loadappointment">SCHEDULE A
                                    VISIT</a>
                                <a class="btn btn-sm btn-dark rounded py-2 px-8" href="/loadbooking/{{ $i->title }}/{{ $i->price }}">BOOK
                                    NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


    <!--                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">-->
    <!--                        <div class="room-item shadow rounded overflow-hidden">-->
    <!--                            <div class="position-relative">-->
    <!--                                <img class="img-fluid" src="{{ asset('img/room-02.jpg') }}" alt="">-->
    <!--                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">6500/MONTH</small>-->
    <!--                            </div>-->
    <!--                            <div class="p-4 mt-2">-->
    <!--                                <div class="d-flex justify-content-between mb-3">-->
    <!--                                    <h5 class="mb-0">2 Sharing</h5>-->
    <!--                                    <div class="ps-2">-->
    <!--                                        <small class="fa fa-star text-primary"></small>-->
    <!--                                        <small class="fa fa-star text-primary"></small>-->
    <!--                                        <small class="fa fa-star text-primary"></small>-->
    <!--                                        <small class="fa fa-star text-primary"></small>-->
    <!--                                        <small class="fa fa-star text-primary"></small>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                                <div class="d-flex mb-3">-->
    <!--                                    <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>2 Bed</small>-->
    <!--                                    <small><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>-->
    <!--                                </div>-->
    <!--&lt;!&ndash;                                <p class="text-body mb-3">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>&ndash;&gt;-->
    <!--                                <div class="d-flex justify-content-between">-->
    <!--                                    <a class="btn btn-sm btn-primary rounded py-2 px-2" href="">SCHEDULE A VISIT</a>-->
    <!--                                    <a class="btn btn-sm btn-dark rounded py-2 px-2" href="/loadbooking">BOOK NOW</a>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">-->
    <!--                        <div class="room-item shadow rounded overflow-hidden">-->
    <!--                            <div class="position-relative">-->
    <!--                                <img class="img-fluid" src="{{ asset('img/room-03.jpg') }}" alt="">-->
    <!--                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">5500/MONTH</small>-->
    <!--                            </div>-->
    <!--                            <div class="p-4 mt-2">-->
    <!--                                <div class="d-flex justify-content-between mb-3">-->
    <!--                                    <h5 class="mb-0">3 Sharing</h5>-->
    <!--                                    <div class="ps-2">-->
    <!--                                        <small class="fa fa-star text-primary"></small>-->
    <!--                                        <small class="fa fa-star text-primary"></small>-->
    <!--                                        <small class="fa fa-star text-primary"></small>-->
    <!--                                        <small class="fa fa-star text-primary"></small>-->
    <!--                                        <small class="fa fa-star text-primary"></small>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                                <div class="d-flex mb-3">-->
    <!--                                    <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>-->
    <!--                                    <small><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>-->
    <!--                                </div>-->
    <!--&lt;!&ndash;                                <p class="text-body mb-3">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>&ndash;&gt;-->
    <!--                                <div class="d-flex justify-content-between">-->
    <!--                                    <a class="btn btn-sm btn-primary rounded py-2 px-2" href="">SCHEDULE A VISIT</a>-->
    <!--                                    <a class="btn btn-sm btn-dark rounded py-2 px-2" href="/loadbooking">BOOK NOW</a>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">-->
    <!--                        <div class="room-item shadow rounded overflow-hidden">-->
    <!--                            <div class="position-relative">-->
    <!--                                <img class="img-fluid" src="{{ asset('img/room-04.jpg') }}" alt="">-->
    <!--                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">4500/MONTH</small>-->
    <!--                            </div>-->
    <!--                            <div class="p-4 mt-2">-->
    <!--                                <div class="d-flex justify-content-between mb-3">-->
    <!--                                    <h5 class="mb-0">4 Sharing</h5>-->
    <!--                                    <div class="ps-2">-->
    <!--                                        <small class="fa fa-star text-primary"></small>-->
    <!--                                        <small class="fa fa-star text-primary"></small>-->
    <!--                                        <small class="fa fa-star text-primary"></small>-->
    <!--                                        <small class="fa fa-star text-primary"></small>-->
    <!--                                        <small class="fa fa-star text-primary"></small>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                                <div class="d-flex mb-3">-->
    <!--                                    <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>4 Bed</small>-->
    <!--                                    <small><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>-->
    <!--                                </div>-->
    <!--&lt;!&ndash;                                <p class="text-body mb-3">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>&ndash;&gt;-->
    <!--                                <div class="d-flex justify-content-between">-->
    <!--                                    <a class="btn btn-sm btn-primary rounded py-2 px-2" href="">SCHEDULE A VISIT</a>-->
    <!--                                    <a class="btn btn-sm btn-dark rounded py-2 px-2" href="/loadbooking">BOOK NOW</a>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">-->
    <!--                        <div class="room-item shadow rounded overflow-hidden">-->
    <!--                            <div class="position-relative">-->
    <!--                                <img class="img-fluid" src="{{ asset('img/room-05.jpg') }}" alt="">-->
    <!--                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">3500/MONTH</small>-->
    <!--                            </div>-->
    <!--                            <div class="p-4 mt-2">-->
    <!--                                <div class="d-flex justify-content-between mb-3">-->
    <!--                                    <h5 class="mb-0">5 Sharing</h5>-->
    <!--                                    <div class="ps-2">-->
    <!--                                        <small class="fa fa-star text-primary"></small>-->
    <!--                                        <small class="fa fa-star text-primary"></small>-->
    <!--                                        <small class="fa fa-star text-primary"></small>-->
    <!--                                        <small class="fa fa-star text-primary"></small>-->
    <!--                                        <small class="fa fa-star text-primary"></small>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                                <div class="d-flex mb-3">-->
    <!--                                    <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>5 Bed</small>-->
    <!--                                    <small><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>-->
    <!--                                </div>-->
    <!--&lt;!&ndash;                                <p class="text-body mb-3">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>&ndash;&gt;-->
    <!--                                <div class="d-flex justify-content-between">-->
    <!--                                    <a class="btn btn-sm btn-primary rounded py-2 px-2" href="">SCHEDULE A VISIT</a>-->
    <!--                                    <a class="btn btn-sm btn-dark rounded py-2 px-2" href="/loadbooking">BOOK NOW</a>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">-->
    <!--                        <div class="room-item shadow rounded overflow-hidden">-->
    <!--                            <div class="position-relative">-->
    <!--                                <img class="img-fluid" src="{{ asset('img/room-06.jpg') }}" alt="">-->
    <!--                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">2500/MONTH</small>-->
    <!--                            </div>-->
    <!--                            <div class="p-4 mt-2">-->
    <!--                                <div class="d-flex justify-content-between mb-3">-->
    <!--                                    <h5 class="mb-0">6 Sharing</h5>-->
    <!--                                    <div class="ps-2">-->
    <!--                                        <small class="fa fa-star text-primary"></small>-->
    <!--                                        <small class="fa fa-star text-primary"></small>-->
    <!--                                        <small class="fa fa-star text-primary"></small>-->
    <!--                                        <small class="fa fa-star text-primary"></small>-->
    <!--                                        <small class="fa fa-star text-primary"></small>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                                <div class="d-flex mb-3">-->
    <!--                                    <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>6 Bed</small>-->
    <!--                                    <small><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>-->
    <!--                                </div>-->
    <!--&lt;!&ndash;                                <p class="text-body mb-3">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>&ndash;&gt;-->
    <!--                                <div class="d-flex justify-content-between">-->
    <!--                                    <a class="btn btn-sm btn-primary rounded py-2 px-2" href="">SCHEDULE A VISIT</a>-->
    <!--                                    <a class="btn btn-sm btn-dark rounded py-2 px-2" href="/loadbooking">BOOK NOW</a>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        &lt;!&ndash; Room End &ndash;&gt;-->


    <!--        &lt;!&ndash; Testimonial Start &ndash;&gt;-->
    <!--        <div class="container-xxl testimonial mt-5 py-5 bg-dark wow zoomIn" data-wow-delay="0.1s" style="margin-bottom: 90px;">-->
    <!--            <div class="container">-->
    <!--                <div class="owl-carousel testimonial-carousel py-5">-->
    <!--                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">-->
    <!--                        <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd et erat magna eos</p>-->
    <!--                        <div class="d-flex align-items-center">-->
    <!--                            <img class="img-fluid flex-shrink-0 rounded" src="{{ asset('img/testimonial-1.jpg') }}" style="width: 45px; height: 45px;">-->
    <!--                            <div class="ps-3">-->
    <!--                                <h6 class="fw-bold mb-1">Client Name</h6>-->
    <!--                                <small>Profession</small>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>-->
    <!--                    </div>-->
    <!--                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">-->
    <!--                        <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd et erat magna eos</p>-->
    <!--                        <div class="d-flex align-items-center">-->
    <!--                            <img class="img-fluid flex-shrink-0 rounded" src="{{ asset('img/testimonial-2.jpg') }}" style="width: 45px; height: 45px;">-->
    <!--                            <div class="ps-3">-->
    <!--                                <h6 class="fw-bold mb-1">Client Name</h6>-->
    <!--                                <small>Profession</small>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>-->
    <!--                    </div>-->
    <!--                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">-->
    <!--                        <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd et erat magna eos</p>-->
    <!--                        <div class="d-flex align-items-center">-->
    <!--                            <img class="img-fluid flex-shrink-0 rounded" src="{{ asset('img/testimonial-3.jpg') }}" style="width: 45px; height: 45px;">-->
    <!--                            <div class="ps-3">-->
    <!--                                <h6 class="fw-bold mb-1">Client Name</h6>-->
    <!--                                <small>Profession</small>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!-- Testimonial End -->


    @include('user.footer')


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('user/lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('user/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('user/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('user/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('user/lib/tempusdominus/js/moment.min.js') }}"></script>
<script src="{{ asset('user/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
<script src="{{ asset('user/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('user/js/main.js') }}"></script>

</body>

</html>