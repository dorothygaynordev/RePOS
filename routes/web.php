<?php

use App\Http\Controllers\puestosController;
use App\Http\Controllers\TokenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\reportController;
use App\Http\Controllers\ticketController;
use App\Http\Controllers\tokensGeneratedController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('dashboard',[reportController::class, 'index'])->name('dashboard');
Route::get('tokenGeneration', [TokenController::class, 'index'])->name('token');
Route::post('tokenGeneration', [TokenController::class, 'token'])->name('tokenG');
Route::get('/export-to-excel', [reportController::class, 'exportToExcel'])->name('exportToExcel');
Route::get('tokensGenerated',[TokenController::class, 'tokensGenerated'])->name('tokens');
Route::get('ticket/{folio}/{tienda}', [ticketController::class, 'showTicket'])->name('ticket');
Route::get('register',[puestosController::class, 'index'])->name('register');
 
