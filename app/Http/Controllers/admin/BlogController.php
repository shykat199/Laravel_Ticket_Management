<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogPostRequest;
use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $allPost = BlogPost::with(['users', 'category'])->latest()->get();
        return view('admin.interface.blog.index', compact('allPost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $allCategory = Category::all();
        return view('admin.interface.blog.create', compact('allCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BlogPostRequest $request): ?\Illuminate\Http\RedirectResponse
    {
        //dd($request->all());
        $image = null;
        if ($request->hasFile('post_image')) {
            //$image=date('mdYHis').'.'.uniqid('', true).'.'.$request->file('post_image')->getClientOriginalExtension();
            $image = $request->file('post_image')->store('public/images');
        }
        $storePost = BlogPost::create([
            'post_title' => $request->get('post_title'),
            'category_id' => $request->get('post_category'),
            'user_id' => Auth::user()->id,
            'post_description' => $request->get('post_description'),
            'post_image' => $image,
        ]);

        if ($storePost) {
            return to_route('blog.index')->with('success', 'Post Created Successfully.');
        } else {
            return Redirect::back()->with('error', 'Something Wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\BlogPost $blogPost
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(string $id)
    {
//        $postId=$blogPost->id;
//        dd($postId);
        //dd($blogPost);
        //$blogPost=$blogPost->with(['category','users']);
        //dd($blogPost);
        $blogPost = BlogPost::findOrFail($id)->with(['category', 'users'])->first();
        //dd($blogPost);

        return view('admin.interface.blog.show', compact('blogPost'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\BlogPost $blogPost
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(string $id)
    {

        $blogPost = BlogPost::findOrFail($id)->with(['category', 'users'])->first();
        //dd($blogPost);
        $allCategory = Category::all();
        return view('admin.interface.blog.edit', compact('blogPost', 'allCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BlogPost $blogPost
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, string $id)
    {
        $blogPost = BlogPost::where(['id' => $id])->first();
        //dd($blogPost)

        $image = $blogPost->post_image;
        if ($request->hasFile('post_image')) {
            !is_null($blogPost->post_image) && Storage::delete($blogPost->post_image);
            $image = $request->file('post_image')->store('public/images');
        }
        $updatePost = $blogPost->update([
            'post_title' => $request->get('post_title'),
            'category_id' => $request->get('post_category'),
            'post_description' => $request->get('post_description'),
            'post_image' => $image,
        ]);
        if ($updatePost) {
            return to_route('blog.index')->with('success', 'Post Updated Successfully');
        } else {
            return to_route('blog.index')->with('error', 'Some Things Wrong');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\BlogPost $blogPost
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        $blogPost = BlogPost::where(['id' => $id])->first();
        //$image = $blogPost->post_image;
        !is_null($blogPost->post_image) && Storage::delete($blogPost->post_image);
        $dltPost = $blogPost->delete();
        if ($dltPost) {
            return to_route('blog.index')->with('success', 'Post Deleted Successfully');
        } else {
            return to_route('blog.index')->with('error', 'Some Things Wrong');

        }

    }
}
