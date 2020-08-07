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
Auth::routes(['register'=> false]);
Route::get('/dashboard', 'DashboardController@dash')->name('dashboard');
Route::livewire('/pre-cadastro','auth.pre-cadastro');

Route::get('/paciente','PacienteController@show')->middleware('auth')->name('paciente');
Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'psicologo', 'middleware' => ['auth','psicologo']], function () {
    Route::get('/perfil', 'PsicologoController@perfil')->name('psicologo.perfil');
    Route::post('/perfil', 'PsicologoController@perfilUpdate')->name('psicologo.perfil_update');
    Route::get('/home', 'PsicologoController@home')->name('psicologo.home'); // Dashboard
    Route::get('/lembretes', 'PsicologoController@lembretes')->name('psicologo.lembretes');
    Route::get('/configuracoes', 'PsicologoController@configuracoes')->name('psicologo.config');
    Route::get('/historico', 'PsicologoController@historicoList')->name('psicologo.historicoList');
    Route::get('/solicitacoes', 'PsicologoController@solicitacoes')->name('psicologo.solicitacoesAtendimento');
    Route::get('/solicitacao/{solicitacao}/confirmar', 'PsicologoController@confirmarSolicitacao')->name('psicologo.confirmar_solicitacao');
    Route::get('/historico/{id}', 'PsicologoController@historicoCliente')->name('psicologo.historicoCliente');
    Route::get('/calendario', 'PsicologoController@calendario')->name('psicologo.calendario');
    


});