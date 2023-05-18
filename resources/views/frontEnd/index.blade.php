@extends('frontEnd.layouts.app')
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <div class="carousel-inner" role="listbox">

                @foreach($banners as $banner)
                    <div class="carousel-item active" style="background-image: url('<?= (isset($banner->image))?asset('storage/uploads/banners/'.$banner->image) : asset('images/placeholder.jpg') ?>');">
                        <div class="carousel-container">
                            <div class="carousel-content animate__animated animate__fadeInUp">
                                <h2>{{$banner->header_title}}</h2>
                                <p>{{$banner->description}}</p>
                                <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach

{{--                <!-- Slide 1 -->--}}
{{--                <div class="carousel-item active" style="background-image: url(design/img/slide/slide-1.jpg);">--}}
{{--                    <div class="carousel-container">--}}
{{--                        <div class="carousel-content animate__animated animate__fadeInUp">--}}
{{--                            <h2>Welcome to <span>Company</span></h2>--}}
{{--                            <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>--}}
{{--                            <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Slide 2 -->--}}
{{--                <div class="carousel-item" style="background-image: url(design/img/slide/slide-2.jpg);">--}}
{{--                    <div class="carousel-container">--}}
{{--                        <div class="carousel-content animate__animated animate__fadeInUp">--}}
{{--                            <h2>Lorem Ipsum Dolor</h2>--}}
{{--                            <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>--}}
{{--                            <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Us Section ======= -->
        <section id="about-us" class="about-us">
            <div class="container" data-aos="fade-up">

                <div class="row content">
                    <div class="col-lg-6" data-aos="fade-right">
                        <h2>Find Out More About Us</h2>
                        <h3>We preserve what you have, We provide what you lack</h3>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
                        <p>
                           {{$aboutUs->description}}
                        </p>

                    </div>
                </div>

            </div>
        </section>
        <!-- End About Us Section -->

        <!-- ======= Our Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Our <strong>Team</strong></h2>
                </div>

                <div class="row">

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        @foreach($teams as $team)
                        <div class="member" data-aos="fade-up">
                            <div class="member-img">
                                <img src="{{URL::to('/storage/uploads/teams/'.$team->image)}}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href="{{$team->twitter_link}}"><i class="bi bi-twitter"></i></a>
                                    <a href={{$team->facebook_link}}><i class="bi bi-facebook"></i></a>
                                    <a href={{$team->insta_link}}><i class="bi bi-instagram"></i></a>
                                    <a href={{$team->linkedin_link}}><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>{{$team->full_name}}</h4>
                                <span>{{$team->designation}}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>

            </div>
        </section><!-- End Our Team Section -->

{{--        <!-- ======= Portfolio Section ======= -->--}}
{{--        <section id="portfolio" class="portfolio">--}}
{{--            <div class="container">--}}

{{--                <div class="row" data-aos="fade-up">--}}
{{--                    <div class="col-lg-12 d-flex justify-content-center">--}}
{{--                        <ul id="portfolio-flters">--}}
{{--                            <li data-filter="*" class="filter-active">All</li>--}}
{{--                            <li data-filter=".filter-app">Image</li>--}}
{{--                            <li data-filter=".filter-card">Video</li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="row portfolio-container" data-aos="fade-up">--}}

{{--                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">--}}
{{--                        <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">--}}
{{--                        <div class="portfolio-info">--}}
{{--                            <h4>App 1</h4>--}}
{{--                            <p>App</p>--}}
{{--                            <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>--}}
{{--                            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">--}}
{{--                        <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">--}}
{{--                        <div class="portfolio-info">--}}
{{--                            <h4>Web 3</h4>--}}
{{--                            <p>Web</p>--}}
{{--                            <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>--}}
{{--                            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                </div>--}}

{{--            </div>--}}
{{--        </section><!-- End Portfolio Section -->--}}



    </main><!-- End #main -->
@endsection


