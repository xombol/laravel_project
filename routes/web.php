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

Route::prefix('job')
    ->name('job.')
    ->controller(\App\Http\Controllers\JobController::class)
    ->group(function () {

        Route::get('/', 'index')->name('index');
        Route::get('/list', 'list')->name('list');
        Route::get('/show/{job}', 'show')->name('show');
        Route::get('/location/{location}', 'location_index')->name('location_index');
        Route::post('/location/{location}', 'location')->name('location');
        Route::post('/add', 'add')->name('add');


    });
