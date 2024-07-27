<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Advantage;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Psy\Util\Str;

class AdvantageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $allAdvantages = Advantage::all();
        return view('admin.interface.advantage.index', compact('allAdvantages'));
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
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validate = $request->validate([
            'advantage_text' => ['required'],
            'advantage_logo' => ['required', 'mimes:jpeg,png,jpg,gif,svg', 'max:3024'],
        ], [
            'advantage_text.required' => 'Sight Advantage Is Required.',
            'advantage_logo.required' => 'Sight Advantage Logo Is Required.',
            'advantage_logo.mimes' => 'Logo Format Should Be jpeg,png,jpg,gif or svg',
            'advantage_logo.max' => 'Logo Size Should Not Be More Then 2MB',
        ]);

        $image = null;

        if ($request->hasFile('advantage_logo')) {
            $image = Uuid::uuid() . '.' . $request->file('advantage_logo')->getClientOriginalExtension();
            $name = Storage::put('public/advantage/' . $image, file_get_contents($request->file('advantage_logo')));
        }

        $storeAdvantage = Advantage::create([
            'advantage_text' => $request->get('advantage_text'),
            'advantage_logo' => $image,
        ]);

        if ($storeAdvantage) {
            return to_route('admin.advantage.index')->with('success', 'Advantage Added Successfully');
        } else {
            return redirect()->back()->with('error', 'Something Wrong...');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Advantage $advantage
     * @return \Illuminate\Http\Response
     */
    public function show(Advantage $advantage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Advantage $advantage
     * @return \Illuminate\Http\Response
     */
    public function edit(Advantage $advantage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Advantage $advantage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $id = $request->get('advantage_id');
        $advantage = Advantage::findOrFail($id)->first();
        $logo = $advantage->advantage_logo;

        $image = null;
        if ($request->file('advantage_logo')) {
            Storage::delete('/public/advantage/' . $logo);
            $image = Uuid::uuid() . '.' . $request->file('advantage_logo')->getClientOriginalExtension();
            $name = Storage::put('public/advantage/' . $image, file_get_contents($request->file('advantage_logo')));
        }
        $advantage = $advantage->update([
            'advantage_text' => $request->get('advantage_text'),
            'advantage_logo' => $image,
        ]);

        if ($advantage){
            return to_route('admin.advantage.index')->with('success','Sight Advantage Updated Successfully');
        }else{
            return Redirect::back()->with('error','Something Wrong...');
        }

    }

    public function updateStatus(Request $request): void
    {
        //dd($request->all());
        //$advantage=Advantage::findOrFail($request->get('id'))->first();
        if ($request->get('mode') === "true") {
            $advantageStatus = DB::table('advantages')
                ->where('id', '=', $request->get('advantage_id'))
                ->update(array('status' => 1));
        } else {
            $advantageStatus = DB::table('advantages')
                ->where('id', '=', $request->get('advantage_id'))
                ->update(array('status' => 0));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Advantage $advantage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        $dltAdvantage = Advantage::findOrFail($id)->first();
        $logo = $dltAdvantage->advantage_logo;
        Storage::delete('/public/advantage/'.$logo);
        $dltAdvantage=$dltAdvantage->delete();

        if ($dltAdvantage){
            return to_route('admin.advantage.index')->with('success','Sight Advantage Deleted Successfully');
        }else{
            return Redirect::back()->with('error','Something Wrong...');
        }
    }
}
