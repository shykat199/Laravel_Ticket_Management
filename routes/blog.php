<?php

use App\Http\Controllers\admin\BlogController;
use Illuminate\Support\Facades\Route;


//admin/dashboard

Route::resource('/blog', BlogController::class);
//Route::get('/blog/index',[BlogController::class,'index'])->name('blog.index');
Route::get('/blog/show/{id}',[BlogController::class,'show'])->name('admin.blog.show');
Route::get('/blog/edit/{id}',[BlogController::class,'edit'])->name('admin.blog.edit');
Route::get('/blog/update/{id}',[BlogController::class,'update'])->name('admin.blog.update');
Route::post('/blog/update/status',[BlogController::class,'updateStatus'])->name('admin.blog.update.status');
Route::get('/blog/delete/{id}',[BlogController::class,'destroy'])->name('admin.blog.delete');

