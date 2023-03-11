<?php

use App\Http\Controllers\admin\TeamController;
use Illuminate\Support\Facades\Route;


Route::prefix('team')->group(function () {
    Route::get('/index', [TeamController::class, 'index'])->name('admin.team.index');
    Route::post('/store', [TeamController::class, 'store'])->name('admin.team.store');
    Route::post('/update', [TeamController::class, 'update'])->name('admin.team.update');
    Route::get('/delete/{id}', [TeamController::class, 'destroy'])->name('admin.team.delete');
});


