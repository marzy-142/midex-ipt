<?php

use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
})->name('home');


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
    Route::get('/records', [PetController::class, 'index'])->name('records.index');
    Route::get('/records/create', [PetController::class, 'create'])->name('records.create')->middleware('can:create records');
    Route::post('/records', [PetController::class, 'store'])->name('records.store');


    Route::middleware(['can:edit records'])->group(function () {
        Route::get('/records/{pet}/edit', [PetController::class, 'edit'])->name('records.edit');
        Route::put('/records/{pet}', [PetController::class, 'update'])->name('records.update');
    });

    Route::delete('/records/{pet}', [PetController::class, 'destroy'])->name('records.destroy')->middleware('can:delete records');
});
