<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\TicketReservationController;

Route::prefix('ticket/reservation')->group(function () {

    Route::get('/index', [TicketReservationController::class, 'index'])->name('admin.reservation.index');
    Route::get('/create', [TicketReservationController::class, 'create'])->name('admin.reservation.create');
    Route::post('/create/ticket', [TicketReservationController::class, 'store'])->name('admin.reservation.store');
    Route::get('/edit/{id}', [TicketReservationController::class, 'edit'])->name('admin.reservation.edit');
    Route::get('/show/{id}', [TicketReservationController::class, 'show'])->name('admin.reservation.show');
    Route::post('/update', [TicketReservationController::class, 'update'])->name('admin.reservation.update');
    Route::get('/delete', [TicketReservationController::class, 'destroy'])->name('admin.reservation.delete');


    Route::get('/reservation/step-one',[TicketReservationController::class,'reservationStepOne'])->name('admin.reservation.step-one');

});
