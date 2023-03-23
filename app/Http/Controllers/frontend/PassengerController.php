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
        $destinationId = ($request->get('bus_id'));
        //dd($destinationId);
        $busDestinationDetails = BusDestination::where('id', $destinationId)->first();
        // dd($busDestinationDetails);
//        if (empty($destinationId)) {
//            return redirect()->back();
//        }

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
        //dd($request->all());
        $validation = Validator::make($request->all(), [
//            "users" => ['required', "array:'first_name','last_name'"],
            "users.*" => 'array',
            "users.*.'last_name'" => 'required',
            "users.*.'first_name'" => 'required',

        ], [
            "users.*.'first_name'.required" => 'First Name Is Required',
            "users.*.'last_name'.required" => 'First Name Is Required',
//            'users.*.last_name.required' => 'Last Name Is Required',
        ]);

        //dd($validation, $validation->fails());

        if ($validation->fails()) {
            return redirect()->back()
                ->withErrors($validation)
                ->withInput();
        }

//        if ($validation->passes()) {

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
    //}


}
