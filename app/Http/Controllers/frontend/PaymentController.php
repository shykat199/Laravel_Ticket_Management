<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
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
        //dd($paymentDetails);

        return view('frontend.validation', compact('paymentDetails', 'sessionPassengerData', 'busDetails', 'sessionData'));
    }
}
