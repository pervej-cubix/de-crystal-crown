<section id="footer">
    <div class="container mt-5">
        <div class="row mt-5 text-center">

            <a href="{{route('payOnLine')}}">
                <img class="ssl" src="{{asset('/')}}assets/web/images/sslcommerz.png" alt="">
            </a>
        </div>
        <div class="row mt-5">
            <div class="col-md-4">
                <a href="{{ route('home') }}">
                    <img width="auto" height="80px" src="{{asset('/')}}assets/web/media/brand-logo.png" alt="">
                </a>
                <h3 class="follow_us my-3" style="color: #ecb617;">Follow us</h3>
                <div class="footerItem">
                    <a class="ps-0" href="{{$social_link->fb_link}}" target="_blank"><i
                            class="fa-brands fa-square-facebook"></i></a>
                    <a href="{{$social_link->instagram_link}}" target="_blank"><i
                            class="fa-brands fa-instagram"></i></a>
                    <a href="{{$social_link->youtube_link}}" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                    <a href="{{$social_link->whatsapp_link}}" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
                </div>
            </div>
            <div class="col-md-4 mt-3 text-white">
                <div class="d-flex gap-3 align-items-center">
                    <h3><i class="fa-solid fa-phone"></i></h3>
                    <h3 class="numberUnderline">{{$social_link->mobile}}</h3>
                </div>
                <div class="d-flex gap-3 align-items-center">
                    <h3><i class="fa-solid fa-envelope"></i></h3>
                    <h3>info@crystalcrownhotelbd.com</h3>
                </div>
                <div class="d-flex gap-3 align-items-center">
                    <h3><i class="fa-solid fa-location-dot"></i></h3>
                    <h3 class="pt-2 pb-0">House-5, Road-23/A, Gulshan-1 <br />Dhaka-1212, Bangladesh.
                    </h3>
                </div>
            </div>

            <div class="col-md-4 mt-3 mb-5 pagelink">
                <h3><a href="{{route('bookNow')}}" class="pagelinkunderline">Book Now </a></h3>
                <h3><a href="{{route('virtualTours')}}" class="pagelinkunderline">Virtual Tours </a></h3>
                <h3><a href="{{route('photoGallery')}}" class="pagelinkunderline">Photo Gallery </a></h3>
                <h3><a href="{{route('DeCrystalStars')}}" class="pagelinkunderline">De Castle Stars</a></h3>
                <h3><a href="{{route('contact')}}" class="pagelinkunderline">Contact Us </a></h3>
            </div>
        </div>
        <div class="row">
            <hr class="text-white">
            <div class="col-md-6">
                <h6 class="foot">© 2024.De-Crystal-Corwn. All right reserved</h6>
            </div>
            <div class="col-md-6 text-end">
                <h6 class="foot">
                    <a href="https://cubixbd.com/">Site By
                        <img width="50px" src="{{asset('/')}}assets/web/media/cubixbd.png" data-bs-toggle="tooltip"
                            title="Cubix Technology" />
                        <small><strong>Cubix Technology</strong></small>
                    </a>
                </h6>

            </div>
        </div>

    </div>
</section>