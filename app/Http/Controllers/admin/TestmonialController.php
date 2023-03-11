<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialRequest;
use App\Models\Testmonial;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TestmonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function activeIndex()
    {
        $allTestimonialsUser = Testmonial::with('users')->where('status', 1)
            ->get();

//        $allTestimonialsAdmin = Testmonial::with('users')->where('status', 1)
//           ->get();

        return view('admin.interface.testimonial.index', compact('allTestimonialsUser'));
    }

    public function inActiveIndex()
    {
        $allTestimonialsUser = Testmonial::with('users')->where('status', 0)
            ->get();

        $allTestimonialsAdmin = Testmonial::with('users')->where('status', 0)
            ->get();

        //dd($allTestimonialsAdmin);

        return view('admin.interface.testimonial.inactiveindex', compact('allTestimonialsAdmin', 'allTestimonialsUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TestimonialRequest $request)
    {
        //dd($request->all());

        $name = null;
        if ($request->hasFile('image')) {
            // dd(1);
            // $image = $request->file('image');
            $name = Uuid::uuid() . '.' . $request->file('image')->getClientOriginalExtension();
            $image = Storage::put('/public/image/' . $name, file_get_contents($request->file('image')));
        }

        $storeTestimonial = Testmonial::create([
            'feedback_text' => $request->get('feedback_text'),
            'image' => $name,
            'user_id' => Auth::user()->id,
        ]);

        if ($storeTestimonial) {
            return to_route('admin.testimonial.inactive')->with('success', 'Feedback Added Successfully.');
        } else {
            return \Redirect::back()->with('error', 'Something Wrong.');
        }
    }

    public function inactiveToActive(Request $request)
    {

        $testimonial_id = $request->get('testimonial_id');
        //dd($testimonial_id);
        $testimonial = Testmonial::where('id', $testimonial_id)->first();

        //dd($testimonial);
        $testimonial = $testimonial->update([
            'status' => 1,
        ]);

        if ($testimonial) {
            return to_route('admin.testimonial.active')->with('success', 'Feedback Published Successfully.');
        } else {
            return \Redirect::back()->with('error', 'Something Wrong.');
        }

    }

    public function activeToInactive(Request $request)
    {

        $testimonial_id = $request->get('testimonial_id');
        //dd($testimonial_id);
        $testimonial = Testmonial::where('id', $testimonial_id)->first();

        //dd($testimonial);
        //dd($testimonial);
        $testimonial = $testimonial->update([
            'status' => 0,
        ]);

        if ($testimonial) {
            return to_route('admin.testimonial.inactive')->with('success', 'Feedback Unpublished Successfully.');
        } else {
            return \Redirect::back()->with('error', 'Something Wrong.');
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Testmonial $testmonial
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        $testimonial = Testmonial::find($id);

        if ($testimonial->status === 0) {
            $image = Storage::delete('/public/image/' . $testimonial->image);
            $testimonial = $testimonial->delete();
            if ($testimonial) {
                return to_route('admin.testimonial.inactive')->with('success', 'Feedback Deleted Successfully.');
            } else {
                return \Redirect::back()->with('error', 'Something Wrong.');
            }
        }
        elseif ($testimonial->status === 1) {
            $image = Storage::delete('/public/image/' . $testimonial->image);
            $testimonial = $testimonial->delete();
            if ($testimonial) {
                return to_route('admin.testimonial.active')->with('success', 'Feedback Deleted Successfully.');
            } else {
                return \Redirect::back()->with('error', 'Something Wrong.');
            }
        }
    }
}
