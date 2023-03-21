<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('frontend.payment');
    }

    public function storePaymentDetails(Request $request)
    {

        //return $request->all();
        $request->session()->put('paymentDetails', $request->all());

        $paymentDetails = $request->session()->get('paymentDetails');
        $sessionData = $request->session()->get('searchedResults');
        $sessionPassengerData = $request->session()->get('sessionPassengerData');
        $busDetails = $request->session()->get('sessionTicketPrice');
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeek();
        //dd($paymentDetails);

        return view('frontend.validation', compact('paymentDetails', 'sessionPassengerData', 'busDetails', 'sessionData','min_date','max_date'));
    }
}
