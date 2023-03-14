<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamRequest;
use App\Models\Team;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $allTeams = Team::all();
        return view('admin.interface.team.index', compact('allTeams'));
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
    public function store(TeamRequest $request)
    {
        //dd($request->all());
        $name = null;
        if ($request->hasFile('member_image')) {
            $name = Uuid::uuid() . '.' . $request->file('member_image')->getClientOriginalExtension();
            $image = Storage::put('/public/image/' . $name, file_get_contents($request->file('member_image')));
        }

        $team = Team::create([
            'member_name' => $request->get('member_name'),
            'member_role' => $request->get('member_role'),
            'member_image' => $name,
        ]);

        if ($team) {
            return to_route('admin.team.index')->with('success', 'Team Member Added Successfully.');
        } else {
            return \Redirect::back()->with('error', 'Something Wrong.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Team $team
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $id = $request->get('team_id');
        $team = Team::find($id)->first();
        //dd($team);
        $iamge = $team->member_image;
        $name = null;
        if ($request->hasFile('member_image')) {
            $name = Uuid::uuid() . '.' . $request->file('member_image')->getClientOriginalExtension();
            Storage::delete('/public/image/' . $iamge);
            $image = Storage::put('/public/image/' . $name, file_get_contents($request->file('member_image')));

            $team = $team->update([
                'member_name' => $request->get('member_name'),
                'member_role' => $request->get('member_role'),
                'member_image' => $name,
            ]);
        } else {
            $team = $team->update([
                'member_name' => $request->get('member_name'),
                'member_role' => $request->get('member_role'),
            ]);
        }

        if ($team) {
            return to_route('admin.team.index')->with('success', 'Team Member Updated Successfully.');
        } else {
            return \Redirect::back()->with('error', 'Something Wrong.');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Team $team
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        $team = Team::findOrFail($id)->first();
        $image = $team->team_image;
        Storage::delete('/public/image/' . $image);

        $team = $team->delete();

        if ($team) {
            return to_route('admin.team.index')->with('success', 'Team Member Deleted Successfully.');
        } else {
            return \Redirect::back()->with('error', 'Something Wrong.');
        }
    }
}
