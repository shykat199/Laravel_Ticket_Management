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

    @stack('css')

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
        <a class="navbar-brand ticket-booking-logo" href="{{route('frontend.home')}}">
          <i class="fa fa-bus pe-2" aria-hidden="true"></i>
{{--            <i class="fas fa-bus" aria-hidden="true"></i>--}}
          BOOK<span class="ticket-booking-logo-text-decrease">YOUR</span>BUS
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
                        <a href="{{route('frontend.aboutUs')}}" class="nav-link">About</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>



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
                                <a class="d-flex align-items-center">
                                    <i class="fa fa-phone-square"></i>
                                    <span class="ps-3 fs-4">{{strip_tags(contactUs('Phone'))}}</span>
                                </a>
                            @endif
                        </li>
                        <li class="py-2">
                            @if(contactUs('Skype'))
                                <a class="d-flex align-items-center" href="{{strip_tags(contactUs('Skype'))}}">
                                    <i class="fa fa-skype"></i>
                                    <span class="ps-3 fs-6">{{strip_tags(contactUs('Skype'))}}</span>
                                </a>
                            @endif

                        </li>
                        <li class="py-2">
                            @if(contactUs('Gmail'))
                                <a class="d-flex align-items-center" href="{{strip_tags(contactUs('Gmail'))}}">
                                    <i class="fa fa-envelope"></i>
                                    <span class="ps-3 fs-6">{{strip_tags(contactUs('Gmail'))}}</span>
                                </a>
                            @endif

                        </li>
                        <li class="py-3">
                            @if(contactUs('Address'))
                                <a class="d-flex">
                                    <i class="fa fa-map-marker"></i>
                                    <span class="ps-3 fs-6">{{strip_tags(contactUs('Address'))}}</span>
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
                                    <h6> {!! Str::limit($post->post_title, 20, '...') !!}</h6>
                                    <p class="fst-italic">{{$post->created_at->format('d M Y')}}</p>
                                </div>
                            </a>
                        @endforeach


                    </div>
                </div>
                <div class="col">
                    <div class="py-3">
                        <div class="footer-4th-colum-menu-list">

                            <div class="">
                                <h6 class="fs-5">Follow Us</h6>
                                <ul class="d-flex align-items-center pt-2">

                                    @if(contactUs('Linkedin'))
                                        <li>
                                            <a href="{{strip_tags(contactUs('Linkedin'))}}">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if(contactUs('Facebook'))
                                        <li class="ms-4">
                                            <a href="{{strip_tags(contactUs('Facebook'))}}">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if(contactUs('Twitter'))
                                        <li class="ms-4">
                                            <a href="{{strip_tags(contactUs('Twitter'))}}">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if(contactUs('Youtube'))
                                        <li class="ms-4">
                                            <a href="{{strip_tags(contactUs('Youtube'))}}">
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
   @stack('script')
    <script>
        $(document).ready(function (){

        })
    </script>

</body>

</html>
