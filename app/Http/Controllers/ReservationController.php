<?php

namespace App\Http\Controllers;

use App\Mail\ReservationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;


class ReservationController extends Controller
{
    public function sendReservationMail(Request $request){
        $checkinDate = Carbon::parse($request->input('checkin'));
        $checkoutDate = Carbon::parse($request->input('checkout'));
        $dayCount = $checkinDate->diffInDays($checkoutDate);

        $data = [
            'checkin_date' => $request->checkin,
            'checkout_date' => $request->checkout,
            'room_type' => $request->roomtype,
            'pax_in' => $request->adult_no,
            'child_in' => $request->child_no,
            'country' => $request->country,
            'title' => $request->title,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'guest_remarks' => $request->requirements??'N/A',
            // static property
            'day_count'  => $dayCount,
            'reservation_mode' => 1,
            'currency_type' => 1,
            'conversion_rate' => 1,
            'guest_source_id' => 1,
            'reference_id' => 29,
            'reservation_status' => 1,
        ];

        try {
            Mail::to('pervej@cubixbd.com')->send(new ReservationMail($data));
            
            return response()->json([
                'success' => true,
                'message' => 'Email sent successfully!'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to send email. Error: ' . $e->getMessage()
            ], 500);
        }

        // return response()->json('messages', 'Reservation email sent successfully!');

        // return response()->json([
        //     'data' => $data,
        //     'status' => "Success",
        //     'messages' => "Mail sent successfully",
        // ]);
    }

    public function sendReservation(Request $request)
    {
        $apiUrl = env('API_URL');
        $settingsUrl = "$apiUrl/settings";
        
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
   
        $checkinDate = Carbon::parse($request->input('checkin'));
        $checkoutDate = Carbon::parse($request->input('checkout'));

        $dayCount = $checkinDate->diffInDays($checkoutDate);

    //     $formData = $request->all();


        $data = [
            'checkin_date' => $request->checkin,
            'checkout_date' => $request->checkout,
            'room_type' => $request->roomtype,
            'pax_in' => $request->adult_no,
            'child_in' => $request->child_no,
            'country' => $request->country,
            'title' => $request->title,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'guest_remarks' => $request->requirements??'N/A',
            // static property
            'day_count'  => $dayCount,
            'reservation_mode' => 1,
            'currency_type' => 1,
            'conversion_rate' => 1,
            'guest_source_id' => 1,
            'reference_id' => 29,
            'reservation_status' => 1,
        ];

        // $data = [
        //     'checkin_date' => $request->input('checkin'),
        //     'checkout_date' => $request->input('checkout'),
        //     'room_type' => $request->input('roomtype'),
        //     'pax_in' => $request->input('adult_no'),
        //     'child_in' => $request->input('child_no'),
        //     'country' => $request->input('country'),
        //     'title' => $request->input('title'),
        //     'first_name' => $request->input('first_name'),
        //     'last_name' => $request->input('last_name'),
        //     'email' => $request->input('email'),
        //     'phone' => $request->input('phone'),
        //     'address' => $request->input('address'),
        //     'guest_remarks' => $request->input('requirements')??'N/A',
        //     // static property
        //     'day_count'  => $dayCount,
        //     'reservation_mode' => 1,
        //     'currency_type' => 1,
        //     'conversion_rate' => 1,
        //     'guest_source_id' => 1,
        //     'reference_id' => 29,
        //     'reservation_status' => 2,
        // ];

        $server_url = "$apiUrl/store_reservation";
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $server_url);            // URL to send request
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);        // Return response as a string
        curl_setopt($ch, CURLOPT_POST, true);                  // Specify the request type (POST)
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));  // The data to send

        // Set cURL options with proper header format
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: ' . $key,  // Make sure $key is correctly set in your code
        ]);

        // Execute cURL request
        $response = curl_exec($ch);

        // Check if cURL execution was successful
        if($response === false) {
            $errorMessage = curl_error($ch);
            curl_close($ch);  // Close cURL session
            // Log the cURL error or display it
            return back()->with([
                'messages' => 'cURL Error: ' . $errorMessage,
                'status' => 'error'
            ]);
        }


        curl_close($ch);

        // Decode the response
        $response = json_decode($response);

        // Check if the response is valid JSON
        if (json_last_error() !== JSON_ERROR_NONE) {
            // Handle the error if JSON is invalid
            return back()->with([
                'messages' => 'Invalid JSON response from API',
                'status' => 'error'
            ]);
        }

        // Check if the response contains the expected status
        if (isset($response->status) && $response->status == 'success') {
            $errorMessage = $response;

            return response()->json([
                'messages' => $errorMessage->message,
                'status' => $errorMessage->status
            ]);
        } else {
            $errorMessage = isset($response->fields) ? $response->fields : 'Unknown error';
            response()->json([
                'messages' => $errorMessage->message ?? 'Unknown error',
                'status' => $response->status ?? 'error'
            ]);
        }
}

    public function reservationCheck(Request $request){        
        $apiUrl = env('API_URL');      
        $settingsUrl = "$apiUrl/settings";
        
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
        
        $availabilityCheckUrl = "http://192.168.0.185/pms-ci/api/check_availabilty";
        
        $ch = curl_init($availabilityCheckUrl);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        
        $data = [
            'checkIn2' => $request->checkin,
            'checkOut2' => $request->checkout,
            'roomTypeId' => $request->roomtype,
            'room_quantity' => 1,
            "editRoomList" => []
        ];

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json',
            'Authorization: ' . $key 
        ]);

        $availabilityCheckResponse = curl_exec($ch);
        
        // Check for errors 
        if (curl_errno($ch)) {
            $error = curl_error($availabilityCheckResponse);
            curl_close($ch);
            return response()->json(['error' => $error], 500);
        }

        // Close cURL
        curl_close($ch);

        // Decode and return response
        $responseData = json_decode($availabilityCheckResponse, true);
        return response()->json($responseData);
    }
}