<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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
URL::forceScheme('https');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('frontend');

Route::get('locale/{locale?}', [App\Http\Controllers\LocaleController::class, 'setLocale'])->name('set-locale');
Route::post('contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::post('get-gps-location', [App\Http\Controllers\Admin\VisitorController::class, 'getGpsLocation'])->name('get-gps-location');
Route::post('chat', [\App\Http\Controllers\ChatController::class, 'callChatGPT'])->name('chat');
