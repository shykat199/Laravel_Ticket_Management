<?php

use App\Http\Controllers\admin\BusDetailsController;
use Illuminate\Support\Facades\Route;

//admin/dashboard
Route::prefix('bus')->group(function (){
    Route::get('/index',[BusDetailsController::class,'index'])->name('admin.bus_details.index');
//    Route::get('/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('/store',[BusDetailsController::class,'store'])->name('post.admin.bus_details');
    Route::get('/edit/{id}',[BusDetailsController::class,'edit'])->name('post.admin.bus_details.edit');
    Route::post('/update/{id}',[BusDetailsController::class,'update'])->name('update.admin.bus_details');
    Route::post('/update-status',[BusDetailsController::class,'updateStatus'])->name('update.admin.bus.status');
    Route::get('/delete/{id}',[BusDetailsController::class,'destroy'])->name('delete.admin.bus_details');
});


