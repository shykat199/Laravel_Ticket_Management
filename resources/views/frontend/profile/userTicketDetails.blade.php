@extends('admin.interface.layout.master_admin')
@section('admin.title')
    Your Reservation Details
@endsection
@section('admin.content')
    <!-- Start icContent-->
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="card">
                                @foreach($ticketDetails as $ticket)
                                    <div class="card-body">

                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop"
                                               data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="{{route('dlt.user.reservation',$ticket->id)}}" class="dropdown-item text-danger"><i
                                                        class="uil uil-trash me-1"></i> Remove</a>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center mb-3">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-sm">
                                                            <span
                                                                class="avatar-title bg-primary-lighten text-primary rounded">
                                                                <i class="mdi mdi-shopping-outline font-24"></i>
                                                            </span>
                                                </div>
                                            </div>

                                            <div class="flex-grow-1 ms-3">
                                                <a href="javascript:void(0);" class="font-16 fw-bold text-secondary">Your Bus Ticket<i
                                                        class="mdi mdi-checkbox-marked-circle-outline text-success"></i></a>
                                                <p class="text-muted mb-0">Wishing You Safe Journey</p>
                                            </div>
                                        </div>

                                        <span class="badge badge-lg bg-success text-white rounded-pill me-1">$ {{$ticket->total_seat_price}}</span>
                                        <span class="badge badge-lg bg-success text-white rounded-pill me-1">Paid</span> <i
                                            class="mdi mdi-checkbox-marked-circle-outline text-success"></i></a>
                                        &nbsp;&nbsp;&nbsp;<strong>Date Of Journey</strong>: <span class="font-12 fw-semibold text-muted"> <i class="mdi mdi-clock-time-four me-1"></i> </span> <strong class="badge badge-info-lighten"><h5>{{\Carbon\Carbon::parse($ticket->created_at)->format('d-m-Y')}}</h5></strong>
                                        &nbsp;&nbsp;&nbsp;<strong>Time</strong>: <span class="font-12 fw-semibold text-muted"> <i class="mdi mdi-clock-time-four me-1"></i> </span> <strong class="badge badge-info-lighten"><h5>{{date("g:i a", strtotime(\Carbon\Carbon::parse($ticket->created_at)->format('h:i')))}}</h5></strong>
                                        <div>

                                            <div>
                                                <strong>Bus Company</strong> : &nbsp;&nbsp;&nbsp;{{$ticket->destinations->busDetails->busCompany->bus_company}}
                                            </div>
                                            <div>
                                                <strong>Bus Coach</strong> :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$ticket->destinations->busDetails->bus_coach}}
                                            </div>
                                            <div>
                                                <strong>Bus Type</strong> :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$ticket->destinations->busDetails->bus_type}}
                                            </div>

                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-6">
                                                <p class="text-muted fw-semibold mb-1">Total Passenger:&nbsp; <strong>{{$ticket->total_passenger}}</strong></p>
                                            </div>
                                            @php
                                            $idx=1;
                                            @endphp
                                            @foreach($ticket->passengers as $pass)
                                                <div class="row border-top">
                                                    <div class="col-12 py-3 passenger-details">
                                                        <h6>Adult {{$idx++}}</h6>
                                                        <ul class="passenger-details-list">
                                                            <li class="pt-2">
                                                                <strong class="lavel">Name</strong>
                                                                <span
                                                                    class="text-muted">{{$pass->first_name}} {{$pass->last_name}}</span>
                                                            </li>
                                                            <li class="pt-2">
                                                                <strong class="lavel">Age</strong>
                                                                <span class="text-muted">{{$pass->age}}</span>
                                                            </li>
                                                            <li class="pt-2">
                                                                <strong class="lavel">Document</strong>
                                                                <span
                                                                    class="text-muted">{{$pass->document_type}} of {{$pass->citizenship}} {{$pass->document_number}}</span>
                                                            </li>
                                                            <li class="pt-2">
                                                                <strong class="lavel">Baggage</strong> {{$pass->additional_baggage}}
                                                            </li>
                                                            <li class="pt-2">
                                                                <strong class="lavel"></strong>
                                                                <span
                                                                    class="text-muted d-flex d-block justify-content-between">
                                                                       <strong>Equipment</strong> {{$pass->equipment}}
                                                                        <br>
                                                                        <strong>Animal</strong>  {{$pass->animal_type}}
                                                                        <br>
                                                                        <strong>User Mobility</strong>  {{$pass->user_mobility}}
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endforeach


                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div> <!-- end col -->

                    </div>
                </div>
            </div> <!-- End col -->

        </div> <!-- End row -->

    </div> <!-- container -->
@endsection
