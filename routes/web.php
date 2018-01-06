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
    return view('welcome');
});

Route::get('/mine', 'BlockchainController@mine');
Route::post('/transact', 'BlockchainController@transact');
Route::get('/chain', 'BlockchainController@chain');


Route::get('/node', 'BlockchainController@chain');

Route::prefix('nodes')->group(function () {
    Route::get('register', 'NodeController@register');
    Route::get('resolve', 'NodeController@register');
});