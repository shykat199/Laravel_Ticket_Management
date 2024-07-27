<?php

use App\Http\Controllers\admin\BusDestinationController;
use Illuminate\Support\Facades\Route;

//admin/dashboard
Route::prefix('bus-destination')->group(function (){
    Route::get('/index',[BusDestinationController::class,'index'])->name('admin.bus_destination.index');
    Route::get('/index/get/bus_coach',[BusDestinationController::class,'getBusCoach'])->name('admin.bus_destination.coach');
    Route::get('/create',[BusDestinationController::class,'create'])->name('admin.bus_destination.create');
    Route::post('/store',[BusDestinationController::class,'store'])->name('post.admin.bus_destination');
    Route::get('/edit/{id}',[BusDestinationController::class,'edit'])->name('post.admin.bus_destination.edit');
    Route::post('/update/{id}',[BusDestinationController::class,'update'])->name('update.admin.bus_destination');
//    Route::post('/update-status',[BusDestinationController::class,'updateStatus'])->name('update.admin.bus.status');
    Route::get('/delete/{id}',[BusDestinationController::class,'destroy'])->name('delete.admin.bus_destination');
});


