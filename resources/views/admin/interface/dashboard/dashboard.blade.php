@extends('admin.interface.layout.master_admin')

@section('admin.title')
    Admin Dashboard
@endsection
@section('admin.content')
    <!-- Start icContent-->
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="row m-2">
                        <div class="col mb-3">
                            <div class="card mb-0 h-100">
                                <div class="card-body">

                                    <h4 class="header-title">Total Bus Company</h4>
                                    <h4 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">{{$busCompanies}}</h4>

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
                        <div class="col mb-3">
                            <div class="card mb-0 h-100">
                                <div class="card-body">

                                    <h4 class="header-title">Total Bus Routes</h4>
                                    <h4 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">{{$busRoutes}}</h4>

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
                        </div>
                        <div class="col mb-3">
                            <div class="card mb-0 h-100">
                                <div class="card-body">

                                    <h4 class="header-title">Total Teams Members</h4>
                                    <h4 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">{{$teams}}</h4>

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
                        </div>

                    </div> <!-- end row -->
                    <div class="row m-2">
                        <div class="col mb-3">
                            <div class="card mb-0 h-100">
                                <div class="card-body">

                                    <h4 class="header-title">Total Blog Category</h4>
                                    <h4 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">{{$categories}}</h4>

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
                        <div class="col mb-3">
                            <div class="card mb-0 h-100">
                                <div class="card-body">

                                    <h4 class="header-title">Total Posts</h4>
                                    <h4 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">{{$posts}}</h4>

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
                        </div>
                        <div class="col mb-3">
                            <div class="card mb-0 h-100">
                                <div class="card-body">

                                    <h4 class="header-title">Total Testimonials</h4>
                                    <h4 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">{{$testimonials}}</h4>

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
                        </div>

                    </div>

                    <div class="row m-2">
                        <div class="col mb-3">
                            <div class="card mb-0 h-100">
                                <div class="card-body">

                                    <h4 class="header-title">Total Available Ticket</h4>
                                    <h4 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">{{$totalTickets}}</h4>

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
                        <div class="col mb-3">
                            <div class="card mb-0 h-100">
                                <div class="card-body">

                                    <h4 class="header-title">Total Reservation</h4>
                                    <h4 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">{{$totalReservations}}</h4>

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
                        </div>

                    </div>
                </div>
            </div> <!-- End col -->

        </div> <!-- End row -->

    </div> <!-- container -->
@endsection
