<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Contact US</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

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
</head>

<body>
    <div class="container-fluid bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        @include('user.header')


        <!-- Page Header Start -->
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url();">
            <div class="container-fluid page-header-inner py-5">
                <div class="container-fluid text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Contact</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="/#">Home</a></li>
<!--                            <li class="breadcrumb-item"><a href="#">Pages</a></li>-->
                            <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
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


        <!-- Contact Start -->
        <div class="container-fluid py-5">
            <div class="container-fluid">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Contact Us</h6>
                    <h1 class="mb-5"><span class="text-primary text-uppercase">Contact</span> For Any Query</h1>
                </div>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="row gy-4">
                            <div class="col-md-4">
                                <h6 class="section-title text-start text-primary text-uppercase">Booking</h6>
                                <p><i class="fa fa-envelope-open text-primary me-2"></i>book@sunrise.com</p>
                            </div>
                            <div class="col-md-4">
                                <h6 class="section-title text-start text-primary text-uppercase">General</h6>
                                <p><i class="fa fa-envelope-open text-primary me-2"></i>info@sunrise.com</p>
                            </div>
                            <div class="col-md-4">
                                <h6 class="section-title text-start text-primary text-uppercase">Technical</h6>
                                <p><i class="fa fa-envelope-open text-primary me-2"></i>tech@sunrise.com</p>
                            </div>
                        </div>
                    </div>
<div class="row">
    <div class="col-lg-6">
        <div class="row g-3">
            <div class="col-6 text-end">
                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="{{ asset('user/img/about-001.jpg') }}" style="margin-top: 25%;">
            </div>
            <div class="col-6 text-start">
                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="{{ asset('user/img/about-002.jpg') }}">
            </div>
            <div class="col-6 text-end">
                <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="{{ asset('user/img/about-003.jpg') }}">
            </div>
            <div class="col-6 text-start">
                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="{{ asset('user/img/about-004.jpg') }}">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="wow fadeInUp" data-wow-delay="0.2s">
            <form method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="name" placeholder="Your Name">
                            <label data-model-name="name">Your Name</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="email" class="form-control" name="email" placeholder="Your Email">
                            <label data-model-name="email">Your Email</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="subject" placeholder="Subject">
                            <label data-model-name="subject">Subject</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a message here" name="message" style="height: 150px"></textarea>
                            <label data-model-name="message">Message</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--   <div class="row">-->
<!--        <div class="col-md-6 mx-auto wow fadeIn" data-wow-delay="0.1s">-->
<!--            <div class="wow fadeInUp" data-wow-delay="0.2s">-->
<!--                <form method="POST">-->
<!--                    @csrf-->
<!--                    <div class="row g-3">-->
<!--                        <div class="col-md-6">-->
<!--                            <div class="form-floating">-->
<!--                                <input type="text" class="form-control" name="name" placeholder="Your Name">-->
<!--                                <label data-model-name="name">Your Name</label>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-md-6">-->
<!--                            <div class="form-floating">-->
<!--                                <input type="email" class="form-control" name="email" placeholder="Your Email">-->
<!--                                <label data-model-name="email">Your Email</label>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-12">-->
<!--                            <div class="form-floating">-->
<!--                                <input type="text" class="form-control" name="subject" placeholder="Subject">-->
<!--                                <label data-model-name="subject">Subject</label>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-12">-->
<!--                            <div class="form-floating">-->
<!--                                <textarea class="form-control" placeholder="Leave a message here" name="message" style="height: 150px"></textarea>-->
<!--                                <label data-model-name="message">Message</label>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-12">-->
<!--                            <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>-->
<!--                        </div>-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->


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
</body>

</html>