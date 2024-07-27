<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogPostRequest;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.interface.service.index', compact('services'));
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
    public function store(ServiceRequest $request)
    {
        //dd($request->all());
        $image = null;

        if ($request->hasFile('service_logo')) {
            $image = Uuid::uuid() . '.' . $request->file('service_logo')->getClientOriginalExtension();
            $name = Storage::put('public/service/' . $image, file_get_contents($request->file('service_logo')));
        }

        $storeServices = Service::create([
            'service_title' => $request->get('service_title'),
            'service_text' => $request->get('service_text'),
            'service_logo' => $image,
        ]);

        if ($storeServices) {
            return to_route('admin.service.index')->with('success', 'Services Added Successfully');
        } else {
            return \Redirect::back()->with('error', 'Something Wrong..');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request): ?\Illuminate\Http\RedirectResponse
    {
        $sId = $request->get('s_id');
        $service = Service::findOrFail($sId);
        $service_image = $service->service_logo;
        $image = null;

        if ($request->hasFile('service_logo')) {

            $image = Uuid::uuid() . '.' . $request->file('service_logo')->getClientOriginalExtension();
            Storage::delete('public/service/' . $service_image);
            $name = Storage::put('public/service/' . $image, file_get_contents($request->file('service_logo')));
        }

        $service = $service->update([
            'service_title' => $request->get('service_title'),
            'service_text' => $request->get('service_text'),
            'service_logo' => $image,
        ]);

        if ($service) {
            return to_route('admin.service.index')->with('success', 'Services Updated Successfully');
        } else {
            return \Redirect::back()->with('error', 'Something Wrong..');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        $img = $service->service_logo;
        Storage::delete('public/service/' . $img);
        $dltService = $service->delete();

        if ($dltService) {
            return to_route('admin.service.index')->with('success', 'Services Deleted Successfully');
        } else {
            return \Redirect::back()->with('error', 'Something Wrong..');
        }
    }
}
