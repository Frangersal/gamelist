<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/perfil', function () {
    return view('perfil');
});

Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/listall', 'Admin\UsersController@listall')->name('listall'); // ajax lista usuarios


Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:admin-users')->group(function(){    //Carpeta, prefijo, consola
    Route::resource('/users','UsersController', ['except'=>['show','store']]);                                  //Ruta url, controller, funciones
});

