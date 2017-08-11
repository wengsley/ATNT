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

Route::get('/', function () {
    return view('welcome');
});

/* ================== Login ================== */
Route::get('/loginPage','Auth\LoginController@showLogin');

/* ================== Register ================== */
Route::resource('/register', 'Auth\RegisterController');
Route::get('/registerPage','Auth\RegisterController@showRegister');

/* ================== Forgot Password ================== */
Route::get('/forgotPage','Auth\ForgotPasswordController@showForgot');
Route::post('/forgot', 'Auth\ForgotPasswordController@doForgot');

/* ================== Logout ================== */
Route::post('/logout', 'Auth\LogoutController@logout');

Route::get('/home','HomeController@showHome');