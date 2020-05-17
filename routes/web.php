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

Route::match(['get', 'post'], '/botman', 'BotManController@handle');
Route::get('/', 'BotManController@home');
Route::get('/admin','BotManController@dashboard ');
Route::get('/login', "Auth\LoginController@show");
Route::get('/dashboard', 'DashboardController@dash')->name('dashboard');
Auth::routes();
Route::get('/paciente','PacienteController@show')->middleware('auth')->name('paciente');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/psicologo', 'PsicologoController@perfil');