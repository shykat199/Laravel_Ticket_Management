<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\BusDestination;
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
//        $request->validate([
//            'f_name' => ['required'],
//            'l_name' => ['required'],
//            'dob' => ['required'],
//            'email' => ['required'],
//            'gander' => ['required'],
//            'c_number' => ['required'],
//            'c_name' => ['required'],
//            'ex_month' => ['required'],
//            'ex_year' => ['required'],
//            'c_vvv' => ['required'],
//        ], [
//            'f_name.required' => "Please Fill This Field.",
//            'l_name.required' => "Please Fill This Field.",
//            'dob.required' => "Please Fill This Field.",
//            'email.required' => "Please Fill This Field.",
//            'gander.required' => "Please Fill This Field.",
//            'c_number.required' => "Please Fill This Field.",
//            'ex_month.required' => "Please Fill This Field.",
//            'c_name.required' => "Please Fill This Field.",
//            'ex_year.required' => "Please Fill This Field.",
//            'c_vvv.required' => "Please Fill This Field.",
//        ]);

        //return $request->all();
        $request->session()->put('paymentDetails', $request->all());

        $paymentDetails = $request->session()->get('paymentDetails');
        $sessionData = $request->session()->get('searchedResults');
        $sessionPassengerData = $request->session()->get('sessionPassengerData');
        $busDetails = $request->session()->get('sessionTicketPrice');
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeek();
        $froms = BusDestination::select('starting_point')->groupby('starting_point')->get();
        $tos = BusDestination::select('arrival_point')->groupby('arrival_point')->get();
        //dd($paymentDetails);

        return view('frontend.validation', compact('paymentDetails', 'sessionPassengerData', 'busDetails', 'sessionData', 'min_date', 'max_date', 'froms', 'tos'));
    }
}
