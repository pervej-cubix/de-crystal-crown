<?php

use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\DiningController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\PhotoGalleryController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\HomepageSliderController;
use App\Http\Controllers\RecreationController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SocialLinkController;
use App\Http\Controllers\StarsController;
use App\Http\Controllers\VirtualTourController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get(uri: '/', action: [HomeController::class, 'index'])->name('home');
Route::get(uri: '/accommodation', action: [HomeController::class, 'accommodation'])->name('accommodation');
Route::get(uri: '/dining', action: [HomeController::class, 'dining'])->name('dining');
Route::get(uri: '/promotions', action: [HomeController::class, 'promotion'])->name('promotion');
Route::get(uri: '/meetings-and-Events', action: [HomeController::class, 'meetingsEvents'])->name('meetingsEvents');
Route::get(uri: '/recreation', action: [HomeController::class, 'recreation'])->name('recreation');
Route::get(uri: '/pay-on-line', action: [HomeController::class, 'payOnLine'])->name('payOnLine');
Route::get(uri: '/virtual-tours', action: [HomeController::class, 'virtualTours'])->name('virtualTours');
Route::get(uri: '/photo-gallery', action: [HomeController::class, 'photoGallery'])->name('photoGallery');
Route::get(uri: '/decrystal-star', action: [HomeController::class, 'loyaltyProgram'])->name('DeCrystalStars');
Route::get(uri: '/contact-us', action: [HomeController::class, 'contact'])->name('contact');
Route::get(uri: '/book-now', action: [HomeController::class, 'bookNow'])->name('bookNow');
Route::get(uri: '/room-details/{slug}', action: [HomeController::class, 'roomDetails'])->name('roomDetails');
Route::post(uri: '/contac-us', action: [HomeController::class, 'contactMail'])->name('contactMail');
Route::post('/reservation', [ReservationController::class, 'sendReservationMail']);
Route::post('/reservation-check', [ReservationController::class, 'reservationCheck']);

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [dashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/promotion-manage', action: [PromotionController::class, 'index'])->name('promotion-view');
    Route::post('/promotion-store', action: [PromotionController::class, 'store'])->name('promotion-store');
    Route::get('/promotion-edit/{id}', action: [PromotionController::class, 'edit'])->name('promotion-edit');
    Route::put('/promotion-update/{id}', action: [PromotionController::class, 'update'])->name('promotion-update');
    Route::delete('/promotion.destroy/{id}', action: [PromotionController::class, 'delete'])->name('promotion.destroy');

    Route::get('/homepage-slider-manage', action: [HomepageSliderController::class, 'index'])->name('homepage-slider-view');
    Route::post('/homepage-slider-store', action: [HomepageSliderController::class, 'store'])->name('homepage-slider-store');
    Route::put('/homepage-slider-update/{id}', action: [HomepageSliderController::class, 'update'])->name('homepage-slider-update');
    Route::get('/homepage-slider-edit/{id}', action: [HomepageSliderController::class, 'edit'])->name('homepage-slider-edit');
    Route::delete('/homepage-slider.destroy/{id}', action: [HomepageSliderController::class, 'delete'])->name('homepage-slider.destroy');

    Route::get('/special-edit/{id}', action: [PromotionController::class, 'special_edit'])->name('special-edit');
    Route::put('/special-update/{id}', action: [PromotionController::class, 'special_update'])->name('special-update');

    Route::get('/accommodation-manage', action: [AccommodationController::class, 'index'])->name('accommodation-manage');
    Route::get('/accommodation-create', action: [AccommodationController::class, 'create'])->name('accommodation-create');
    Route::post('/accommodation-store', [AccommodationController::class, 'store'])->name('accommodation-store');
    Route::get('/accommodation-edit/{id}', action: [AccommodationController::class, 'edit'])->name('accommodation-edit');
    Route::put('/accommodation-update/{id}', [AccommodationController::class, 'update'])->name('accommodation-update');
    Route::delete('/accommodation.destroy/{id}', [AccommodationController::class, 'destroy'])->name('accommodation.destroy');

    Route::get('/dining-manage',action: [DiningController::class,'index'])->name('dining-manage');
    Route::post('/dining-store', [DiningController::class, 'store'])->name('dining-store');
    Route::get('/dining-edit/{id}',action: [DiningController::class,'edit'])->name('dining-edit');
    Route::put('/dining-update/{id}', [DiningController::class, 'update'])->name('dining-update');
    Route::delete('/dining.destroy/{id}', [DiningController::class,'destroy'])->name('dining.destroy');

    Route::get('/meeting-manage',action: [MeetingController::class,'index'])->name('meeting-manage');
    Route::post('/meeting-store', [MeetingController::class, 'store'])->name('meeting-store');
    Route::get('/meeting-edit/{id}',action: [MeetingController::class,'edit'])->name('meeting-edit');
    Route::put('/meeting-update/{id}', [MeetingController::class, 'update'])->name('meeting-update');
    Route::delete('/meeting.destroy/{id}', [MeetingController::class,'destroy'])->name('meeting.destroy');

    Route::get('/recreation-manage', action: [RecreationController::class, 'index'])->name('recreation-manage');
    Route::get('/recreation-create', action: [RecreationController::class, 'create'])->name('recreation-create');
    Route::post('/recreation-store', [RecreationController::class, 'store'])->name('recreation-store');
    Route::get('/recreation-edit/{id}', action: [RecreationController::class, 'edit'])->name('recreation-edit');
    Route::put('/recreation-update/{id}', [RecreationController::class, 'update'])->name('recreation-update');
    Route::delete('/recreation.destroy/{id}', [RecreationController::class, 'destroy'])->name('recreation.destroy');

    Route::get('/virtual-tour-manage', action: [VirtualTourController::class, 'index'])->name('tour-manage');
    Route::get('/virtual-tour-create', action: [VirtualTourController::class, 'create'])->name('tour-create');
    Route::post('/virtual-tour-store', [VirtualTourController::class, 'store'])->name('tour-store');
    Route::get('/virtual-tour-edit/{id}', action: [VirtualTourController::class, 'edit'])->name('tour-edit');
    Route::put('/virtual-tour-update/{id}', [VirtualTourController::class, 'update'])->name('tour-update');
    Route::delete('/virtual-tour.destroy/{id}', [VirtualTourController::class, 'destroy'])->name('tour.destroy');

    Route::get('/photo-gallery-manage', action: [PhotoGalleryController::class, 'index'])->name('photo-manage');
    Route::get('/photo-gallery-create', action: [PhotoGalleryController::class, 'create'])->name('photo-create');
    Route::post('/photo-gallery-store', [PhotoGalleryController::class, 'store'])->name('photo-store');
    Route::get('/photo-gallery-edit/{id}', action: [PhotoGalleryController::class, 'edit'])->name('photo-edit');
    Route::put('/photo-gallery-update/{id}', [PhotoGalleryController::class, 'update'])->name('photo-update');
    Route::delete('/photo-gallery.destroy/{id}', [PhotoGalleryController::class, 'destroy'])->name('photo.destroy');

    Route::get('/star-manage', action: [StarsController::class, 'index'])->name('star-manage');
    Route::get('/star-create', action: [StarsController::class, 'create'])->name('star-create');
    Route::post('/star-store', [StarsController::class, 'store'])->name('star-store');
    Route::get('/star-edit/{id}', action: [StarsController::class, 'edit'])->name('star-edit');
    Route::put('/star-update/{id}', [StarsController::class, 'update'])->name('star-update');
    Route::delete('/star.destroy/{id}', [StarsController::class, 'destroy'])->name('star.destroy');

    Route::get('/address-manage', action: [AddressController::class, 'index'])->name('address-manage');
    Route::get('/address-create', action: [AddressController::class, 'create'])->name('address-create');
    Route::post('/address-store', [AddressController::class, 'store'])->name('address-store');
    Route::get('/address-edit/{id}', action: [AddressController::class, 'edit'])->name('address-edit');
    Route::put('/address-update/{id}', [AddressController::class, 'update'])->name('address-update');
    Route::delete('/address.destroy/{id}', [AddressController::class, 'destroy'])->name('address.destroy');

    Route::get('/social-manage', action: [SocialLinkController::class, 'index'])->name('social-manage');
    Route::get('/social-create', action: [SocialLinkController::class, 'create'])->name('social-create');
    Route::post('/social-store', [SocialLinkController::class, 'store'])->name('social-store');
    Route::get('/social-edit/{id}', action: [SocialLinkController::class, 'edit'])->name('social-edit');
    Route::put('/social-update/{id}', [SocialLinkController::class, 'update'])->name('social-update');
    Route::delete('/social.destroy/{id}', [SocialLinkController::class, 'destroy'])->name('social.destroy');
});