<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


use Illuminate\Support\Facades\Redis;

Route::get('/store', function() {
    Redis::set('foo', 'Docker use Redis in laravel, mysql, phpmyadmin, mailhog, Nginx, PHP-8.2, alpine os');
    return redirect()->route('retrieve');
});

Route::get('/retrieve', function() {
    return Redis::get('foo');
})->name('retrieve');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
