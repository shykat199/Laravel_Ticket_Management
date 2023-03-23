@extends('frontend.layout.master_frontend')
@section('show.frontend')
    <!-- header hero start -->
    <section class="about-header-hero">
        <div class="container ticket-booking-about-header-hero-container">
            <div class="row gy-4 ticket-booking-about-header-hero-content">
                <div class="col-12 ticket-booking-about-header-hero-title">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                    <h2>ABOUT US</h2>
                    <h5>ANY DESTINATION ON CLICK</h5>
                </div>
            </div>
        </div>
    </section>
    <!-- header hero end -->
    </header>

    <!-- main start -->
    <main class="">
        <!-- Who we are start-->
        <section class="who-we-are my-5">
            <div class="container py-4">
                <h4 class="text-center">
                    Who we are
                </h4>
                <div class="row gx-4 py-4 px-5 who-we-are-content">
                    <div class="col-6 who-we-are-content-paragraph">
                        <p>
                            {!! $aboutUs[0]->value !!}
                        </p>
                    </div>
                </div>
                <p class="text-center fst-italic text-muted">
                    "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magnam non nisi unde? Magni, <br>
                    veritatis
                    iure aliquid ipsam natus quisquam voluptatibus!"
                </p>
            </div>
        </section>
        <!-- Who we are end-->
        <!-- our team start -->
        <section class="ticket-booking-about-our-team pt-5  mt-5">
            <div class="container">
                <h3 class="text-light text-center fw-light py-4">OUR TEAM</h3>
                <div class="pt-4 row ticket-booking-about-our-team-middle">

                    @foreach($allTeams as $team)
                        <div class="col text-center ticket-booking-about-our-team-middle-content">
                            <img src="{{asset('storage/image/'.$team->member_image)}}" alt="team member">
                            <div class="text-light px-3 pt-5 pb-2 my-5">
                                <h6 class="fs-5 fw-light">{{$team->member_name}}</h6>
                                <p class="fs-6 fw-light">{{$team->member_role}}</p>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
            </div>
        </section>
        <!-- our team end -->
        <!-- about us card start -->
        <section class="about-us-card my-5">
            <div class="container py-5">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach($services as $service)

                        <div class="col">
                            <div class="card border-0 h-100">
                                <div class="row g-0">
                                    <div class="col-md-2 pt-3 ">
                                        <img  src="{{asset('storage/service/'.$service->service_logo)}}" alt="" />
                                    </div>
                                    <div class="col-md-10">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$service->service_title}}</h5>
                                            <p class="card-text text-muted">
                                                {!! $service->service_text  !!}

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </section>
        <!-- about us card end -->
        <!-- about us slider start -->
        <section class="ticket-booking-about-testimonial mt-5 py-5">
            <div class="container pb-5">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($testmonials as $testimonial)
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row pt-5">
                                            <div class="col-3 d-flex align-items-center  justify-content-end">
                                                <img class="img-fluid home-carousal-image" src="{{asset('storage/image/'.$testimonial->image)}}"
                                                     alt="avatar">
                                            </div>
                                            <div class="col-7 d-flex  flex-column  justify-content-center">

                                                <p class="text-muted fst-italic text-justify">" {{strip_tags($testimonial->feedback_text)}} "</p>
                                                <small class="text-muted">{{$testimonial->name}}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <button class="carousel-control-prev " type="button"
                                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                            <!-- <span class="carousel-control-prev-icon about-carousal-prev-btn" aria-hidden="true"></span> -->
                            <i class="fa fa-angle-left about-carousal-prev-btn pt-5" aria-hidden="true"></i>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                                data-bs-slide="next">
                            <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
                            <i class="fa fa-angle-right about-carousal-prev-btn pt-5" aria-hidden="true"></i>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <!-- about us slider end -->
    </main>
    <!-- main end -->
@endsection

