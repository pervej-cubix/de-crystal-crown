@extends('web.main')

@section('content')


<section id="diningSection" style="padding-top: 17px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a class="diningHeading">Meetings & Events</a>
                    
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-8 m-auto">
                    <p style="text-align: justify;" >
                    Royena Resort offers exceptional facilities for meetings and events, making it an ideal venue for corporate gatherings, weddings, and special celebrations. The resort features versatile event spaces that can accommodate a range of activities, from intimate meetings to grand receptions.
                    The event spaces are designed with modern amenities, ensuring a seamless experience for organizers and attendees. With a dedicated team of professionals, the resort provides tailored services, including event planning and coordination, catering options, and technical support to meet various needs.</p>
                    
                </div>
            </div>
            
        </div>
    </section>
    <section id="Speacitial-feature">
        <div class="container mt-5 ">
            <div class="row">
                <div class="col-md-12 text-center m-4">
                    <h3>Special Features</h3>
                </div>
            </div>
            <div class="row pb-5 ">
                <div class="col-md-4 text-center">
                    <h6>No of Dining Space</h6>
                    <h6>05</h6>
                </div>
                
                <div class="col-md-4 text-center">
                    <h6>Capacity</h6>
                    <h6>1000</h6> 
                    
                </div>
                <div class="col-md-4  text-center">
                    <h6>Book Your Table</h6>
                    <h6>01723545434</h6>
                </div>


            </div>
        </div>
    </section>

    <section>
        <div class="container mt-5">
        @foreach ($meetings as $meeting)
        <div class="row mb-4">
                <div class="col-md-6 animate__animated animate__fadeInLeftBig" style="animation-duration: 1.5s; animation-delay: 0.5s;">
                    <!-- Thumbnail Image -->
                    <a href="{{ asset($meeting->image) }}" data-lightbox="{{$meeting->meetingName}}">
                        <img class="zoom-out top-image" style="width: 100%; height: 400px;" src="{{ asset($meeting->image) }}" alt="">
                    </a>
                
                    <!-- Lightbox Trigger (Optional Icon Links) -->
                    <a href="{{ asset($meeting->image) }}" class="lightBox" data-lightbox="{{$meeting->meetingName}}">
                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                    </a>
                    <a href="#" class="threeD"><i class="fa-solid fa-cube"></i></a>

                    @if($meeting->meeting_gallaries && count($meeting->meeting_gallaries) > 0)
                        @foreach($meeting->meeting_gallaries as $meeting_gallaray)
                        <a href="{{ asset($meeting_gallaray->meeting_photo) }}" data-lightbox="{{$meeting->meetingName}}" style="display: none; width: 100%;"></a>
                        @endforeach
                    @else
                        <p>No Galleries Available</p>
                    @endif

                </div>
                
                <div class="col-md-6 pl-5 back animate__animated animate__fadeInRightBig" style="animation-duration: 1.5s; animation-delay: 0.5s;"">
                    <h3 class="diningHeading mt-3">{{$meeting->meetingName}}</h3>
                    <p class="mt-3" style="text-align: justify;" >{{$meeting->description}}</p>
                    <h5 class="mt-3" style="color:#6EC1E4"><i class="fa-solid fa-gift"></i> Features</h5>
                    @if ($meeting->Features1)
                    <li class="clubItem"><i  style="color:#6EC1E4" class="fa-solid fa-check foo"></i>{{$meeting->Features1}}</li>
                    @endif
                    @if ($meeting->Features2)
                    <li class="clubItem"><i  style="color:#6EC1E4" class="fa-solid fa-check foo"></i>{{$meeting->Features2}}</li>
                    @endif
                    @if ($meeting->Features3)
                    <li class="clubItem"><i  style="color:#6EC1E4" class="fa-solid fa-check foo"></i>{{$meeting->Features3}}</li>
                    @endif
                    @if ($meeting->Features4)
                    <li class="clubItem"><i  style="color:#6EC1E4" class="fa-solid fa-check foo"></i>{{$meeting->Features4}}</li>
                    @endif
                    @if ($meeting->Features5)
                    <li class="clubItem"><i  style="color:#6EC1E4" class="fa-solid fa-check foo"></i>{{$meeting->Features5}}</li>
                    @endif
                    @if ($meeting->Features6)
                    <li class="clubItem"><i  style="color:#6EC1E4" class="fa-solid fa-check foo"></i>{{$meeting->Features6}}</li>
                    @endif
                </div>
            </div>
            
        </div>
        @endforeach
    </section>


@endsection