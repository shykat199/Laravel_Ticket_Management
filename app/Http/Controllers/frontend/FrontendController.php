<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;

class FrontendController extends Controller
{
    public function index(){
        $blogPost=BlogPost::select('*')
            ->offset(0)
            ->orderBy('id','DESC')
            ->limit(2)
            ->get();
        return view('frontend.layout.master_frontend',compact('blogPost'));
    }
}
