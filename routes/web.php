<?php

use App\Http\Controllers\EventAttendanceController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\InfirmaryController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\IgrejaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Rotas de autenticação padrão
Auth::routes();

// Rota raiz redireciona para login (sem nome duplicado)
Route::get('/', function () {
    return redirect()->route('login');
});


// Rota do painel principal após login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->middleware('auth') // Acessível apenas para usuários autenticados
    ->name('home');

// Rotas protegidas por autenticação
Route::middleware('auth')->group(function () {
    // Pessoas
    Route::resource('people', PersonController::class);

    // Eventos e presenças
    Route::resource('events', EventController::class);

    Route::get('events/{event}/attendances/create', [EventAttendanceController::class, 'create'])
        ->name('event.attendances.create');

    Route::post('events/{event}/attendances', [EventAttendanceController::class, 'store'])
        ->name('event.attendances.store');

    Route::get('events/{event}/attendances/manage', [EventAttendanceController::class, 'manage'])
        ->name('event.attendances.manage');

    Route::delete('events/{event}/attendances/{person}', [EventAttendanceController::class, 'remove'])
        ->name('event.attendances.remove');

    // Enfermaria
    Route::get('infirmary/select-person', [InfirmaryController::class, 'select'])->name('infirmary.select-person');
    Route::get('infirmary/{person}/create', [InfirmaryController::class, 'create'])->name('infirmary.create');
    Route::post('infirmary/{person}', [InfirmaryController::class, 'store'])->name('infirmary.store');
    Route::get('infirmary/{person}', [InfirmaryController::class, 'index'])->name('infirmary.index');
    Route::get('infirmary/{entry}/show', [InfirmaryController::class, 'show'])->name('infirmary.show');
    Route::get('infirmary/select-person', [InfirmaryController::class, 'select'])->name('infirmary.select-person');

    Route::get('infirmary/{entry}/edit', [InfirmaryController::class, 'edit'])->name('infirmary.edit');
    Route::put('infirmary/{entry}', [InfirmaryController::class, 'update'])->name('infirmary.update');
    Route::delete('infirmary/{id}', [InfirmaryController::class, 'destroy'])->name('infirmary.destroy');

    // Rota para API -
    Route::resource('igreja', IgrejaController::class);
    Route::get('/buscar-cep', [IgrejaController::class, 'buscarEnderecoPorCep']);

});
