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

$api->version('v1', [], function ($api) {
    $api->get('version', function () {
        return response()->json([['version' => 'v1', 'statue' => 'done'],['version' => 'v2', 'statue' => 'fail']]);
    });
    $api->get('CList', function () {
        $Clist = [
            [
                'value' => 'v1',
                'label' => '第一版'
            ],
            [
                'value' => 'v2',
                'label' => '第二版'
            ],
            [
                'value' => 'v3',
                'label' => '第三版'
            ],
        ];

        return response()->json($Clist);
    });
});

$api->version('v2', function ($api) {
    $api->get('version', function () {
        return response() -> json('this is version v2');
    });
});
