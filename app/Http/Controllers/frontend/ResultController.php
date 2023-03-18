<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowResultRequest;
use App\Models\BusDestination;
use App\Models\BusDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class ResultController extends Controller
{
    public function index(Request $request)
    {
        $sessionData=$request->session()->get('searchedResults');
        //dd($sessionData);
        return view('frontend.showResult',compact('sessionData'));
    }


    public function deleteSession(Request $request): void
    {

    }
    public function deleteSessionBusTicket(Request $request): void
    {
        $request->session()->forget('searchedResults');
        $request->session()->forget('sessionTicketPrice');
        $request->session()->forget('sessionPassengerData');
        $request->session()->forget('paymentDetails');
    }
}
