<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;



Route::get('/', function () {
    return view('welcome');
});

//login
Route::get('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@getLogin']);
// Route::get('/login', [LoginController::class, 'getLogin']);
Route::post('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@postLogin']);

//log out
Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@getLogout']);

Route::middleware(['auth'])->group(function (){
    Route::get('/sinhvien', 'Test1Controller@index');

    Route::match(['get', 'post'], '/sinhvien/add', 'Test1Controller@add')
    ->name('route_Backend_Sinhvien_Add');

    Route::get('/sinhvien/detail/{id}', 'Test1Controller@detail')->name('route_BackEnd_Students_Detail');
    Route::post('/sinhvien/update/{id}', 'Test1Controller@update')->name('route_BackEnd_Students_Update');

});
