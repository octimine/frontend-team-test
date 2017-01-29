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

Route::get('/', function () {
    return view('index');
});

/**
 * Route information regarding the EmployeeController
 */
Route::get('/employee/{id?}', 'EmployeeController@index');
Route::post('/employee', 'EmployeeController@store');
Route::post('/employee/{id}', 'EmployeeController@update');
Route::delete('/employee/{id}', 'EmployeeController@destroy');