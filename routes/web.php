<?php

use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

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
    return view('auth.login');
});

Auth::routes();
Route::middleware(['auth:sanctum'])->group(function(){

    Route::resource('representatives', App\Http\Controllers\RepresentativeController::class);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
});


