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

Route::middleware('api')
    ->namespace('Api')
    ->group(function () {
        Route::get('page/{order}', 'PageController@getPage');
        Route::get('page/{order}/type', 'PageController@getPageByType');
        Route::get('pages', 'PageController@getPages');
        Route::put('answers', 'AnswerController@update');
        Route::get('configs', 'ConfigController@getConfigs');
    });
