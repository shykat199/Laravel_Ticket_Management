<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;


//admin/dashboard

Route::resource('/blog', BlogController::class);
Route::get('/blog/show/{id}',[BlogController::class,'show'])->name('admin.blog.show');
Route::get('/blog/edit/{id}',[BlogController::class,'edit'])->name('admin.blog.edit');
Route::get('/blog/update/{id}',[BlogController::class,'update'])->name('admin.blog.update');
Route::get('/blog/delete/{id}',[BlogController::class,'destroy'])->name('admin.blog.delete');

