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
    $api->get('img', 'televisionResourcesImgsController@index')->name('api.tv.img');
    $api->post('img', 'televisionResourcesImgsController@store')->name('api.tv.img.store');
    $api->delete('img/{img}', 'televisionResourcesImgsController@delete')->name('api.tv.img.delete');
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
    $api->post('importOutdoor', 'outdoorResourceController@importOutdoor')->name('api.outdoor.import');

    $api->get('transform', 'transformController@index')->name('api.transform.index');
    $api->post('transform', 'transformController@store')->name('api.transform.store');
    $api->get('transform/{transform}', 'transformController@show')->name('api.transform.show');
    $api->get('transform/{condition?}/{query?}', 'transformController@query')->name('api.transform.query');
    $api->delete('transform/{transform}', 'transformController@destroy')->name('api.transform.show');
    $api->post('transformImg', 'transformImgsController@create')->name('api.transformImg.create');
    $api->delete('transformImg/{img}', 'transformImgsController@destroy')->name('api.transformImg.destroy');
    $api->post('transformImgUpdate', 'transformImgsController@update')->name('api.transformImg.update');
    $api->post('importTransform', 'transformController@importTransform')->name('api.transform.import');

    $api->get('newspaper', 'newspapperResourceController@index')->name('api.newspaper.index');
    $api->post('newspaper', 'newspapperResourceController@store')->name('api.newspaper.store');
    $api->get('newspaper/{newspaper}', 'newspapperResourceController@show')->name('api.newspaper.show');
    $api->get('newspaper/{condition?}/{query?}', 'newspapperResourceController@query')->name('api.newspaper.query');
    $api->delete('newspaper/{newspaper}', 'newspapperResourceController@destroy')->name('api.newspaper.destroy');
    $api->post('newspaperImg', 'newspapperResourceImsController@store')->name('api.newspaperImg.store');
    $api->post('newspaperImgUpdate', 'newspapperResourceImsController@update')->name('api.newspaperImg.update');
    $api->delete('newspaperImg/{img}', 'newspapperResourceImsController@destroy')->name('api.newspaperImg.destroy');
    $api->post('importNewspaper', 'newspapperResourceController@importNewspaper')->name('api.newspaper.import');

    $api->get('online', 'onlineResourceController@index')->name('api.online.index');
    $api->post('online', 'onlineResourceController@store')->name('api.online.store');
    $api->get('online/{online}', 'onlineResourceController@show')->name('api.online.show');
    $api->get('online/{condition?}/{query?}', 'onlineResourceController@query')->name('api.online.query');
    $api->delete('online/{online}', 'onlineResourceController@destroy')->name('api.online.destroy');
    $api->post('onlineImg', 'onlineResourceImgsController@store')->name('api.onlineImg.store');
    $api->post('onlineImgUpdate', 'onlineResourceImgsController@update')->name('api.onlineImg.update');
    $api->delete('onlineImg/{img}', 'onlineResourceImgsController@destroy')->name('api.onlineImg.destroy');
    $api->post('importOnline', 'onlineResourceController@importOnline')->name('api.online.import');

    $api->get('internet', 'internetcelebrityController@index')->name('api.internet.index');
    $api->post('internet', 'internetcelebrityController@store')->name('api.internet.store');
    $api->get('internet/{internet}', 'internetcelebrityController@show')->name('api.internet.show');
    $api->get('internet/{condition?}/{query?}', 'internetcelebrityController@query')->name('api.internet.query');
    $api->delete('internet/{internet}', 'internetcelebrityController@destroy')->name('api.internet.destroy');
    $api->post('internetImg', 'internetcelebrityResourceImgsController@store')->name('api.internetImg.store');
    $api->post('internetImgUpdate', 'internetcelebrityResourceImgsController@update')->name('api.internetImg.update');
    $api->delete('internetImg/{img}', 'internetcelebrityResourceImgsController@destroy')->name('api.internetImg.destroy');

    $api->get('case', 'CaseController@index')->name('api.case.index');
    $api->post('case', 'CaseController@store')->name('api.case.store');
    $api->get('case/{caseResource}', 'CaseController@show')->name('api.case.show');
    $api->get('case/{condition}/{query}', 'CaseController@query')->name('api.case.query');
    $api->delete('case/{caseResource}', 'CaseController@destroy')->name('api.case.destroy');
    $api->post('caseImg', 'CaseImgsController@store')->name('api.caseImg.store');
    $api->delete('caseImg/{img}', 'CaseImgsController@destroy')->name('api.caseImg.destroy');
    $api->post('caseImgUpdate', 'CaseImgsController@update')->name('api.caseImg.update');

    $api->get('insight', 'insightController@index')->name('api.insight.index');
    $api->post('insight', 'insightController@store')->name('api.insight.store');
    $api->get('insight/{insight}', 'insightController@show')->name('api.insight.show');
    $api->get('insight/{condition}/{query}', 'insightController@query')->name('api.insight.query');
    $api->delete('insight/{insight}', 'insightController@destroy')->name('api.insight.destroy');

    $api->get('dynamic', 'dynamicController@index')->name('api.dynamic.index');
    $api->get('dynamic/{dynamic}', 'dynamicController@show')->name('api.dynamic.show');
    $api->get('dynamic/{condition}/{query}', 'dynamicController@query')->name('api.dynamic.query');
    $api->post('dynamic', 'dynamicController@store')->name('api.dynamic.store');
    $api->delete('dynamic/{dynamic}', 'dynamicController@destroy')->name('api.dynamic.destroy');
    $api->post('dynamicImg', 'dynamicImgController@store')->name('api.dynamicImg.store');
    $api->delete('dynamicImg/{img}', 'dynamicImgController@destroy')->name('api.dynamicImg.destroy');
    $api->post('dynamicImgUpdate', 'dynamicImgController@update')->name('api.dynamicImg.update');

    $api->post('otherImg', 'ImgsController@store')->name('api.img.store');

    $api->post('authorizations', 'AuthorizationsController@store')->name('api.authorizations.store');
    $api->put('authorizations/current', 'AuthorizationsController@update')->name('api.authorizations.update');
    $api->delete('authorizations/current', 'AuthorizationsController@destroy')->name('api.authorizations.destroy');

    $api->get('users', 'UserController@index')->name('api.users.show');
    $api->delete('user/{user}', 'UserController@destroy')->name('api.user.destroy');
    $api->post('user', 'UserController@update')->name('api.user.update');

    $api->group(['middleware' => 'api.auth'], function ($api) {

        $api->get('user', 'UserController@me')->name('api.user.show');

    });
});

$api->version('v2', function ($api) {
    $api->get('version', function () {
        return response() -> json('this is version v2');
    });
});
