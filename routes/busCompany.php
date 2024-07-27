<?php

use App\Http\Controllers\admin\BusCompanyController;
use Illuminate\Support\Facades\Route;

//admin/dashboard
Route::prefix('bus_company')->group(function (){
    Route::get('/index',[BusCompanyController::class,'index'])->name('admin.company.index');
    Route::post('/store',[BusCompanyController::class,'store'])->name('post.admin.company');
    Route::post('/update',[BusCompanyController::class,'update'])->name('update.admin.company');
    Route::post('/update/status',[BusCompanyController::class,'updateStatus'])->name('update.admin.company.status');
    Route::get('/delete/{id}',[BusCompanyController::class,'destroy'])->name('delete.admin.company');
});




