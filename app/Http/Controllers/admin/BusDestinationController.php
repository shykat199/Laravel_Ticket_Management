<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BusDestinationStoreRequest;
use App\Models\BusCompany;
use App\Models\BusDestination;
use App\Models\BusDetails;
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
        //$allBusDestination = BusDestination::with(['busDetails.busCompany'])->latest()->get();
        $allBusDestination = BusDestination::with(['busDetails.busCompany'])->latest()->get();
       // dd($allBusDestination);
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
        $allBusCompany = BusCompany::where('status',1)->get();

        return view('admin.interface.busDestination.create', compact('allBusCompany'));
    }

    public function getBusCoach(Request $request)
    {
        $busCoach = \DB::table('bus_details')
            ->where('company_id', $request->get('company_id'))
            ->where('status',1)
            ->get();

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
       // dd($request->all());

        $departure_time = Carbon::parse($request->get('departure_time'))->format('H:i:s');
        //dd($departure_time);
        // $arrival_time = Carbon::parse($request->get('arrival_time'))->format('g:i A');
        //dd($departure_time, $arrival_time);

        $storeBusDestination = BusDestination::create([
            'bus_details_id' => $request->get('bus_details_id'),
            'starting_point' => $request->get('starting_point'),
            'arrival_point' => $request->get('arrival_point'),
            'ticket_price' => $request->get('ticket_price'),
            'departure_time' => $departure_time,
            'arrival_time' =>$request->get('arrival_time'),
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(string $id)
    {
        $allBusCompany = BusCompany::all();
        $busDetails = BusDetails::all();
        //dd($busDetails);
        $busDestination = BusDestination::where('id', $id)
            ->with(['busDetails.busCompany'])
            ->first();
        //dd($busDestination);
        // return $busDestination;
        return view('admin.interface.busDestination.edit', compact('busDestination', 'allBusCompany', 'busDetails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BusDestination $busDestination
     * @return \Illuminate\Http\Response
     */
    public function update(string $id, Request $request)
    {
        //dd($request->all());
        $departure_time = Carbon::parse($request->get('departure_time'))->format('g:i A');
        //$arrival_time = Carbon::parse($request->get('arrival_time'))->format('g:i A');
        //dd($departure_time, $arrival_time);
        $storeBusDestination = BusDestination::where('id', $id)->update([
            'bus_details_id' => $request->get('bus_details_id'),
            'starting_point' => $request->get('starting_point'),
            'arrival_point' => $request->get('arrival_point'),
            'ticket_price' => $request->get('ticket_price'),
            'departure_time' => $departure_time,
            'arrival_time' => $request->get('arrival_time'),
        ]);


        if ($storeBusDestination) {
            return to_route('admin.bus_destination.index')->with('success', 'Destination Added Successfully');
        } else {
            return \Redirect::back()->with('error', 'Something Wrong....');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\BusDestination $busDestination
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        $dltBusTestination = BusDestination::find($id)->delete();
        if ($dltBusTestination) {
            return to_route('admin.bus_destination.index')->with('success', 'Destination Deleted Successfully');
        } else {
            return \Redirect::back()->with('error', 'Something Wrong....');
        }
    }
}
