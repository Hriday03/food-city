<?php

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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route:: view('/welcome', 'welcome');

Route:: view('/', 'welcome');

Route:: view('/passenger_login', 'auth.passenger_login');

Route:: view('/passenger_register', 'auth.passenger_register');

Route::get('/user-type', function () {
    return view('user_type');
});

Route::get('/contactUs', function () {
    return view('contact');
});

Route::get('/aboutUs', function () {
    return view('aboutUs');
});

Route::post('/send_mail', 'HomeController@sendMail');

Auth::routes();

Route::get('/verify_account', 'HomeController@accountACtivation');

Route::get('/resend_verify_account', 'HomeController@resendEmailVerification');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/');
    });

    Route::group(['prefix' => '/customer', 'middleware' => 'auth.customer'], function () {
        Route::get('/home','CustomerController@customerHome');

        Route::get('/order_history','CustomerController@customerOrder');

        Route::get('/search_orders', 'CustomerController@findOrders');

        Route::post('/order_favourite', 'CustomerController@addTofavourite');

        Route::get('/favourit_order','CustomerController@customerFavouritOrders');

        Route::get('/favourit_order_list','CustomerController@customerFavouritOrdersList');

        Route::post('/remove_order_favourite', 'CustomerController@removeOrderFromFavourite');

        Route::get('/profile','CustomerController@customerProfile');

        Route::post('/update_profile', 'CustomerController@updateProfile');
    });

    Route::group(['prefix' => '/passenger', 'middleware' => 'auth.passenger'], function () {
        Route::get('/home','PassengerController@passengerHome');
    });
});