@extends('web.main')

@section('content')

<!-- About us section -->
@foreach($aboutUs as $item)
    @if($item->status == 1)
        <section>
            <div class="container mt-5">
                <div class="row align-items-center">
                    <h2 class="about-heading-first mt-4"><b>about us</b></h2>
                    <div class="col-md-6 sm-12 lg-3">
                        <h1 class="about-heading mb-4">{{ $item->title }}</h1>
                        <p class="about-paragrape">
                            {{ $item->description }}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <div style="overflow: hidden; height: 60vh;">
                            <img class="zoom-out" style="width: 100%;" src="{{ asset($item->image) }}" alt="{{ $item->title }}">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endforeach


<!-- What makes reayna different? -->
<section id="different">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 text-center ">
                <h3 class="mt-5 hedline underline">What makes De Crystal different?</h3>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row" style="overflow:hidden;">
            <div class="col-md-6 text-center fade-in" data-animation="fadeInLeft">
                <img style="width: 100%;" src="{{asset('/')}}assets/web/media/about.jpg" alt="">
            </div>
            <div class="col-md-6 desc fade-in" data-animation="fadeInRight">
                <!-- <div class="diffrent-icon"><i class="fa-solid fa-compact-disc"></i></div> -->
                <h3>Things To Do</h3>
                @foreach ($Recreations as $Recreation)
                <li> <i class="fa-solid fa-bullseye diffrentIcon"></i>{{$Recreation->name}}</li>
                @endforeach
                <!-- <li> <i class="fa-solid fa-bullseye diffrentIcon"></i> GYM</li>
                        <li> <i class="fa-solid fa-bullseye diffrentIcon"></i> Recreation Center</li>
                        <li> <i class="fa-solid fa-bullseye diffrentIcon"></i> Boating</li>
                        <li> <i class="fa-solid fa-bullseye diffrentIcon"></i> Golf field</li>
                        <li> <i class="fa-solid fa-bullseye diffrentIcon"></i> Outdoor sports</li>
                        <li> <i class="fa-solid fa-bullseye diffrentIcon"></i> Big field</li> -->
                <!-- <li> <i class="fa-solid fa-bullseye diffrentIcon"></i> VR Games</li>
                        <li> <i class="fa-solid fa-bullseye diffrentIcon"></i> Zip Line</li>
                        <li> <i class="fa-solid fa-bullseye diffrentIcon"></i> ATV Bike</li> -->

                <div class="mt-3"><a href="{{ route('recreation')}}" class="btn btn-primary btn_de text-center">Read
                        more</a></div>
            </div>
        </div>
    </div>
</section>

<!-- Comfortable Stay -->
<section id="comfortable">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 text-center mt-5">
                <h3 class="hedline underline">Comfortable Stay</h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="owl-carousel owl-theme">
                    @foreach ($accomodations as $accomodation)
                    <div class="item ">
                        <div class="card boxx border-0 shadow m-2 bg-white p-2 pt-2 text-center">
                            <img src="{{asset($accomodation->image)}}" class="card-img-top profileImg" alt="">
                            <h3 class="mt-2">{{$accomodation->roomType}}</h3>
                            <p class="mt-2">{{ Str::limit($accomodation->description, 150, '...') }}</p>
                            <a href="{{route('roomDetails',$accomodation->slug)}}"
                                class="btn btn-primary btn_de text-center">Read more</a>
                        </div>
                    </div>
                    @endforeach
                    <!-- Add more items here as needed -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Speacitial offer -->
@if ($promotions && $promotions->isNotEmpty())
<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3 class="hedline underline">Promotional Offer</h3>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            @foreach($promotions as $promotion)
            <div class="col-md-6 pro text-center fade-in"
                data-animation="{{ $loop->iteration % 2 == 1 ? 'fadeInLeft' : 'fadeInRight' }}">
                <a href=""><img class="zoom-out" src="{{ asset($promotion->image) }}" alt=""></a>
            </div>
            @endforeach
            <!-- <div class="col-md-6 pro text-center fade-in" data-animation="fadeInRight">
                    <a href=""> <img class="zoom-out" src="{{asset('/')}}assets/web/images/offer1.jpg" alt=""></a>
                </div> -->
        </div>
    </div>
</section>
@endif

<!-- Maps -->
<section class="mt-5">
    <iframe src="{{$social_link->map_link}}" width="100%" height="450" style="border:0;" allowfullscreen=""
        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

@endsection