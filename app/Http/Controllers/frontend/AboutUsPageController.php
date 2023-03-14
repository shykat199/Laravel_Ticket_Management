<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\SightSetting;
use App\Models\Team;
use App\Models\Testmonial;

class AboutUsPageController extends Controller
{
    public function index(){

        $aboutUs=SightSetting::select('*')->where('key','=','About Us')->get();
        $allTeams=Team::all();
        $testmonials=Testmonial::all();
        //dd($aboutUs);

        return view('frontend.aboutUs',compact('aboutUs','allTeams','testmonials'));
    }
}
