<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');










Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});


Route::group(['middleware'=>'auth:api'], function(){
    Route::get('users', 'UserController@users');
    Route::get('user/{id}', 'UserController@user');
    Route::get('user/delete/{id}', 'UserController@userDelete');
    Route::post('user/update', 'UserController@userUpdate');
    Route::get('user/doc/{id}', 'UserController@userDoc');


    Route::get('documents', 'DocumentsController@documents');
    Route::get('document/{id}', 'DocumentsController@document');
    Route::get('document/delete/{id}', 'DocumentsController@documentDelete');
    Route::post('document/', 'DocumentsController@createDocument');
    Route::post('document/update', 'DocumentsController@updateDocument');
});