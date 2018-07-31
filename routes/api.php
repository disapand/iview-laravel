<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Api',
    'middleware' => ['serializer:array', 'bindings', 'cors'],
], function ($api) {
    $api->get('index', 'TelevisionResourcesController@index')->name('api.tv.index');
    $api->get('tv', 'TelevisionResourcesController@tv')->name('api.tv.tv');
    $api->get('img', 'TelevisionResourcesImgsController@index')->name('api.tv.img');
    $api->post('img', 'TelevisionResourcesImgsController@store')->name('api.tv.img.store');
    $api->delete('img/{img}', 'TelevisionResourcesImgsController@delete')->name('api.tv.img.delete');
    $api->get('tv/{tv}', 'TelevisionResourcesController@getTv')->name('api.tv.get');
    $api->get('tv/{condition}/{query}', 'TelevisionResourcesController@searchTv')->name('api.tv.get');
    $api->get('searchTv/{country?}/{category?}/{form?}', 'TelevisionResourcesController@search')->name('api.tv.get');
    $api->post('tv', 'TelevisionResourcesController@store')->name('api.tv');
    $api->get('recommendTv', 'TelevisionResourcesController@recommendTv')->name('api.tv.recommend');
    $api->post('importTv', 'TelevisionResourcesController@importTv')->name('api.tv.import');
    $api->delete('tv/{tv}', 'TelevisionResourcesController@delete')->name('api.tv.delete');

    $api->get('outdoor', 'outdoorResourceController@index')->name('api.outdoor.index');
    $api->get('outdoor/{outdoor}', 'outdoorResourceController@show')->name('api.outdoor.show');
    $api->get('outdoor/{condition?}/{query?}', 'outdoorResourceController@query')->name('api.outdoor.query');
    $api->post('outdoor', 'outdoorResourceController@update')->name('api.outdoor.update');
    $api->delete('outdoor/{outdoor}', 'outdoorResourceController@delete')->name('api.outdoor.delete');
    $api->post('outdoorImg', 'outdoorResourceImgController@store')->name('api.outdoorImg.store');
    $api->delete('outdoorImg/{img}', 'outdoorResourceImgController@delete')->name('api.outdoorImg.delete');
    $api->post('outdoorImgUpdate', 'outdoorResourceImgController@update')->name('api.outdoorImg.delete');

    $api->get('transform', 'transformController@index')->name('api.transform.index');
    $api->post('transform', 'transformController@store')->name('api.transform.store');
    $api->get('transform/{transform}', 'transformController@show')->name('api.transform.show');
    $api->get('transform/{condition?}/{query?}', 'transformController@query')->name('api.transform.query');
    $api->delete('transform/{transform}', 'transformController@destroy')->name('api.transform.show');
    $api->post('transformImg', 'transformImgsController@create')->name('api.transformImg.create');
    $api->delete('transformImg/{img}', 'transformImgsController@destroy')->name('api.transformImg.destroy');
    $api->post('transformImgUpdate', 'transformImgsController@update')->name('api.transformImg.update');

    $api->get('newspaper', 'newspapperResourceController@index')->name('api.newspaper.index');
    $api->post('newspaper', 'newspapperResourceController@store')->name('api.newspaper.store');
    $api->get('newspaper/{newspaper}', 'newspapperResourceController@show')->name('api.newspaper.show');

    $api->get('online', 'onlineResourceController@index')->name('api.online.index');

    $api->get('internetcelebrity', 'internetcelebrityController@index')->name('api.online.index');
});

$api->version('v2', function ($api) {
    $api->get('version', function () {
        return response() -> json('this is version v2');
    });
});
