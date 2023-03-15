<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowResultRequest;
use GuzzleHttp\Psr7\Request;

class ResultController extends Controller
{
    public function index(){
        return view('frontend.showResult');
    }

    public function showResult(ShowResultRequest $request){
        dd($request->all());
    }
}
