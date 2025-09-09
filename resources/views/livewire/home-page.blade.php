<div>
    {{-- Banner Section --}}
    <section id="banner" class="banner-section">
        <div class="container">
            <div class="div_zindex">
                <div class="row">
                    <div class="col-md-5 col-md-push-7">
                        <div class="banner_content">
                            <h1>Find the right car for you.</h1>
                            <p>We have more than a thousand cars for you to choose.</p>
                            <a href="#" class="btn btn-danger">Read More
                                <span class="angle_arrow">
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Vehicles Section --}}
    <section class="section-padding gray-bg" id="vehicles">
        <div class="container">
            <div class="section-header text-center">
                <h2>Find the Best <span>CarForYou</span></h2>
                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form...</p>
            </div>

            <div class="row">
                {{-- Shembull makine statike --}}
                <div class="col-list-3">
                    <div class="recent-car-list">
                        <div class="car-info-box">
                            <a href="{{ route('vehicle.detail') }}">
                                <img src="{{ asset('assets/images/car.png') }}" class="img-responsive" alt="image">
                            </a>
                            <ul>
                                <li><i class="fa fa-car"></i>Petrol</li>
                                <li><i class="fa fa-calendar"></i>2022</li>
                                <li><i class="fa fa-calendar"></i>Automatic</li>
                                <li><i class="fa fa-calendar"></i>15000 km</li>
                            </ul>
                        </div>
                        <div class="car-title-m">
                            <h6>Toyota Corolla</h6>
                            <span class="price">50 € /Dita</span>
                        </div>
                    </div>
                </div>

                <div class="col-list-3">
                    <div class="recent-car-list">
                        <div class="car-info-box">
                            <a href="{{ route('vehicle.detail') }}">
                                <img src="{{ asset('assets/images/car.png') }}" class="img-responsive" alt="image">
                            </a>
                            <ul>
                                <li><i class="fa fa-car"></i>Petrol</li>
                                <li><i class="fa fa-calendar"></i>2022</li>
                                <li><i class="fa fa-calendar"></i>Automatic</li>
                                <li><i class="fa fa-calendar"></i>15000 km</li>
                            </ul>
                        </div>
                        <div class="car-title-m">
                            <h6>Toyota Corolla</h6>
                            <span class="price">50 € /Dita</span>
                        </div>
                    </div>
                </div>

                <div class="col-list-3">
                    <div class="recent-car-list">
                        <div class="car-info-box">
                            <a href="{{ route('vehicle.detail') }}">
                                <img src="{{ asset('assets/images/car.png') }}" class="img-responsive" alt="image">
                            </a>
                            <ul>
                                <li><i class="fa fa-car"></i>Petrol</li>
                                <li><i class="fa fa-calendar"></i>2022</li>
                                <li><i class="fa fa-calendar"></i>Automatic</li>
                                <li><i class="fa fa-calendar"></i>15000 km</li>
                            </ul>
                        </div>
                        <div class="car-title-m">
                            <h6>Toyota Corolla</h6>
                            <span class="price">50 € /Dita</span>
                        </div>
                    </div>
                </div>

                {{-- Shto makina të tjera në të njëjtin format --}}
            </div>
        </div>
    </section>

    {{-- Fun Facts Section --}}
    <section class="fun-facts-section">
        <div class="container div_zindex">
            <div class="row">
                <div class="col-lg-3 col-xs-6 col-sm-3">
                    <div class="fun-facts-m">
                        <div class="cell">
                            <h2><i class="fa fa-calendar"></i>40+</h2>
                            <p>Years In Business</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6 col-sm-3">
                    <div class="fun-facts-m">
                        <div class="cell">
                            <h2><i class="fa fa-car"></i>1200+</h2>
                            <p>New Cars For Sale</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6 col-sm-3">
                    <div class="fun-facts-m">
                        <div class="cell">
                            <h2><i class="fa fa-car"></i>1000+</h2>
                            <p>Used Cars For Sale</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6 col-sm-3">
                    <div class="fun-facts-m">
                        <div class="cell">
                            <h2><i class="fa fa-user-circle-o"></i>600+</h2>
                            <p>Satisfied Customers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dark-overlay"></div>
    </section>

    {{-- Back to top --}}
    <div id="back-top" class="back-top">
        <a href="#top"><i class="fa fa-angle-up"></i></a>
    </div>


    {{-- Scripts --}}
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/interface.js') }}"></script>
    <script src="{{ asset('assets/switcher/js/switcher.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-slider.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
</div>
