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

Route::get('/', 'HomeController@showHome')->name('home');
Route::get('/category/{slug}', 'HomeController@showProductsByCategory')->name('category');

Route::get('/login', 'AuthController@showLoginForm')->name('login');
Route::post('/login', 'AuthController@processLogin');

Route::get('/register', 'AuthController@showRegisterForm')->name('register');
Route::post('/register', 'AuthController@processRegister');

Route::get('/dashboard', 'DashboardController@showDashboard')->name('dashboard');
Route::get('/profile', 'AuthController@showProfile')->name('profile');
Route::get('/logout', 'AuthController@logout')->name('logout');

Route::get('/orders', 'OrdersController@index')->name('orders.index');
