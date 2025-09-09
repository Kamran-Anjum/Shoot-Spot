<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PhotographerController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PromoCodeController;
use App\Http\Controllers\ShootForController;
use App\Http\Controllers\PackageRequestController;
use App\Http\Controllers\PhotographyEquipmentController;
use App\Http\Controllers\SpacesPhotographedController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ChatController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// contact us api
Route::post('/user/contact_us', [ContactusController::class, 'appcontactmsgsend']);

// get equipment
Route::get('/get-equipment', [ApiController::class, 'getequipment']);

// get spaces photograph
Route::get('/get-spaces-photograph', [ApiController::class, 'getspacesphotograph']);

// get spaces photograph
Route::get('/get-shoot-for', [ApiController::class, 'getshootfor']);

// get spaces photograph
Route::get('/get-package', [ApiController::class, 'getpackage']);

// customer api's
Route::post('/customer/registers', [CustomerController::class, 'registerapi']);

Route::post('/customer/google-login', [CustomerController::class, 'loginwithgoogle']);
Route::post('/customer/edit-profile', [CustomerController::class, 'editprofileapi']);

Route::post('/customer/create-booking', [BookingController::class, 'createbookingapi']);
Route::get('/customer/view-bookings/{user_id}', [BookingController::class, 'bookingshowtocustomerapi']);
Route::post('/customer/cancel-booking', [BookingController::class, 'bookingcancelapi']);
Route::get('/customer/booking-detail/{booking_id}', [BookingController::class, 'bookigndetailsapi']);
Route::post('/customer/confirm-booking', [BookingController::class, 'bookingconfirmapi']);

Route::get('/customer/noti_count/{user_id}', [ApiController::class, 'getcustomernotificationcount']);
Route::get('/customer/notification/{user_id}', [ApiController::class, 'getcustomernotificationapi']);

// photographer api's
Route::post('/photographer/registers', [PhotographerController::class, 'registerapi']);
Route::post('/photographer/edit-profile', [PhotographerController::class, 'editprofileapi']);
Route::post('/photographer/create-project', [PhotographerController::class, 'createprojectapi']);
Route::get('/photographer/getprojecttitle/{photographer_id}', [PhotographerController::class, 'getphotographerprojecttitleapi']);
Route::get('/photographer/getprojectimages/{photographer_id}', [PhotographerController::class, 'getphotographerprojectimagesapi']);
Route::get('/photographer/getprojectdetails/{project_id}', [PhotographerController::class, 'getphotographerprojectdetailsapi']);
Route::get('/photographer/view-ongoing-bookings/{user_id}', [BookingController::class, 'bookingshowtophotographerongoingapi']);
Route::get('/photographer/view-schedule-bookings/{user_id}', [BookingController::class, 'bookingshowtophotographerscheduleapi']);
Route::get('/photographer/view-past-bookings/{user_id}', [BookingController::class, 'bookingshowtophotographerpastapi']);
Route::post('/photographer/booking-checkin', [BookingController::class, 'photographerbookingcheckinapi']);

// api for both customer/photographer
Route::post('/user/login', [ApiController::class, 'loginapi']);
Route::post('/user/change-password', [ApiController::class, 'changepasswordapi']);
Route::post('/user/forggot-password', [ApiController::class, 'forggotpasswordapi']);

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
