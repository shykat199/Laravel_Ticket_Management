<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

class FrontendAuthController extends Controller
{
    public function loginPage(){
        return view('frontend.auth.login');
    }

    public function registerPage(){
        return view('frontend.auth.register');
    }
}
