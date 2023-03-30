@extends('frontend.layout.master_frontend')
@section('show.frontend')

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/css/ion.rangeSlider.min.css">
    <style>
        .range-price li {
            width: calc(50% - 5px);

        }

        .range-price li input {
            width: 100%;
            height: 35px;
            padding: 0 10px;
            border: 1px solid #fff;
        }


        .irs--round .irs-bar {
            background-color: #00C2C0;
        }

        .irs--round .irs-handle {
            background-color: #00C2C0;
            border-color: #00C2C0;
            box-shadow: 0px 0px 0px 5px rgba(0, 194, 192, 0.2);
        }

        .irs--round .irs-handle.state_hover,
        .irs--round .irs-handle:hover {
            background-color: #00C2C0;
        }

        .irs--round .irs-handle {
            width: 16px;
            height: 16px;
            top: 29px
        }

        .irs--round .irs-from,
        .irs--round .irs-to,
        .irs--round .irs-single {
            background-color: transparent;
            color: #fff;
        }

        .irs--round .irs-from:before,
        .irs--round .irs-to:before,
        .irs--round .irs-single:before,
        .irs--round .irs-min,
        .irs--round .irs-max {
            display: none;
        }
    </style>
    <!-- header hero start -->
    <section class="result-header-hero">
        <div class="container ticket-booking-home-header-hero-container">
            <div class="row gy-4 ticket-booking-home-header-hero-content">
                <div
                    class="col-12 ticket-booking-home-header-search-ticket-form d-flex flex-column justify-content-end">

                    <form class="row g-3 pt-3 pb-5 px-2" action="{{route('frontend.show.result')}}" method="get">

                        <!-- travelling route start -->
                        <div class="col-md-5 col-xl-2 hero-input-with-icon mt-4">
                            <label for="inputtext1" class="form-label pb-2">Travelling Route</label>

                            <select name="starting_point" class="form-control select2" data-toggle="select2"
                                    id="busFrom">
                                <option selected>Starting Point</option>
                                @foreach($froms as $from)
                                    <option
                                        value="{{$from->starting_point}}" {{isset($sessionData['starting_point']) && $from->starting_point===$sessionData['starting_point'] ? 'selected':''}}>{{$from->starting_point}}</option>
                                @endforeach

                            </select>

                            <i class="fa fa-map-marker"></i>
                        </div>

                        <div class="col-md-2 col-xl-1 d-flex align-items-end">
                            <button type="submit" class="form-control btnSwap">
                                <i class="fa fa-refresh"></i>
                            </button>
                        </div>
                        <div class="col-md-5 col-xl-2 d-flex align-items-end hero-input-with-icon">
                            <select name="arrival_point" class="form-control select2" data-toggle="select2"
                                    id="busTo">
                                <option selected>Destination Point</option>
                                @foreach($tos as $to)
                                    <option
                                        value="{{$to->arrival_point}}" {{isset($sessionData['arrival_point']) && $to->arrival_point===$sessionData['arrival_point'] ? 'selected':''}}>{{$to->arrival_point}}</option>
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
                                   class="form-control" id="dateOfJourney" placeholder="MM/DD/YY">

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
                                   class="form-control" id="totalPerson" placeholder="1 Adult">

                        </div>
                        <div
                            class="col-md-3 col-xl-1 d-flex align-items-end hero-input-with-icon mt-4 hide-numberType-icon">
                            <input name="totalKids"
                                   value="{{isset($sessionData['totalKids']) ? $sessionData['totalKids']:''}}"
                                   type="number"
                                   class="form-control" id="inputtext4" placeholder="0 Kids">

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
                <div class="row">
                    <div class="col-4 all-ticket-left-colum">
                        <div class="row">

                            <form action="{{route('frontend.show.result.page')}}" method="get">
                                <div class="row all-ticket-left-colum-upper-part mb-2">
                                    <div class="card all-ticket-left-colum-upper-part rounded-0">
                                        <h4
                                            class="text-center text-light pt-4 fw-normal all-ticket-left-colum-upper-part-title">
                                            Filter by
                                        </h4>
                                        <div class="row  card-body pt-4">
                                            <div class="row ">
                                                <h5 class="text-light fw-normal ps-0">Coach Type</h5>

                                                <div class="form-check form-switch pb-2">
                                                    <input name="Ac" class="form-check-input small ps-0 ac" value="Ac"
                                                           type="checkbox"
                                                           id="flexSwitchCheckDefault">
                                                    <label class="form-check-label text-light small ps-2"
                                                           for="flexSwitchCheckDefault">Ac</label>
                                                </div>
                                                <div class="form-check form-switch pb-2">
                                                    <input name="nonAc" class="form-check-input small ps-0 nonAc"
                                                           value="Non-Ac" type="checkbox"
                                                           id="flexSwitchCheckDefault">
                                                    <label class="form-check-label text-light small ps-2"
                                                           for="flexSwitchCheckDefault">Non Ac</label>
                                                </div>
                                                <div class="form-check form-switch pb-2">
                                                    <input name="all" class="form-check-input small ps-0 all"
                                                           value="all"
                                                           type="checkbox"
                                                           id="flexSwitchCheckDefault">
                                                    <label class="form-check-label text-light small ps-2"
                                                           for="flexSwitchCheckDefault">All</label>
                                                </div>
                                            </div>

                                            <div class="row ">
                                                <h5 class="text-light fw-normal ps-0">Bus Company</h5>
                                                @foreach($allBusCompanies as $busCompany)

                                                    <div class="form-check form-checkbox-success mb-2">
                                                        <input type="checkbox" name="busCompany[]"
                                                               value="{{$busCompany->bus_company}}"
                                                               class="form-check-input customCheckcolor2"
                                                               id="customCheckcolor2.{{$busCompany->bus_company}}">
                                                        <label class="form-check-label text-light small ps-2"
                                                               for="customCheckcolor2">{{$busCompany->bus_company}}</label>
                                                    </div>

                                                @endforeach


                                            </div>

                                            <div class="row mt-3">
                                                <div class="row ">
                                                    <h5 class="text-light fw-normal ps-0 mb-0">Price</h5>
                                                    <div>

                                                        <input type="range" class="js-range-slider" name="priceRange"
                                                               value=""
                                                               data-skin="round"
                                                               data-type="double"
                                                               data-min="{{$minTicketPrice[0]->minPrice}}"
                                                               data-max="{{$maxTicketPrice[0]->maxPrice}}"
                                                               data-grid="false"
                                                               id="customRange1"
                                                        />

                                                        <ul class="d-flex range-price align-items-center justify-content-between mt-2">
                                                            <li>
                                                                <label class="text-white">Min Price</label>
                                                                <input name="maxPrice" type="number"
                                                                       id="busMinTicketPrice" maxlength="4"
                                                                       value="{{$minTicketPrice[0]->minPrice}}"
                                                                       class="from" onchange="myFun()"/>
                                                            </li>
                                                            <li>
                                                                <label class="text-white">Max Price</label>
                                                                <input name="minPrice" type="number"
                                                                       id="busMaxTicketPrice" maxlength="4"
                                                                       value="{{$maxTicketPrice[0]->maxPrice}}"
                                                                       class="to"/>
                                                            </li>
                                                        </ul>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>


                            <div class="row all-ticket-left-colum-middle-part mb-3 mt-5">
                                <h4 class="">
                                    Recent Tickets
                                </h4>
                                @foreach(recentTickets() as $tickets)
                                    <div class=" card rounded-0 recent-ticket-card mt-4">
                                        <div class="row  card-body pt-4">
                                            <div class="row ">
                                                <div class="col-6">
                                                    <h6 class="mb-0">{{$tickets->starting_point}}</h6>

                                                </div>
                                                <div class="col-6 text-end">
                                                    <h6 class="mb-0">{{$tickets->arrival_point}}</h6>

                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-6">
                                                    <ul class="d-flex">
                                                        <li class="pe-2 text-muted small">
                                                            <i class="fa fa-wifi" aria-hidden="true"></i>
                                                        </li>
                                                        <li class="pe-2 text-muted small">
                                                            <i class="fa fa-moon-o" aria-hidden="true"></i>
                                                        </li>
                                                        <li class="pe-2 text-muted small">
                                                            <i class="fa fa-coffee" aria-hidden="true"></i>
                                                        </li>

                                                    </ul>
                                                </div>

                                                <div class="col-6">
                                                    <p class="small-text text-muted text-end">from
                                                        <span class="fs-3 text-danger">
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
                                <div class="all-ticket-left-colum-lower-part pt-4">

                                    @foreach(blogPosts() as $post)

                                        <a href="{{route('single.posts',$post->id)}}" class="row py-4">
                                            <div class="col-4 image-container">
                                                <img class="img-fluid"
                                                     src="{{\Illuminate\Support\Facades\Storage::url($post->post_image)}}"
                                                     alt="blog post">
                                            </div>
                                            <div class="col-8">
                                                <h6>{{$post->post_title}}</h6>
                                                <p class="fst-italic">{{$post->created_at->format('d M Y')}}</p>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-8 available-all-ticket">
                        <div class="d-flex justify-content-between">
                            <p>10 of 12 found</p>
                            <div>
                                <select class="small text-muted border-1" aria-label="Default select example">
                                    <option selected>Show 5 tickets on page</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>

                        <div id="available-all-ticket-content">

                            @foreach($searchResults as $searchResult)
                                <div class="row available-all-ticket-content pt-3">
                                    <div class="col-3 card rounded-0 border-end-0 pt-4 all-ticket-card-left">
                                        <i class="fa fa-universal-access all-ticket-card-left-icon text-center"></i>
                                        <div class="card-body">
                                            <h5 class="card-title text-center">{{$searchResult->busDetails->bus_coach}}</h5>
                                            <h6 class="card-title text-center">{{$searchResult->busDetails->bus_type}}</h6>
                                            <p class="card-title text-center">
                                                Seat- {{$searchResult->available_seat}}</p>
                                            <p class="card-text text-center text-muted">{{$searchResult->busDetails->busCompany->bus_company}}</p>
                                        </div>
                                    </div>
                                    <div class="col-6 card rounded-0 all-ticket-card-middle">
                                        <div class="row  card-body">
                                            <div class="row">
                                                <div class="col-4 all-ticket-card-middle-left-colum">
                                                    <h5>{{date("g:i a",strtotime(\Carbon\Carbon::parse($searchResult->departure_time)))}}</h5>
                                                    <small
                                                        class="small-text">{{isset($sessionData['dateOfJourney']) ? \Carbon\Carbon::parse($sessionData['dateOfJourney'])->format('d-m-Y') :''}}</small>
                                                    <h6 class="small">{{$searchResult->starting_point}}</h6>

                                                </div>
                                                <div
                                                    class="col-4 d-flex flex-column justify-content-center all-ticket-card-middle-middle-colum">

                                                    <p class="text-center"><i
                                                            class="fa fa-long-arrow-right text-muted"></i>
                                                    </p>
                                                </div>
                                                <div class="col-4 all-ticket-card-middle-right-colum">

                                                    <h5>{{date("g:i a", strtotime(\Carbon\Carbon::parse($searchResult->departure_time)->addHours($searchResult->arrival_time)))}}</h5>
                                                    <small
                                                        class="small-text">{{isset($sessionData['dateOfJourney']) ? \Carbon\Carbon::parse($sessionData['dateOfJourney'])->addHour($searchResult->arrival_time)->format('d-m-Y') :''}}</small>
                                                    <h6 class="small"> {{$searchResult->arrival_point}}</h6>

                                                </div>
                                            </div>


                                            @if(isset($sessionData['returnOfDate']))
                                                <div class="row mt-4">
                                                    <div class="col-4 all-ticket-card-middle-left-colum">
                                                        <h5>{{date("g:i a", strtotime(\Carbon\Carbon::parse($searchResult->departure_time)->addHours()))}}</h5>
                                                        <small
                                                            class="small-text">{{isset($sessionData['returnOfDate']) ? \Carbon\Carbon::parse($sessionData['returnOfDate'])->format('d-m-Y') :''}}</small>
                                                        <h6 class="small">{{$searchResult->arrival_point}}</h6>
                                                        {{--                                                    <small class="small-text">Peen Station,NY</small>--}}
                                                    </div>
                                                    <div
                                                        class="col-4 d-flex flex-column justify-content-center all-ticket-card-middle-middle-colum">
                                                        {{--                                                    <p class="text-muted small text-center">11:30</p>--}}
                                                        <p class="text-center"><i
                                                                class="fa fa-long-arrow-left text-muted"></i>
                                                        </p>
                                                    </div>
                                                    <div class="col-4 all-ticket-card-middle-right-colum">
                                                        {{--                                                    <h5>{{$searchResult->departure_time }}</h5>--}}
                                                        <h5>{{date("g:i a", strtotime(\Carbon\Carbon::parse($searchResult->departure_time)->addHours($searchResult->arrival_time)))}}</h5>
                                                        <small
                                                            class="small-text">{{isset($sessionData['returnOfDate']) ? \Carbon\Carbon::parse($sessionData['returnOfDate'])->addHour($searchResult->arrival_time)->format('d-m-Y') :''}}</small>
                                                        <h6 class="small">{{$searchResult->starting_point}}</h6>
                                                        {{--                                                    <small class="small-text">Peen Station,NY</small>--}}
                                                    </div>
                                                </div>
                                            @endif

                                        </div>
                                    </div>

                                    <div class="col-3 card rounded-0 border-start-0 all-ticket-card-right pt-4">
                                        <div class="all-ticket-card-right-content">
                                            <p class="text-muted small"><span>${{$searchResult->ticket_price}} </span>/person
                                            </p>

                                        </div>
                                        <ul class="d-flex">
                                            <li class="pe-2 text-muted small">
                                                <i class="fa fa-wifi" aria-hidden="true"></i>
                                            </li>
                                            <li class="pe-2 text-muted small">
                                                <i class="fa fa-moon-o" aria-hidden="true"></i>
                                            </li>
                                            <li class="pe-2 text-muted small">
                                                <i class="fa fa-coffee" aria-hidden="true"></i>
                                            </li>
                                            <li class="pe-2 text-muted small">
                                                <i class="fa fa-rocket" aria-hidden="true"></i>
                                            </li>
                                        </ul>

                                        <form action="{{route('frontend.add.passenger.list')}}" method="get">

                                            <input type="hidden" name="bus_id" id="" value="{{$searchResult->id}}">
                                            <button type="submit" class="btn btn-primary mt-3">Book Now</button>
                                        </form>

                                    </div>
                                </div>
                            @endforeach
                        </div>


                        <!-- Pagination -->
                        <nav aria-label="Page navigation example">
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
            integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/js/ion.rangeSlider.min.js"></script>
    <script>
        let $range = $(".js-range-slider"),
            $from = $(".from"),
            $to = $(".to"),
            range,
            min = $range.data('min'),
            max = $range.data('max'),
            from,
            to;

        let updateValues = function () {
            $from.prop("value", from);
            $to.prop("value", to);
        };

        $range.ionRangeSlider({
            onChange: function (data) {
                from = data.from;
                to = data.to;
                updateValues();
            }
        });

        range = $range.data("ionRangeSlider");
        let updateRange = function () {
            range.update({
                from: from,
                to: to
            });
        };

        $from.on("input", function () {
            from = +$(this).prop("value");
            if (from < min) {
                from = min;
            }
            if (from > to) {
                from = to;
            }
            updateValues();
            updateRange();
        });

        $to.on("input", function () {
            to = +$(this).prop("value");
            if (to > max) {
                to = max;
            }
            if (to < from) {
                to = from;
            }
            updateValues();
            updateRange();
        });
    </script>

    <script>
        $(document).on('change', '#customRange1', function (e) {
            //console.log(e.target.value);
            let arrival_point = $('#busTo').val();
            let starting_point = $('#busFrom').val();
            let dateOfJourney = $('#dateOfJourney').val();
            let totalPerson = $('#totalPerson').val();
            let priceRange = e.target.value;
            // console.log(priceRange);
            let busMinTicketPrice = $('#busMinTicketPrice').val();
            let busMaxTicketPrice = $('#busMaxTicketPrice').val();


            $.get('{{ route('frontend.show.result') }}', {


                    busMinTicketPrice: busMinTicketPrice,
                    busMaxTicketPrice: busMaxTicketPrice,
                    starting_point: starting_point,
                    arrival_point: arrival_point,
                    dateOfJourney: dateOfJourney,
                    totalPerson: totalPerson,

                },
                function (response, status) {
                    //$('.all-ticket').find('nav').remove();
                    $('#available-all-ticket-content').html(response.html)
                });


        })

        let value = [];
        $(document).on('click', '.all', function (e) {

            value.push(e.target.value);
            let arrival_point = $('#busTo').val();
            let starting_point = $('#busFrom').val();
            let dateOfJourney = $('#dateOfJourney').val();
            let totalPerson = $('#totalPerson').val();
            //console.log(value);
            $.get('{{ route('frontend.show.result') }}',
                {
                    value: value,
                    starting_point: starting_point,
                    arrival_point: arrival_point,
                    dateOfJourney: dateOfJourney,
                    totalPerson: totalPerson,

                },
                function (response, status) {
                    // $('.all-ticket').remove();
                    $('#available-all-ticket-content').html(response.html)
                });
        });

        let ac = [];
        $(document).on('click', '.ac', function (e) {

            ac.push(e.target.value);
            //let nonAc= $('input[name="Non-Ac"]').val();
            let arrival_point = $('#busTo').val();
            let starting_point = $('#busFrom').val();
            let dateOfJourney = $('#dateOfJourney').val();
            let totalPerson = $('#totalPerson').val();
            //console.log(ac);

            $.get('{{ route('frontend.show.result') }}',
                {
                    ac: ac,
                    starting_point: starting_point,
                    arrival_point: arrival_point,
                    dateOfJourney: dateOfJourney,
                    totalPerson: totalPerson,

                },
                function (response, status) {
                    //$('.all-ticket').find('nav').remove();
                    $('#available-all-ticket-content').html(response.html)
                });
        });

        let nonAc = [];
        $(document).on('click', '.nonAc', function (e) {
            nonAc.push(e.target.value);
            //let nonAc= $('input[name="Non-Ac"]').val();
            let arrival_point = $('#busTo').val();
            let starting_point = $('#busFrom').val();
            let dateOfJourney = $('#dateOfJourney').val();
            let totalPerson = $('#totalPerson').val();

            //console.log(nonAc);

            $.get('{{ route('frontend.show.result') }}',
                {
                    nonAc: nonAc,
                    starting_point: starting_point,
                    arrival_point: arrival_point,
                    dateOfJourney: dateOfJourney,
                    totalPerson: totalPerson,

                },
                function (response, status) {
                    //$('.all-ticket').find('nav').remove();
                    $('#available-all-ticket-content').html(response.html)
                });
        });

        let busCompany = [];
        $(document).on('click', '.customCheckcolor2', function (e) {

            // $('.customCheckcolor2').change(function () {
            //     this.checked
            //         ? alert ("Checked")
            //         : alert ("Unchecked");
            // });
            //let busCompany= [e.target.value];

            if (this.checked) {

                busCompany.push(e.target.value);
                let arrival_point = $('#busTo').val();
                let starting_point = $('#busFrom').val();
                let dateOfJourney = $('#dateOfJourney').val();
                let totalPerson = $('#totalPerson').val();
                console.log(busCompany);


                $.get('{{ route('frontend.show.result') }}',
                    {
                        busCompany: busCompany,
                        starting_point: starting_point,
                        arrival_point: arrival_point,
                        dateOfJourney: dateOfJourney,
                        totalPerson: totalPerson,

                    },
                    function (response, status) {

                        //$('.all-ticket').find('nav').remove();
                        $('#available-all-ticket-content').html(response.html)
                    });
            }else {

                busCompany.pop(e.target.value);
                //busCompany.push(e.target.value);
                let arrival_point = $('#busTo').val();
                let starting_point = $('#busFrom').val();
                let dateOfJourney = $('#dateOfJourney').val();
                let totalPerson = $('#totalPerson').val();
                console.log(busCompany);


                $.get('{{ route('frontend.show.result') }}',
                    {
                        busCompany: busCompany,
                        starting_point: starting_point,
                        arrival_point: arrival_point,
                        dateOfJourney: dateOfJourney,
                        totalPerson: totalPerson,

                    },
                    function (response, status) {

                        //$('.all-ticket').find('nav').remove();
                        $('#available-all-ticket-content').html(response.html)
                    });

            }


        });


        $(document).on('click', '.btnSwap', function (e) {
            e.preventDefault();

            /* Store the list of depatures and arrivals as they are */
            let $departures = $('#busFrom option');
            let $arrivals = $('#busTo option');

            /* Store the selected values */
            let departure = $('#busFrom option:checked').text();
            let arrival = $('#busTo option:checked').text();

            /* Swap the option lists */
            $('#busTo').append($departures);
            $('#busFrom').append($arrivals);

            /* Re-set the selected values */
            $('#busTo option:contains(' + departure + ')').prop('selected', true);
            $('#busFrom option:contains(' + arrival + ')').prop('selected', true);
        });


    </script>

@endsection

