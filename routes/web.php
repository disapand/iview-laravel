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

Route::get('/admin', 'PagesController@adimin')->name('admin');

Route::group(['middleware' => 'uv'], function () {
    Route::get('/', 'PagesController@index')->name('home');

    Route::get('/job', 'PagesController@job')->name('job');

    Route::get('/contact', 'PagesController@contact')->name('contact');

    Route::get('/about', 'PagesController@about')->name('about');
    Route::get('/about_in', 'PagesController@aboutIn')->name('aboutIn');
    Route::get('/about/{about}', 'PagesController@aboutShow')->name('about.show');

    Route::get('/services', 'PagesController@services')->name('services');

    Route::get('/newspaper', 'PagesController@newspaper')->name('newspaper');
    Route::get('/newspaperPreview', 'PagesController@newspaperPreview')->name('newspaper.preview');
    Route::get('/newspaper/{newspaper}', 'PagesController@newspaperShow')->name('newspaper.show');
    Route::get('/newspaperPreview/{newspaper}', 'PagesController@newspaperShowPreview')->name('newspaper.showPreview');
    Route::post('/newspaper', 'PagesController@newspaperSearch')->name('newspaper.search');

    Route::get('/television', 'PagesController@television')->name('television');
    Route::get('/televisionPreview', 'PagesController@televisionPreview')->name('television.preview');
    Route::get('/television/{television}', 'PagesController@televisionShow')->name('television.show');
    Route::get('/televisionPreview/{television}', 'PagesController@televisionShowPreview')->name('television.showPreview');
    Route::post('/television', 'PagesController@televisionSearch')->name('television.search');

    Route::get('/outdoor', 'PagesController@outdoor')->name('outdoor');
    Route::get('/outdoorPreview', 'PagesController@outdoorPreview')->name('outdoor.preview');
    Route::get('/outdoor/{outdoor}', 'PagesController@outdoorShow')->name('outdoor.show');
    Route::get('/outdoorPreview/{outdoor}', 'PagesController@outdoorShowPreview')->name('outdoor.showPreview');
    Route::post('/outdoor', 'PagesController@outdoorSearch')->name('outdoor.search');

    Route::get('/transform', 'PagesController@transform')->name('transform');
    Route::get('/transformPreview', 'PagesController@transformPreview')->name('transform.preview');
    Route::get('/transform/{transform}', 'PagesController@transformShow')->name('transform.show');
    Route::get('/transformPreview/{transform}', 'PagesController@transformShowPreview')->name('transform.showPreview');
    Route::post('/transform', 'PagesController@transformSearch')->name('transform.search');

    Route::get('/online', 'PagesController@online')->name('online');
    Route::get('/onlinePreview', 'PagesController@onlinePreview')->name('online.preview');
    Route::get('/online/{online}', 'PagesController@onlineShow')->name('online.show');
    Route::get('/onlinePreview/{online}', 'PagesController@onlineShowPreview')->name('online.showPreview');
    Route::post('/online', 'PagesController@onlineSearch')->name('online.search');

    Route::get('/internetCelebrity', 'PagesController@internetCelebrity')->name('internetCelebrity');
    Route::get('/internetPreview', 'PagesController@internetPreview')->name('internetCelebrity.preview');
    Route::get('/internetCelebrity/{internetCelebrity}', 'PagesController@internetCelebrityShow')->name('internetCelebrity.show');
    Route::get('/internetCelebrityPreview/{internetCelebrity}', 'PagesController@internetCelebrityShowPreview')->name('internetCelebrity.showPreview');
    Route::post('/internetCelebrity', 'PagesController@internetCelebritySearch')->name('internetCelebrity.search');

    Route::get('/insight', 'PagesController@insight')->name('insight');
    Route::get('/insight/{insight}', 'PagesController@insightShow')->name('insight.show');

    Route::get('/cases', 'PagesController@cases')->name('cases');
    Route::get('/cases/{cases}', 'PagesController@casesShow')->name('cases.show');

    Route::get('/english', function () {
        return view('english');
    })->name('english');

});
