<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function allBlogs(){

        return view('frontend.allBlogs');
    }


    public function singleBlogs(){

        return view('frontend.singleBlog');
    }

}

