<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\frontend\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomePageController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\frontend\AboutUsPageController;
use App\Http\Controllers\frontend\ResultController;
use App\Http\Controllers\frontend\PassengerController;
use App\Http\Controllers\frontend\ValidationController;


//require base_path('routes/blog.php');


Route::prefix('dashboard')->group(function () {

    Route::get('/login', [AuthController::class, 'loginPage'])->name('admin.login_page');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    Route::get('/register', [AuthController::class, 'registerPage'])->name('admin.register_page');
    Route::post('/register', [AuthController::class, 'register'])->name('admin.register');


});

Route::middleware('auth')->prefix('admin/dashboard')->group(function () {

//    require base_path('routes/category.php');
    require base_path('routes/blog.php');
    require base_path('routes/testimonial.php');
    require base_path('routes/team.php');
    require base_path('routes/advantage.php');
    require base_path('routes/sightSetting.php');
    require base_path('routes/busCompany.php');
    require base_path('routes/busDetails.php');
    require base_path('routes/busDestination.php');
    require base_path('routes/service.php');
});


Route::prefix('/ticket/book')->group(function () {
    //Home page
    Route::get('/home', [HomePageController::class, 'index'])->name('frontend.home');

    //About Us
    Route::get('/about_us', [AboutUsPageController::class, 'index'])->name('frontend.aboutUs');

    // Search result page
    Route::get('/show/result', [ResultController::class, 'index'])->name('frontend.show.result.page');

    //Show Result
    Route::post('/show/search/result', [ResultController::class, 'showResult'])->name('frontend.show.result');

    //add passenger
    Route::get('/add/passengers', [PassengerController::class, 'index'])->name('frontend.add.passenger.list');

    //Payment Method
    Route::get('/payment', [PaymentController::class, 'index'])->name('frontend.ticket.payment');

    //validation ticket
    Route::get('/validate', [ValidationController::class, 'index'])->name('frontend.ticket.validate');
});


//Route::get('test', function () {
//  phpinfo();
//});
