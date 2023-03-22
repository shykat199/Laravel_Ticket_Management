<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminUserReservation;

Route::prefix('/reservation')->group(function (){

    Route::get('/index',[AdminUserReservation::class,'index'])->name('admin.user.reservation');
    Route::get('/delete/reservation/{id}',[AdminUserReservation::class,'destroy'])->name('admin.user.reservation.delete');

});
