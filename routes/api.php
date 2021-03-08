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

Route::middleware(['auth:api'])->group(function () {

// });
// Route::get('/show/categorymenu','MenuController@showcategorymenu');
Route::get('/show/subcategorymenu','MenuController@showsubcategorymenu');
// Route::post('/create/categorymenu','MenuController@createcategorymenu');
Route::post('/create/subcategorymenu','MenuController@creatsubcategorymenu');
// Route::post('/edit/categorymenu/{id}','MenuController@editcategorymenu');
Route::post('/edit/subcategorymenu/{id}','MenuController@editsubcategorymenu');
// Route::put('/update/categorymenu/{id}','MenuController@updatecategorymenu');
Route::put('/update/subcategorymenu/{id}','MenuController@updatesubcategorymenu');
Route::delete('/delete/categorymenu/{id}','MenuController@destroycategorymenu');
Route::delete('/delete/subcategorymenu/{id}','MenuController@destroysubcategorymenu');

Route::resource('/table','TableController');
Route::post('/tabletypes','TableController@createtabletype');
Route::get('/tabletypes','TableController@showtabletype');
//  api/table                       | table.index   | App\Http\Controllers\TableController@index                 | api        |
// |        | POST      | api/table                       | table.store   | App\Http\Controllers\TableController@store                 | api        |
// |        | GET|HEAD  | api/table/{table}               | table.show    | App\Http\Controllers\TableController@show                  | api        |
// |        | PUT|PATCH | api/table/{table}               | table.update  | App\Http\Controllers\TableController@update                | api        |
// |        | DELETE    | api/table/{table}
Route::resource('/order','OrderController');

// user controlle
// Route::post('/register','UserController@register');
// Route::post('/login','UserController@login');
Route::get('/user','UserController@details');

});
Route::post('/register','UserController@register');
Route::post('/login','UserController@login');