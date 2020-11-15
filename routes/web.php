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


Route::get('/perfil', 'PerfilController@index')->name('perfil');


// Route::get('/perfil', function () {
//     return view('perfil');
// });

// Rutas de Administrador de usuario
// Route::middleware('can:user-users')->group(function(){    //Carpeta c, carpeta vista, consola
//     Route::resource('/perfil','PerfilController', ['except'=>['show','update']]);                                          //Ruta url, controller, funciones
// });

Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Rutas de Administrador de usuario
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:admin-users')->group(function(){    //Carpeta c, carpeta vista, consola
    Route::resource('/users','UsersController', ['except'=>['show','update']]);                                          //Ruta url, controller, funciones
});


//Rutas de Administrador de Plataform
Route::namespace('User')->prefix('user')->name('user.')->middleware('can:admin-users')->group(function(){       //Carpeta, prefijo, consola
    Route::resource('/plataforms','PlataformsController', ['except'=>['show']]);                                //Ruta url, controller, funciones
});

//Rutas de Administrador de Gender
Route::namespace('User')->prefix('user')->name('user.')->middleware('can:admin-users')->group(function(){       //Carpeta, prefijo, consola
    Route::resource('/Genders','GendersController', ['except'=>['show']]);                                //Ruta url, controller, funciones
});

//Rutas de Administrador de Games
Route::namespace('User')->prefix('user')->name('user.')->middleware('can:admin-users')->group(function(){       //Carpeta, prefijo, consola
    Route::resource('/Games','GamesController', ['except'=>['show']]);                                //Ruta url, controller, funciones
});

// Route::resource('users', UsersController::class);PlataformsController

// Route::resource('books', BooksController::class);