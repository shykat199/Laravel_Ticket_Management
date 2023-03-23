@extends('frontend.layout.master_frontend')
@section('show.frontend')
    <!-- all blog hero start -->
    <section class="blog-hero d-flex align-items-center justify-content-center py-5">
        <div class="container py-5 all-blog-hero-content">
            <div class="d-flex flex-column align-items-center justify-content-center all-blog-hero-content-left">
                <h3 class="text-light">All BLogs</h3>
                <div class="d-flex align-items-center">
                    <h5 class="text-danger mb-0">Home</h5>
                    <i class="fa fa-angle-double-right text-light px-3"></i>
                    <h5 class="text-light mb-0">All Blogs</h5>
                </div>
            </div>
        </div>
    </section>
    <!-- all blog hero end -->
    <!-- all blog card start -->
    <section class="all-blog-card mt-5">
        <div class="container pt-5">
            <div class="row row-cols-sm-2 row-cols-1 row-cols-md-3 g-4">
                <a href="{{ route('single.posts') }}" class="col all-blog-single-card ">
                    <div class="card border-0 h-100 shadow-lg">
                        <img src="{{ asset('frontend/assets/images/newyork.jpg') }}" class="card-img-top" alt="card image">
                        <div class="card-body">
                            <h5 class="card-title">New York Trips 2023</h5>
                            <h6 class="text-danger">Category : xyz</h6>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium
                                sapiente corporis adipisci ipsam. Tenetur hic voluptate deserunt minima, quae assumenda?</p>
                            <div class="d-flex justify-content-between align-items-center writter-info">
                                <h6 class="mb-0">by <span> Admin</span></h6>
                                <p class="mb-0">14 Mar 2023</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="col all-blog-single-card">
                    <div class="card border-0 h-100 shadow-lg">
                        <img src="{{ asset('frontend/assets/images/los-angels') }}.jpg" class="card-img-top"
                            alt="card image">
                        <div class="card-body">
                            <h5 class="card-title">Los-Angels Trips 2023</h5>
                            <h6 class="text-danger">Category : xyz</h6>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium
                                sapiente corporis adipisci ipsam. Tenetur hic voluptate deserunt minima, quae assumenda?</p>
                            <div class="d-flex justify-content-between align-items-center writter-info">
                                <h6 class="mb-0">by <span> Admin</span></h6>
                                <p class="mb-0">14 Mar 2023</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="col all-blog-single-card">
                    <div class="card border-0 h-100 shadow-lg">
                        <img src="{{ asset('frontend/assets/images/chicago.jpg') }}" class="card-img-top" alt="card image">
                        <div class="card-body">
                            <h5 class="card-title">Chicago Trips 2023</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium
                                sapiente corporis adipisci ipsam. Tenetur hic voluptate deserunt minima, quae assumenda?</p>
                            <div class="d-flex justify-content-between align-items-center writter-info">
                                <h6 class="mb-0">by <span> Admin</span></h6>
                                <p class="mb-0">14 Mar 2023</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="col all-blog-single-card">
                    <div class="card border-0 h-100 shadow-lg">
                        <img src="{{ asset('frontend/assets/images/top-summer-detination.jpg') }}" class="card-img-top"
                            alt="card image">
                        <div class="card-body">
                            <h5 class="card-title">Summer Trips from 2023</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium
                                sapiente corporis adipisci ipsam. Tenetur hic voluptate deserunt minima, quae assumenda?</p>
                            <div class="d-flex justify-content-between align-items-center writter-info">
                                <h6 class="mb-0">by <span> Admin</span></h6>
                                <p class="mb-0">14 Mar 2023</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="col all-blog-single-card">
                    <div class="card border-0 h-100 shadow-lg">
                        <img src="{{ asset('frontend/assets/images/top-ten-train-station.jpg') }}" class="card-img-top"
                            alt="card image">
                        <div class="card-body">
                            <h5 class="card-title">Top10 best train Routes</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium
                                sapiente corporis adipisci ipsam. Tenetur hic voluptate deserunt minima, quae assumenda?</p>
                            <div class="d-flex justify-content-between align-items-center writter-info">
                                <h6 class="mb-0">by <span> Admin</span></h6>
                                <p class="mb-0">14 Mar 2023</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="col all-blog-single-card">
                    <div class="card border-0 h-100 shadow-lg">
                        <img src="{{ asset('frontend/assets/images/top-travel-destination.jpg') }}" class="card-img-top"
                            alt="card image">
                        <div class="card-body">
                            <h5 class="card-title">Best travel destination</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium
                                sapiente corporis adipisci ipsam. Tenetur hic voluptate deserunt minima, quae assumenda?</p>
                            <div class="d-flex justify-content-between align-items-center writter-info">
                                <h6 class="mb-0">by <span> Admin</span></h6>
                                <p class="mb-0">14 Mar 2023</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="col all-blog-single-card">
                    <div class="card border-0 h-100 shadow-lg">
                        <img src="{{ asset('frontend/assets/images/new-train-destition.jpg') }}" class="card-img-top"
                            alt="card image">
                        <div class="card-body">
                            <h5 class="card-title">New train destination</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium
                                sapiente corporis adipisci ipsam. Tenetur hic voluptate deserunt minima, quae assumenda?</p>
                            <div class="d-flex justify-content-between align-items-center writter-info">
                                <h6 class="mb-0">by <span> Admin</span></h6>
                                <p class="mb-0">14 Mar 2023</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="col all-blog-single-card ">
                    <div class="card border-0 h-100 shadow-lg">
                        <img src="{{ asset('frontend/assets/images/newyork.jpg') }}" class="card-img-top"
                            alt="card image">
                        <div class="card-body">
                            <h5 class="card-title">New York Trips 2023</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium
                                sapiente corporis adipisci ipsam. Tenetur hic voluptate deserunt minima, quae assumenda?</p>
                            <div class="d-flex justify-content-between align-items-center writter-info">
                                <h6 class="mb-0">by <span> Admin</span></h6>
                                <p class="mb-0">14 Mar 2023</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="col all-blog-single-card">
                    <div class="card border-0 h-100 shadow-lg">
                        <img src="{{ asset('frontend/assets/images/los-angels') }}.jpg" class="card-img-top"
                            alt="card image">
                        <div class="card-body">
                            <h5 class="card-title">Los-Angels Trips 2023</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium
                                sapiente corporis adipisci ipsam. Tenetur hic voluptate deserunt minima, quae assumenda?</p>
                            <div class="d-flex justify-content-between align-items-center writter-info">
                                <h6 class="mb-0">by <span> Admin</span></h6>
                                <p class="mb-0">14 Mar 2023</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="col all-blog-single-card">
                    <div class="card border-0 h-100 shadow-lg">
                        <img src="{{ asset('frontend/assets/images/chicago.jpg') }}" class="card-img-top"
                            alt="card image">
                        <div class="card-body">
                            <h5 class="card-title">Chicago Trips 2023</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium
                                sapiente corporis adipisci ipsam. Tenetur hic voluptate deserunt minima, quae assumenda?</p>
                            <div class="d-flex justify-content-between align-items-center writter-info">
                                <h6 class="mb-0">by <span> Admin</span></h6>
                                <p class="mb-0">14 Mar 2023</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="col all-blog-single-card">
                    <div class="card border-0 h-100 shadow-lg">
                        <img src="{{ asset('frontend/assets/images/top-summer-detination.jpg') }}" class="card-img-top"
                            alt="card image">
                        <div class="card-body">
                            <h5 class="card-title">Summer Trips from 2023</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium
                                sapiente corporis adipisci ipsam. Tenetur hic voluptate deserunt minima, quae assumenda?</p>
                            <div class="d-flex justify-content-between align-items-center writter-info">
                                <h6 class="mb-0">by <span> Admin</span></h6>
                                <p class="mb-0">14 Mar 2023</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="javascript:void(0)" class="col all-blog-single-card">
                    <div class="card border-0 h-100 shadow-lg">
                        <img src="{{ asset('frontend/assets/images/top-ten-train-station.jpg') }}" class="card-img-top"
                            alt="card image">
                        <div class="card-body">
                            <h5 class="card-title">Top10 best train Routes</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium
                                sapiente corporis adipisci ipsam. Tenetur hic voluptate deserunt minima, quae assumenda?</p>
                            <div class="d-flex justify-content-between align-items-center writter-info">
                                <h6 class="mb-0">by <span> Admin</span></h6>
                                <p class="mb-0">14 Mar 2023</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Pagination -->
            <nav aria-label="Page navigation example ">
                <ul class="pagination pt-5 justify-content-center custom-design-for-pagination">
                    <li class=" page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

    </section>
    <!-- all blog card end -->
@endsection
