<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\sessionStoreRequest;
use App\Models\BusDestination;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use JetBrains\PhpStorm\NoReturn;

class PassengerController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        //dd($request->get('bus_id'));
        $destinationId = \Illuminate\Support\Facades\Crypt::decrypt($request->get('bus_id'));
        //dd($destinationId);
        $busDestinationDetails = BusDestination::where('id', $destinationId)
            ->first();
        //dd()
        if (empty($destinationId)) {
            return redirect()->back();
        }

        $request->session()->put('sessionTicketPrice', $busDestinationDetails);
        //dd($busDetails);
        $sessionData = $request->session()->get('searchedResults');
        //$busDetails=BusDestination::where('id',)
        $busDetails = $request->session()->get('sessionTicketPrice');
        //dd($busDetails);
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeek();
        $froms = BusDestination::select('starting_point')->groupby('starting_point')->get();
        $tos = BusDestination::select('arrival_point')->groupby('arrival_point')->get();
        return view('frontend.addPassenger', compact('sessionData', 'busDetails', 'min_date', 'max_date', 'froms', 'tos'));
    }

    public function sessionStorePassenger(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'first_name' => ['required'],
            'last_name' => ['required'],
        ], [
            'first_name.required' => "First Name Is Required",
            'last_name.required' => "Last Name Is Required",
        ]);

        //dd($validation->fails());

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput($request->all());
        }

        $request->session()->put('sessionPassengerData', $request->all());
        $sessionData = $request->session()->get('searchedResults');
        $sessionPassengerData = $request->session()->get('sessionPassengerData');
        $busDetails = $request->session()->get('sessionTicketPrice');
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeek();
        $froms = BusDestination::select('starting_point')->groupby('starting_point')->get();
        $tos = BusDestination::select('arrival_point')->groupby('arrival_point')->get();
        //dd($busDetails);
        return view('frontend.payment', compact('sessionPassengerData', 'busDetails', 'sessionData', 'min_date', 'max_date', 'froms', 'tos'));

    }


}
