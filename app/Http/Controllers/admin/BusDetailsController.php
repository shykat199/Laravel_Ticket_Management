<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BusRequest;
use App\Models\BusCompany;
use App\Models\BusDestination;
use App\Models\BusDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //$values=array();

        //return $values;

        //$allBusDetails=$allBusDetails->load('busCompany');
//        $allBusDetails = BusDetails::with('busCompany')
//            ->whereRaw('bus_companies.status = 1')
//            ->get();

        $allBusDetails = BusDetails::leftJoin('bus_companies','bus_details.company_id','=','bus_companies.id')
            ->selectRaw('bus_details.*,bus_companies.status,bus_companies.bus_company')
            ->whereRaw('bus_companies.status = 1')->get();
        //return $allBusDetails;

       // dd($allBusDetails);

        $busType = DB::select(DB::raw('SHOW COLUMNS FROM bus_details WHERE Field = "bus_type"'))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $busType, $matches);

        $values = array();

        foreach (explode(',', $matches[1]) as $value) {
            $values[] = trim($value, "'");
        }

        $allCompanies = BusCompany::where('status', 1)->get();

        return view('admin.interface.busDetails.index', compact('allBusDetails', 'allCompanies', 'values'));
    }

    public function store(BusRequest $request)
    {
        $storeBus = BusDetails::create([
            'bus_coach' => $request->get('bus_coach'),
            'company_id' => $request->get('company_id'),
            'bus_type' => $request->get('bus_type'),
            'bus_seat' => $request->get('bus_seat'),
        ]);

        if ($storeBus) {
            return to_route('admin.bus_details.index')->with('success', 'Bus Details Added.');
        } else {
            return \Redirect::back()->with('error', 'Something Error....');
        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\BusDetails $busDetails
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(string $id)
    {

       $bus=BusDetails::where('id',$id)->first();


        $allBusType = DB::select(DB::raw('SHOW COLUMNS FROM bus_details WHERE Field = "bus_type"'))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $allBusType, $matches);

        $values = array();

        foreach (explode(',', $matches[1]) as $value) {
            $values[] = trim($value, "'");
        }

        $allCompanies = BusCompany::where('status', 1)->get();

        return view('admin.interface.busDetails.edit', compact('bus', 'allCompanies', 'values'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BusDetails $busDetails
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, string $id): ?\Illuminate\Http\RedirectResponse
    {
        $upBus = BusDetails::where('id',$id)->update([
            'bus_coach' => $request->get('bus_coach'),
            'company_id' => $request->get('company_id'),
            'bus_type' => $request->get('bus_type'),
            'bus_seat' => $request->get('bus_seat'),
        ]);


        if ($upBus) {
            return to_route('admin.bus_details.index')->with('success', 'Bus Details Updated Successfully.');
        } else {
            return \Redirect::back()->with('error', 'Something Error....');
        }
    }


    public function updateStatus(Request $request)
    {
        //dd($request->all());
        if ($request->get('mode') === 'true') {
            $busStatus = DB::table('bus_details')
                ->where('id', '=', $request->get('bus_id'))
                ->update(array('status' => 1));
        } else {
            $busStatus = DB::table('bus_details')
                ->where('id', '=', $request->get('bus_id'))
                ->update(array('status' => 0));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\BusDetails $busDetails
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {

//        $busDestination=BusDestination::join('bus_destinations','bus_details.id','=','bus_destinations.bus_details_id')
//        ->
//        ;
        $busDestination = BusDetails::join('bus_destinations','bus_details.id','=','bus_destinations.bus_details_id')
            ->where('bus_destinations.id', '=', $id)->get();
        //dd($busDestination);
        if (count($busDestination)>0){
            return redirect()->back()->with('error','Bus Coach Can Not Be Deleted');
        }else{
            $bus = BusDetails::where('id', $id)->first();
            $dltBus = $bus->delete();
        }

        if ($dltBus) {
            return to_route('admin.bus_details.index')->with('success', 'Bus Deleted Successfully.');
        } else {
            return \Redirect::back()->with('error', 'Something Error....');
        }
    }
}
