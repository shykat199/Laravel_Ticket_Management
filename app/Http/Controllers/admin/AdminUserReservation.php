<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Support\Facades\Redirect;

class AdminUserReservation extends Controller
{
    public function index()
    {
        $allReservations = Reservation::with(['destinations.busDetails.busCompany', 'users', 'passengers'])
            ->get();
        //dd($allReservations);
        return view('admin.interface.userReservation.index', compact('allReservations'));
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $dltReservation = Reservation::find($id)->delete();
        return Redirect::back()->with('success', 'Reservation Deleted Successfully');

    }
}
