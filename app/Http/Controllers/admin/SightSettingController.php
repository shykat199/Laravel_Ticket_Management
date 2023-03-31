<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SightSettingRequest;
use App\Models\SightSetting;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $data['settings'] = SightSetting::pluck('value', 'key')->toArray();
//        dd($data);
        return view('admin.interface.setting.create',$data);
    }


    public function settingsView()
    {
        $data['settings'] = SightSetting::pluck('key', 'value')->toArray();

        return view('admin.interface.setting.create', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $data = $request->except(['_method', '_token']);
//        dd($data);
            foreach ($data as $key => $value) {

                if ($key === 'logo') {

                    if ($request->hasFile('logo')) {
                        $logo= SightSetting::where('key','=','logo')->pluck('value');
                        //dd($logo);
                        Storage::delete('/public/logo/' . $logo[0]);
                        $name = Uuid::uuid() . '.' . $request->file('logo')->getClientOriginalExtension();
                        $image = Storage::put('/public/logo/' . $name, file_get_contents($request->file('logo')));
                        $createSetting = SightSetting::updateOrCreate([
                            'key' => $key,
                        ], [
                            'value' => $name,
                        ]);
                    }
                } else {
                    $createSetting = SightSetting::updateOrCreate([
                        'key' => $key,
                    ], [
                        'value' => $value,
                    ]);
                }

            }
//        }

            return to_route('admin.setting.create')->with('success', 'New Setting Added.');

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
        $settingId = $request->get('setting_id');
        //dd($settingId);
        $setting = SightSetting::findOrFail($settingId)->first();

        $upSetting = $setting->update([
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
        $setting_id = SightSetting::where('id', $id)->first();
        //dd($setting_id);
        $settingDlt = $setting_id->delete();

        if ($settingDlt) {
            return to_route('admin.setting.index')->with('success', 'Setting Deleted Successfully.');
        } else {
            return \Redirect::back()->with('error', 'Something Wrong....');
        }
    }
}
