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
Route::get('/newspaper/{newspaper}', 'PagesController@newspaperShow')->name('newspaper.show');

Route::get('/television', 'PagesController@television')->name('television');
Route::get('/television/{television}', 'PagesController@televisionShow')->name('television.show');

Route::get('/outdoor', 'PagesController@outdoor')->name('outdoor');
Route::get('/outdoor/{outdoor}', 'PagesController@outdoorShow')->name('outdoor.show');

Route::get('/transform', 'PagesController@transform')->name('transform');
Route::get('/transform/{transform}', 'PagesController@transformShow')->name('transform.show');

Route::get('/online', 'PagesController@online')->name('online');
Route::get('/online/{online}', 'PagesController@onlineShow')->name('online.show');

Route::get('/internetCelebrity', 'PagesController@internetCelebrity')->name('internetCelebrity');
Route::get('/internetCelebrity/{internetCelebrity}', 'PagesController@internetCelebrityShow')->name('internetCelebrity.show');
