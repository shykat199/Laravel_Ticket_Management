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
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($singlePost->post_image) }}"
                            alt="blog details image">
                    </div>
                    <div class="row single-blog-details-content-left-middle-part">
                        <h2>
                           {{$singlePost->post_title}}
                        </h2>
                        <p>
                            {{strip_tags($singlePost->post_description) }}
                        </p>
                    </div>
                </div>
                <div class="col-4 single-blog-details-content-right">
                    <div class="single-blog-details-content-right-upper-part
                    ">
                        <h4>Category </h4>
                        @foreach($allCategories as $category)
                            <div class="single-blog-details-content-right-upper-part-image-part">
                                <div class="single-blog-details-category-content">
                                    <a href="javascript:void(0)" class="single-blog-details-category">
                                        <p class="text-dark">{{$category->category_name}}</p>
                                    </a>
                                </div>
                        </div>
                        @endforeach

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
