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

    $api->get('transform', 'transformController@index')->name('api.transform.index');

    $api->get('newspaper', 'newspapperResourceController@index')->name('api.newspaper.index');

    $api->get('online', 'onlineResourceController@index')->name('api.online.index');

    $api->get('internetcelebrity', 'internetcelebrityController@index')->name('api.online.index');
});

$api->version('v2', function ($api) {
    $api->get('version', function () {
        return response() -> json('this is version v2');
    });
});
