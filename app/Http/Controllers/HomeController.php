<?php

namespace App\Http\Controllers;

use App\Models\Accomodation;
use App\Models\Address;
use App\Models\Dining;
use App\Models\Meeting;
use App\Models\PhotoGallery;
use App\Models\Promotion;
use App\Models\Recreation;
use App\Models\SocialLink;
use App\Models\Special;
use App\Models\Stars;
use App\Models\VirtualTour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        return view('web.pages.home', [
            'special' => Special::where('status', 1)->first(),
            'promotions' => Promotion::where('status', 1)
                ->orderBy('created_at', 'desc')
                ->take(2)
                ->get(),
            'Recreations' => Recreation::where('status', 1)->get(),
            'accomodations' => Accomodation::where('status', 1)->get(),
            'social_link' => SocialLink::select('map_link')->where('status', 1)->first()
        ]);
    }

    public function accommodation()
    {
        $accommodation = Accomodation::where('status', 1)->get();

        return view('web.pages.accommodation', [
            'accommodations' => $accommodation,
        ]);
    }

    public function dining()
    {
        $dining = Dining::where('status', 1)->get();

        return view('web.pages.dining', [
            'dininges' => $dining,
        ]);
    }

    public function promotion()
    {
        return view('web.pages.promotions', [
            'promotions' => Promotion::where('status', 1)->get(),
            'special' => Special::where('status', 1)->first(),
            'social_link' => SocialLink::select('map_link')->where('status', 1)->first()
        ]);
    }

    public function meetingsEvents()
    {
        $meeting = Meeting::where('status', 1)->get();

        return view('web.pages.meetingsEvents', [
            'meetings' => $meeting,
        ]);
    }

    public function recreation()
    {
        $recreation = Recreation::with('recreation_galleries')->where('status', 1)->get();
        // echo "<pre>";
        // print_r($recreation);
        // exit;
        return view('web.pages.recreation', [
            'recreations' => $recreation,
        ]);
    }

    public function payOnLine()
    {
        return view('web.pages.payOnLine');
    }

    public function virtualTours()
    {
        $virtual_tour = VirtualTour::where('status', 1)->get();

        return view('web.pages.virtualTours', [
            'virtual_tours' => $virtual_tour,
        ]);
    }

    public function photoGallery()
    {
        $gallery_photos = PhotoGallery::where('status', 1)->get();

        return view('web.pages.photoGallery', [
            'gallery_photos' => $gallery_photos,
        ]);
    }

    public function loyaltyProgram()
    {
        $with_title = Stars::where('status', 1)->where('title', '!=', '')->first();
        $without_title = Stars::where('status', 1)->where('title', '=', null)->get();
        $images = Stars::select('image')->where('status', 1)->where('image', '!=', '')->get();
        // dd($images);
        return view('web.pages.loyaltyProgram', [
            'with_title' => $with_title,
            'without_title' => $without_title,
            'images' => $images
        ]);
    }

    public function contact()
    {
        $addresses = Address::where('status', 1)->get();
        $social_link = SocialLink::select('map_link')->where('status', 1)->first();
        // dd($social_link);
        return view('web.pages.contact', [
            'addresses' => $addresses,
            'social_link' => $social_link
        ]);
    }

    public function bookNow()
{
    $countryUrl = "http://192.168.0.185/pms-ci/api/countrysList";
    $roomTypesUrl = "http://192.168.0.185/pms-ci/api/roomTypes";

    $settingsUrl = "http://192.168.0.185/pms-ci/api/settings";

    $chCurl = curl_init();
    // Set cURL options
    curl_setopt($chCurl, CURLOPT_URL, $settingsUrl);
    curl_setopt($chCurl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($chCurl, CURLOPT_HTTPHEADER, [
        'Accept: application/json',
    ]);

    $settingsResponse = curl_exec($chCurl);
    if (curl_errno($chCurl)) {
        echo 'cURL error: ' . curl_error($chCurl);
        curl_close($chCurl);
        exit;
    }

    curl_close($chCurl);
    $settingsData = json_decode($settingsResponse, true);
    $token_rules=explode('#', base64_decode($settingsData['data']['rules_for_keys']));
    
    $key=md5($token_rules[0].date("Y-m-d"));

    $chCountry = curl_init();
    curl_setopt($chCountry, CURLOPT_URL, $countryUrl);
    curl_setopt($chCountry, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($chCountry, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: ' . $key,  
    ]);
    
    $countryResponse = curl_exec($chCountry);

    // Handle cURL errors for country request
    if(curl_errno($chCountry)) {
        // Handle the error (for example, log the error)
        curl_close($chCountry);
        return view('web.pages.bookNow')->with('error', 'Error fetching countries: ' . curl_error($chCountry));
    }
    curl_close($chCountry);

    $chRoomTypes = curl_init();
    
    curl_setopt($chRoomTypes, CURLOPT_URL, $roomTypesUrl);
    curl_setopt($chRoomTypes, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($chRoomTypes, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: ' .$key, 
    ]);
    $roomTypesResponse = curl_exec($chRoomTypes);

    // Handle cURL errors for room types request
    if(curl_errno($chRoomTypes)) {
        // Handle the error (for example, log the error)
        curl_close($chRoomTypes);
        return view('web.pages.bookNow')->with('error', 'Error fetching room types: ' . curl_error($chRoomTypes));
    }
    curl_close($chRoomTypes);

    // Decode the JSON responses to arrays
    $countries = json_decode($countryResponse, true);
    $roomTypes = json_decode($roomTypesResponse, true);
    $countrylist= $countries['data'];
    $roomType= $roomTypes['data'];

    return view('web.pages.bookNow', ['roomTypes' => $roomType, 'countries' => $countrylist]);
}
    public function roomDetails($slug)
    {
        $accommodation = Accomodation::where('slug', $slug)
            ->with('accommodation_gallaries')
            ->firstOrFail();

        return view('web.pages.roomDetails', [
            'accommodation' => $accommodation,
        ]);
    }
}