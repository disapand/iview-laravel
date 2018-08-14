<?php

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

Route::get('/admin', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/job', function () {
    return view('pages.job');
})->name('job');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/newspaper', function () {
    return view('pages.newspaper');
})->name('newspaper');
