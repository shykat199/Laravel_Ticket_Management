<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $allCategory = Category::all();
        return view('admin.interface.category.index', compact('allCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): ?\Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'category_name' => ['required', 'unique:categories', 'max:15'],
        ], [
            'category_name.required' => 'Please Select A Category Name First',
            'category_name.unique' => 'Category Name Has Already Taken',
            'category_name.max' => 'Category Name Should Not Be More Then 15 Caterer',
        ]);

        $catStore = Category::create([
            'category_name' => $request->get('category_name'),
        ]);

        if ($catStore) {
            return to_route('admin.category.index')->with('success', 'Category Created Successfully.');
        } else {
            return Redirect::back()->with('error', 'Something Wrong...');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $catId = $request->get('category_id');
        $request->validate([
            'category_name' => ['unique:categories', 'max:15'],
        ], [
            'category_name.unique' => 'Category Name Has Already Taken',
            'category_name.max' => 'Category Name Should Not Be More Then 15 Caterer',
        ]);

        $upCategory = Category::findOrFail($catId)->update([
            'category_name' => $request->get('category_name')
        ]);

        if ($upCategory) {
            return to_route('admin.category.index')->with('success', 'Category Updated Successfully.');
        } else {
            return Redirect::back()->with('error', 'Something Wrong...');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        $dltCategory = Category::findOrfail($id)->delete();

        if ($dltCategory) {
            return to_route('admin.category.index')->with('success', 'Category Deleted Successfully.');
        } else {
            return Redirect::back()->with('error', 'Something Wrong...');
        }
    }
}
