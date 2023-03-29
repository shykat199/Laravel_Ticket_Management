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

                @foreach($allBlogs as $blog)
                    <a href="{{ route('single.posts',$blog->id) }}" class="col all-blog-single-card ">
                        <div class="card border-0 h-100 shadow-lg">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($blog->post_image) }}" class="card-img-top" alt="card image">
                            <div class="card-body">
                                <h5 class="card-title">{{Str::limit($blog->post_title,60,'....')}}</h5>
                                <h6 class="text-danger">Category : {{$blog->category->category_name}}</h6   >
                                <p class="card-text">{{Str::limit(strip_tags($blog->post_description),190,'...')}}</p>
                                <div class="d-flex justify-content-between align-items-center writter-info">
                                    <h6 class="mb-0">by <span> Admin</span></h6>
                                    <p class="mb-0">{{\Carbon\Carbon::parse($blog->created_at)->format('d M Y')}}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
{{--                    @if($allBlogs->hasPages())--}}
{{--                        <div class="pagination-wrapper">--}}
{{--                            {{ $allBlogs->links() }}--}}
{{--                        </div>--}}
{{--                    @endif--}}
            </div>
            <nav class="custome-pagination" aria-label="Page navigation example">
                <ul class="pagination justify-content-center pt-5 mt-5 custome-pagination-list">
{{--                    <li class="page-item custom-page-item mx-3">--}}
{{--                        <a class="page-link pagination-item  rounded-pill" href="#" aria-label="Previous">--}}
{{--                            <span aria-hidden="true">&laquo;</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="page-item custom-page-item mx-3 "><a class="page-link pagination-item rounded-pill"--}}
{{--                            href="#">1</a>--}}
{{--                    </li>--}}
{{--                    <li class="page-item mx-3"><a class="page-link pagination-item rounded-pill" href="#">2</a>--}}
{{--                    </li>--}}
{{--                    <li class="page-item mx-3"><a class="page-link  pagination-item rounded-pill" href="#">3</a>--}}
{{--                    </li>--}}
{{--                    <li class="page-item mx-3">--}}
{{--                        <a class="page-link rounded-pill pagination-item" href="#" aria-label="Next">--}}
{{--                            <span aria-hidden="true">&raquo;</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

                    @if($allBlogs->hasPages())
                        <div class="pagination-wrapper">
                            {{ $allBlogs->links() }}
                        </div>
                    @endif

                </ul>
            </nav>
        </div>

    </section>
    <!-- all blog card end -->


@endsection
