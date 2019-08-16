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

Route::group(['prefix' => '/v1'], function () {
    Route::get('/application', 'ApplicationController@index')->name('application.index');
    Route::post('/application/create', 'ApplicationController@create')->name('application.create');

    Route::get('/chat', 'ChatController@index')->name('chat.index');
    Route::post('/chat/create', 'ChatController@create')->name('chat.create');

    Route::get('/message', 'MessageController@index')->name('message.index');
    Route::post('/message/create', 'MessageController@create')->name('message.create');
});
