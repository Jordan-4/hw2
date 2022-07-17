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

Route::get('/', function() {
    return redirect('login');
});

Route::get('login', 'App\Http\Controllers\UserController@login_page');
Route::post('login', 'App\Http\Controllers\UserController@do_login');

Route::get('signup', 'App\Http\Controllers\UserController@signup_page');
Route::post('signup', 'App\Http\Controllers\UserController@do_signup');

Route::get('signup/email/{query}', 'App\Http\Controllers\UserController@email_check');
Route::get('signup/username/{query}', 'App\Http\Controllers\UserController@user_check');

Route::get("logout", "App\Http\Controllers\UserController@logout");

Route::get("home", "App\Http\Controllers\HomeController@index");

Route::get("wallpaper", "App\Http\Controllers\BackgroundController@random_background");