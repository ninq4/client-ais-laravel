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


        Route::resource('report', \App\Http\Controllers\ReportController::class);
        Route::get('report/create/{client_id}', [\App\Http\Controllers\ReportController::class, 'create'])->name('report.create');
        Route::post('report/store/{client_id}', [\App\Http\Controllers\ReportController::class, 'store'])->name('report.store');
        Route::get('report/client/create', [\App\Http\Controllers\ReportController::class, 'createClient'])->name('report.createClient');
        Route::post('report/client/store', [\App\Http\Controllers\ReportController::class, 'storeClient'])->name('report.storeClient');



        Route::resource('request', \App\Http\Controllers\RequestController::class);
        Route::get('request/create/{client_id}', [\App\Http\Controllers\RequestController::class, 'create'])->name('request.create');
        Route::post('request/store/{client_id}', [\App\Http\Controllers\RequestController::class, 'store'])->name('request.store');


        Route::resource('client', \App\Http\Controllers\ClientController::class);
        Route::resource('executer', \App\Http\Controllers\ExecuterController::class);

        Route::resource('information', \App\Http\Controllers\InformationController::class);
        Route::resource('question', \App\Http\Controllers\QuestionController::class);
    });
});
