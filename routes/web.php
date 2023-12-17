<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgendaController;

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


    // AGENDA
    Route::get('/agenda', [AgendaController::class, 'getEventList'])->name('agenda');
    Route::get('/event/{id}/agenda', [AgendaController::class, 'getAgendaForEvent'])->name('agenda.show');
    Route::get('/event/{id}/agenda-create', function ($id) {
        return view('agenda.create')->with('eventId', $id);
    })->name('agenda.create');
    Route::get('/event/{id}/agenda-edit', [AgendaController::class, 'getAgendaToEdit'])->name('agenda.edit');

    Route::post('/event/{event}/agenda-store', [AgendaController::class, 'store'])->name('agenda.store');
    Route::patch('/agenda', [AgendaController::class, 'edit'])->name('agenda.modify');
    Route::delete('/agenda/{id}', [AgendaController::class, 'delete'])->name('agenda.delete');

});
