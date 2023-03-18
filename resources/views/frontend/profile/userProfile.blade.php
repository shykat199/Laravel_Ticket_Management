@extends('admin.interface.layout.master_admin')
@section('admin.title')
    Your Profile
@endsection
@section('admin.content')
    <!-- Start Content-->
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">View Profile</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Project Info</a>
                            </div>
                        </div>

                        <div class="text-center">
                            <img src="{{asset("admin/assets/images/users/avatar-1.jpg")}}" class="rounded-circle avatar-md img-thumbnail" alt="friend">
                            <h4 class="mt-3 my-1">{{Auth::user()->name}}<i class="mdi mdi-check-decagram text-primary"></i></h4>
                            <p class="mb-0 text-muted"><i class="mdi mdi-email-outline me-1"></i>{{Auth::user()->email}}</p>
                            <hr class="bg-dark-lighten my-3">

                            <div class="row mt-3">
                                <div class="col-4">
                                    <a href="javascript:void(0);" class="btn w-100 btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Message"><i class="mdi mdi-message-processing-outline"></i></a>
                                </div>
                                <div class="col-4">
                                    <a href="javascript:void(0);" class="btn w-100 btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Call"><i class="mdi mdi-phone"></i></a>
                                </div>
                                <div class="col-4">
                                    <a href="javascript:void(0);" class="btn w-100 btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Email"><i class="mdi mdi-email-outline"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End col -->

        </div> <!-- End row -->

    </div> <!-- container -->
@endsection
