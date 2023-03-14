<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BusDestinationStoreRequest;
use App\Models\BusCompany;
use App\Models\BusDestination;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BusDestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $allBusDestination = BusDestination::with(['busDetails.busCompany'])->latest()->get();
        return view('admin.interface.busDestination.index', compact('allBusDestination'));
    }

    /**ce
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        // return BusDestination::with('busCompany')->get();
        $allBusCompany = BusCompany::all();

        return view('admin.interface.busDestination.create', compact('allBusCompany'));
    }

    public function getBusCoach(Request $request)
    {

        $busCoach = \DB::table('bus_details')
            ->where('company_id', $request->get('company_id'))->get();

        if (count($busCoach) > 0) {
            return response()->json($busCoach);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BusDestinationStoreRequest $request)
    {
        $departure_time = Carbon::parse($request->get('departure_time'))->format('g:i A');
        $arrival_time = Carbon::parse($request->get('arrival_time'))->format('g:i A');
        //dd($departure_time, $arrival_time);

        $storeBusDestination = BusDestination::create([
            'bus_details_id' => $request->get('bus_details_id'),
            'starting_point' => $request->get('starting_point'),
            'arrival_point' => $request->get('arrival_point'),
            'ticket_price' => $request->get('ticket_price'),
            'departure_time' => $departure_time,
            'arrival_time' => $arrival_time,
        ]);

        if ($storeBusDestination) {
            return to_route('admin.bus_destination.index')->with('success', 'Destination Added Successfully');
        } else {
            return \Redirect::back()->with('error', 'Something Wrong....');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\BusDestination $busDestination
     * @return \Illuminate\Http\Response
     */
    public function show(BusDestination $busDestination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\BusDestination $busDestination
     * @return \Illuminate\Http\Response
     */
    public function edit(BusDestination $busDestination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BusDestination $busDestination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusDestination $busDestination)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\BusDestination $busDestination
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusDestination $busDestination)
    {
        //
    }
}
