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
Auth::routes();

// ADMIN Routes
Route::prefix('panel')
    ->name('admin.')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', 'DashboardController@index');
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        Route::resource('pageTypes', 'PageTypeController');
        Route::resource('pages', 'PageController');
        Route::resource('answers', 'AnswerController');
        Route::resource('questionTypes', 'QuestionTypeController');
        Route::resource('questions', 'QuestionController');
        Route::resource('assessmentUsers', 'AssessmentUserController');
    });

// REACT Route
Route::view('/{path?}', 'app');
