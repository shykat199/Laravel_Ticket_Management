@extends('frontend.layout.master_frontend')
@section('show.frontend')
    <section class="header-hero">
        <div class="container ticket-booking-home-header-hero-container">
            <div class="row gy-4 ticket-booking-home-header-hero-content">
                <div
                    class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex flex-column justify-content-center ticket-booking-home-header-hero-title">
                    <h2>WELCOME TO BOOK <span>YOUR</span> TRAIN</h2>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-10 col-lg-10">
                            <p>We saves your time both while purchasing, the check-in and during the travel</p>
                        </div>
                    </div>
                </div>
                <div
                    class="col-12 col-sm-12 col-md-6 col-lg-6 ticket-booking-home-header-search-ticket-form d-flex flex-column justify-content-end">
                    <form class="row g-3 pt-3 pb-5 px-2" action="" method="post">
                        @csrf
                        <!-- travelling route start -->
                        <div class="col-md-5 hero-input-with-icon">
                            <label for="inputtext1" class="form-label pb-2">Travelling Route</label>
                            <input type="text" class="form-control" id="inputtext1" placeholder="From">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button type="submit" class="form-control">
                                <i class="fa fa-refresh"></i>
                            </button>
                        </div>
                        <div class="col-md-5 d-flex align-items-end hero-input-with-icon">
                            <input type="text" class="form-control" id="inputtext2" placeholder="To">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <!-- travelling route end -->
                        <!-- travelling date start -->
                        <div class="col-md-6 hero-input-with-icon mt-4">
                            <label for="inputtext3" class="form-label pb-2">Travelling Date</label>
                            <input type="text" class="form-control" id="inputtext3" placeholder="MM/DD/YY">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <div class="col-md-6 d-flex align-items-end hero-input-with-icon mt-4">
                            <input type="text" class="form-control" id="inputtext4" placeholder="One Way">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <!-- travelling date end -->
                        <!-- travelling person start -->
                        <div class="col-md-6 hero-input-with-icon mt-4 hide-numberType-icon">
                            <label for="inputtext5" class="form-label pb-2">Travelling Persons</label>
                            <input type="number" class="form-control" id="inputtext5" placeholder="1 Adult">
                            <i class="fa fa-caret-down"></i>
                        </div>
                        <div class="col-md-6 d-flex align-items-end hero-input-with-icon mt-4 hide-numberType-icon">
                            <input type="number" class="form-control" id="inputtext4" placeholder="0 Kids">
                            <i class="fa fa-caret-down"></i>
                        </div>

                        <!-- travelling person end -->
                        <div class="col-md-6 d-flex ">

                        </div>
                        <div class="col-md-6 d-flex pt-5 ">
                            <button type="submit" class="form-control py-3  search-ticket-btn">
                                SEARCH TICKETS
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- header hero end -->
    </header>

    <main class="">
        <!-- top travel destination start  -->
        <section class="container ticket-booking-home-top-trav-destination mt-5">
            <div class="d-flex justify-content-between pt-4 mb-5">
                <h3>TOP TRAVEL DESTINATION</h3>
                <button type="button" class="btn btn-outline-dark fw-semibold">Browse All</button>
            </div>
            <!-- top destination cards -->
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card h-100">
                        <img src="{{asset("frontend/assets/images/newyork.jpg")}}" class="card-img-top img-fluid" alt="new york">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title">New York</h5>
                                    <p class="text-danger">Penn station, NY</p>
                                </div>
                                <div class="col-6">
                                    <h5 class="card-title text-end">Los Angels</h5>
                                    <p class="text-danger text-end">Union Station, CA</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <small class="text-muted">Every day</small>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-end">
                                    <small class="text-muted ">From <span
                                            class="text-danger fs-4 fw-semibold">$280</span></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="{{asset("frontend/assets/images/los-angels")}}.jpg" class="card-img-top img-fluid" alt="los-angels">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title">Los Angels</h5>
                                    <p class="text-danger">Union Station, CA</p>
                                </div>
                                <div class="col-6">
                                    <h5 class="card-title text-end">Chicago</h5>
                                    <p class="text-danger text-end">Union Station, IL</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <small class="text-muted">Every day</small>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-end">
                                    <small class="text-muted ">From <span
                                            class="text-danger fs-4 fw-semibold">$280</span></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="{{asset("frontend/assets/images/chicago.jpg")}}" class="card-img-top img-fluid" alt="chicago">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title">Chicago</h5>
                                    <p class="text-danger">Union Station, IL</p>
                                </div>
                                <div class="col-6">
                                    <h5 class="card-title text-end">New York</h5>
                                    <p class="text-danger text-end">Penn station,NY</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <small class="text-muted">Every day</small>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-end">
                                    <small class="text-muted ">From <span
                                            class="text-danger fs-4 fw-semibold">$280</span></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="{{asset("frontend/assets/images/california.jpg")}}" class="card-img-top img-fluid" alt="california">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title">California</h5>
                                    <p class="text-danger">Penn station, CA</p>
                                </div>
                                <div class="col-6">
                                    <h5 class="card-title text-end">Los Angels</h5>
                                    <p class="text-danger text-end">Union Station, CA</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <small class="text-muted">Every day</small>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-end">
                                    <small class="text-muted ">From <span
                                            class="text-danger fs-4 fw-semibold">$280</span></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="{{asset("frontend/assets/images/florida.jpg")}}" class="card-img-top img-fluid" alt="florida">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title">Florida</h5>
                                    <p class="text-danger">Union Station, FL</p>
                                </div>
                                <div class="col-6">
                                    <h5 class="card-title text-end">Chicago</h5>
                                    <p class="text-danger text-end">Union Station, IL</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <small class="text-muted">Every day</small>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-end">
                                    <small class="text-muted ">From <span
                                            class="text-danger fs-4 fw-semibold">$280</span></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="{{asset("frontend/assets/images/newyork.jpg")}}" class="card-img-top img-fluid" alt="newyork">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title">New York</h5>
                                    <p class="text-danger">Penn station,NY</p>
                                </div>
                                <div class="col-6">
                                    <h5 class="card-title text-end">California</h5>
                                    <p class="text-danger text-end">Penn station,CA</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <small class="text-muted">Every day</small>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-end">
                                    <small class="text-muted ">From <span
                                            class="text-danger fs-4 fw-semibold">$280</span></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- top travel destination end -->
        <!-- latest post start  -->
        <section class=" py-5 ticket-booking-home-latest-post mt-5">
            <div class="container">
                <div class="d-flex justify-content-between pt-4 mb-5">
                    <h3>LATEST POSTS</h3>
                    <button type="button" class="btn btn-outline-dark fw-semibold">Older Posts</button>
                </div>
                <!-- latest post cards -->
                <div class="row row-cols-1 row-cols-lg-2 g-4">
                    @foreach($blogPost as $post)
                        <div class="col">
                            <div class="card h-100">
                                <div class="row">
                                    <div class="col-6 latest-post-card-body-1st-row-img">
                                        <img src="{{\Illuminate\Support\Facades\Storage::url($post->post_image)}}"
                                             class="img-fluid latest-post-card-img"
                                             alt="new york">
                                    </div>
                                    <div class="col-6 latest-post-card-body latest-post-card-body-1st-row">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$post->post_title}}</h5>
                                            <p class="fs-6">
                                                {!! Str::limit($post->post_description,50,'...') !!}

                                            </p>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-6 d-flex align-items-center">
                                                    <small class="text-muted ">by <span
                                                            class="text-danger fs-6">Admin</span></small>
                                                </div>
                                                <div class="col-6 d-flex align-items-center justify-content-end">
                                                    <small class="text-muted ">{{$post->created_at->format('d M Y')}}
{{--                                                        <span--}}
{{--                                                            class=" fst-italic">day ago --}}
{{--                                                        </span>--}}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
            </div>
        </section>
        <!-- latest post end -->

        <!-- E-Ticket advantages start -->
        <section class="ticket-booking-home-e-ticket pt-5  mt-5">
            <div class="container">
                <div class="d-flex justify-content-between pt-4 mb-5">
                    <h3 class="text-light">E-TICKETS ADVANTAGE</h3>
                    <button type="button" class="btn btn-outline-light text-light fw-semibold">Learn More</button>
                </div>
                <div class="pt-4 row ticket-booking-home-e-ticket-middle">
                    @foreach($eAdvantages as $eAdvantage)
                        <div class="col text-center ticket-booking-home-e-ticket-middle-content">
                            <i class="fa fa-desktop"></i>
                            <p class=" px-3 pt-5 pb-2 my-5 text-white">{!! $eAdvantage->advantage_text !!}</p>
                        </div>
                    @endforeach

                </div>
            </div>
            </div>
        </section>
        <!-- E-Ticket advantages end -->

        <!-- Testimonial start -->
        <section class="container ticket-booking-home-testimonial mb-5">
            <h3 class="text-dark mt-5 pt-4">TESTIMONIALS</h3>
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators home-carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0"
                            class="active bg-dark"
                            aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1"
                            aria-label="Slide 2"
                            class="bg-dark"></button>
                    <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="2"
                            aria-label="Slide 3"
                            class="bg-dark"></button>
                </div>
                <div class="carousel-inner">
                    @foreach($testmonials as $testmonial)
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-6">
                                    <div class="row pt-5">
                                        <div class="col-4 d-flex align-items-center  justify-content-end">
                                            <img class="img-fluid home-carousal-image" src="{{asset('storage/image/'.$testmonial->image)}}"
                                                 alt="avatar">
                                        </div>
                                        <div class="col-8 d-flex  flex-column  justify-content-center">
                                            <h4>{{$testmonial->name}}</h4>
                                            <small class="text-muted fst-italic">"{!! $testmonial->feedback_text !!}"</small>
                                        </div>"
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row pt-5">
                                        <div class="col-4 d-flex align-items-center  justify-content-end">
                                            <img class="img-fluid home-carousal-image" src="{{asset('storage/image/'.$testmonial->image)}}"
                                                 alt="avatar">
                                        </div>
                                        <div class="col-8 d-flex  flex-column  justify-content-center">
                                            <h4>{{$testmonial->name}}</h4>
                                            <small class="text-muted fst-italic">"{!! $testmonial->feedback_text !!}"</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

{{--                    <div class="carousel-item">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-6">--}}
{{--                                <div class="row pt-5">--}}
{{--                                    <div class="col-4 d-flex align-items-center  justify-content-end">--}}
{{--                                        <img class="img-fluid home-carousal-image" src="./assets/images/avatar9.jpg"--}}
{{--                                             alt="avatar">--}}
{{--                                    </div>--}}
{{--                                    <div class="col-8 d-flex  flex-column  justify-content-center">--}}
{{--                                        <h4>Jhon Doe</h4>--}}
{{--                                        <small class="text-muted fst-italic">" Lorem ipsum dolor sit, amet consectetur--}}
{{--                                            adipisicing elit.--}}
{{--                                            Reiciendis cupiditate cum mollitia--}}
{{--                                            velit at, excepturi aliquid facilis perferendis! Quos, velit! "</small>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-6">--}}
{{--                                <div class="row pt-5">--}}
{{--                                    <div class="col-4 d-flex align-items-center  justify-content-end">--}}
{{--                                        <img class="img-fluid home-carousal-image" src="./assets/images/avatar7.jpg"--}}
{{--                                             alt="avatar">--}}
{{--                                    </div>--}}
{{--                                    <div class="col-8 d-flex  flex-column  justify-content-center">--}}
{{--                                        <h4>Jhon Doe</h4>--}}
{{--                                        <small class="text-muted fst-italic">" Lorem ipsum dolor sit, amet consectetur--}}
{{--                                            adipisicing elit.--}}
{{--                                            Reiciendis cupiditate cum mollitia--}}
{{--                                            velit at, excepturi aliquid facilis perferendis! Quos, velit! "</small>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="carousel-item">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-6">--}}
{{--                                <div class="row pt-5">--}}
{{--                                    <div class="col-4 d-flex align-items-center  justify-content-end">--}}
{{--                                        <img class="img-fluid home-carousal-image" src="./assets/images/avatar8.jpg"--}}
{{--                                             alt="avatar">--}}
{{--                                    </div>--}}
{{--                                    <div class="col-8 d-flex  flex-column  justify-content-center">--}}
{{--                                        <h4>Jhon Doe</h4>--}}
{{--                                        <small class="text-muted fst-italic">" Lorem ipsum dolor sit, amet consectetur--}}
{{--                                            adipisicing elit.--}}
{{--                                            Reiciendis cupiditate cum mollitia--}}
{{--                                            velit at, excepturi aliquid facilis perferendis! Quos, velit! "</small>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-6">--}}
{{--                                <div class="row pt-5">--}}
{{--                                    <div class="col-4 d-flex align-items-center  justify-content-end">--}}
{{--                                        <img class="img-fluid home-carousal-image" src="./assets/images/avatar9.jpg"--}}
{{--                                             alt="avatar">--}}
{{--                                    </div>--}}
{{--                                    <div class="col-8 d-flex  flex-column  justify-content-center">--}}
{{--                                        <h4>Jhon Doe</h4>--}}
{{--                                        <small class="text-muted fst-italic">" Lorem ipsum dolor sit, amet consectetur--}}
{{--                                            adipisicing elit.--}}
{{--                                            Reiciendis cupiditate cum mollitia--}}
{{--                                            velit at, excepturi aliquid facilis perferendis! Quos, velit! "</small>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                      data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button> -->
                    <!-- <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                      data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button> -->
                </div>
            </div>
        </section>

        <!-- Testimonial end -->

@endsection

