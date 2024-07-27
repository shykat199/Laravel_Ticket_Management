<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdvantageController;

//admin/dashboard
Route::prefix('advantage')->group(function (){
    Route::get('/index',[AdvantageController::class,'index'])->name('admin.advantage.index');
//    Route::get('/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('/store',[AdvantageController::class,'store'])->name('admin.advantage.post');
    Route::post('/update',[AdvantageController::class,'update'])->name('update.admin.advantage');
    Route::post('/update/status',[AdvantageController::class,'updateStatus'])->name('update.admin.advantage.status');
    Route::get('/delete/{id}',[AdvantageController::class,'destroy'])->name('delete.admin.advantage');
});


