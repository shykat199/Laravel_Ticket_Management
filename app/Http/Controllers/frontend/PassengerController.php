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
        $destinationReturnId = ($request->get('busReturnId'));
        //dd($destinationReturnId);
        //dd($destinationId);
        $busDestinationDetails = BusDestination::with('busDetails.busCompany')->where('id', $destinationId)->get();
        $busReturnDetails=BusDestination::with('busDetails.busCompany')->where('id', $destinationReturnId)->get();
          //dd($busReturnDetails);

        if ($busReturnDetails){
//            dd(1);
            $request->session()->put('sessionTicketPrice', [$busReturnDetails,$busDestinationDetails]);
        }
        else{
            $request->session()->put('sessionTicketPrice', $busDestinationDetails);
        }


        //dd($busDetails);
        $sessionData = $request->session()->get('searchedResults');
//        dd($sessionData);
        //$busDetails=BusDestination::where('id',)
        $busDetails = $request->session()->get('sessionTicketPrice');
//        dd($busDetails);
//        foreach ($busDetails as $bus){
//            dd($busDetails[0]->load('busDetails.busCompany'));
//        }

//        dd($busReturnDetails->load('busDetails.busCompany'));

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
        $request->session()->put('sessionPassengerData', $request->all());
//        if ($validation->passes()) {
        $sessionPassengerData = $request->session()->get('sessionPassengerData');
        //dd($sessionPassengerData);
        if (isset($sessionPassengerData) && !empty($sessionPassengerData)) {


            $sessionData = $request->session()->get('searchedResults');
            $sessionPassengerData = $request->session()->get('sessionPassengerData');
            $busDetails = $request->session()->get('sessionTicketPrice');
            //dd($busDetails);
            $min_date = Carbon::today();
            $max_date = Carbon::now()->addWeek();
            $froms = BusDestination::select('starting_point')->groupby('starting_point')->get();
            $tos = BusDestination::select('arrival_point')->groupby('arrival_point')->get();
            //dd($busDetails);
            $min_date = Carbon::today();
            $max_date = Carbon::now()->addWeek();
            return view('frontend.payment', compact('sessionPassengerData', 'busDetails', 'sessionData', 'min_date', 'max_date', 'froms', 'tos'));
        }
        else {
            return redirect()->back()->with('error', 'Atleast One Passenger Should Be Selected');

        }


    }
    //}


}
