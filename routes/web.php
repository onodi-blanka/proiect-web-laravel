<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;

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

// Facem rutele accesibile doar când se stabilește autentificarea

Auth::routes();
Route::get('/', [HomeController::class, 'index']);
Route::group(['middleware' => 'auth'], function () {
    // HOME
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // EVENT
    Route::get('/event', [EventController::class, 'index']);
    Route::resource('events', EventController::class);

    // AGENDA
    Route::get('/agenda', function () {
        return view('agenda');
    });

    // CONTACT
    Route::get('/contact', function () {
        return view('contact');
    });
    Route::post('/contact', [ContactController::class, 'submit']);

    // SPONSORS & PARTNERS
    Route::get('/sponsorspartners', function () {
        return view('sponsorspartners');
    });

    // SHOPPING CART
    Route::get('/cart', function () {
        return view('cos');
    });

    //BUY TICKET
    Route::get('/buy-ticket/{id}', [TicketController::class, 'buy'])->name('buy_ticket');
});
