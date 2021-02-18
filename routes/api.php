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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/show/categorymenu','MenuController@showcategorymenu');
Route::get('/show/subcategorymenu','MenuController@showsubcategorymenu');
Route::post('/create/categorymenu','MenuController@createcategorymenu');
Route::post('/create/subcategorymenu','MenuController@creatsubcategorymenu');
Route::post('/edit/categorymenu/{id}','MenuController@editcategorymenu');
Route::post('/edit/subcategorymenu/{id}','MenuController@editsubcategorymenu');
Route::put('/update/categorymenu/{id}','MenuController@updatecategorymenu');
Route::put('/update/subcategorymenu','MenuController@updatesubcategorymenu');

