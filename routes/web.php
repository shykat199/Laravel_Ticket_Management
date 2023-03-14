<?php

use App\Http\Controllers\admin\AuthController;
use Illuminate\Support\Facades\Route;


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
});

//Route::get('test', function () {
//  phpinfo();
//});
