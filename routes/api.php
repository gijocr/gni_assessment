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
        Route::get('page/{order}/type/{typeOrder}', 'PageController@getPageByType');
        Route::get('pages', 'PageController@getPages');
        Route::get('question/{order}/type/{typeOrder}', 'QuestionController@getQuestionByPageType');
        Route::put('answers', 'AnswerController@update');
        Route::get('configs', 'ConfigController@getConfigs');
        Route::get('result/{typeOrder}', 'ResultController@getResultByPageType');
    });
