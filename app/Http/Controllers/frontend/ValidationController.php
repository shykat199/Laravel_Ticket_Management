<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

class ValidationController extends Controller
{
    public function index(){
        return view('frontend.validation');
    }

}
