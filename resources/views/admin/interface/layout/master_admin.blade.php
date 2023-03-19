<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/hyper/saas/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 May 2022 20:21:31 GMT -->
<head>
    <meta charset="utf-8"/>
    <title>Dashboard | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset("admin/assets/images/favicon.ico")}}">

    <!-- third party css -->
    <link href="{{asset("admin/assets/css/vendor/jquery-jvectormap-1.2.2.css")}}" rel="stylesheet" type="text/css"/>
    <!-- third party css end -->

    <!-- App css -->
    <link href="{{asset("admin/assets/css/icons.min.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("admin/assets/css/app.min.css")}}" rel="stylesheet" type="text/css" id="app-style"/>

    <link href="{{asset("admin/assets/css/vendor/dataTables.bootstrap5.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("admin/assets/css/vendor/responsive.bootstrap5.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("admin/assets/css/vendor/quill.core.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("admin/assets/css/vendor/quill.snow.css")}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
          integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css"
          integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>


</head>

<body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid"
      data-rightbar-onstart="true">
<!-- Begin page -->
<div class="wrapper">
    <!-- ========== Left Sidebar Start ========== -->
    <div class="leftside-menu">

        <!-- LOGO -->
        <a href="index-2.html" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="{{asset("admin/assets/images/logo.png")}}" alt="" height="16">
                    </span>
            <span class="logo-sm">
                        <img src="{{asset("admin/assets/images/logo_sm.png")}}" alt="" height="16">
                    </span>
        </a>

        <!-- LOGO -->
        <a href="index-2.html" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="{{asset("admin/assets/images/logo-dark.png")}}" alt="" height="16">
                    </span>
            <span class="logo-sm">
                        <img src="{{asset("admin/assets/images/logo_sm_dark.png")}}" alt="" height="16">
                    </span>

        </a>

        <div class="h-100" id="leftside-menu-container" data-simplebar>

            <!--- Sidemenu -->
            <ul class="side-nav">
                @if(Auth::user()->user_role==='admin')
                    <li class="side-nav-title side-nav-item">Navigation</li>

                    <li class="side-nav-item">
                        <a  href="{{route('admin.auth.dashboard')}}" aria-expanded="false"
                           class="side-nav-link">
                            <i class="uil-home-alt"></i>
{{--                            <span class="badge bg-success float-end">4</span>--}}
                            <span> Dashboards </span>
                        </a>

                    </li>
                @endif


                <li class="side-nav-title side-nav-item">All Section</li>

                @if(Auth::user()->user_role==='user')

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#userDashboard" aria-expanded="false"
                           aria-controls="sidebarEcommerce" class="side-nav-link">
                            <i class="uil-store"></i>
                            <span> User Dashboard </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="userDashboard">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="{{route('user.auth.dashboard')}}">User Dashboard</a>
                                </li>
                                <li>
                                    <a href="{{route('auth.user.dashboard.profile')}}">User Profile</a>
                                </li>
                                <li>
                                    <a href="{{route('auth.user.dashboard.ticket')}}">User Reservation</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                @endif

                @if(Auth::user()->user_role==='admin')


                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#adminUser" aria-expanded="false"
                               aria-controls="sidebarEcommerce" class="side-nav-link">
                                <i class="uil-store"></i>
                                <span>All User Section </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="adminUser">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="{{route('admin.user.index')}}">All User</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.index')}}">All Admin</a>
                                    </li>

                                </ul>
                            </div>
                        </li>


                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#busReservation" aria-expanded="false"
                               aria-controls="sidebarEcommerce" class="side-nav-link">
                                <i class="uil-store"></i>
                                <span>Reservation Section </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="busReservation">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="{{route('admin.reservation.index')}}">All Reservations</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.reservation.create')}}">Add New Reservation</a>
                                    </li>

                                </ul>
                            </div>
                        </li>


                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#busComapany" aria-expanded="false"
                           aria-controls="sidebarEcommerce" class="side-nav-link">
                            <i class="uil-store"></i>
                            <span> Bus Company Section </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="busComapany">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="{{route('admin.company.index')}}">Bus Company</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#busDetails" aria-expanded="false"
                           aria-controls="sidebarEcommerce" class="side-nav-link">
                            <i class="uil-store"></i>
                            <span> Bus Details Section</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="busDetails">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="{{route('admin.bus_details.index')}}">Bus Details</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#busDestination" aria-expanded="false"
                           aria-controls="sidebarEcommerce" class="side-nav-link">
                            <i class="uil-store"></i>
                            <span> Bus Destination Section</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="busDestination">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="{{route('admin.bus_destination.index')}}">All Bus Destination</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.bus_destination.create')}}">Add New Destination</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#category" aria-expanded="false"
                           aria-controls="sidebarEcommerce" class="side-nav-link">
                            <i class="uil-store"></i>
                            <span> Category Section </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="category">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="{{route('admin.category.index')}}">Category</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#blog" aria-expanded="false"
                           aria-controls="sidebarEcommerce" class="side-nav-link">
                            <i class="uil-store"></i>
                            <span> Blog Section </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="blog">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="{{route('blog.index')}}">All Posts</a>
                                </li>
                                <li>
                                    <a href="{{route('blog.create')}}">Add New Posts</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#testimonial" aria-expanded="false"
                           aria-controls="sidebarEcommerce" class="side-nav-link">
                            <i class="uil-store"></i>
                            <span> Testimonial Section </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="testimonial">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="{{route('admin.testimonial.active')}}">Active Testimonial</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.testimonial.inactive')}}">InActive Testimonial</a>
                                </li>

                            </ul>
                        </div>
                    </li>


                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#team" aria-expanded="false"
                           aria-controls="sidebarEcommerce" class="side-nav-link">
                            <i class="uil-store"></i>
                            <span> Team Section </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="team">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="{{route('admin.team.index')}}">Team Member</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#advantage" aria-expanded="false"
                           aria-controls="sidebarEcommerce" class="side-nav-link">
                            <i class="uil-store"></i>
                            <span>Advantage Section</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="advantage">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="{{route('admin.advantage.index')}}">Sight Advantage</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#service" aria-expanded="false"
                           aria-controls="sidebarEcommerce" class="side-nav-link">
                            <i class="uil-store"></i>
                            <span>All Service Section</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="service">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="{{route('admin.service.index')}}">Service Section</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                @endif


            </ul>

            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topbar-menu float-end mb-0">
                    <li class="dropdown notification-list d-lg-none">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <i class="dripicons-search noti-icon"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                            <form class="p-3">
                                <input type="text" class="form-control" placeholder="Search ..."
                                       aria-label="Recipient's username">
                            </form>
                        </div>
                    </li>
                    <li class="dropdown notification-list topbar-dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <img src="assets/images/flags/us.jpg" alt="user-image" class="me-0 me-sm-1" height="12">
                            <span class="align-middle d-none d-sm-inline-block">English</span> <i
                                class="mdi mdi-chevron-down d-none d-sm-inline-block align-middle"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12">
                                <span class="align-middle">German</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="assets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12">
                                <span class="align-middle">Italian</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12">
                                <span class="align-middle">Spanish</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="assets/images/flags/russia.jpg" alt="user-image" class="me-1" height="12">
                                <span class="align-middle">Russian</span>
                            </a>

                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <i class="dripicons-bell noti-icon"></i>
                            <span class="noti-icon-badge"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg">

                            <!-- item-->
                            <div class="dropdown-item noti-title px-3">
                                <h5 class="m-0">
                                            <span class="float-end">
                                                <a href="javascript: void(0);" class="text-dark">
                                                    <small>Clear All</small>
                                                </a>
                                            </span>Notification
                                </h5>
                            </div>

                            <div class="px-3" style="max-height: 300px;" data-simplebar>

                                <h5 class="text-muted font-13 fw-normal mt-0">Today</h5>
                                <!-- item-->
                                <a href="javascript:void(0);"
                                   class="dropdown-item p-0 notify-item card unread-noti shadow-none mb-2">
                                    <div class="card-body">
                                        <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="notify-icon bg-primary">
                                                    <i class="mdi mdi-comment-account-outline test"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-2">
                                                <h5 class="noti-item-title fw-semibold font-14">Datacorp <small
                                                        class="fw-normal text-muted ms-1">1 min ago</small></h5>
                                                <small class="noti-item-subtitle text-muted">Caleb Flakelar commented on
                                                    Admin</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);"
                                   class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                                    <div class="card-body">
                                        <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="notify-icon bg-info">
                                                    <i class="mdi mdi-account-plus"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-2">
                                                <h5 class="noti-item-title fw-semibold font-14">Admin <small
                                                        class="fw-normal text-muted ms-1">1 hours ago</small></h5>
                                                <small class="noti-item-subtitle text-muted">New user registered</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <h5 class="text-muted font-13 fw-normal mt-0">Yesterday</h5>

                                <!-- item-->
                                <a href="javascript:void(0);"
                                   class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                                    <div class="card-body">
                                        <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="notify-icon">
                                                    <img src="assets/images/users/avatar-2.jpg"
                                                         class="img-fluid rounded-circle" alt=""/>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-2">
                                                <h5 class="noti-item-title fw-semibold font-14">Cristina Pride <small
                                                        class="fw-normal text-muted ms-1">1 day ago</small></h5>
                                                <small class="noti-item-subtitle text-muted">Hi, How are you? What about
                                                    our next meeting</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <h5 class="text-muted font-13 fw-normal mt-0">30 Dec 2021</h5>

                                <!-- item-->
                                <a href="javascript:void(0);"
                                   class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                                    <div class="card-body">
                                        <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="notify-icon bg-primary">
                                                    <i class="mdi mdi-comment-account-outline"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-2">
                                                <h5 class="noti-item-title fw-semibold font-14">Datacorp</h5>
                                                <small class="noti-item-subtitle text-muted">Caleb Flakelar commented on
                                                    Admin</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);"
                                   class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                                    <div class="card-body">
                                        <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="notify-icon">
                                                    <img src="assets/images/users/avatar-4.jpg"
                                                         class="img-fluid rounded-circle" alt=""/>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-2">
                                                <h5 class="noti-item-title fw-semibold font-14">Karen Robinson</h5>
                                                <small class="noti-item-subtitle text-muted">Wow ! this admin looks good
                                                    and awesome design</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <div class="text-center">
                                    <i class="mdi mdi-dots-circle mdi-spin text-muted h3 mt-0"></i>
                                </div>
                            </div>

                            <!-- All-->
                            <a href="javascript:void(0);"
                               class="dropdown-item text-center text-primary notify-item border-top border-light py-2">
                                View All
                            </a>

                        </div>
                    </li>

                    <li class="dropdown notification-list d-none d-sm-inline-block">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <i class="dripicons-view-apps noti-icon"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg p-0">

                            <div class="p-2">
                                <div class="row g-0">
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="assets/images/brands/slack.png" alt="slack">
                                            <span>Slack</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="assets/images/brands/github.png" alt="Github">
                                            <span>GitHub</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="assets/images/brands/dribbble.png" alt="dribbble">
                                            <span>Dribbble</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="row g-0">
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="assets/images/brands/bitbucket.png" alt="bitbucket">
                                            <span>Bitbucket</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="assets/images/brands/dropbox.png" alt="dropbox">
                                            <span>Dropbox</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="assets/images/brands/g-suite.png" alt="G Suite">
                                            <span>G Suite</span>
                                        </a>
                                    </div>
                                </div> <!-- end row-->
                            </div>

                        </div>
                    </li>

                    <li class="notification-list">
                        <a class="nav-link end-bar-toggle" href="javascript: void(0);">
                            <i class="dripicons-gear noti-icon"></i>
                        </a>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#"
                           role="button" aria-haspopup="false"
                           aria-expanded="false">
                                    <span class="account-user-avatar">
                                        <img src="{{asset("admin/assets/images/users/avatar-1.jpg")}}" alt="user-image"
                                             class="rounded-circle">
                                    </span>
                            <span>
                                        <span class="account-user-name">{{Auth::user()->name}}</span>
                                        <span class="account-position">{{strtoupper(Auth::user()->user_role)}}</span>
                                    </span>
                        </a>
                        <div
                            class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                            <!-- item-->
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-account-circle me-1"></i>
                                <span>My Account</span>
                            </a>

                            <!-- item-->
                            <a href="{{route('admin.setting.index')}}" class="dropdown-item notify-item">
                                <i class="mdi mdi-account-edit me-1"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-lifebuoy me-1"></i>
                                <span>Support</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-lock-outline me-1"></i>
                                <span>Lock Screen</span>
                            </a>

                            <!-- item-->
                            <a href="{{route('admin.logout')}}" class="dropdown-item notify-item">
                                <i class="mdi mdi-logout me-1"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>

                </ul>
                <button class="button-menu-mobile open-left">
                    <i class="mdi mdi-menu"></i>
                </button>
                <div class="app-search dropdown d-none d-lg-block">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control dropdown-toggle" placeholder="Search..."
                                   id="top-search">
                            <span class="mdi mdi-magnify search-icon"></span>
                            <button class="input-group-text btn-primary" type="submit">Search</button>
                        </div>
                    </form>

                    <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h5 class="text-overflow mb-2">Found <span class="text-danger">17</span> results</h5>
                        </div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="uil-notes font-16 me-1"></i>
                            <span>Analytics Report</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="uil-life-ring font-16 me-1"></i>
                            <span>How can I help you?</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="uil-cog font-16 me-1"></i>
                            <span>User profile settings</span>
                        </a>

                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                        </div>

                        <div class="notification-list">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="d-flex">
                                    <img class="d-flex me-2 rounded-circle" src="assets/images/users/avatar-2.jpg"
                                         alt="Generic placeholder image" height="32">
                                    <div class="w-100">
                                        <h5 class="m-0 font-14">Erwin Brown</h5>
                                        <span class="font-12 mb-0">UI Designer</span>
                                    </div>
                                </div>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="d-flex">
                                    <img class="d-flex me-2 rounded-circle" src="assets/images/users/avatar-5.jpg"
                                         alt="Generic placeholder image" height="32">
                                    <div class="w-100">
                                        <h5 class="m-0 font-14">Jacob Deo</h5>
                                        <span class="font-12 mb-0">Developer</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end Topbar -->

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <form class="d-flex">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-light" id="dash-daterange">
                                        <span class="input-group-text bg-primary border-primary text-white">
                                                    <i class="mdi mdi-calendar-range font-13"></i>
                                                </span>
                                    </div>
                                    <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                        <i class="mdi mdi-autorenew"></i>
                                    </a>
                                    <a href="javascript: void(0);" class="btn btn-primary ms-1">
                                        <i class="mdi mdi-filter-variant"></i>
                                    </a>
                                </form>
                            </div>
                            <h4 class="page-title">@yield('admin.title')</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                @if(\Illuminate\Support\Facades\Session::has('success'))
                    <div class="alert alert-success m-2" role="alert">
                        <i class="dripicons-checkmark me-2"></i><strong>{{\Illuminate\Support\Facades\Session::get('success')}}</strong>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                aria-label="Close" style="float: right"></button>
                    </div>
                @endif

                @yield('admin.content')


            </div>
            <!-- container -->

        </div>
        <!-- content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <script>document.write(new Date().getFullYear())</script>
                        © Hyper - Coderthemes.com
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end footer-links d-none d-md-block">
                            <a href="javascript: void(0);">About</a>
                            <a href="javascript: void(0);">Support</a>
                            <a href="javascript: void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
<div class="end-bar">

    <div class="rightbar-title">
        <a href="" class="end-bar-toggle float-end">
            <i class="dripicons-cross noti-icon"></i>
        </a>
        <h5 class="m-0">Settings</h5>
    </div>

    <div class="rightbar-content h-100" data-simplebar>

        <div class="p-3">
            <div class="alert alert-warning" role="alert">
                <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
            </div>

            <!-- Settings -->
            <h5 class="mt-3">Color Scheme</h5>
            <hr class="mt-1"/>

            <div class="form-check form-switch mb-1">
                <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="light"
                       id="light-mode-check" checked>
                <label class="form-check-label" for="light-mode-check">Light Mode</label>
            </div>

            <div class="form-check form-switch mb-1">
                <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="dark"
                       id="dark-mode-check">
                <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
            </div>


            <!-- Width -->
            <h5 class="mt-4">Width</h5>
            <hr class="mt-1"/>
            <div class="form-check form-switch mb-1">
                <input class="form-check-input" type="checkbox" name="width" value="fluid" id="fluid-check" checked>
                <label class="form-check-label" for="fluid-check">Fluid</label>
            </div>

            <div class="form-check form-switch mb-1">
                <input class="form-check-input" type="checkbox" name="width" value="boxed" id="boxed-check">
                <label class="form-check-label" for="boxed-check">Boxed</label>
            </div>


            <!-- Left Sidebar-->
            <h5 class="mt-4">Left Sidebar</h5>
            <hr class="mt-1"/>
            <div class="form-check form-switch mb-1">
                <input class="form-check-input" type="checkbox" name="theme" value="default" id="default-check">
                <label class="form-check-label" for="default-check">Default</label>
            </div>

            <div class="form-check form-switch mb-1">
                <input class="form-check-input" type="checkbox" name="theme" value="light" id="light-check" checked>
                <label class="form-check-label" for="light-check">Light</label>
            </div>

            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" name="theme" value="dark" id="dark-check">
                <label class="form-check-label" for="dark-check">Dark</label>
            </div>

            <div class="form-check form-switch mb-1">
                <input class="form-check-input" type="checkbox" name="compact" value="fixed" id="fixed-check" checked>
                <label class="form-check-label" for="fixed-check">Fixed</label>
            </div>

            <div class="form-check form-switch mb-1">
                <input class="form-check-input" type="checkbox" name="compact" value="condensed" id="condensed-check">
                <label class="form-check-label" for="condensed-check">Condensed</label>
            </div>

            <div class="form-check form-switch mb-1">
                <input class="form-check-input" type="checkbox" name="compact" value="scrollable" id="scrollable-check">
                <label class="form-check-label" for="scrollable-check">Scrollable</label>
            </div>

            <div class="d-grid mt-4">
                <button class="btn btn-primary" id="resetBtn">Reset to Default</button>

                <a href="https://themes.getbootstrap.com/product/hyper-responsive-admin-dashboard-template/"
                   class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> Purchase Now</a>
            </div>
        </div> <!-- end padding-->

    </div>
</div>

<div class="rightbar-overlay"></div>
<!-- /End-bar -->

<!-- bundle -->
<script src="{{asset("admin/assets/js/vendor.min.js")}}"></script>
<script src="{{asset("admin/assets/js/app.min.js")}}"></script>

<!-- third party js -->
<script src="{{asset("admin/assets/js/vendor/apexcharts.min.js")}}"></script>
<script src="{{asset("admin/assets/js/vendor/jquery-jvectormap-1.2.2.min.js")}}"></script>
<script src="{{asset("admin/assets/js/vendor/jquery-jvectormap-world-mill-en.js")}}"></script>
<!-- third party js ends -->

<!-- demo app -->
<script src="{{asset("admin/assets/js/pages/demo.dashboard.js")}}"></script>
<!-- end demo js-->

<script src="{{asset("admin/assets/js/vendor/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("admin/assets/js/vendor/dataTables.bootstrap5.js")}}"></script>
<script src="{{asset("admin/assets/js/vendor/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("admin/assets/js/vendor/responsive.bootstrap5.min.js")}}"></script>

<!-- Datatable Init js -->
<script src="{{asset("admin/assets/js/pages/demo.datatable-init.js")}}"></script>
<!-- quill js -->
<script src="{{asset("admin/assets/js/vendor/quill.min.js")}}"></script>
<!-- quill Init js-->
<script src="{{asset("admin/assets/js/pages/demo.quilljs.js")}}"></script>
<!-- plugin js -->
<script src="{{asset("admin/assets/js/vendor/dropzone.min.js")}}"></script>
<!-- init js -->
<script src="{{asset("admin/assets/js/ui/component.fileupload.js")}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"
        integrity="sha512-F636MAkMAhtTplahL9F6KmTfxTmYcAcjcCkyu0f0voT3N/6vzAuJ4Num55a0gEJ+hRLHhdz3vDvZpf6kqgEa5w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

    $('#busCompanyy').select2().on('change', function () {
        let companyId = this.value;
        $.ajax({
            url: `{{ route('admin.bus_destination.coach') }}?company_id=${companyId}`,
            type: 'get',
            success: function (response) {
                if (response == '') {
                    $('#busCoach').html('<option value="">Select Coach</option>');
                }
                $.each(response, function (key, value) {

                    $('#busCoach').append('<option value="' + value
                        .id + '">' + value.bus_coach + '</option>');
                });
            }
        });

    });
</script>

<script>

    $('#bCompany').select2().on('change', function () {
        let companyId = this.value;
        $.ajax({
            url: `{{ route('admin.bus_destination.coach') }}?company_id=${companyId}`,
            type: 'get',
            success: function (response) {
                if (response == '') {
                    $('#busCoach').html('<option value="">Select Coach</option>');
                }
                $.each(response, function (key, value) {
                    $('#busCoach').append('<option value="' + value
                        .id + '">' + value.bus_coach + '</option>');
                });
            }
        });

    });
</script>
</body>

<!-- Mirrored from coderthemes.com/hyper/saas/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 May 2022 20:22:16 GMT -->
</html>
