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

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/', function () {
    return view('mainpage');
})->name('home');

Route::get('/barchart', function () {
    return view('barchart');
})->name('barchart');
Route::get('/enter','App\Http\Controllers\ProductController@product')->name('enter');

Route::get('/admin/login','App\Http\Controllers\ProductController@admin')->name('admin');

Route::post('/insert','App\Http\Controllers\ProductController@add')->name('insert');

Route::post('/update','App\Http\Controllers\ProductController@update')->name('update');

Route::post('/delete','App\Http\Controllers\ProductController@delete')->name('delete');

Route::get('/search','App\Http\Controllers\ProductController@search')->name('search');
Route::get('/select','App\Http\Controllers\ProductController@select')->name('select');
