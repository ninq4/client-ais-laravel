<?php

use Illuminate\Foundation\Application;
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

Route::middleware(['splade'])->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    Route::get('/', function () {
        return view('welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    });

    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        Route::view('/dashboard', 'dashboard')->name('dashboard');
        Route::get('request', [\App\Http\Controllers\RequestController::class, 'index'])->name('request.index');
        Route::get('request/create/{client_id}', [\App\Http\Controllers\RequestController::class, 'create'])->name('request.create');
        Route::get('request/edit/{client_id}', [\App\Http\Controllers\RequestController::class, 'edit'])->name('request.edit');
//
        Route::put('request/update/{id}', [\App\Http\Controllers\RequestController::class, 'update'])->name('request.update');

        Route::post('request/store/{client_id}', [\App\Http\Controllers\RequestController::class, 'store'])->name('request.store');

        Route::delete('request/delete/{request}', [\App\Http\Controllers\RequestController::class, 'destroy'])->name('request.delete');

        Route::resource('client', \App\Http\Controllers\ClientController::class);
        Route::resource('executer', \App\Http\Controllers\ExecuterController::class);

    });
});
