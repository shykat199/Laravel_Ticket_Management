<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\BusDetails;
use App\Models\Card;
use App\Models\Passenger;
use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
//            $previousUrl = url()->previous();
//            dd($previousUrl);

        if (Auth::guest()) {

            return to_route('user.loginPage');

        } elseif (Auth::user()->user_role === "admin") {

            return to_route('user.loginPage');
        }
        else {

            $paymentDetails = $request->session()->get('paymentDetails');
            $sessionData = $request->session()->get('searchedResults');
            $sessionPassengerData = $request->session()->get('sessionPassengerData');
            $busDetails = $request->session()->get('sessionTicketPrice');
            //dd($sessionData['$busDetails']);

            // For Reservation Session Data Store in Reservation Model
            $busDestinationId = $busDetails->id;
            $userId = \Auth::id();
            $departure_date = $sessionData['dateOfJourney'];
            $total_passenger = isset($sessionData['totalPerson']) && isset($sessionData['totalKids']) ?
                ($sessionData['totalPerson']) + ($sessionData['totalKids']) : ($sessionData['totalPerson']);
            $per_seat_price = $busDetails->ticket_price;
            $total_seat_price = $per_seat_price * $total_passenger;


            //For Passenger Session Data Store in Passenger Model


            // For User Payment Session Data Store In Payment Model
            //$user_id =Auth::user()->id();
            $user_email = $paymentDetails['email'];
            $f_Name = $paymentDetails['f_name'];
            $l_Name = $paymentDetails['l_name'];
            $user_email = $paymentDetails['f_name'];
            $dob = $paymentDetails['dob'];
            $gander = $paymentDetails['gander'];


            //For Card Details Session Data Store In Card Model
            //$user_idd =Auth::user()->id();
            $cardNumber = $paymentDetails['c_number'];
            $cardHolderName = $paymentDetails['c_name'];
            $cardExpiryYear = $paymentDetails['ex_year'];
            $cvv = $paymentDetails['c_vvv'];
            $cardExpiryMonth = $paymentDetails['ex_month'];


            $storeReservation = Reservation::create([
                'bus_destination_id' => $busDestinationId,
                'user_id' => $userId,
                'departure_date' => $departure_date,
                'total_passenger' => $total_passenger,
                'per_seat_price' => $per_seat_price,
                'total_seat_price' => $total_seat_price,
            ]);

            foreach ($sessionPassengerData['users'] as $key => $data) {

                $first_name = $data["'first_name'"];
                $age = $data["'age'"];
                $last_name = $data["'last_name'"];
                $document_type = $data["'document_type'"];
                $document_number = $data["'document_number'"];
                $citizenship = $data["'citizenship'"];
                $booking_id = $storeReservation->id;
                $animal_type = $data["'animal_type'"];
                $additional_baggage = $data["'additional_baggage'"];
                $equipment = $data["'equipment'"];

                Passenger::create([
                    'booking_id' => $booking_id,
                    'first_name' => $first_name,
                    'last_name' => $first_name,
                    'age' => $age,
                    'document_type' => $document_type,
                    'citizenship' => $citizenship,
                    'additional_baggage' => $additional_baggage,
                    'animal_type' => $animal_type,
                    'equipment' => $equipment,
                ]);

            }


            $userPayment = Payment::create([
                'user_id' => $userId,
                'user_email' => $user_email,
                'user_gender' => $gander,
                'f_name' => $f_Name,
                'l_name' => $l_Name,
                'dob' => $dob,
            ]);

            $userCard = Card::create([
                'user_id' => $userId,
                'card_number' => $cardNumber,
                'card_holder_name' => $cardHolderName,
                'card_holder_year' => $cardExpiryYear,
                'card_holder_month' => $cardExpiryMonth,
                'cvv' => $cvv
            ]);


            //dd($storeReservation);
            //seat in bus
            $storeReservation = $storeReservation->load('destinations');
            // Seat number of that coach
            $busSeat = BusDetails::select('bus_seat', 'id')
                ->where('id', $storeReservation->destinations->bus_details_id)
                ->first();

            //dd($busSeat);


            $totalSeatOccupy = $storeReservation->total_passenger;
            // dd($totalSeatOccupy);

            $ticketLeft = $busSeat->bus_seat - $totalSeatOccupy;

            $updateBusSeat = BusDetails::where('id', $busSeat->id)->update([
                'bus_seat' => $ticketLeft
            ]);

            $request->session()->forget('searchedResults');
            $request->session()->forget('sessionTicketPrice');
            $request->session()->forget('sessionPassengerData');
            $request->session()->forget('paymentDetails');

            return to_route('user.auth.dashboard')->with('success', 'Successfully Reservation Placed');


        }
    }

    public function UserDashboard()
    {
        $ticketDetails = Reservation::with('passengers', 'destinations.busDetails.busCompany')->select('reservations.*')
            ->where('reservations.user_id', Auth::id())
            ->latest()->limit(1)->get();

        $allBuyTicket = Reservation::select('reservations.*')
            ->where('reservations.user_id', Auth::id())->count();
        //dd($allBuyTicket);

        return view('frontend.profile.userDashboard', compact('allBuyTicket', 'ticketDetails'));
    }

    public function UserProfile()
    {
        $ticketDetails = Reservation::with('passengers', 'destinations.busDetails.busCompany')->select('reservations.*')
            ->where('reservations.user_id', Auth::id())
            ->get();

        //dd($ticketDetails);
        return view('frontend.profile.userProfile', compact('ticketDetails'));
    }

    public function UserTicket()
    {

        $ticketDetails = Reservation::with('passengers', 'destinations.busDetails.busCompany')->select('reservations.*')
            ->where('reservations.user_id', Auth::id())
            ->get();

        // dd($ticketDetails);

        return view('frontend.profile.userTicketDetails', compact('ticketDetails'));
    }

    public function dltReservation($id)
    {

        $dltReservation = Reservation::find($id)->delete();

        if ($dltReservation) {
            return to_route('auth.user.dashboard.ticket')->with('success', 'Your Ticket Has Deleted Successfully');
        }

    }


}
