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

Route::get('/login', 'UsuariosController@getLogin')->name('Login');
Route::post('/login', 'UsuariosController@postLogin')->name('Login');
Route::get('/register', 'UsuariosController@getRegister')->name('register');
Route::post('/register', 'UsuariosController@postRegister')->name('register');
Route::get('/logout', 'UsuariosController@getLogout')->name('logout');


Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'InicioController@getDashboard');
    Route::get('/users','UserController@getUsers');
    Route::get('users/{id}/edit', 'UserController@getUsersEdit');
    Route::post('users/{id}/edit', 'UserController@postUsersEdit');
    Route::get('users/{id}/delete', 'UserController@getUsersDelete');
    Route::get('/patients', 'PatientsController@index');
    Route::get('/patients/homeall', 'PatientsController@getPatients' );
    Route::get('patients/{id}/edit', 'PatientsController@getPatientsEdit');
    Route::post('patients/{id}/edit', 'PatientsController@postPatientsEdit');
    Route::get('patients/{id}/delete', 'PatientsController@getPatientsDelete');
    Route::get('/patients/create', 'PatientsController@getPatientsRegister');
    Route::post('/patients/create', 'PatientsController@postPatientsRegister');
});


