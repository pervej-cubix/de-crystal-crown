<section>
    <!-- Full Screen Overlay Menu -->
    <div id="fullscreenMenu" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeMenu()">&times;</a>
        <div class="overlay-content">
            <a href="{{ route('home') }}"
                class="menuUnderline {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            <a href="{{route('accommodation')}}"
                class="menuUnderline {{ request()->routeIs('accommodation') ? 'active' : '' }}">Accommodation</a>
            <a href="{{route('dining')}}"
                class="menuUnderline {{ request()->routeIs('dining') ? 'active' : '' }}">Dining</a>
            <a href="{{route('promotion')}}"
                class="menuUnderline {{ request()->routeIs('promotion') ? 'active' : '' }}">Promotions</a>
            <a href="{{route('meetingsEvents')}}"
                class="menuUnderline {{ request()->routeIs('meetingsEvents') ? 'active' : '' }}">Meetings & Events</a>
            <a href="{{route('recreation')}}"
                class="menuUnderline {{ request()->routeIs('recreation') ? 'active' : '' }}">Restaurent</a>
            <a href="{{route('payOnLine')}}"
                class="menuUnderline {{ request()->routeIs('payOnLine') ? 'active' : '' }}">Pay one line</a>
            <a href="{{route('virtualTours')}}"
                class="menuUnderline {{ request()->routeIs('virtualTours') ? 'active' : '' }}">Virtual Tours</a>
            <a href="{{route('photoGallery')}}"
                class="menuUnderline {{ request()->routeIs('photoGallery') ? 'active' : '' }}">Photo gallery</a>
            <a href="{{route('RoyenaStars')}}"
                class="menuUnderline {{ request()->routeIs('RoyenaStars') ? 'active' : '' }}">De Castle Stars</a>
            <a href="{{route('contact')}}"
                class="menuUnderline {{ request()->routeIs('contact') ? 'active' : '' }}">Contact us</a>
        </div>
    </div>

    <div class="logo animate__animated animate__fadeInDown">
        <a href="{{ route('home') }}">
            <img width="auto" height="90px" src="{{asset('/')}}assets/web/media/brand-logo.png" alt="">
        </a>
    </div>

    <a href="{{route('bookNow')}}" class="booknowHome animate__animated animate__fadeInRight">
        <div><i class="fa-solid fa-calendar-days"></i></div>
        <span class="booknow">Book Now</span>
    </a>

    <!-- <a href="{{ route('promotion') }}#target-section" class="offer" onclick="toggleOfferImg(event)">
            <i class="fa-solid fa-gift"></i>
            <span class="vericaltext">
                SPECIAL OFFERS
            </span>
            <div class="offerImg">
                <img src="{{ asset('/') }}assets/web/images/offer1.jpg" alt="">
                <button class="offerButton">View</button>
            </div>
        </a> -->

    @if ($special)
    <div class="offer" onclick="toggleOfferImg(event)">
        <i class="fa-solid fa-gift"></i>
        <span class="vericaltext">
            SPECIAL OFFERS
        </span>
        <div class="offerImg">
            <a href="{{ route('promotion') }}#target-section" onclick="redirectToPromotion(event)">
                <img src="{{ asset($special->image) }}" alt="">
            </a>
        </div>
    </div>
    @endif

    <div class="btn_menu in-left" bis_skin_checked="1" onclick="openMenu()">
        <div id="click_trigger" class="row_flex open" bis_skin_checked="1">
            <div class="box_sticks animate__animated animate__fadeInLeft" bis_skin_checked="1">
                <div id="stick1" class="stick" bis_skin_checked="1"></div>
                <div id="stick2" class="stick" bis_skin_checked="1"></div>
                <div id="stick3" class="stick" bis_skin_checked="1"></div>
                <div class="label_stick" bis_skin_checked="1">MENU</div>
            </div>
        </div>
    </div>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000"
        data-bs-pause="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active" style="height: 100vh;">
                <div class="carousel-overlay"></div> <!-- Dark overlay -->
                <img src="{{ asset('/') }}assets/web/media/slide8.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" style="height: 100vh;">
                <div class="carousel-overlay"></div> <!-- Dark overlay -->
                <img src="{{ asset('/') }}assets/web/media/slide9.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" style="height: 100vh;">
                <div class="carousel-overlay"></div> <!-- Dark overlay -->
                <video class="be-bg-video" autoplay="autoplay" loop="loop" muted="muted" preload="auto"
                    style="width: 100%; height: 100%; object-fit: cover;">
                    <source src="{{ asset('/') }}assets/web/media/video-slide1.mp4" type="video/mp4">
                </video>
            </div>
        </div>



        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span aria-hidden="true">
                <i class="fa-solid fa-arrow-left-long"></i>
            </span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span aria-hidden="true">
                <i class="fa-solid fa-arrow-right-long"></i>
            </span>
            <span class="visually-hidden">Next</span>
        </button>

    </div