<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

//admin/dashboard
Route::prefix('category')->group(function (){
    Route::get('/index',[CategoryController::class,'index'])->name('admin.category.index');
//    Route::get('/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('/store',[CategoryController::class,'store'])->name('post.admin.category');
    Route::post('/update',[CategoryController::class,'update'])->name('update.admin.category');
    Route::get('/delete/{id}',[CategoryController::class,'destroy'])->name('delete.admin.category');
});


