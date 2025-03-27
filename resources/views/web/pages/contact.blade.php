@extends('web.main')

@section('content')


<section id="diningSection" style="padding-top: 17px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a class="diningHeading">Contact Us</a>

            </div>
        </div>
    </div>
</section>
<section id="Speacitial-feature">
    <div class="container mt-5 p-3 text-center ">
        <div class="row ">
            @foreach($addresses as $address)
            <div class="col-md-3 text-center">
                <div class="contactIcon"><i class="{{$address->icon}}"></i></div>
                <div class="contactHeading">{{$address->title}}</div>
                <p class="contactDescription">{{$address->address}}</p>
            </div>
            @endforeach
</section>
<section>
    <div class="container text-center mt-5">
        <div class="row">
            <div class="col-md-5 m-auto">
                <p class="formHeading">Dear valued guest, please complete the following fields and we will contact you
                    soon.</p>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-7 m-auto">
                <form>
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6">
                            <!-- First Name -->
                            <div class="mb-3">
                                <input type="text" class="form-control formField" id="firstName"
                                    placeholder="Enter your first name">
                            </div>
                            <!-- Email -->
                            <div class="mb-3">
                                <input type="email" class="form-control formField" id="email"
                                    placeholder="Enter your email">
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">
                            <!-- Last Name -->
                            <div class="mb-3">

                                <input type="text" class="form-control formField" id="lastName"
                                    placeholder="Enter your last name">
                            </div>
                            <!-- Phone Number -->
                            <div class="mb-3">

                                <input type="text" class="form-control formField" id="phone"
                                    placeholder="Enter your phone number">
                            </div>
                        </div>
                    </div>

                    <!-- Full-Width Section -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <input type="text" class="form-control formField" id="subject"
                                    placeholder="Enter your subject">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Textarea -->
                            <div class="mb-3">

                                <textarea class="form-control " id="comments" rows="8"
                                    placeholder="Enter your comments"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-outline-secondary w-100 formBtn"> <i
                                    class="fa-solid fa-location-arrow"></i> SEND</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>


<section>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-12">
                <iframe src="{{$social_link->map_link}}" width="100%" height="450" style="border:0;" allowfullscreen=""
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

@endsection