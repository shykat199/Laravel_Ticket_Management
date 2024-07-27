<?php

use App\Http\Controllers\admin\TestmonialController;
use Illuminate\Support\Facades\Route;


Route::prefix('testimonial')->group(function (){
    Route::get('/active/index',[TestmonialController::class,'activeIndex'])->name('admin.testimonial.active');
    Route::get('/inactive/index',[TestmonialController::class,'inActiveIndex'])->name('admin.testimonial.inactive');
    Route::get('/inactive/delete',[TestmonialController::class,'inActiveIndex'])->name('admin.testimonial.inactive');
    Route::post('/active/index',[TestmonialController::class,'store'])->name('admin.testimonial.store');
    Route::post('/active/testimonial',[TestmonialController::class,'inactiveToActive'])->name('admin.testimonial.toactive');
    Route::post('/active/testimonial/update',[TestmonialController::class,'activeUpdate'])->name('admin.testimonial.active.update');
    Route::post('/inactive/testimonial',[TestmonialController::class,'activeToInactive'])->name('admin.testimonial.toInactive');
    Route::post('/inactive/testimonial/update',[TestmonialController::class,'inActiveUpdate'])->name('admin.testimonial.inActive.update');
    Route::get('/testimonial/delete/{id}',[TestmonialController::class,'destroy'])->name('admin.testimonial.delete');
});


