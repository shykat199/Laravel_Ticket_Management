<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Advantage;
use App\Models\BlogPost;
use App\Models\Testmonial;

class HomePageController extends Controller
{
    public function index(){
        $blogPost=BlogPost::select('*')
            ->offset(0)
            ->orderBy('id','DESC')
            ->limit(4)
            ->get();
        $eAdvantages=Advantage::get(['advantage_text']);

        //$testmonials=Testmonial::all();
        $testmonials=Testmonial::leftJoin('users','users.id','testmonials.user_id')
            ->select('testmonials.*','users.name')->where('status','=',1)->get();
        //dd($testmonials);
        return view('frontend.home',compact('blogPost','eAdvantages','testmonials'));
    }
}
