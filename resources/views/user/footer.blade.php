    <!-- Newsletter Start -->
    <div class="container-fluid newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="row justify-content-center">
            <div class="col-lg-10 border rounded p-1">
                <div class="border rounded text-center p-1">
                    <div class="bg-white rounded text-center p-5">
                        <h4 class="mb-4">Subscribe Our <span class="text-primary text-uppercase">Newsletter</span></h4>
                        <form class="form_subscri" method="post" action="/News">
                            @csrf
                            <div class="position-relative mx-auto" style="max-width: 400px;">
                                <input class="form-control w-100 py-3 ps-4 pe-5" type="text" placeholder="Enter your email" name="email">
                                <button type="submit" class="btn btn-primary py-2 px-3 position-absolute top-0 end-0 mt-2 me-2">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter Start -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer wow fadeIn" data-wow-delay="0.1s">
        <div class="container-fluid pb-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-4">
                    <div class="bg-primary rounded p-4">
                        <a href="{{ route('index') }}"><h1 class="text-white text-uppercase mb-3">SUNRISE PG</h1></a>
                        <p class="text-white mb-0">
                            Located in the heart of Ahmedabad. Ideal for students and professionals alike,
                            our PG offers a convenient and comfortable living space with all the necessary
                            amenities.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <h6 class="section-title text-start text-primary text-uppercase mb-4">Contact</h6>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Ashram Road, Ahmedabad, Gujarat.</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+91 7016853819</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@sunrise.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="row gy-5 g-4">
                        <div class="col-md-6">
                            <h6 class="section-title text-start text-primary text-uppercase mb-4">PAYING GUEST</h6>
                            <a class="btn btn-link" href="/loadabout">About Us</a>
                            <a class="btn btn-link" href="/loadcontact">Contact Us</a>
                            <a class="btn btn-link" href="/loadservice">Service</a>
                            <a class="btn btn-link" href="/loadappointment">Appointment</a>
                            <a class="btn btn-link" href="/loadroom">Explore Residency</a>
                        </div>
                        <div class="col-md-6">
                            <h6 class="section-title text-start text-primary text-uppercase mb-4">Services</h6>
                            <a class="btn btn-link" href="/loadservice">Rooms</a>
                            <a class="btn btn-link" href="/loadservice">WiFi</a>
                            <a class="btn btn-link" href="/loadservice">Library</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">SUNRISE PG</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="/">Home</a>
                            <a href="#">Cookies</a>
                            <a href="#">Help</a>
                            <a href="#">FAQs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
