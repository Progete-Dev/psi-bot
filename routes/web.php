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

use App\Facades\TokenLink;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PsicologoController;

Route::get('/',function(){
    return redirect('/login');
});
Auth::routes(['register'=> false]);
Route::livewire('/pre-cadastro','auth.pre-cadastro')
    ->name('pre-cadastro')
    ->middleware('guest');
Route::middleware(['auth','psicologo'])->prefix('psicologo')->name('psicologo.')
    ->group(function () {
    Route::get('/integrate/google', [GoogleAuthController::class,'store'])->name('integrate.google');
    Route::get('/perfil',[PsicologoController::class,'perfil'])->name('perfil');
    Route::get('/horarios',[PsicologoController::class,'horarios'])->name('horarios');

    Route::get('/atendimento',[PsicologoController::class,'atendimentos'])->name('atendimento.index');
    Route::get('/atendimento/{atendimento}',[PsicologoController::class,'viewAtendimento'])->name('atendimento.view');
    Route::get('/cliente',[PsicologoController::class,'clientes'])->name('cliente.index');
    Route::get('/cliente/{cliente}',[PsicologoController::class,'viewCliente'])->name('cliente.view');
    Route::get('/agenda',[PsicologoController::class,'agenda'])->name('agenda');

});
Route::get('/agendar/{code}',[PacienteController::class,'index'])->name('agendar');
Route::get('test/agendar/',function(){
    return redirect()->to(TokenLink::generateLink(1));
});