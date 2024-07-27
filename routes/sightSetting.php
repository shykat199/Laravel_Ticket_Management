<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\SightSettingController;

//admin/dashboard
Route::prefix('sight/setting')->group(function (){
    Route::get('/index',[SightSettingController::class,'index'])->name('admin.setting.index');
    Route::get('/create',[SightSettingController::class,'create'])->name('admin.setting.create');
    Route::post('/store',[SightSettingController::class,'store'])->name('post.admin.setting');
    Route::post('/update',[SightSettingController::class,'update'])->name('update.admin.setting');
    Route::get('/delete/{id}',[SightSettingController::class,'destroy'])->name('delete.admin.setting');
});


