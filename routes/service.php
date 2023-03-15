<?php

use App\Http\Controllers\admin\ServiceController;
use Illuminate\Support\Facades\Route;

//admin/dashboard
Route::prefix('service')->group(function (){
    Route::get('/index',[ServiceController::class,'index'])->name('admin.service.index');
//    Route::get('/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('/store',[ServiceController::class,'store'])->name('post.admin.service');
    Route::post('/update',[ServiceController::class,'update'])->name('update.admin.service');
    Route::get('/delete/{id}',[ServiceController::class,'destroy'])->name('delete.admin.service');
});


