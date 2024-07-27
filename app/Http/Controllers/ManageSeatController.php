<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageSeatController extends Controller
{
    public function index(Request $request)
    {
        $sessionData=$request->session()->get('searchedResults');
        dd($sessionData);
    }
}
