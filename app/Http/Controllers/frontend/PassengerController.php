<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

class PassengerController extends Controller
{
    public function index(){
        return view('frontend.addPassenger');
    }
}
