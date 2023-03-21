<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\BusDestination;
use Carbon\Carbon;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class PassengerController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        $destinationId = $request->get('bus_id');
        $busDestinationDetails = BusDestination::where('id', $destinationId)->first();
        //dd($busTicketPrice);
        //session Ticket Price
        $request->session()->put('sessionTicketPrice', $busDestinationDetails);
        //dd($busDetails);
        $sessionData = $request->session()->get('searchedResults');
        //$busDetails=BusDestination::where('id',)
        $busDetails=$request->session()->get('sessionTicketPrice');
        //dd($busDetails);
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeek();
        return view('frontend.addPassenger', compact('sessionData','busDetails','min_date','max_date'));
    }

    public function sessionStorePassenger(Request $request){

        //dd($request->all());

        $request->session()->put('sessionPassengerData',$request->all());
        $sessionData = $request->session()->get('searchedResults');
        $sessionPassengerData=$request->session()->get('sessionPassengerData');
        $busDetails=$request->session()->get('sessionTicketPrice');
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeek();
        //dd($busDetails);
        return view('frontend.payment',compact('sessionPassengerData','busDetails','sessionData','min_date','max_date'));

    }


}
