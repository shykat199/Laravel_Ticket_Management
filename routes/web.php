<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\frontend\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomePageController;
use App\Http\Controllers\frontend\DashsboardController;
use App\Http\Controllers\frontend\BlogController;
use App\Http\Controllers\frontend\AboutUsPageController;
use App\Http\Controllers\frontend\ResultController;
use App\Http\Controllers\frontend\PassengerController;
use App\Http\Controllers\frontend\ValidationController;
use App\Http\Controllers\frontend\ReservationController;
use App\Http\Controllers\frontend\FrontendAuthController;
use App\Http\Controllers\admin\AdminDashboard;


//require base_path('routes/blog.php');


Route::prefix('dashboard')->group(function () {

    Route::get('/login', [AuthController::class, 'loginPage'])->name('admin.login_page');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login');
    Route::post('ajax-login', [AuthController::class, 'ajaxLogin'])->name('user.login.ajax');
    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    Route::get('/register', [AuthController::class, 'registerPage'])->name('admin.register_page');
    Route::post('/register', [AuthController::class, 'register'])->name('admin.register');


});

Route::middleware(['auth', 'prevent_back_history'])->prefix('admin/dashboard')->group(function () {

    Route::get('/admin/dashboard', [AdminDashboard::class, 'adminDashboard'])->name('admin.auth.dashboard');

//    require base_path('routes/category.php');
    Route::middleware(['ticket:admin,user'])->group(function () {

        require base_path('routes/blog.php');
        require base_path('routes/testimonial.php');
        require base_path('routes/team.php');
        require base_path('routes/advantage.php');
        require base_path('routes/sightSetting.php');
        require base_path('routes/busCompany.php');
        require base_path('routes/busDetails.php');
        require base_path('routes/busDestination.php');
        require base_path('routes/service.php');
        require base_path('routes/user.php');
        require base_path('routes/adminUserReservation.php');

        //Store Reservation
        Route::get('/user/dashboard', [ReservationController::class, 'UserDashboard'])->name('user.auth.dashboard');
        Route::get('/user/dashboard/profile', [ReservationController::class, 'UserProfile'])->name('auth.user.dashboard.profile');
        Route::get('/user/dashboard/your-ticket', [ReservationController::class, 'UserTicket'])->name('auth.user.dashboard.ticket');


        //reservation done here........
        Route::post('/reservation-done', [ReservationController::class, 'store'])->name('reservation.done');


        //User Details Dashboard
        //Route::get('/user/dashboard/ticket-details', [ReservationController::class, 'userDashboardTicketDetails'])->name('user.dashboard.ticket-details');
        Route::get('/user/profile', [ReservationController::class, 'userProfile'])->name('user.dashboard.profile');
        Route::get('/user/profile/delete/{id}', [ReservationController::class, 'dltReservation'])->name('dlt.user.reservation');

    });


});


Route::prefix('/ticket/book')->group(function () {
    //Home page
    Route::get('/home', [HomePageController::class, 'index'])->name('frontend.home');
    Route::get('/blog', [HomePageController::class, 'index'])->name('frontend.blog');

    //All Blog Page
    Route::get('/all-blogs', [BlogController::class, 'allBlogs'])->name('all.posts');

    //Single Blog Page Details
    Route::get('/all-blogs/single-blog', [BlogController::class, 'singleBlogs'])->name('single.posts');

    //Show Result
    Route::post('/show/search/result', [HomePageController::class, 'showResult'])->name('frontend.show.result');

    //About Us
    Route::get('/about_us', [AboutUsPageController::class, 'index'])->name('frontend.aboutUs');

    // Search result page
    Route::get('/show/result', [ResultController::class, 'index'])->name('frontend.show.result.page');


    //add passenger
    Route::get('/add/passengers', [PassengerController::class, 'index'])->name('frontend.add.passenger.list');
    Route::post('/add/passengers/details', [PassengerController::class, 'sessionStorePassenger'])->name('frontend.add.passenger.session');

    //Payment Method
    Route::get('/payment', [PaymentController::class, 'index'])->name('frontend.ticket.payment');
    Route::post('/store/payment-details', [PaymentController::class, 'storePaymentDetails'])->name('frontend.ticket.store.payment-details');
    // Route::get('/payment', [PaymentController::class, 'index'])->name('frontend.ticket.payment');

    //validation ticket
    Route::get('/validate', [ValidationController::class, 'index'])->name('frontend.ticket.validate');

    //Store Reservation


    //login

        Route::get('/user/login', [FrontendAuthController::class, 'loginPage'])->name('user.loginPage');
        Route::get('/user/register', [FrontendAuthController::class, 'registerPage'])->name('user.registerPage');



});






Route::get('/delete/session',[ResultController::class,'deleteSession']);
Route::get('/delete/session/price',[ResultController::class,'deleteSessionBusTicket']);
Route::get('/delete/session/price',[ResultController::class,'deleteSessionBusTicket']);

//Route::get('/update/bus-ticket',[ReservationController::class,'updateBusTicket'])->name('update.bus.ticket');


//Route::get('test', function () {
//  phpinfo();
//});
