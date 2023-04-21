<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function allBlogs(){

        $allBlogs=BlogPost::with('category')->paginate(3);
        //dd($allBlogs);
        return view('frontend.allBlogs',compact('allBlogs'));
    }


    public function singleBlogs($id){

        $singlePost=BlogPost::find($id);
        $allCategories=Category::all();

        return view('frontend.singleBlog',compact('singlePost','allCategories'));
    }

}

