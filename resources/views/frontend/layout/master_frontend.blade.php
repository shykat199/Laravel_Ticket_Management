<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Train Ticket Booking</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset("frontend/assets/css/font-awesome.min.css")}}"/>
    <link rel="stylesheet" href="{{asset("frontend/assets/css/slick.css")}}"/>
    <link rel="stylesheet" href="{{asset("frontend/assets/css/style.css")}}"/>
    <script src="{{asset("frontend/assets/js/jquery-3.6.3.min.js")}}"></script>
    <style>
        img {
            max-width: 100%;
        }


    </style>
</head>

<body>
<header class="header-area">
     <nav class="navbar bg-dark navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand ticket-booking-logo" href="#">
          <i class="fa fa-train pe-2" aria-hidden="true"></i>
          BOOK<span class="ticket-booking-logo-text-decrease">YOUR</span>TRAIN
        </a>
        <div class="d-flex upper-nav-btn">
            @if(Auth::check())
                <a href="{{route('admin.logout')}}" class="btn btn-outline-success me-2 ticket-booking-nav-button-style" type="submit">LogOut</a>
            @elseif(Auth::guest())
                <a href="{{route('admin.login')}}" class="btn btn-outline-success me-2 ticket-booking-nav-button-style" type="submit">Sign Up</a>
                <a href="{{route('admin.register_page')}}" class="btn btn-outline-success ticket-booking-nav-button-style" type="submit">Login</a>
            @endif

        </div>
      </div>
    </nav>
    <nav class="navbar navbar-expand-lg ticket-booking-nav2 py-4">
        <div class="container">
            <button class="navbar-toggler nav-collaps-icon" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ticket-booking-nav2-text-design" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item pe-4">
                        <a class="nav-link active" aria-current="page" href="{{route('frontend.home')}}">Home</a>
                    </li>
                    <li class="nav-item pe-4">
                        <a class="nav-link" href="{{route('all.posts')}}">Blog</a>
                    </li>
                    <li class="nav-item pe-4">
                        <a class="nav-link pe-4" href="#">Gallery</a>
                    </li>
                    <li class="nav-item dropdown pe-4">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            Pages
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item pe-4">
                        <a href="{{route('frontend.aboutUs')}}" class="nav-link">About</a>
                    </li>
                </ul>
                <ul class="d-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            USD
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item px-4">
                        <a class="nav-link disabled">|</a>
                    </li>
                    <li class="nav-item dropdown pe-3">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            UN
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- header hero start -->
    {{--    <section class="header-hero">--}}
    {{--        <div class="container ticket-booking-home-header-hero-container">--}}
    {{--            <div class="row gy-4 ticket-booking-home-header-hero-content">--}}
    {{--                <div--}}
    {{--                    class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex flex-column justify-content-center ticket-booking-home-header-hero-title">--}}
    {{--                    <h2>WELCOME TO BOOK <span>YOUR</span> TRAIN</h2>--}}
    {{--                    <div class="row">--}}
    {{--                        <div class="col-12 col-sm-12 col-md-10 col-lg-10">--}}
    {{--                            <p>We saves your time both while purchasing, the check-in and during the travel</p>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div--}}
    {{--                    class="col-12 col-sm-12 col-md-6 col-lg-6 ticket-booking-home-header-search-ticket-form d-flex flex-column justify-content-end">--}}
    {{--                    <form class="row g-3 pt-3 pb-5 px-2">--}}
    {{--                        <!-- travelling route start -->--}}
    {{--                        <div class="col-md-5 hero-input-with-icon">--}}
    {{--                            <label for="inputtext1" class="form-label pb-2">Travelling Route</label>--}}
    {{--                            <input type="text" class="form-control" id="inputtext1" placeholder="From">--}}
    {{--                            <i class="fa fa-map-marker"></i>--}}
    {{--                        </div>--}}
    {{--                        <div class="col-md-2 d-flex align-items-end">--}}
    {{--                            <button type="submit" class="form-control">--}}
    {{--                                <i class="fa fa-refresh"></i>--}}
    {{--                            </button>--}}
    {{--                        </div>--}}
    {{--                        <div class="col-md-5 d-flex align-items-end hero-input-with-icon">--}}
    {{--                            <input type="text" class="form-control" id="inputtext2" placeholder="To">--}}
    {{--                            <i class="fa fa-map-marker"></i>--}}
    {{--                        </div>--}}
    {{--                        <!-- travelling route end -->--}}
    {{--                        <!-- travelling date start -->--}}
    {{--                        <div class="col-md-6 hero-input-with-icon mt-4">--}}
    {{--                            <label for="inputtext3" class="form-label pb-2">Travelling Date</label>--}}
    {{--                            <input type="text" class="form-control" id="inputtext3" placeholder="MM/DD/YY">--}}
    {{--                            <i class="fa fa-calendar"></i>--}}
    {{--                        </div>--}}
    {{--                        <div class="col-md-6 d-flex align-items-end hero-input-with-icon mt-4">--}}
    {{--                            <input type="text" class="form-control" id="inputtext4" placeholder="One Way">--}}
    {{--                            <i class="fa fa-calendar"></i>--}}
    {{--                        </div>--}}
    {{--                        <!-- travelling date end -->--}}
    {{--                        <!-- travelling person start -->--}}
    {{--                        <div class="col-md-6 hero-input-with-icon mt-4 hide-numberType-icon">--}}
    {{--                            <label for="inputtext5" class="form-label pb-2">Travelling Persons</label>--}}
    {{--                            <input type="number" class="form-control" id="inputtext5" placeholder="1 Adult">--}}
    {{--                            <i class="fa fa-caret-down"></i>--}}
    {{--                        </div>--}}
    {{--                        <div class="col-md-6 d-flex align-items-end hero-input-with-icon mt-4 hide-numberType-icon">--}}
    {{--                            <input type="number" class="form-control" id="inputtext4" placeholder="0 Kids">--}}
    {{--                            <i class="fa fa-caret-down"></i>--}}
    {{--                        </div>--}}

    {{--                        <!-- travelling person end -->--}}
    {{--                        <div class="col-md-6 d-flex ">--}}

    {{--                        </div>--}}
    {{--                        <div class="col-md-6 d-flex pt-5 ">--}}
    {{--                            <button type="submit" class="form-control py-3  search-ticket-btn">--}}
    {{--                                SEARCH TICKETS--}}
    {{--                            </button>--}}
    {{--                        </div>--}}
    {{--                    </form>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    {{--    <!-- header hero end -->--}}
    {{--</header>--}}

    @yield('show.frontend')

    <!-- main end -->
    <!-- footer star -->
    <footer class="footer">
        <div class="container mt-5">
            <div
                class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-2 g-lg-3 g-md-5 footer-upper-part">
                <div class="col">
                    <div class="py-3">
                        <h6 class="text-light">Menu</h6>
                    </div>
                    <ul class="footer-1st-colum-menu-list">
                        <li class="py-2 text-light">
                            <a href="javascript:void(0)">
                                Press Center
                            </a>
                        </li>
                        <li class="py-2 text-light">
                            <a href="javascript:void(0)">
                                Travel News
                            </a>
                        </li>
                        <li class="py-2 text-light">
                            <a href="javascript:void(0)">
                                Privacy Policy
                            </a>
                        </li>
                        <li class="py-2 text-light">
                            <a href="javascript:void(0)">
                                Best Price Guarantee
                            </a>
                        </li>
                        <li class="py-2 text-light">
                            <a href="{{route('frontend.aboutUs')}}">
                                About Us
                            </a>
                        </li>
                        <li class="py-2 text-light">
                            <a href="javascript:void(0)">
                                Contacts
                            </a>
                        </li>
                    </ul>
                </div>


                <div class="col">
                    <div class="py-3">
                        <h6 class="text-light">Contact Us</h6>
                    </div>
                    <ul class="footer-2nd-colum-menu-list">
                        <li class="py-2">
                            @if(contactUs('Phone'))
                                <a class="d-flex align-items-center" href="javascript:void(0)">
                                    <i class="fa fa-phone-square"></i>
                                    <span class="ps-3 fs-4">{{contactUs('Phone')}}</span>
                                </a>
                            @endif
                        </li>
                        <li class="py-2">
                            @if(contactUs('Skype'))
                                <a class="d-flex align-items-center" href="javascript:void(0)">
                                    <i class="fa fa-skype"></i>
                                    <span class="ps-3 fs-6">{{contactUs('Skype')}}</span>
                                </a>
                            @endif

                        </li>
                        <li class="py-2">
                            @if(contactUs('Gmail'))
                                <a class="d-flex align-items-center" href="javascript:void(0)">
                                    <i class="fa fa-envelope"></i>
                                    <span class="ps-3 fs-6">{{contactUs('Gmail')}}</span>
                                </a>
                            @endif

                        </li>
                        <li class="py-3">
                            @if(contactUs('Address'))
                                <a class="d-flex" href="javascript:void(0)">
                                    <i class="fa fa-map-marker"></i>
                                    <span class="ps-3 fs-6">{{contactUs('Address')}}</span>
                                </a>
                            @endif

                        </li>
                    </ul>
                </div>


                <div class="col">
                    <div class="py-3">
                        <h6 class="text-light">Blog Posts</h6>
                    </div>
                    <div class="footer-3rd-colum-menu-list">

                        @foreach(blogPosts() as $post)
                            <a href="javascript:void(0)" class="row py-2">
                                <div class="col-6 d-flex align-items-center  justify-content-center">
                                    <img class="img-fluid"
                                         src="{{\Illuminate\Support\Facades\Storage::url($post->post_image)}}"
                                         alt="blog post">
                                </div>
                                <div class="col-6">
                                    <h6>{{$post->post_title}}</h6>
                                    <p class="fst-italic">{{$post->created_at->format('d M Y')}}</p>
                                </div>
                            </a>
                        @endforeach


                    </div>
                </div>
                <div class="col">
                    <div class="py-3">
                        <h6 class="text-light">Subscribe</h6>
                        <div class="footer-4th-colum-menu-list pt-3">
                            <form class="row g-3">
                                <div class="col-8">
                                    <label for="inputEmail" class="footer-subscribe-lavel pb-3">Be aware of news</label>
                                    <input type="text" class="form-control" id="inputEmail" placeholder="Your e-mail">
                                </div>
                                <div class="col-4 d-flex align-items-end">
                                    <!-- <label for="send-btn" class="footer-subscribe-lavel pb-3"></label> -->
                                    <button type="submit" class="btn btn-secondary" id="send-btn">Send</button>
                                </div>
                            </form>
                            <div class="mt-5">
                                <h6 class="fs-5">Follow Us</h6>
                                <ul class="d-flex align-items-center pt-2">

                                    @if(contactUs('Linkedin'))
                                        <li>
                                            <a href="javascript:void(0)">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if(contactUs('Facebook'))
                                        <li class="ms-4">
                                            <a href="javascript:void(0)">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if(contactUs('Twitter'))
                                        <li class="ms-4">
                                            <a href="javascript:void(0)">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if(contactUs('Youtube'))
                                        <li class="ms-4">
                                            <a href="javascript:void(0)">
                                                <i class="fa fa-youtube-play"></i>
                                            </a>
                                        </li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-lower-part pt-4">
                <ul class="d-flex align-items-center justify-content-between">
                    <li>
                        <i class="fa fa-train text-danger fs-4" aria-hidden="true"></i>
                        <span class="fs-4 fw-semibold ps-3">BOOK<span class="fw-lighter">YOUR</span>TRAIN</span>
                    </li>
                    <li>
                        <a href="" style="color: gray"><i class="fa fa-chevron-up footer-lower-part-angle-up"></i></a>
                    </li>
                    <li class="">&copy 2015 BESTWEBSOFT</li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- footer end -->
    <footer>

    </footer>


    <script src="{{asset("frontend/assets/js/slick.min.js")}}"></script>
    <script src="{{asset("frontend/assets/js/script.js")}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function (){

        })
    </script>
</body>

</html>
