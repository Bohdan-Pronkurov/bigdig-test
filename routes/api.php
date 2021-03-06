<?php

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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('signup', 'AuthController@signup');
});

Route::group([
    'middleware' => 'auth:api'
], function() {

    Route::group([
        'prefix' => 'auth'
    ], function () {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });

    Route::get('logout', 'AuthController@logout');
    Route::get('user', 'AuthController@user');

    Route::group([
        'prefix' => 'entities'
    ], function () {
        Route::post('/', 'EntitiesController@create')->name('entities.create');
        Route::get('/', 'EntitiesController@getAll')->name('entities.all');
    });
});
