<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userinformationcontroller;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/creator/content', 'photocontroller@show');
Route::delete('/creator/content/delete/{id}', 'photocontroller@destroy');
Route::post('/creator/content/add', 'photocontroller@stored');
Route::put('/creator/content/edit/{id}', 'photocontroller@updated');
Route::get('/content/information', 'userdashboardcontroller@index');
Route::get('/user/information', 'userinformationcontroller@user');
Route::delete('/user/information/delete/{id}', 'userinformationcontroller@des');
Route::post('/user/information/add', 'userinformationcontroller@add');
Route::put('/user/information/edit/{id}', 'userinformationcontroller@update1');
Route::get('/order/information', 'userordercontroller@details');
Route::delete('/order/information/delete/{id}', 'userordercontroller@des');
Route::post('/order/information/add', 'userordercontroller@add');
Route::put('/order/information/edit/{id}', 'userordercontroller@update');
Route::get('/admin/user', 'registercontroller@show');
Route::delete('/admin/user/delete/{userid}', 'registercontroller@destroy');
Route::post('/admin/user/add', 'registercontroller@stored');
Route::put('/admin/user/edit/{userid}', 'registercontroller@updated');
Route::post('/login','registercontroller@login'); 
Route::post('/store', 'registercontroller@storeapi');