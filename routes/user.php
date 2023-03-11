<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\auth\UserRegisterController;

Route::prefix('user')->middleware('blogger:admin')->group(function (){

    Route::get('/index',[UserRegisterController::class,'userIndex'])->name('user.index');
//  Route::get('/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('/store',[UserRegisterController::class,'storeUser'])->name('user.store');
    Route::post('/update',[UserRegisterController::class,'update'])->name('user.update');
    Route::get('/show/{id}',[UserRegisterController::class,'show'])->name('user.show');
    Route::post('/delete',[UserRegisterController::class,'destroy'])->name('user.delete');

});
