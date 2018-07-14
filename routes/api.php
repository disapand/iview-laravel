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
    'middleware' => ['serializer:array', 'bindings'],
], function ($api) {
    $api->get('index', 'TelevisionResourcesController@index')->name('api.tv.index');
    $api->get('tv', 'TelevisionResourcesController@tv')->name('api.tv.tv');
    $api->get('img', 'TelevisionResourcesImgsController@index')->name('api.tv.img');
    $api->delete('img/{img}', 'TelevisionResourcesImgsController@delete')->name('api.tv.img.delete');
    $api->get('tv/{tv}', 'TelevisionResourcesController@getTv')->name('api.tv.get');
});

$api->version('v2', function ($api) {
    $api->get('version', function () {
        return response() -> json('this is version v2');
    });
});
