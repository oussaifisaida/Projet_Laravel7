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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/listUsers', 'HomeController@listUsers')->name('listUsers');
Route::get('/listContacts', 'HomeController@listContacts')->name('listContacts');
Route::get('/deleteContact/{id}', 'HomeController@deleteContact')->name('deleteContact');




Route::get('/service', 'PageController@service')->name('service');
Route::get('/about', 'PageController@about')->name('about');
Route::get('/testimonial', 'PageController@testimonial')->name('testimonial');
Route::get('/contact', 'PageController@contact')->name('contact');
Route::post('/sendMessage', 'PageController@sendMessage')->name('sendMessage');


Route::resource('listTestimonials','TestimonialController');