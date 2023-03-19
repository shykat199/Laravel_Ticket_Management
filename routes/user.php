<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserController;

Route::prefix('/user')->group(function (){

    Route::get('/index',[UserController::class,'index'])->name('admin.user.index');
    Route::get('/delete/{id}',[UserController::class,'destroy'])->name('admin.user.delete');
    Route::get('/admin/index',[UserController::class,'adminIndex'])->name('admin.index');

});
