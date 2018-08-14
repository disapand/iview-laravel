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

Route::get('/', 'PagesController@index')->name('home');

Route::get('/job', 'PagesController@job')->name('job');

Route::get('/contact', 'PagesController@contact')->name('contact');

Route::get('/about', 'PagesController@about')->name('about');

Route::get('/newspaper', 'PagesController@newspaper')->name('newspaper');

Route::get('/television', 'PagesController@television')->name('television');

Route::get('/outdoor', 'PagesController@outdoor')->name('outdoor');

Route::get('/transform', 'PagesController@transform')->name('transform');

Route::get('/internetCelebrity', 'PagesController@internetCelebrity')->name('internetCelebrity');
