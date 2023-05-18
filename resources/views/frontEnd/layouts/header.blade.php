<body>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="ogo me-auto"><a href="{{url('/')}}"><img src="{{asset('images/main-logo.png')}}"></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
{{--      <a href="{{url('/')}}" class="logo me-auto me-lg-0"><img src="{{asset('images/main-logo.png')}}" alt="" class="img-fluid"></a>--}}

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a href="{{url('/')}}l" class="active">Home</a></li>

                <li class="dropdown"><a href="#"><span>About</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="">About Us</a></li>
                        <li><a href="">Teams</a></li>
                        <li><a href="">Organizational Structure</a></li>
                        <li><a href="">Executive Committee</a></li>
                        <li><a href="">Staff Members</a></li>
                    </ul>
                </li>

                <li><a href="">Events</a></li>
                <li><a href="">Notices</a></li>
                <li><a href="">Gallery</a></li>
                <li><a href="">Blogs</a></li>
                <li><a href="">Contact</a></li>

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <div class="header-social-links d-flex">
            <a href="{{ systemSetting()->office_twitter_link }}" class="twitter"><i class="bu bi-twitter"></i></a>
            <a href="{{systemSetting()->office_facebook_link}}" class="facebook"><i class="bu bi-facebook"></i></a>
            <a href="{{systemSetting()->office_youtube_link}}" class="youtube"><i class="bu bi-youtube"></i></a>
            <a href="{{systemSetting()->office_linked_in_link}}" class="linkedin"><i class="bu bi-linkedin"></i></a>
        </div>

    </div>
</header><!-- End Header -->