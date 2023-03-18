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
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-plus-circle me-1"></i> Add Card</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-content-copy me-1"></i> Copy List</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-square-edit-outline me-1"></i> Edit</a>
                                            <!-- item-->
                                            <hr class="dropdown-divider">
                                            <a href="javascript:void(0);" class="dropdown-item text-danger"><i class="mdi mdi-trash-can-outline me-1"></i> Detele</a>
                                        </div>
                                    </div>
                                    <h4 class="header-title">Project Dashboard</h4>
                                    <h5 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">New Task Assign</h5>

                                    <div class="d-flex align-items-center mt-4">
                                        <div class="flex-shrink-0">
                                            <h5 class="font-13 text-muted my-0"><i class="mdi mdi-clock-outline"></i> 4 Hrs ago</h5>
                                        </div>
                                        <div class="flex-grow-1 ms-2"></div>
                                        <div class="text-end multi-user">
                                            <a href="javascript:void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-xs" alt="friend">
                                            </a>
                                            <a href="javascript:void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-xs" alt="friend">
                                            </a>
                                        </div>
                                    </div>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->

                        <div class="col-sm-6 col-xl-3 mb-3">
                            <div class="card mb-0 h-100">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-plus-circle me-1"></i> Add Card</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-content-copy me-1"></i> Copy List</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-square-edit-outline me-1"></i> Edit</a>
                                            <!-- item-->
                                            <hr class="dropdown-divider">
                                            <a href="javascript:void(0);" class="dropdown-item text-danger"><i class="mdi mdi-trash-can-outline me-1"></i> Detele</a>
                                        </div>
                                    </div>
                                    <h4 class="header-title">Admin Template</h4>
                                    <h5 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">New Task Assign</h5>

                                    <div class="d-flex align-items-center mt-4">
                                        <div class="flex-shrink-0">
                                            <h5 class="font-13 text-muted my-0"><i class="mdi mdi-clock-outline"></i> 7 Hrs ago</h5>
                                        </div>
                                        <div class="flex-grow-1 ms-2"></div>
                                        <div class="text-end multi-user">
                                            <a href="javascript:void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-4.jpg" class="rounded-circle avatar-xs" alt="friend">
                                            </a>
                                            <a href="javascript:void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-5.jpg" class="rounded-circle avatar-xs" alt="friend">
                                            </a>
                                        </div>
                                    </div>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->

                        <div class="col-sm-6 col-xl-3 mb-3">
                            <div class="card mb-0 h-100">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-plus-circle me-1"></i> Add Card</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-content-copy me-1"></i> Copy List</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-square-edit-outline me-1"></i> Edit</a>
                                            <!-- item-->
                                            <hr class="dropdown-divider">
                                            <a href="javascript:void(0);" class="dropdown-item text-danger"><i class="mdi mdi-trash-can-outline me-1"></i> Detele</a>
                                        </div>
                                    </div>
                                    <h4 class="header-title">Client Project</h4>
                                    <h5 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">New Task Assign</h5>

                                    <div class="d-flex align-items-center mt-4">
                                        <div class="flex-shrink-0">
                                            <h5 class="font-13 text-muted my-0"><i class="mdi mdi-clock-outline"></i> 1 Day ago</h5>
                                        </div>
                                        <div class="flex-grow-1 ms-2"></div>
                                        <div class="text-end multi-user">
                                            <a href="javascript:void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-6.jpg" class="rounded-circle avatar-xs" alt="friend">
                                            </a>
                                            <a href="javascript:void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-7.jpg" class="rounded-circle avatar-xs" alt="friend">
                                            </a>
                                        </div>
                                    </div>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->

                        <div class="col-sm-6 col-xl-3 mb-3">
                            <div class="card mb-0 h-100">
                                <div class="card-body">
                                    <div class="border-dashed border-2 border h-100 w-100 rounded d-flex align-items-center justify-content-center">
                                        <a href="javascript:void(0);" class="text-center text-muted p-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="mdi mdi-plus h3 my-0"></i> <h4 class="font-16 mt-1 mb-0 d-block">Add New Project</h4>
                                        </a>
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
