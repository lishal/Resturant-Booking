
<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//ADMIN
Route::GET('admin/home','AdminController@index');      
Route::GET('admin','Admin\LoginController@showLoginForm')->name('admin.login');  
Route::POST('admin','Admin\LoginController@login');
Route:: POST('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route:: GET('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm') ->name('admin.password.request');
Route:: POST('admin-password/reset','Admin\ResetPasswordController@reset')->name('admin.password.reset');
Route:: GET('admin-password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

Route::get('verifyEmailFirst','Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');


Route::get('verify/{email}/{verifyToken}','Auth\RegisterController@sendEmailDone')->name('sendEmailDone');

//Staff

Route::GET('staff/home','StaffController@index');      
Route::GET('staff','Staff\LoginController@showLoginForm')->name('staff.login');  
Route::POST('staff','Staff\LoginController@login');
Route:: POST('staff-password/email','Staff\ForgotPasswordController@sendResetLinkEmail')->name('staff.password.email');
Route:: GET('staff-password/reset','Staff\ForgotPasswordController@showLinkRequestForm') ->name('staff.password.request');
Route:: POST('staff-password/reset','Staff\ResetPasswordController@reset')->name('staff.password.reset');
Route:: GET('staff-password/reset/{token}','Staff\ResetPasswordController@showResetForm')->name('staff.password.reset');

//User List
Route::GET('/user','UserController@index');
Route::GET('/deleteuser/{id}','UserController@delete');

//Staff list

Route::GET('/stafflist','AdminStaffController@viewlist');
Route::GET('/staffadd/{id?}','AdminStaffController@add');
Route::GET('/staffdelete/{id}','AdminStaffController@delete');
Route::POST('/staffadd','AdminStaffController@save');
Route::GET('/staffpassword/{id}','AdminStaffController@changepassword');
Route::POST('/changepassword/{id}','AdminStaffController@staffChangePassword');


//Admin-Restaurant
Route::GET('/addrestaurant/{restaurant_id?}','RestaurantController@add');
Route::POST('/restaurantsave','RestaurantController@save');
Route::GET('/AdminrestaurantDetails','RestaurantController@index');
Route::GET('/restaurantdelete/{restaurant_id}','RestaurantController@delete');


// Seletcting individual restaurant by user
Route::GET('/restaurant/{restaurant_id}','IndividualRestaurantController@index');


//Adding menue or logo by staff

Route::GET('/menu','StaffController@display');
Route::GET('/addMenuLogo/{id}','StaffController@add');
Route::POST('/addmenu','StaffController@save');

//Customer Menu
Route::GET('/menu/{id}','BookingController@customermenu');



//Adding seat

Route::GET('/seat/{id}','StaffController@displayseat');
Route::GET('/addSeat/{id}','StaffController@addseat');
Route::POST('/addseatsave','StaffController@saveseat');
Route::GET('/changestatus/{id}','StaffController@status');
Route::GET('/deleteseat/{id}','StaffController@deleteseat');



//User
Route::GET('/restaurantlist','HomeController@list');

//Booking
Route::GET('/bookrestaurant/{restaurant_id}','BookingController@index');
Route::POST('/bookrestaurant','BookingController@booking');


//Available Customer
Route::GET('/availablecustomer','StaffController@availablecustomer');
Route::GET('/customerStatus/{id}','StaffController@customerStatus');



//Contact US
Route::GET('/contactus','HomeController@contactus');


