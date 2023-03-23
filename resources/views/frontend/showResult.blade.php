@extends('frontend.layout.master_frontend')
@section('show.frontend')

    <!-- header hero start -->
    <section class="result-header-hero">
        <div class="container ticket-booking-home-header-hero-container">
            <div class="row gy-4 ticket-booking-home-header-hero-content">
                <div
                    class="col-12 ticket-booking-home-header-search-ticket-form d-flex flex-column justify-content-end">
                    <form class="row g-3 pt-3 pb-5 px-2" action="{{route('frontend.show.result')}}" method="post">
                        @csrf
                        <!-- travelling route start -->
                        <div class="col-md-5 col-xl-2 hero-input-with-icon mt-4">
                            <label for="inputtext1" class="form-label pb-2">Travelling Route</label>

                            <select name="starting_point" class="form-control select2" data-toggle="select2" id="busCompanyy">
                                <option selected>Starting Point</option>
                                @foreach($froms as $from)
                                    <option value="{{$from->starting_point}}" {{isset($sessionData['starting_point']) ? 'selected':''}}>{{$from->starting_point}}</option>
                                @endforeach

                            </select>

                            <i class="fa fa-map-marker"></i>
                        </div>

                        <div class="col-md-2 col-xl-1 d-flex align-items-end">
                            <button type="submit" class="form-control">
                                <i class="fa fa-refresh"></i>
                            </button>
                        </div>
                        <div class="col-md-5 col-xl-2 d-flex align-items-end hero-input-with-icon">
                            <select name="arrival_point" class="form-control select2" data-toggle="select2" id="busCompanyy">
                                <option selected>Destination Point</option>
                                @foreach($tos as $to)
                                    <option value="{{$to->arrival_point}}" {{isset($sessionData['arrival_point']) ? 'selected':''}}>{{$to->arrival_point}}</option>
                                @endforeach
                            </select>
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <!-- travelling route end -->
                        <!-- travelling date start -->
                        <div class="col-md-3 col-xl-2 hero-input-with-icon mt-4">
                            <label for="inputtext3" class="form-label pb-2">Travelling Date</label>
                            <input name="dateOfJourney"
                                   value="{{isset($sessionData['dateOfJourney']) ? $sessionData['dateOfJourney']: $sessionData['dateOfJourney']}}"
                                   type="datetime-local"
                                   min="{{ $min_date->format('Y-m-d\TH:i:s') }}"
                                   max="{{ $max_date->format('Y-m-d\TH:i:s') }}"
                                   class="form-control" id="inputtext3" placeholder="MM/DD/YY">

                        </div>
                        <div class="col-md-3 col-xl-2 d-flex align-items-end hero-input-with-icon mt-4">
                            <input name="returnOfDate"
                                   value="{{isset($sessionData['returnOfDate']) ? $sessionData['returnOfDate']:''}}"
                                   type="datetime-local"
                                   min="{{ $min_date->format('Y-m-d\TH:i:s') }}"
                                   max="{{ $max_date->format('Y-m-d\TH:i:s') }}"
                                   class="form-control" id="inputtext4" placeholder="One Way">

                        </div>
                        <!-- travelling date end -->
                        <!-- travelling person start -->
                        <div class="col-md-3 col-xl-2 hero-input-with-icon mt-4 hide-numberType-icon">
                            <label for="inputtext5" class="form-label pb-2">Travelling Persons</label>
                            <input name="totalPerson"
                                   value="{{isset($sessionData['totalPerson']) ? $sessionData['totalPerson']:''}}"
                                   type="number"
                                   class="form-control" id="inputtext5" placeholder="1 Adult">
                            <i class="fa fa-caret-down"></i>
                        </div>
                        <div
                            class="col-md-3 col-xl-1 d-flex align-items-end hero-input-with-icon mt-4 hide-numberType-icon">
                            <input name="totalKids"
                                   value="{{isset($sessionData['totalKids']) ? $sessionData['totalKids']:''}}"
                                   type="number"
                                   class="form-control" id="inputtext4" placeholder="0 Kids">
                            <i class="fa fa-caret-down"></i>
                        </div>

                        <!-- travelling person end -->
                        <div class="col-md-9 d-flex ">

                        </div>
                        <div class="col-md-3 d-flex pt-5 ">
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


    <!-- main start -->
    <main class="">
        <!-- ticket processing steps start-->
        <section class="results-steps">
            <div class="container py-2">
                <div class="row gx-5">
                    <div class="col-3 d-flex align-items-center results-single-current-steps">
                        <p><span class="number-round me-2 triangle-red">1</span> TICKETS</p>
                        <div class="white-triangle"></div>
                        <div class="red-triagl"></div>
                    </div>
                    <div class="col-3 results-single-next-steps">
                        <p class="ps-4"><span class="number-round triangle-black">2</span> PASSENGERS</p>
                        <div class="black-triagl">
                        </div>
                        <div class="inner-triangle"></div>
                    </div>
                    <div class="col-3 results-single-next-steps">
                        <p class="ps-4"><span class="number-round triangle-black">3</span> PAYMENT</p>
                        <div class="black-triagl"></div>
                        <div class="inner-triangle"></div>
                    </div>
                    <div class="col-3 results-single-next-steps">
                        <p class="ps-4"><span class="number-round  triangle-black">4</span> VALIDATION</p>

                    </div>
                </div>
            </div>
        </section>
        <!-- ticket processing steps end-->
        <!-- all ticket start-->
        <section class="all-ticket mt-5">
            <div class="container  pt-5">
                <div class="row g-5">
                    <div class="col-md-4 order-2 order-md-1 all-ticket-left-colum">
                        <div class="row">
                            <div class="row all-ticket-left-colum-upper-part mb-2">
                                <div class="card all-ticket-left-colum-upper-part rounded-0">
                                    <h4
                                        class="text-center text-light pt-4 fw-normal all-ticket-left-colum-upper-part-title">
                                        Filter by
                                    </h4>
                                    <div class="custom-card-body pt-4">
                                        <div class="">
                                            <h5 class="text-light fw-normal ps-0">Coach Type</h5>
                                            <div class="form-check form-switch py-2">
                                                <input class="form-check-input small text-danger  ps-0" type="checkbox"
                                                       role="switch" id="flexSwitchCheckDefault">
                                                <label class="form-check-label text-light small"
                                                       for="flexSwitchCheckDefault">Third class sleeping</label>
                                            </div>
                                            <div class="form-check form-switch pb-2">
                                                <input class="form-check-input small" type="checkbox" role="switch"
                                                       id="flexSwitchCheckDefault">
                                                <label class="form-check-label text-light small"
                                                       for="flexSwitchCheckDefault">Second class sleeping</label>
                                            </div>
                                            <div class="form-check form-switch pb-2">
                                                <input class="form-check-input small " type="checkbox" role="switch"
                                                       id="flexSwitchCheckDefault">
                                                <label class="form-check-label text-light small"
                                                       for="flexSwitchCheckDefault">First class sleeping</label>
                                            </div>
                                            <div class="form-check form-switch pb-2">
                                                <input class="form-check-input small" type="checkbox" role="switch"
                                                       id="flexSwitchCheckDefault">
                                                <label class="form-check-label text-light small"
                                                       for="flexSwitchCheckDefault">Comfortable</label>
                                            </div>
                                            <div class="form-check form-switch pb-2">
                                                <input class="form-check-input small" type="checkbox" role="switch"
                                                       id="flexSwitchCheckDefault">
                                                <label class="form-check-label text-light small"
                                                       for="flexSwitchCheckDefault">Third class non reserved </label>
                                            </div>
                                            <div class="form-check form-switch pb-2">
                                                <input class="form-check-input small" type="checkbox" role="switch"
                                                       id="flexSwitchCheckDefault">
                                                <label class="form-check-label text-light small"
                                                       for="flexSwitchCheckDefault">Sedentary carriage</label>
                                            </div>
                                            <div class="form-check form-switch pb-2">
                                                <input class="form-check-input small" type="checkbox" role="switch"
                                                       id="flexSwitchCheckDefault" checked>
                                                <label class="form-check-label text-light small"
                                                       for="flexSwitchCheckDefault">All</label>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <div class="">
                                                <h5 class="text-light fw-normal ps-0 mb-0">Departure / Arrive time</h5>
                                                <div>
                                                    <label for="customRange1" class="form-label"></label>
                                                    <input type="range" class="form-range" id="customRange1">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <div class="">
                                                <h5 class="text-light fw-normal ps-0 mb-0">Price</h5>
                                                <div>
                                                    <label for="customRange1" class="form-label"></label>
                                                    <input type="range" class="form-range" id="customRange1">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row all-ticket-left-colum-middle-part mb-3 mt-5">
                                <h4 class="">
                                    Recent Tickets
                                </h4>
                                @foreach(recentTickets() as $tickets)
                                    <div class=" card rounded-0 recent-ticket-card mt-4">
                                        <div class="py-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6 class="mb-0">{{$tickets->starting_point}}</h6>

                                                </div>
                                                <div class="col-6 text-end">
                                                    <h6 class="mb-0">{{$tickets->arrival_point}}</h6>

                                                </div>
                                            </div>
                                            <div class="row d-flex align-items-center mt-4">
                                                <div class="col-6">
                                                    <ul class="d-flex">
                                                        <li class="text-muted">
                                                            <i class="fa fa-wifi" aria-hidden="true"></i>
                                                        </li>
                                                        <li class="text-muted ">
                                                            <i class="fa fa-moon-o" aria-hidden="true"></i>
                                                        </li>
                                                        <li class="text-muted">
                                                            <i class="fa fa-coffee" aria-hidden="true"></i>
                                                        </li>

                                                    </ul>
                                                </div>

                                                <div class="col-6">
                                                    <p class="small-text text-muted text-end mb-0 d-flex justify-content-end">from
                                                        <span class="ticket-price text-danger">
                                                        ${{$tickets->ticket_price}}
                                                    </span>
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="row all-ticket-left-colum-lower-part mt-5">
                                <h4 class="">
                                    Recent Posts
                                </h4>
                                <div class=" pt-4">

                                    @foreach(blogPosts() as $post)

                                        <a href="javascript:void(0)" class="row py-4">
                                            <div class="col-4  image-container">
                                                <img class="img-fluid"
                                                     src="{{\Illuminate\Support\Facades\Storage::url($post->post_image)}}"
                                                     alt="blog post">
                                            </div>
                                            <div class="col-8 px-0">
                                                <h6>{{$post->post_title}}</h6>
                                                <p class="fst-italic">{{$post->created_at->format('d M Y')}}</p>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 order-1 order-md-2 available-all-ticket">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="result-found">10 of 12 found</p>
                            <div>
                                <select class="result-select text-muted border-1 " aria-label="Default select example">
                                    <option selected class="">Short by time</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <select class="result-select text-muted border-1" aria-label="Default select example">
                                    <option selected>Show 5 tickets on page</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>

                        @foreach($searchResults as $searchResult)

                            <div class="row available-all-ticket-content pt-3">
                                <div class="col-md-3 card rounded-0 pt-4 all-ticket-card-left">
                                    <i class="fa fa-universal-access all-ticket-card-left-icon text-center"></i>
                                    <div class="my-4">
                                        <h5 class="card-title text-center">{{$searchResult->busDetails->bus_coach}}</h5>
                                        <h6 class="card-title text-center">{{$searchResult->busDetails->bus_type}}</h6>
                                        <p class="card-title text-center">Seat- {{$searchResult->available_seat}}</p>
                                        <p class="card-text text-center text-muted">{{$searchResult->busDetails->busCompany->bus_company}}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 card rounded-0 all-ticket-card-middle">
                                    <div class="card-body px-0">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="all-ticket-card-middle-left-colum">
                                                <h5>{{$searchResult->departure_time}}</h5>
                                                <small class="small-text">{{isset($sessionData['dateOfJourney']) ? \Carbon\Carbon::parse($sessionData['dateOfJourney'])->format('d-m-Y') :''}}</small>
                                                <h6 class="small">{{$searchResult->starting_point}}</h6>

                                            </div>
                                            <div
                                                class="d-flex flex-column justify-content-center all-ticket-card-middle-middle-colum">

                                                <p class="text-center"><i class="fa fa-long-arrow-right text-muted"></i>
                                                </p>
                                            </div>
                                            <div class=" all-ticket-card-middle-right-colum">

                                                <h5>{{date("g:i a", strtotime(\Carbon\Carbon::parse($searchResult->departure_time)->addHours($searchResult->arrival_time)))}}</h5>
                                                <small class="small-text">{{isset($sessionData['dateOfJourney']) ? \Carbon\Carbon::parse($sessionData['dateOfJourney'])->addHour($searchResult->arrival_time)->format('d-m-Y') :''}}</small>
                                                <h6 class="small">{{$searchResult->arrival_point}}</h6>
{{--                                                <small class="small-text">Union Station,CA</small>--}}
                                            </div>
                                        </div>

                                        @if($sessionData['returnOfDate'])
                                            <div class="d-flex align-items-center justify-content-between mt-4">
                                                <div class="all-ticket-card-middle-left-colum">
                                                    <h5>{{date("g:i a", strtotime(\Carbon\Carbon::parse($searchResult->departure_time)->addHours($searchResult->arrival_time )))}}</h5>
                                                    <small class="small-text">{{isset($sessionData['returnOfDate']) ? \Carbon\Carbon::parse($sessionData['returnOfDate'])->format('d-m-Y') :''}}</small>
                                                    <h6 class="small">{{$searchResult->arrival_point}}</h6>
{{--                                                    <small class="small-text">Peen Station,NY</small>--}}
                                                </div>
                                                <div
                                                    class="d-flex flex-column justify-content-center all-ticket-card-middle-middle-colum">
{{--                                                    <p class="text-muted small text-center">11:30</p>--}}
                                                    <p class="text-center"><i class="fa fa-long-arrow-left text-muted"></i>
                                                    </p>
                                                </div>
                                                <div class="all-ticket-card-middle-right-colum">
                                                    <h5>{{$searchResult->departure_time }}</h5>
                                                    <small class="small-text">{{isset($sessionData['returnOfDate']) ? \Carbon\Carbon::parse($sessionData['returnOfDate'])->addHour($searchResult->arrival_time)->format('d-m-Y') :''}}</small>
                                                    <h6 class="small">{{$searchResult->starting_point}}</h6>
{{--                                                    <small class="small-text">Peen Station,NY</small>--}}
                                                </div>
                                            </div>
                                        @endif


                                    </div>
                                </div>

                                <div class="col-md-3 card rounded-0 all-ticket-card-right pt-4">
                                    <div class="all-ticket-card-right-content">
                                        <p class="text-muted"><span>${{$searchResult->ticket_price}} </span>/person</p>

                                    </div>
                                    <ul class="d-flex">
                                        <li class="text-muted">
                                            <i class="fa fa-wifi" aria-hidden="true"></i>
                                        </li>
                                        <li class="text-muted">
                                            <i class="fa fa-moon-o" aria-hidden="true"></i>
                                        </li>
                                        <li class="text-muted">
                                            <i class="fa fa-coffee" aria-hidden="true"></i>
                                        </li>
                                        <li class="text-muted">
                                            <i class="fa fa-rocket" aria-hidden="true"></i>
                                        </li>
                                    </ul>
                                    <form action="{{route('frontend.add.passenger.list')}}" method="get" >

                                        <input type="hidden" name="bus_id" id="" value="{{$searchResult->id}}">
                                        <button type="submit" class="btn btn-primary mt-3">Book Now</button>
                                    </form>

                                </div>
                            </div>
                        @endforeach



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

                </div>
            </div>
            </div>
        </section>
        <!-- all ticket end-->


    </main>
    <!-- main end -->

@endsection

