<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Role_has_permissionController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PhotographerController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PromoCodeController;
use App\Http\Controllers\ShootForController;
use App\Http\Controllers\PackageRequestController;
use App\Http\Controllers\PhotographyEquipmentController;
use App\Http\Controllers\SpacesPhotographedController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ChatController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//-----------------//
//---Front route---//
//----------------//
Route::get('/', [App\Http\Controllers\FrontController::class, 'index']);

Route::get('/photographer', [App\Http\Controllers\FrontController::class, 'photographer']);

Route::get('/contact-us', [App\Http\Controllers\FrontController::class, 'contact_us']);
Route::post('/contact-msg-send', [App\Http\Controllers\ContactusController::class, 'contactmsgsend']);

Route::get('/about-us', [App\Http\Controllers\FrontController::class, 'about_us']);

Route::get('/business', [App\Http\Controllers\FrontController::class, 'business']);

Route::get('/faq', [App\Http\Controllers\FrontController::class, 'faq']);

Route::get('/sign-in', [App\Http\Controllers\FrontController::class, 'sign_in']);

Route::get('/sign-up', [App\Http\Controllers\FrontController::class, 'sign_up']);

Route::get('/term-and-condition', [App\Http\Controllers\FrontController::class, 'term_condition']);

Route::get('/term-and-condition-photographer', [App\Http\Controllers\FrontController::class, 'term_condition_photographer']);

Route::get('/privacy-policy', [App\Http\Controllers\FrontController::class, 'privacy_policy']);

Route::get('/gallery', [App\Http\Controllers\FrontController::class, 'gallery']);

Route::get('/resources', [App\Http\Controllers\FrontController::class, 'resources']);


//-----------------//
//---admin route---//
//----------------//
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'login_form'])->name('login');
Route::match(['get', 'post'],'/admin/login', [App\Http\Controllers\AdminController::class, 'login'])->name('adminlogin');

Route::get('/register/admin', [App\Http\Controllers\AdminController::class, 'register_form'])->name('register');
Route::match(['get', 'post'],'/admin/register', [App\Http\Controllers\AdminController::class, 'register'])->name('adminregister');

Route::group(['middleware' => ['role:admin']], function () {

	Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index']);

	//change password
	Route::get('/admin/change-pwd', [App\Http\Controllers\AdminController::class, 'change_pwd']);
	Route::match(['get', 'post'],'/admin/change-password', [App\Http\Controllers\AdminController::class, 'change_password']);
	//admin logout
	Route::get('/admin/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('adminlogout');

	//role routes
	Route::get('/admin/view-roles', [RoleController::class, 'viewRole']);
	Route::get('/admin/view-delete/{id}', [RoleController::class, 'viewRole']);
	Route::match(['get','post'],'/admin/edit-roles/{id}', [RoleController::class, 'editRole']);
	Route::match(['get','post'],'/admin/add-roles', [RoleController::class, 'addRole']);
	Route::get('/admin/delete-role/{id}', [RoleController::class, 'deleteRole']);

	//permission routes
	Route::get('/admin/view-permissions', [PermissionController::class, 'viewPermission']);
	Route::get('/admin/view-delete/{id}', [PermissionController::class, 'deletePermission']);
	Route::match(['get','post'],'/admin/edit-permission/{id}', [PermissionController::class, 'editPermission']);
	Route::match(['get','post'],'/admin/add-permissions', [PermissionController::class, 'addPermission']);
	Route::get('/admin/delete-permission/{id}', [PermissionController::class, 'deletePermission']);

	//Role Permissions Routes
	Route::get('/admin/view-role-permission', [Role_has_permissionController::class, 'viewRolePermission']);
	Route::get('/admin/view-delete-permission/{id}', [Role_has_permissionController::class, 'deletePermission']);
	Route::match(['get','post'],'/admin/add-role-permissions', [Role_has_permissionController::class, 'addRolePermission']);
	Route::get('/admin/delete-role-permissions/{id}/{p_id}', [Role_has_permissionController::class, 'deleteRolePermission']);

	//promo code route
	Route::resource('/admin/promo-code',PromoCodeController::class);
	Route::match(['get', 'post'],'/admin/promo-code/{promo_code}', [App\Http\Controllers\PromoCodeController::class, 'destroy'])->name('promo-code.destroy');

	//shoot for route
	Route::resource('/admin/shoot-for',ShootForController::class);
	Route::match(['get', 'post'],'/admin/shoot-for/{shoot_for}', [App\Http\Controllers\ShootForController::class, 'destroy'])->name('shoot-for.destroy');

	//package request route
	Route::resource('/admin/package-request',PackageRequestController::class);
	Route::match(['get', 'post'],'/admin/package-request/{package_request}', [App\Http\Controllers\PackageRequestController::class, 'destroy'])->name('package-request.destroy');

	//equipment route
	Route::resource('/admin/equipment',PhotographyEquipmentController::class);
	Route::match(['get', 'post'],'/admin/equipment/{equipment}', [App\Http\Controllers\PhotographyEquipmentController::class, 'destroy'])->name('equipment.destroy');

	//equipment route
	Route::resource('/admin/space',SpacesPhotographedController::class);
	Route::match(['get', 'post'],'/admin/space/{space}', [App\Http\Controllers\SpacesPhotographedController::class, 'destroy'])->name('space.destroy');

	// contactus message
	Route::get('/admin/view-messages', [ContactusController::class, 'viewcontactmsg']);

	// Bookings
	Route::get('/admin/view-bookings', [BookingController::class, 'viewbooking']);
	Route::get('/admin/view-booking-detail/{booking_id}', [BookingController::class, 'viewbookingdetails']);
	Route::match(['get','post'], '/admin/send-quote/{booking_id}', [BookingController::class, 'sendquote']);
	Route::match(['get','post'], '/admin/assign-photographer/{booking_id}', [BookingController::class, 'assignphotographer']);
	Route::match(['get','post'], '/admin/add-loyalty-points/{booking_id}', [BookingController::class, 'addloyaltypoints']);

	// customers
	Route::get('/admin/view-customers', [CustomerController::class, 'viewcustomers']);
	Route::get('/admin/view-customer-detail/{user_id}', [CustomerController::class, 'viewcustomerdetails']);
	Route::get('/admin/delete-customer/{user_id}', [CustomerController::class, 'deletecustomer']);

	// photographers
	Route::get('/admin/view-photographers', [PhotographerController::class, 'viewphotographers']);
	Route::get('/admin/view-photographer-detail/{user_id}', [PhotographerController::class, 'viewphotographerdetails']);
	Route::get('/admin/delete-photographer/{user_id}', [PhotographerController::class, 'deletephotographerr']);

});

// customer routes
Route::post('/customer-register', [App\Http\Controllers\CustomerController::class, 'customerregister']);
Route::post('/customer-login', [App\Http\Controllers\CustomerController::class, 'customerlogin']);

// routes for login with google
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::group(['middleware' => ['role:customer']], function () {

	Route::get('/customer/index', [App\Http\Controllers\CustomerController::class, 'cusmoterprofile']);
	Route::get('/customer/logout', [App\Http\Controllers\CustomerController::class, 'customerlogout']);

	Route::get('/customer/bookings', [App\Http\Controllers\CustomerController::class, 'customerviewbooking']);
	Route::get('/customer/notification', [App\Http\Controllers\CustomerController::class, 'customernotification']);
	Route::get('/customer/settings', [App\Http\Controllers\CustomerController::class, 'customersettings']);
	Route::match(['get', 'post'],'/customer/edit-profile', [App\Http\Controllers\CustomerController::class, 'customereditprofile']);
	Route::match(['get', 'post'],'/customer/change-password', [App\Http\Controllers\CustomerController::class, 'customerchangepassword']);


	Route::get('/customer/messages', [App\Http\Controllers\CustomerController::class, 'customermessage']);
	Route::match(['get', 'post'],'/customer/chats/{firestore_chat_id}/{photographer_id}', [App\Http\Controllers\ChatController::class, 'customerchatwithphotographer']);
	

	Route::match(['get', 'post'],'/customer/booking-confirm/{booking_id}', [App\Http\Controllers\BookingController::class, 'customerbookingconfirmweb']);
	Route::get('/customer/booking-cancel/{booking_id}', [App\Http\Controllers\BookingController::class, 'customerbookingcancelweb']);

	Route::post('/customer/create-booking', [App\Http\Controllers\BookingController::class, 'createbookingweb']);

});

// photographer routes
Route::post('/photographer-register', [App\Http\Controllers\PhotographerController::class, 'photographerregister']);
Route::post('/photographer-login', [App\Http\Controllers\PhotographerController::class, 'photographerlogin']);

Route::group(['middleware' => ['role:photographer']], function () {

	Route::get('/photographer/index', [App\Http\Controllers\PhotographerController::class, 'photographerprofile']);
	Route::get('/photographer/logout', [App\Http\Controllers\PhotographerController::class, 'photographerlogout']);

	Route::get('/photographer/project-detail/{project_id}', [App\Http\Controllers\PhotographerController::class, 'photographerprojectdetail']);

	Route::get('/photographer/bookings', [App\Http\Controllers\PhotographerController::class, 'photographerviewbooking']);
	Route::get('/photographer/booking-detail/{booking_id}', [App\Http\Controllers\PhotographerController::class, 'photographerviewbookingdeatils']);
	Route::get('/photographer/check-in/{booking_id}', [App\Http\Controllers\PhotographerController::class, 'photographerbookingcheckin']);
	Route::get('/photographer/settings', [App\Http\Controllers\PhotographerController::class, 'photographersettings']);
	Route::match(['get', 'post'],'/photographer/edit-profile', [App\Http\Controllers\PhotographerController::class, 'photographereditprofile']);
	Route::match(['get', 'post'],'/photographer/change-password', [App\Http\Controllers\PhotographerController::class, 'photographerchangepassword']);
	Route::match(['get', 'post'],'/photographer/create-project', [App\Http\Controllers\PhotographerController::class, 'photographercreateprojectsweb']);
	// chat initiate link
	Route::match(['get', 'post'],'/photographer/chat/{user_id}/{user_photographer_id}', [App\Http\Controllers\ChatController::class, 'photographerchatinitiate']);

	// messages list
	Route::get('/photographer/messages', [App\Http\Controllers\PhotographerController::class, 'photographermessage']);
	Route::match(['get', 'post'],'/photographer/chats/{firestore_chat_id}/{customer_id}', [App\Http\Controllers\ChatController::class, 'photographerchatwithuser']);
	
});





// Route::get('/', function () {
//     return view('welcome');
// });
