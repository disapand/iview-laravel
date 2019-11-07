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
    Route::get('/login', 'MemberController@login')->name('login');
    Route::get('/logout', 'MemberController@logout')->name('logout');
    Route::get('/member', 'MemberController@member')->name('member');
    Route::post('/member', 'MemberController@update')->name('update');
    Route::post('/login', 'MemberController@loginMember')->name('loginMember');
    Route::get('/register', 'MemberController@register')->name('register');
    Route::get('/show', 'MemberController@show')->name('show');
    Route::get('/resetPassword', 'MemberController@resetPassword')->name('resetPassword');
    Route::post('/resetPassword', 'MemberController@updatePassword')->name('updatePassword');
    Route::get('/reset/{token}', 'MemberController@reset')->name('reset');
    Route::post('/register',  'MemberController@store')->name('store');
    Route::get('/emailVerificationRequired',  'MemberController@emailVerificationRequired')->name('email_verification_required');
    Route::get('/emailVerification/{token}',  'MemberController@emailVerification')->name('email_verification');

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
    Route::get('/newspaperSearch', 'PagesController@newspaperSearch')->name('newspaper.search');

    Route::get('/television', 'PagesController@television')->name('television');
    Route::get('/televisionPreview', 'PagesController@televisionPreview')->name('television.preview');
    Route::get('/television/{television}', 'PagesController@televisionShow')->name('television.show');
    Route::get('/televisionPreview/{television}', 'PagesController@televisionShowPreview')->name('television.showPreview');
    Route::get('/televisionSearch', 'PagesController@televisionSearch')->name('television.search');

    Route::get('/outdoor', 'PagesController@outdoor')->name('outdoor');
    Route::get('/outdoorPreview', 'PagesController@outdoorPreview')->name('outdoor.preview');
    Route::get('/outdoor/{outdoor}', 'PagesController@outdoorShow')->name('outdoor.show');
    Route::get('/outdoorPreview/{outdoor}', 'PagesController@outdoorShowPreview')->name('outdoor.showPreview');
    Route::get('/outdoorSearch', 'PagesController@outdoorSearch')->name('outdoor.search');

    Route::get('/transform', 'PagesController@transform')->name('transform');
    Route::get('/transformPreview', 'PagesController@transformPreview')->name('transform.preview');
    Route::get('/transform/{transform}', 'PagesController@transformShow')->name('transform.show');
    Route::get('/transformPreview/{transform}', 'PagesController@transformShowPreview')->name('transform.showPreview');
    Route::get('/transformSearch', 'PagesController@transformSearch')->name('transform.search');

    Route::get('/online', 'PagesController@online')->name('online');
    Route::get('/onlinePreview', 'PagesController@onlinePreview')->name('online.preview');
    Route::get('/online/{online}', 'PagesController@onlineShow')->name('online.show');
    Route::get('/onlinePreview/{online}', 'PagesController@onlineShowPreview')->name('online.showPreview');
    Route::get('/onlineSearch', 'PagesController@onlineSearch')->name('online.search');

    Route::get('/internetCelebrity', 'PagesController@internetCelebrity')->name('internetCelebrity');
    Route::get('/internetPreview', 'PagesController@internetPreview')->name('internetCelebrity.preview');
    Route::get('/internetCelebrity/{internetCelebrity}', 'PagesController@internetCelebrityShow')->name('internetCelebrity.show');
    Route::get('/internetCelebrityPreview/{internetCelebrity}', 'PagesController@internetCelebrityShowPreview')->name('internetCelebrity.showPreview');
    Route::get('/internetCelebritySearch', 'PagesController@internetCelebritySearch')->name('internetCelebrity.search');

    Route::get('/insight', 'PagesController@insight')->name('insight');
    Route::get('/insight/{insight}', 'PagesController@insightShow')->name('insight.show');

    Route::get('/cases', 'PagesController@cases')->name('cases');
    Route::get('/cases/{cases}', 'PagesController@casesShow')->name('cases.show');

    Route::get('/english', function () {
        return view('english');
    })->name('english');

});
