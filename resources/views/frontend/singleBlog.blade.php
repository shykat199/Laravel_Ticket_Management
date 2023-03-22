@extends('frontend.layout.master_frontend')
@section('show.frontend')
      {{-- single blog start --}}
    <!-- single blog hero start -->
    <section class="blog-hero d-flex align-items-center justify-content-center py-5">
        <div class="container py-5 all-blog-hero-content">
            <div class="d-flex flex-column align-items-center justify-content-center all-blog-hero-content-left">
                <h3 class="text-light">BLogs Details</h3>
                <div class="d-flex align-items-center">
                    <h5 class="text-danger mb-0">Home</h5>
                    <i class="fa fa-angle-double-right text-light px-3"></i>
                    <h5 class="text-light mb-0">Blogs Details</h5>
                </div>
            </div>
        </div>
    </section>
    <!-- single blog hero end -->
    <!-- single blog details start-->
    <section class="single-blog-details my-5">
        <div class="container py-5 single-blog-details-content">
            <div class="row">
                <div class="col-8 single-blog-details-content-left">
                    <div class="row single-blog-details-content-left-upper-part">
                        <img src="{{ asset('frontend/assets/images/top-summer-detination.jpg') }}"
                            alt="blog details image">
                    </div>
                    <div class="row single-blog-details-content-left-middle-part">
                        <h2>
                            Summer Trips from 2023
                        </h2>
                        <p>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci accusamus aperiam,
                            atque eum sint architecto nihil ullam, nesciunt ipsum suscipit assumenda nisi, eaque
                            doloremque! Non nobis corporis, perspiciatis esse id consequatur aspernatur deleniti
                            accusamus, corrupti dolorum cumque ipsa repellat mollitia natus illo dolore laudantium
                            at perferendis vel atque sapiente sequi. Facere tempore est nemo ad vel iure
                            perspiciatis voluptate in dolores quaerat aut libero dolor, fugiat mollitia quidem
                            quibusdam temporibus veniam omnis assumenda deleniti, excepturi modi repudiandae
                            accusamus repellat. Omnis ullam culpa aspernatur esse assumenda placeat officiis eos sed
                            ratione, magni, molestias corporis veniam vel recusandae perferendis corrupti illo
                            excepturi quisquam. Adipisci quasi recusandae quia aut nisi nam doloremque saepe, ipsa
                            dolores nesciunt soluta at voluptas suscipit esse numquam, facilis nobis cumque earum
                            ipsum vero eos. Consectetur iure beatae velit, nihil consequuntur similique quis
                            repellendus quam. Placeat soluta a saepe laboriosam quibusdam voluptate quasi ab beatae
                            praesentium, quis eligendi natus.
                        </p>
                    </div>
                </div>
                <div class="col-4 single-blog-details-content-right">
                    <div class="single-blog-details-content-right-upper-part
                    ">
                        <h4>Category </h4>
                        <div class="single-blog-details-content-right-upper-part-image-part">
                            <div class="single-blog-details-category-content">
                                <a href="javascript:void(0)" class="single-blog-details-category">
                                    <img src="{{ asset('frontend/assets/images/new-train-destition.jpg') }}"
                                        class="card-img-top" alt="card image">
                                    <p>New Train Destination</p>
                                </a>
                            </div>
                            <div class="single-blog-details-category-content">
                                <a href="javascript:void(0)" class="single-blog-details-category">
                                    <img src="{{ asset('frontend/assets/images/top-travel-destination.jpg') }}"
                                        class="card-img-top" alt="card image">
                                    <p>Top Travel Destination</p>
                                </a>
                            </div>
                            <div class="single-blog-details-category-content">
                                <a href="javascript:void(0)" class="single-blog-details-category">
                                    <img src="{{ asset('frontend/assets/images/top-ten-train-station.jpg') }}"
                                        class="card-img-top" alt="card image">
                                    <p>Top Ten Train Route</p>
                                </a>
                            </div>

                        </div>

                    </div>
                    <div class="single-blog-details-content-right-last-part">
                        <div
                            class="d-flex align-items-center flex-column  justify-content-center single-blog-details-content-right-last-part-text-content">
                            <h3>
                                Want To Book Your Ticket ?
                            </h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, velit numquam iure
                                deleniti nihil perspiciatis.
                            </p>
                            <div class="">
                                <button type="submit" class="btn btn-danger text-light fw-semibold rounded-1 ">Book
                                    Now
                                    <i class="fa fa-long-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- room full details end-->
    {{-- single blog end --}}
@endsection
