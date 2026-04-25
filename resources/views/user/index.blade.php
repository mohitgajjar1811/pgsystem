<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sunrise PG</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('user/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap"
        rel="stylesheet">

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


        <!-- Carousel Start -->
        <div class="container-fluid p-0 mb-5">
            <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="w-100" src="{{ asset('user/img/carousel-01.jpg') }}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Luxury
                                    Living</h6>
                                <h1 class="display-3 text-white mb-4 animated slideInDown">The Next Home</h1>
                                <a href="/loadroom"
                                    class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">check
                                    Our Rooms</a>
                                <a href="/loadappointment"
                                    class="btn btn-light py-md-3 px-md-5 animated slideInRight">Book
                                    Appointment</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="{{ asset('user/img/carousel-002.jpg') }}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Luxury
                                    Living</h6>
                                <h1 class="display-3 text-white mb-4 animated slideInDown">The Next Home</h1>
                                <a href="/loadroom"
                                    class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">check
                                    Our Rooms</a>
                                <a href="/loadappointment"
                                    class="btn btn-light py-md-3 px-md-5 animated slideInRight">Book
                                    Appointment</a>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->


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


        <!-- About Start -->
        <div class="container-fluid py-5">
            <div class="container-fluid">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <h6 class="section-title text-start text-primary text-uppercase">About Us</h6>
                        <h1 class="mb-4">Welcome to <span class="text-primary text-uppercase">Sunrise PG</span></h1>
                        <p class="mb-4">Located in the heart of Ahmedabad. Ideal for students and professionals alike,
                            our
                            PG offers a convenient and comfortable living space with all the necessary amenities.</p>
                        <div class="row g-3 pb-4">
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-hotel fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up">52</h2>
                                        <p class="mb-0">Rooms</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-users-cog fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up">12</h2>
                                        <p class="mb-0">Staffs</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-users fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up">500</h2>
                                        <p class="mb-0">Clients</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary py-3 px-5 mt-2" href="/loadroom">Explore Room</a>
                    </div>
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
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Room Start -->
        <div class="container-fluid py-5">
            <div class="container-fluid">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Our Rooms</h6>
                    <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Rooms</span></h1>
                </div>
                <div class="row g-4">
                    @foreach($data as $i)
                    @if($loop->iteration <= 3) <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="room-item shadow rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="{{ asset('img_uploads/' . $i->image) }}" alt="Room Image" style="width: 100%; height: 250px; object-fit: cover;">
                                <small
                                    class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">
                                    {{ $i->price }}</small>
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0">{{ $i->title }}</h5>
                                    <h5 class="mb-0">
                                        <span
                                            style="background-color: {{ $i->remaining_beds > 0 ? '#22c55e' : '#ef4444' }}; color: white; padding: 4px 12px; border-radius: 50px; font-weight: 600; font-size: 14px; box-shadow: 0 2px 4px {{ $i->remaining_beds > 0 ? 'rgba(34, 197, 94, 0.3)' : 'rgba(239, 68, 68, 0.3)' }};">Remaining
                                            Beds: {{ max(0, $i->remaining_beds) }}</span>
                                    </h5>
                                    <!--                        <div class="ps-2">-->
                                    <!--                            <small class="fa fa-star text-primary"></small>-->
                                    <!--                            <small class="fa fa-star text-primary"></small>-->
                                    <!--                            <small class="fa fa-star text-primary"></small>-->
                                    <!--                            <small class="fa fa-star text-primary"></small>-->
                                    <!--                            <small class="fa fa-star text-primary"></small>-->
                                    <!--                        </div>-->
                                </div>
                                <div class="d-flex mb-3">
                                    <small class="border-end me-3 pe-3"><i
                                            class="fa fa-bed text-primary me-2"></i>{{ $i->bed }}</small>
                                    <small><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>
                                </div>
                                <div class="room-desc-wrapper mb-3">
                                    <p class="text-body mb-1 room-desc" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; transition: all 0.3s ease;">{{ $i->detail }}</p>
                                    <a href="javascript:void(0);" class="read-more-btn text-primary" style="display: none; font-size: 14px; font-weight: 600; text-decoration: none;">Read More</a>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-sm btn-primary rounded py-2 px-2" href="/loadappointment">SCHEDULE
                                        A
                                        VISIT</a>
                                    <a class="btn btn-sm btn-dark rounded py-2 px-8" href="/loadroom">BOOK
                                        NOW</a>
                                </div>
                            </div>
                        </div>
                </div>
                @endif
                @endforeach


            </div>
        </div>
    </div>
    <!--        <div class="container-xxl py-5">-->
    <!--            <div class="container">-->
    <!--                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">-->
    <!--                    <h6 class="section-title text-center text-primary text-uppercase">Our Rooms</h6>-->
    <!--                    <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Rooms</span></h1>-->
    <!--                </div>-->
    <!--                <div class="row g-4">-->
    <!--                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">-->
    <!--                        <div class="room-item shadow rounded overflow-hidden">-->
    <!--                            <div class="position-relative">-->
    <!--                                <img class="img-fluid" src="{{ asset('img_uploads/' . $i->image) }}" alt="">-->
    <!--                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">{{ $i->price }}</small>-->
    <!--                            </div>-->
    <!--                            <div class="p-4 mt-2">-->
    <!--                                <div class="d-flex justify-content-between mb-3">-->
    <!--                                    <h5 class="mb-0">{{ $i->title }}</h5>-->
    <!--                                    <div class="ps-2">-->
    <!--                                        <small class="fa fa-star text-primary"></small>-->
    <!--                                        <small class="fa fa-star text-primary"></small>-->
    <!--                                        <small class="fa fa-star text-primary"></small>-->
    <!--                                        <small class="fa fa-star text-primary"></small>-->
    <!--                                        <small class="fa fa-star text-primary"></small>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                                <div class="d-flex mb-3">-->
    <!--                                    <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>1 Bed</small>-->
    <!--                                    <small><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>-->
    <!--                                </div>-->
    <!--                                <p class="text-body mb-3">{{ $i->detail }}</p>-->
    <!--                                <div class="d-flex justify-content-between">-->
    <!--                                    <a class="btn btn-sm btn-primary rounded py-2 px-4" href="">View Detail</a>-->
    <!--                                    <a class="btn btn-sm btn-dark rounded py-2 px-4" href="/loadbooking">Book Now</a>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">-->
    <!--                        <div class="room-item shadow rounded overflow-hidden">-->
    <!--                            <div class="position-relative">-->
    <!--                                <img class="img-fluid" src="{{ asset('img_uploads/' . $i->image) }}" alt="">-->
    <!--                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">{{ $i->price }}</small>-->
    <!--                            </div>-->
    <!--                            <div class="p-4 mt-2">-->
    <!--                                <div class="d-flex justify-content-between mb-3">-->
    <!--                                    <h5 class="mb-0">{{ $i->title }}</h5>-->
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
    <!--                                    <a class="btn btn-sm btn-primary rounded py-2 px-4" href="">{{ $i->detail }}</a>-->
    <!--                                    <a class="btn btn-sm btn-dark rounded py-2 px-4" href="/loadbooking">Book Now</a>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">-->
    <!--                        <div class="room-item shadow rounded overflow-hidden">-->
    <!--                            <div class="position-relative">-->
    <!--                                <img class="img-fluid" src="{{ asset('img_uploads/' . $i->image) }}" alt="">-->
    <!--                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">{{ $i->price }}</small>-->
    <!--                            </div>-->
    <!--                            <div class="p-4 mt-2">-->
    <!--                                <div class="d-flex justify-content-between mb-3">-->
    <!--                                    <h5 class="mb-0">{{ $i->title }}</h5>-->
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
    <!--                                    <a class="btn btn-sm btn-primary rounded py-2 px-4" href="">{{ $i->detail }}</a>-->
    <!--                                    <a class="btn btn-sm btn-dark rounded py-2 px-4" href="/loadbooking">Book Now</a>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!-- Room End -->


    <!--        &lt;!&ndash; Video Start &ndash;&gt;-->
    <!--        <div class="container-xxl py-5 px-0 wow zoomIn" data-wow-delay="0.1s">-->
    <!--            <div class="row g-0">-->
    <!--                <div class="col-md-6 bg-dark d-flex align-items-center">-->
    <!--                    <div class="p-5">-->
    <!--                        <h6 class="section-title text-start text-white text-uppercase mb-3">Luxury Living</h6>-->
    <!--                        <h1 class="text-white mb-4">Discover A Brand Luxurious Hotel</h1>-->
    <!--                        <p class="text-white mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>-->
    <!--                        <a href="" class="btn btn-primary py-md-3 px-md-5 me-3">Our Rooms</a>-->
    <!--                        <a href="" class="btn btn-light py-md-3 px-md-5">Book A Room</a>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="col-md-6">-->
    <!--                    <img class="img-fluid" src="{{ asset('img/gym.jpg') }}" alt="">-->
    <!--                    <div class="gym">-->
    <!--                            <span></span>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->

    <!--        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
    <!--            <div class="modal-dialog">-->
    <!--                <div class="modal-content rounded-0">-->
    <!--                    <div class="modal-header">-->
    <!--                        <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>-->
    <!--                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
    <!--                    </div>-->
    <!--                    <div class="modal-body">-->
    <!--                        &lt;!&ndash; 16:9 aspect ratio &ndash;&gt;-->
    <!--                        <div class="ratio ratio-16x9">-->
    <!--                            <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"-->
    <!--                                allow="autoplay"></iframe>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        &lt;!&ndash; Video Start &ndash;&gt;-->


    <!-- Service Start -->
    <div class="container-fluid py-5">
        <div class="container-fluid">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Our Services</h6>
                <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Services</span></h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="service-item rounded" href="/loadservice">
                        <div class="service-icon bg-transparent border rounded p-1">
                            <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                <i class="fa fa-hotel fa-2x text-primary"></i>
                            </div>
                        </div>
                        <h5 class="mb-3">Rooms</h5>
                        <p class="text-body mb-0">Ready to experience the comfort and convenience of our paying guest
                            accommodation? Contact us today to book your room and start enjoying a hassle-free stay in a
                            welcoming environment.</p>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <a class="service-item rounded" href="/loadservice">
                        <div class="service-icon bg-transparent border rounded p-1">
                            <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                <i class="fa fa-wifi fa-2x text-primary"></i>
                            </div>
                        </div>
                        <h5 class="mb-3">WiFi</h5>
                        <p class="text-body mb-0">Welcome to our SUNRISE PG Wi-Fi facility, designed to provide seamless
                            connectivity and convenience for all our residents."Discover a world of digital
                            possibilities with our hostel's Wi-Fi network".</p>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="service-item rounded" href="/loadservice">
                        <div class="service-icon bg-transparent border rounded p-1">
                            <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                <i class="fa fa-book fa-2x text-primary"></i>
                            </div>
                        </div>
                        <h5 class="mb-3">Library</h5>
                        <p class="text-body mb-0">Our library facility is designed to cater to the diverse interests and
                            academic needs of our residents, providing a quiet and conducive environment for study,
                            research, or leisure reading.</p>
                    </a>
                </div>
                <!--                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">-->
                <!--                        <a class="service-item rounded" href="">-->
                <!--                            <div class="service-icon bg-transparent border rounded p-1">-->
                <!--                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">-->
                <!--                                    <i class="fa fa-swimmer fa-2x text-primary"></i>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                            <h5 class="mb-3">Sports & Gaming</h5>-->
                <!--                            <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>-->
                <!--                        </a>-->
                <!--                    </div>-->
                <!--                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">-->
                <!--                        <a class="service-item rounded" href="">-->
                <!--                            <div class="service-icon bg-transparent border rounded p-1">-->
                <!--                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">-->
                <!--                                    <i class="fa fa-glass-cheers fa-2x text-primary"></i>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                            <h5 class="mb-3">Event & Party</h5>-->
                <!--                            <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>-->
                <!--                        </a>-->
                <!--                    </div>-->
                <!--                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">-->
                <!--                        <a class="service-item rounded" href="">-->
                <!--                            <div class="service-icon bg-transparent border rounded p-1">-->
                <!--                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">-->
                <!--                                    <i class="fa fa-dumbbell fa-2x text-primary"></i>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                            <h5 class="mb-3">GYM & Yoga</h5>-->
                <!--                            <p class="text-body mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.</p>-->
                <!--                        </a>-->
                <!--                    </div>-->
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container-fluid">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Our Team</h6>
                <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Staffs</span></h1>
            </div>
            <div class="row g-4">
                @foreach($data11 as $i)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="rounded shadow overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid" src="{{ asset('img_uploads/' . $i->image) }}" alt="">
                            <!-- Social Media Links (if needed) -->
                            <!--                        <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">-->
                            <!--                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>-->
                            <!--                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>-->
                            <!--                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>-->
                            <!--                        </div>-->
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">{{ $i->name }}</h5>
                            <small>{{ $i->dsg }}</small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--        <div class="container-xxl py-5">-->
    <!--            <div class="container">-->
    <!--                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">-->
    <!--                    <h6 class="section-title text-center text-primary text-uppercase">Our Team</h6>-->
    <!--                    <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Staffs</span></h1>-->
    <!--                </div>-->
    <!--                <div class="row g-4">-->
    <!--                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">-->
    <!--                        <div class="rounded shadow overflow-hidden">-->
    <!--                            <div class="position-relative">-->
    <!--                                <img class="img-fluid" src="{{ asset('img/team-1.jpg') }}" alt="">-->
    <!--&lt;!&ndash;                                <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">&ndash;&gt;-->
    <!--&lt;!&ndash;                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>&ndash;&gt;-->
    <!--&lt;!&ndash;                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>&ndash;&gt;-->
    <!--&lt;!&ndash;                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>&ndash;&gt;-->
    <!--&lt;!&ndash;                                </div>&ndash;&gt;-->
    <!--                            </div>-->
    <!--                            <div class="text-center p-4 mt-3">-->
    <!--                                <h5 class="fw-bold mb-0">Benjamin Hayes</h5>-->
    <!--                                <small>CEO</small>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">-->
    <!--                        <div class="rounded shadow overflow-hidden">-->
    <!--                            <div class="position-relative">-->
    <!--                                <img class="img-fluid" src="{{ asset('img/team-2.jpg') }}" alt="">-->
    <!--&lt;!&ndash;                                <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">&ndash;&gt;-->
    <!--&lt;!&ndash;                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>&ndash;&gt;-->
    <!--&lt;!&ndash;                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>&ndash;&gt;-->
    <!--&lt;!&ndash;                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>&ndash;&gt;-->
    <!--&lt;!&ndash;                                </div>&ndash;&gt;-->
    <!--                            </div>-->
    <!--                            <div class="text-center p-4 mt-3">-->
    <!--                                <h5 class="fw-bold mb-0">Nathan Clarke</h5>-->
    <!--                                <small>CO-FOUNDER</small>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">-->
    <!--                        <div class="rounded shadow overflow-hidden">-->
    <!--                            <div class="position-relative">-->
    <!--                                <img class="img-fluid" src="{{ asset('img/team-3.jpg') }}" alt="">-->
    <!--&lt;!&ndash;                                <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">&ndash;&gt;-->
    <!--&lt;!&ndash;                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>&ndash;&gt;-->
    <!--&lt;!&ndash;                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>&ndash;&gt;-->
    <!--&lt;!&ndash;                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>&ndash;&gt;-->
    <!--&lt;!&ndash;                                </div>&ndash;&gt;-->
    <!--                            </div>-->
    <!--                            <div class="text-center p-4 mt-3">-->
    <!--                                <h5 class="fw-bold mb-0">Alexander Reynolds</h5>-->
    <!--                                <small>MANAGER</small>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">-->
    <!--                        <div class="rounded shadow overflow-hidden">-->
    <!--                            <div class="position-relative">-->
    <!--                                <img class="img-fluid" src="{{ asset('img/team-4.jpg') }}" alt="">-->
    <!--&lt;!&ndash;                                <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">&ndash;&gt;-->
    <!--&lt;!&ndash;                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>&ndash;&gt;-->
    <!--&lt;!&ndash;                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>&ndash;&gt;-->
    <!--&lt;!&ndash;                                    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>&ndash;&gt;-->
    <!--&lt;!&ndash;                                </div>&ndash;&gt;-->
    <!--                            </div>-->
    <!--                            <div class="text-center p-4 mt-3">-->
    <!--                                <h5 class="fw-bold mb-0">Matthew Ellis</h5>-->
    <!--                                <small>EMPLOYEES</small>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!-- Team End -->

    <!-- Testimonial start -->
    <div class="container-fluid py-5">
        <div class="container-fluid">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Our Testimonial</h6>
                <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Testimonial</span></h1>
            </div>
            <div class="container-fluid testimonial mt-5 py-5 bg-dark wow zoomIn" data-wow-delay="0.1s"
                style="margin-bottom: 90px;">
                <div class="container-fluid">
                    <div class="owl-carousel testimonial-carousel py-5">
                        {{--                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p>{{ $i->message }}</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="{{ asset('img_uploads/' . $i->image) }}" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">{{ $i->name }}</h6>
                                <small>{{ $i->dsg }}</small>
                            </div>
                        </div>
                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div> --}}
                        @foreach($data2 as $i)
                        <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                            <p>{{ $i->message }}</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="{{ asset('img_uploads/' . $i->image) }}"
                                    style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">{{ $i->name }}</h6>
                                    <small>{{ $i->dsg }}</small>
                                </div>
                            </div>
                            <i
                                class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                        </div>
                        @endforeach
                        {{--                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd et erat magna eos</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="{{ asset('img/testimonial-3.jpg') }}" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <script src="{{ asset('user/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('user/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('user/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('user/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('user/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('user/js/main.js') }}"></script>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('.room-desc-wrapper').each(function() {
                var wrapper = $(this);
                var desc = wrapper.find('.room-desc')[0];
                var btn = wrapper.find('.read-more-btn');
                
                if (desc.scrollHeight > desc.clientHeight || desc.scrollHeight > 75) {
                    btn.show();
                    btn.off('click').on('click', function() {
                        wrapper.toggleClass('is-expanded');
                        var $desc = $(desc);
                        if (wrapper.hasClass('is-expanded')) {
                            $desc.css('-webkit-line-clamp', 'unset');
                            $(this).text('Read Less');
                        } else {
                            $desc.css('-webkit-line-clamp', '3');
                            $(this).text('Read More');
                        }
                    });
                }
            });
        }, 100);
    });
</script>
</body>

</html>