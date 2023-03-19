<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BusCompany;
use App\Models\BusDestination;
use App\Models\Reservation;
use Illuminate\Http\Request;

class TicketReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $allReservation=Reservation::latest()->get();
        return view('admin.interface.tickerReservation.index',compact('allReservation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $allBusCompany=BusCompany::all();
        $allbus=BusDestination::all();
        $allbusStartingPoint=BusDestination::select('starting_point')->get();
        $allbusArrivalPoint=BusDestination::select('arrival_point')->get();
        //dd($allbusStartingPoint);

        return view('admin.interface.tickerReservation.create',compact('allBusCompany','allbusStartingPoint','allbusArrivalPoint'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $reservation=Reservation::find($id);
        return view('admin.interface.tickerReservation.view',compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $ticketReservation=Reservation::find($id);
        return view('admin.interface.tickerReservation.edit',compact('ticketReservation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dltReservatlion=Reservation::find($id)->delete();
    }


    public function reservationStepOne(Request $request){

        dd($request->all());
    }
}
