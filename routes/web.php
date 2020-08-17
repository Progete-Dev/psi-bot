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

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\PsicologoController;
Route::get('/',function(){
    return redirect('/login');
});
Auth::routes(['register'=> false]);
Route::livewire('/pre-cadastro','auth.pre-cadastro')->middleware('guest');
Route::middleware(['auth','psicologo'])->prefix('psicologo')->name('psicologo.')
    ->group(function () {
    Route::get('/integrate/google', [GoogleAuthController::class,'store'])->name('integrate.google');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/perfil',[PsicologoController::class,'perfil'])->name('perfil');
    Route::get('/lembretes',[PsicologoController::class,'perfil'])->name('lembretes');
    Route::get('/configuracoes',[PsicologoController::class,'perfil'])->name('config');
    Route::get('/historico',[PsicologoController::class,'perfil'])->name('historico');
    Route::get('/agenda',[DashboardController::class,'index'])->name('agenda');
    Route::get('/atendimentos')->name('atendimentos');
    Route::get('/atendimentos/{atendimento}')->name('atendimentos.atendimento');
});