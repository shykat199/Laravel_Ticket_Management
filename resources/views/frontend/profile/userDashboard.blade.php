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
                    <div class="row m-2">
                        <div class="col-sm-6 col-xl-3 mb-3">
                            <div class="card mb-0 h-100">
                                <div class="card-body">

                                    <h4 class="header-title">Total Occupied Ticket</h4>
                                    <h4 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">{{$allBuyTicket}}</h4>

                                    <div class="d-flex align-items-center mt-4">
                                        <div class="flex-shrink-0">
                                            <h5 class="font-13 text-muted my-0"><i class="mdi mdi-clock-outline"></i>{{\Carbon\Carbon::now()->format('d-m-Y')}}</h5>
                                        </div>
                                        <div class="flex-grow-1 ms-2"></div>
                                        <div class="text-end multi-user">
                                            <a href="javascript:void(0);" class="d-inline-block">
                                                <img src="{{asset("admin/assets/images/users/avatar-1.jpg")}}" class="rounded-circle avatar-xs" alt="friend">
                                            </a>
                                        </div>
                                    </div>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->

                        <div class="col-sm-12 col-xl-8 mb-3">
                            <div class="card mb-0 h-100">
                                <div class="card-body">
                                    <h4 class="header-title">Your Latest Ticket</h4>
                                    <h5 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">Have A Safe Journey</h5>
{{--                                    {{dd($ticketDetails)}}--}}
                                    <div class="d-flex align-items-center mt-4">
                                        @foreach($ticketDetails as $ticket)
                                            <div class="flex-shrink-0">
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
                                            </div>
                                        @endforeach
                                        <div class="flex-grow-1 ms-2"></div>
                                        <div class="text-end multi-user">
                                            <a href="javascript:void(0);" class="d-inline-block">
                                                <img src="{{asset("admin/assets/images/users/avatar-1.jpg")}}" class="rounded-circle avatar-xs" alt="friend">
                                            </a>

                                        </div>
                                    </div>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->

                    </div> <!-- end row -->
                </div>
            </div> <!-- End col -->

        </div> <!-- End row -->

    </div> <!-- container -->
@endsection
