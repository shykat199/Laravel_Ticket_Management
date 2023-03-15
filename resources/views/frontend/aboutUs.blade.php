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
                    <div class="col">
                        <div class="card border-0 h-100">
                            <div class="row g-0">
                                <div class="col-md-2 pt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                         width="35" height="35" x="0" y="0" viewBox="0 0 512.071 512.071"
                                         style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                        <g>
                                            <ellipse cx="256.036" cy="86.094" rx="86.063" ry="86.094"
                                                     transform="translate(-.166 .495)" fill="#fa4d0a" data-original="#fa4d0a"
                                                     class=""></ellipse>
                                            <path
                                                d="M152.521 437.343h207.03a7.847 7.847 0 0 0 7.847-7.847V402.39a7.847 7.847 0 0 0-7.847-7.847h-207.03a7.847 7.847 0 0 0-7.847 7.847v27.105a7.847 7.847 0 0 0 7.847 7.848zM105.379 499.553v4.671a7.847 7.847 0 0 0 7.847 7.847h285.618a7.847 7.847 0 0 0 7.847-7.847v-4.671c0-17.789-14.421-32.21-32.21-32.21H137.59c-17.79 0-32.211 14.421-32.211 32.21zM311.838 269.829a49.173 49.173 0 0 1-3.757.159h-104.09c-1.273 0-2.53-.064-3.778-.16l-19.723 94.716h150.924zM311.58 239.988c10.421 0 18.899-8.479 18.899-18.9s-8.478-18.899-18.899-18.899H200.491c-10.421 0-18.899 8.478-18.899 18.899s8.478 18.9 18.899 18.9z"
                                                fill="#fa4d0a" data-original="fa4d0a" class=""></path>
                                        </g>
                                    </svg>
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body">
                                        <h5 class="card-title">Lorem ipsum.</h5>
                                        <p class="card-text text-muted">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                            Suscipit, delectus. Dolorum, quia. Lorem, ipsum dolor.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0 h-100">
                            <div class="row g-0">
                                <div class="col-md-2 pt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                         width="35" height="35" x="0" y="0" viewBox="0 0 124 124"
                                         style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                        <g>
                                            <circle cx="20.3" cy="103.749" r="20" fill="#fa4d0a"
                                                    data-original="#fa4d0a"></circle>
                                            <path
                                                d="M67 113.95c0 5.5 4.5 10 10 10s10-4.5 10-10c0-42.4-34.5-77-77-77-5.5 0-10 4.5-10 10s4.5 10 10 10c31.5 0 57 25.6 57 57z"
                                                fill="#fa4d0a" data-original="#fa4d0a"></path>
                                            <path
                                                d="M114 123.95c5.5 0 10-4.5 10-10C124 51.15 72.9.05 10.1.05c-5.5 0-10 4.5-10 10s4.5 10 10 10c51.8 0 93.9 42.1 93.9 93.9 0 5.5 4.4 10 10 10z"
                                                fill="#fa4d0a" data-original="#fa4d0a"></path>
                                        </g>
                                    </svg>
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body">
                                        <h5 class="card-title">Lorem ipsum.</h5>
                                        <p class="card-text text-muted">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0 h-100">
                            <div class="row g-0">
                                <div class="col-md-2 pt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                         width="35" height="35" x="0" y="0" viewBox="0 0 512 512"
                                         style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                        <g>
                                            <path fill-rule="evenodd"
                                                  d="m289.319 317.717-123.471-71.936a64.764 64.764 0 0 0-51.308-.047l-39.779 16.433v151.22c19.685-5.825 38.282-4.74 58.568 6.007l71.6 37.929c16.3 8.637 33.042 11.473 50.868 6.7L476.082 405a37 37 0 0 0-19.153-71.481L322.6 369.508a48.409 48.409 0 0 1-5.262 13.111 49.054 49.054 0 0 1-66.877 17.667L184.5 361.859a7.981 7.981 0 1 1 8-13.813l65.955 38.427c16.519 9.624 35.408 3.49 45.357-12.335a41.127 41.127 0 0 0-14.5-56.421zm68.325-171.379h-40.685c5.682-15.989 19.254-30.04 37.2-30.04 13.416 0 24.618 7.9 31.735 18.874a7.975 7.975 0 0 0 13.375-8.688c-10.035-15.473-26.319-26.186-45.11-26.186-27 0-47.2 21.288-53.939 46.04h-10.91a8 8 0 0 0 0 16h8.362a77.779 77.779 0 0 0 0 8.109h-8.362a8 8 0 0 0 0 16h10.91c6.738 24.752 26.935 46.04 53.939 46.04 18.791 0 35.075-10.713 45.11-26.186a7.975 7.975 0 0 0-13.375-8.688c-7.118 10.975-18.318 18.874-31.735 18.874-17.95 0-31.522-14.051-37.2-30.04h40.685a8 8 0 0 0 0-16H313.7a62.69 62.69 0 0 1 0-8.109h43.943a8 8 0 0 0 0-16zm-8.9-100.665a120.72 120.72 0 1 0 120.719 120.72 120.72 120.72 0 0 0-120.715-120.72zm0 212.784a92.065 92.065 0 1 1 92.064-92.065 92.065 92.065 0 0 1-92.06 92.065zm-289.982-9.566v183.771a8.173 8.173 0 0 1-8.149 8.15H16.648a8.172 8.172 0 0 1-8.148-8.15V248.891a8.171 8.171 0 0 1 8.148-8.149h33.965a8.172 8.172 0 0 1 8.149 8.149z"
                                                  fill="#fa4d0a" data-original="#fa4d0a"></path>
                                        </g>
                                    </svg>
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body">
                                        <h5 class="card-title">Lorem ipsum.</h5>
                                        <p class="card-text text-muted">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                            Suscipit, delectus.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0 h-100">
                            <div class="row g-0">
                                <div class="col-md-2 pt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                         width="35" height="35" x="0" y="0" viewBox="0 0 512.071 512.071"
                                         style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                        <g>
                                            <ellipse cx="256.036" cy="86.094" rx="86.063" ry="86.094"
                                                     transform="translate(-.166 .495)" fill="#fa4d0a" data-original="#fa4d0a"
                                                     class=""></ellipse>
                                            <path
                                                d="M152.521 437.343h207.03a7.847 7.847 0 0 0 7.847-7.847V402.39a7.847 7.847 0 0 0-7.847-7.847h-207.03a7.847 7.847 0 0 0-7.847 7.847v27.105a7.847 7.847 0 0 0 7.847 7.848zM105.379 499.553v4.671a7.847 7.847 0 0 0 7.847 7.847h285.618a7.847 7.847 0 0 0 7.847-7.847v-4.671c0-17.789-14.421-32.21-32.21-32.21H137.59c-17.79 0-32.211 14.421-32.211 32.21zM311.838 269.829a49.173 49.173 0 0 1-3.757.159h-104.09c-1.273 0-2.53-.064-3.778-.16l-19.723 94.716h150.924zM311.58 239.988c10.421 0 18.899-8.479 18.899-18.9s-8.478-18.899-18.899-18.899H200.491c-10.421 0-18.899 8.478-18.899 18.899s8.478 18.9 18.899 18.9z"
                                                fill="#fa4d0a" data-original="fa4d0a" class=""></path>
                                        </g>
                                    </svg>
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body">
                                        <h5 class="card-title">Lorem ipsum.</h5>
                                        <p class="card-text text-muted">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                            Suscipit, delectus. Dolorum, quia. Lorem, ipsum dolor.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0 h-100">
                            <div class="row g-0">
                                <div class="col-md-2 pt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                         width="35" height="35" x="0" y="0" viewBox="0 0 124 124"
                                         style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                        <g>
                                            <circle cx="20.3" cy="103.749" r="20" fill="#fa4d0a"
                                                    data-original="#fa4d0a"></circle>
                                            <path
                                                d="M67 113.95c0 5.5 4.5 10 10 10s10-4.5 10-10c0-42.4-34.5-77-77-77-5.5 0-10 4.5-10 10s4.5 10 10 10c31.5 0 57 25.6 57 57z"
                                                fill="#fa4d0a" data-original="#fa4d0a"></path>
                                            <path
                                                d="M114 123.95c5.5 0 10-4.5 10-10C124 51.15 72.9.05 10.1.05c-5.5 0-10 4.5-10 10s4.5 10 10 10c51.8 0 93.9 42.1 93.9 93.9 0 5.5 4.4 10 10 10z"
                                                fill="#fa4d0a" data-original="#fa4d0a"></path>
                                        </g>
                                    </svg>
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body">
                                        <h5 class="card-title">Lorem ipsum.</h5>
                                        <p class="card-text text-muted">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0 h-100">
                            <div class="row g-0">
                                <div class="col-md-2 pt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                         width="35" height="35" x="0" y="0" viewBox="0 0 512 512"
                                         style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                        <g>
                                            <path fill-rule="evenodd"
                                                  d="m289.319 317.717-123.471-71.936a64.764 64.764 0 0 0-51.308-.047l-39.779 16.433v151.22c19.685-5.825 38.282-4.74 58.568 6.007l71.6 37.929c16.3 8.637 33.042 11.473 50.868 6.7L476.082 405a37 37 0 0 0-19.153-71.481L322.6 369.508a48.409 48.409 0 0 1-5.262 13.111 49.054 49.054 0 0 1-66.877 17.667L184.5 361.859a7.981 7.981 0 1 1 8-13.813l65.955 38.427c16.519 9.624 35.408 3.49 45.357-12.335a41.127 41.127 0 0 0-14.5-56.421zm68.325-171.379h-40.685c5.682-15.989 19.254-30.04 37.2-30.04 13.416 0 24.618 7.9 31.735 18.874a7.975 7.975 0 0 0 13.375-8.688c-10.035-15.473-26.319-26.186-45.11-26.186-27 0-47.2 21.288-53.939 46.04h-10.91a8 8 0 0 0 0 16h8.362a77.779 77.779 0 0 0 0 8.109h-8.362a8 8 0 0 0 0 16h10.91c6.738 24.752 26.935 46.04 53.939 46.04 18.791 0 35.075-10.713 45.11-26.186a7.975 7.975 0 0 0-13.375-8.688c-7.118 10.975-18.318 18.874-31.735 18.874-17.95 0-31.522-14.051-37.2-30.04h40.685a8 8 0 0 0 0-16H313.7a62.69 62.69 0 0 1 0-8.109h43.943a8 8 0 0 0 0-16zm-8.9-100.665a120.72 120.72 0 1 0 120.719 120.72 120.72 120.72 0 0 0-120.715-120.72zm0 212.784a92.065 92.065 0 1 1 92.064-92.065 92.065 92.065 0 0 1-92.06 92.065zm-289.982-9.566v183.771a8.173 8.173 0 0 1-8.149 8.15H16.648a8.172 8.172 0 0 1-8.148-8.15V248.891a8.171 8.171 0 0 1 8.148-8.149h33.965a8.172 8.172 0 0 1 8.149 8.149z"
                                                  fill="#fa4d0a" data-original="#fa4d0a"></path>
                                        </g>
                                    </svg>
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body">
                                        <h5 class="card-title">Lorem ipsum.</h5>
                                        <p class="card-text text-muted">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit.
                                            Suscipit, delectus.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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

                                                <p class="text-muted fst-italic">"{!! $testimonial->feedback_text !!}"</p>
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

