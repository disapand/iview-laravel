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
    $api->get('version', function () {
        return response()->json([['version' => 'v1', 'statue' => 'done'],['version' => 'v2', 'statue' => 'fail']]);
    });
    $api->get('car', 'CarsController@index')->name('api.car.index');
    $api->get('car/{car}', 'CarsController@get')->name('api.car.get');
    $api->post('car', 'CarsController@store')->name('api.car.store');
});

$api->version('v2', function ($api) {
    $api->get('version', function () {
        return response() -> json('this is version v2');
    });
});
