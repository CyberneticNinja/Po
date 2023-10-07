<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::view('/', 'welcome')->name('home');

Route::get('/login', function () {
    return view('login.login');
})->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    Route::get('/dashboard/calendar/create-event', function () {
        return view('dashboard.event');
    })->name('dashboard-create-event');

    Route::get('/dashboard/calendar/today/events', function () {
        return view('dashboard.todays-calendar-events');
    })->name('dashboard-events-today');

    Route::get('/dashboard/calendar/week/events', function () {
        return view('dashboard.this-weeks-calendar-events');
    })->name('dashboard-events-week');

    Route::get('/dashboard/calendar/month/events', function () {
        return view('dashboard.this-months-calendar-events');
    })->name('dashboard-events-month');
});
