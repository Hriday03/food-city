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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/user-type', function () {
    return view('auth.user_type');
});
Route::get('/register2', function () {
    return view('auth.register2');
});
Route::get('/login2', function () {
    return view('auth.login2');
});
Route::get('/contactUs', function () {
    return view('contact');
});
Route::get('/aboutUs', function () {
    return view('aboutUs');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/create-user', 'HomeController@createUser')->name('home');
Route::post('/customer-home','HomeController@customerHome')->name('home');
Route::post('/passenger-home','HomeController@passengerHome')->name('home');