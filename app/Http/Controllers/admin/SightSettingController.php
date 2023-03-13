<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SightSettingRequest;
use App\Models\SightSetting;
use Illuminate\Http\Request;

class SightSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $allSettings = SightSetting::all();
        return view('admin.interface.setting.index', compact('allSettings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.interface.setting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SightSettingRequest $request)
    {
        $createSetting = SightSetting::create([
            'key' => $request->get('key'),
            'value' => $request->get('value'),
        ]);

        if ($createSetting) {
            return to_route('admin.setting.index')->with('success', 'New Setting Added.');
        } else {
            return \Redirect::back()->with('error', 'Something Wrong....');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\SightSetting $sightSetting
     * @return \Illuminate\Http\Response
     */
    public function show(SightSetting $sightSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\SightSetting $sightSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(SightSetting $sightSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SightSetting $sightSetting
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $settingId=$request->get('setting_id');
        //dd($settingId);
        $setting=SightSetting::findOrFail($settingId)->first();

        $upSetting=$setting->update([
            'key' => $request->get('key'),
            'value' => $request->get('value'),
        ]);

        if ($upSetting) {
            return to_route('admin.setting.index')->with('success', 'Setting Updated Successfully.');
        } else {
            return \Redirect::back()->with('error', 'Something Wrong....');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\SightSetting $sightSetting
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        $setting_id=SightSetting::where('id',$id)->first();
        //dd($setting_id);
        $settingDlt=$setting_id->delete();

        if ($settingDlt) {
            return to_route('admin.setting.index')->with('success', 'Setting Deleted Successfully.');
        } else {
            return \Redirect::back()->with('error', 'Something Wrong....');
        }
    }
}
