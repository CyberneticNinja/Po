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

Route::get('/dashboard', function () {
    if (Auth::check()) {
        $userName = Auth::user()->name;
            return $userName;
        } else {
        return ('user is not logged in');
        }
})->name('dashboard');
