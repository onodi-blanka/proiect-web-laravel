<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SponsorsPartnersController;
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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function(){
    // HOME
    Route::get('/home', function () {
        return view('home');
    });

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
    Route::resource('sponsorspartners', SponsorsPartnersController::class)->except(['showAll']);
    Route::get('/sponsorspartners/showAll', [SponsorsPartnersController::class, 'showAll'])->name('sponsorspartners.showAll');
    Route::get('/sponsorspartners/{id}', [SponsorsPartnersController::class, 'show'])->name('sponsorspartners.show');
    Route::get('/sponsorspartners/{id}/edit', [SponsorsPartnersController::class, 'edit'])->name('sponsorspartners.edit');
    Route::put('/sponsorspartners/{id}', [SponsorsPartnersController::class, 'update'])->name('sponsorspartners.update');
    Route::delete('/sponsorspartners/{id}', [SponsorsPartnersController::class, 'destroy'])->name('sponsorspartners.destroy');

    // SHOPPING CART
    Route::get('/cart', function () {
        return view('cos');
    });
});
