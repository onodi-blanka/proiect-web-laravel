<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});

Route::get('/agenda', function () {
    return view('agenda');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/contact', [ContactController::class, 'submit']);

Route::get('/sponsorspartners', function () {
    return view('sponsorspartners');
});

Route::get('/event', function () {
    return view('event');
});
Route::get('/cart', function () {
    return view('cos'); // make sure the view name is correct
});

