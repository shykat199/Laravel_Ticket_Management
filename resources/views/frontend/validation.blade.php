@extends('frontend.layout.master_frontend')
@section('show.frontend')

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
{{--                            @dd($sessionData)--}}
                                <input name="dateOfJourney"
                                       value="{{!empty($sessionData) && isset($sessionData['dateOfJourney']) ? $sessionData['dateOfJourney']: (isset($sessionData)?$sessionData['dateOfJourney']:'')}}"
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
        <!-- processing steps start-->
        <section class="validation-steps">
            <div class="container passenger-results-steps-container py-2">
                <div class="row gx-5">
                    <div class="col-3 results-single-current-steps">
                        <p><span class="number-round me-2 triangle-red">1</span> TICKETS</p>
                        <div class="white-triangle"></div>
                        <div class="red-triagl"></div>
                    </div>
                    <div class="col-3 results-single-current-steps">
                        <p class="ps-4"><span class="number-round triangle-red">2</span> PASSENGERS</p>
                        <div class="white-triangle2"></div>
                        <div class="red-triagl2"></div>
                    </div>
                    <div class="col-3 results-single-current-steps">
                        <p class="ps-4"><span class="number-round">3</span> PAYMENT</p>
                        <div class="white-triangle3"></div>
                        <div class="red-triagl3"></div>
                    </div>
                    <div class="col-3 results-single-next-steps">
                        <p class="ps-4"><span class="number-round  triangle-black">4</span> VALIDATION</p>

                    </div>
                </div>
            </div>
        </section>
        <!-- processing steps end-->
        <!-- all processing start-->
        <section class="all-processing mt-5">
            <div class="container  pt-5">
                <div class="row">
                    <div class="col-4 all-processing-left-colum">
                        <div class="row">
                            <div class="row all-processing-left-colum-upper-part mb-2">
                                <div class="card all-processing-left-colum-upper-part rounded-0">
                                    <h4
                                        class="text-center text-light py-4 fw-normal all-processing-left-colum-upper-part-title">
                                        Summary
                                    </h4>
                                    <div class="row  card-body border-top   py-4">
                                        <div class="row ">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h5 class="text-light fw-normal ps-0 mb-0">
                                                    <i class="fa fa-arrow-circle-right pe-2">
                                                    </i>
                                                    There
                                                </h5>
                                                <i class="fa fa-th-large text-light"></i>
                                            </div>

                                            <div class="pt-4">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="small-text text-gray mb-0">Coach</p>

                                                    <p class="small text-light  mb-0">{{!empty($busDetails) && isset($busDetails[0][0]) ? $busDetails[0][0]->load('busDetails.busCompany')->busDetails->bus_coach : (isset($busDetails[1][0])? $busDetails[1][0]->load('busDetails.busCompany')->busDetails->bus_coach :'')}}</p>

                                                </div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="small-text text-gray mb-0">Company</p>
                                                    <p class="small text-light  mb-0">{{!empty($busDetails) && isset($busDetails[0][0])  ? $busDetails[0][0]->load('busDetails.busCompany')->busDetails->busCompany->bus_company : (isset($busDetails)?$busDetails[1][0]->load('busDetails.busCompany')->busDetails->busCompany->bus_company:'')}}</p>
                                                </div>
                                            </div>
                                            <div class="mt-4 d-flex align-items-center justify-content-between">
                                                <div class="">
                                                    <p class="text-light mb-0">
                                                        @if(!empty($busDetails))
                                                            {{date("g:i a",strtotime(\Carbon\Carbon::parse(!empty($busDetails) && isset($busDetails[0][0]) ? $busDetails[0][0]->departure_time : (isset($busDetails) ? $busDetails[1][0]->departure_time:''))))}}</p>

                                                       @endif
                                                        <p class="small-text text-light mb-0">{{!empty($sessionData) && isset($sessionData['dateOfJourney']) ? \Carbon\Carbon::parse($sessionData['dateOfJourney'])->format('d-m-Y'):''}}</p>
                                                </div>
                                                <div
                                                    class="d-flex flex-column align-items-center justify-content-center">
                                                    <i class="fa fa-long-arrow-right mb-0 text-light"></i>
                                                </div>
                                                <div class="d-flex flex-column align-items-end">
                                                    <p class="text-light mb-0">
                                                        @if(!empty($busDetails))
                                                            {{date("g:i a", strtotime(\Carbon\Carbon::parse(!empty($busDetails) && isset($busDetails[0][0]) ? $busDetails[0][0]->departure_time : (isset($busDetails)?$busDetails[1][0]->departure_time:''))->addHours(isset($busDetails[0][0]) ? $busDetails[0][0]->arrival_time : (isset($busDetails)?$busDetails[1][0]->arrival_time:''))))}}


                                                    </p>

                                                    <p class="small-text text-light mb-0">{{ Carbon\Carbon::parse((\Carbon\Carbon::parse(isset($sessionData['dateOfJourney'])?$sessionData['dateOfJourney']:'')->format('Y-m-d') . ' ' .(\Carbon\Carbon::parse(!empty($busDetails) && isset($busDetails[0][0])?$busDetails[0][0]->departure_time :(isset($busDetails)? $busDetails[1][0]->departure_time:''))->format('H:i'))))
                                                    ->addHours(!empty($busDetails) && isset($busDetails[0][0])?$busDetails[0][0]->arrival_time :(isset($busDetails)?$busDetails[1][0]->arrival_time:''))->format('d-m-Y') }}</p>

                                                    @endif
                                                </div>
                                            </div>
                                            <div class="pt-4">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="small text-light mb-0">{{isset($sessionData['starting_point']) ? $sessionData['starting_point']:''}}</p>
                                                    <p class="small text-light  mb-0">{{isset($sessionData['arrival_point']) ? $sessionData['arrival_point']:''}}</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    @if(isset($sessionData['returnOfDate'])?$sessionData['returnOfDate']:'')

                                        <div class="row  card-body border-top py-4">
                                            <div class="row ">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h5 class="text-light fw-normal ps-0 mb-0">
                                                        <i class="fa fa-arrow-circle-left pe-2">
                                                        </i>
                                                        Back
                                                    </h5>
                                                    <i class="fa fa-th-large text-light"></i>
                                                </div>
                                                <div class="pt-4">
                                                    {{--                                                    @dd($busDetails)--}}
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <p class="small-text text-gray mb-0">Coach</p>
                                                        <p class="small text-light  mb-0">{{isset($busDetails[1][0]) ? $busDetails[1][0]->busDetails->bus_coach :''}}</p>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <p class="small-text text-gray mb-0">Company</p>
                                                        <p class="small text-light  mb-0">{{isset($busDetails[1][0]) ? $busDetails[1][0]->busDetails->busCompany->bus_company :''}}</p>
                                                    </div>
                                                </div>
                                                <div class="mt-4 d-flex align-items-center justify-content-between">
                                                    <div class="">
                                                        {{--                                                        class="text-light mb-0">{{isset($busDetails->departure_time) ? $busDetails->departure_time:''}}--}}
                                                        <p class="text-light mb-0"> {{date("g:i a", strtotime(\Carbon\Carbon::parse(isset($busDetails[1][0])?$busDetails[1][0]->departure_time :'')))}}</p>
                                                        <p class="small-text text-light mb-0">{{isset($sessionData['returnOfDate']) ? \Carbon\Carbon::parse($sessionData['returnOfDate'])->format('d-m-Y'):''}}</p>
                                                    </div>
                                                    <div
                                                        class="d-flex flex-column align-items-center justify-content-center">
                                                        <i class="fa fa-long-arrow-right mb-0 text-light"></i>
                                                    </div>
                                                    <div class="d-flex flex-column align-items-end">
                                                        <p class="text-light mb-0">{{date("g:i a", strtotime(\Carbon\Carbon::parse(isset($busDetails[1][0])?$busDetails[1][0]->departure_time:'')->addHours(isset($busDetails[1][0])?$busDetails[1][0]->arrival_time:'')))}}</p>
                                                        {{--                                                        @dd($busDetails)--}}
                                                        <p class="small-text text-light mb-0">{{ Carbon\Carbon::parse((\Carbon\Carbon::parse($sessionData['returnOfDate'])->format('Y-m-d') . ' ' .(\Carbon\Carbon::parse(isset($busDetails[1][0])?$busDetails[1][0]->departure_time :'')->format('H:i'))))->addHours(isset($busDetails[1][0])?$busDetails[1][0]->arrival_time:'')->format('d-m-Y') }}</p>

                                                    </div>
                                                </div>

                                                <div class="pt-4">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <p class="small text-light mb-0">{{isset($sessionData['arrival_point']) ? $sessionData['arrival_point']:''}}</p>
                                                        <p class="small text-light  mb-0">{{isset($sessionData['starting_point']) ? $sessionData['starting_point']:''}}</p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endif


                                    <div class="row  card-body border-top  py-4">
                                        <div class="row ">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h5 class="text-light fw-normal ps-0 mb-0">
                                                    <i class="fa fa-user pe-3"></i>Passengers
                                                </h5>
                                                <i class="fa fa-th-large text-light"></i>
                                            </div>
                                            <div class="pt-4">
                                                <div class="d-flex align-items-center justify-content-between">

                                                    <div>
                                                        <p class="small-text text-gray mb-0">{{isset($sessionData['totalPerson']) ? $sessionData['totalPerson']:''}}
                                                            Adult</p>

                                                        {{--                                                        @dd(isset($sessionData['returnOfDate'])?$sessionData['returnOfDate']:'')--}}

                                                        @if(!empty($sessionData) && isset($sessionData['returnOfDate']) ? $sessionData['returnOfDate']:'')
                                                            <p class="small-text text-gray mb-0">
                                                                Return Ticket Price
                                                            </p>
                                                        @endif
                                                    </div>

                                                    <div>

                                                        <p class="small text-light  mb-0">

                                                            ${{!empty($busDetails) && isset($busDetails[0][0]) && isset($sessionData['totalPerson']) ? $busDetails[0][0]->ticket_price * $sessionData['totalPerson'] : (isset($busDetails) ? $busDetails[1][0]->ticket_price * $sessionData['totalPerson']:'') }}
                                                        </p>

                                                        {{--                                                        @dd($busDetails)--}}

                                                        @if(isset($sessionData['returnOfDate'])?$sessionData['returnOfDate']:'')
                                                            <p class="small text-light  mb-0">
                                                                {{--                                                                @dd($busDetails[1][0]->ticket_price)--}}
                                                                ${{isset($busDetails[1][0]->ticket_price) && isset($sessionData['totalPerson']) ? $busDetails[1][0]->ticket_price * $sessionData['totalPerson'] : '' }}
                                                            </p>
                                                        @endif

                                                    </div>

                                                </div>
                                                @if(isset($sessionData['totalKids']))
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <p class="small-text text-gray mb-0">{{isset($sessionData['totalKids']) ? $sessionData['totalKids']:''}}
                                                            Children</p>
                                                        <p class="small text-light  mb-0">
                                                            ${{isset($busDetails->ticket_price) && isset($sessionData['totalKids']) ? $busDetails->ticket_price * $sessionData['totalKids'] : '' }}</p>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>


                                    @if(isset($sessionData['totalKids']))
                                        <div class="row  card-body py-4">
                                            <div class="row ">
                                                <div
                                                    class="d-flex align-items-center justify-content-between text-danger">
                                                    <h5>Total</h5>
                                                    <h5>
                                                        ${{isset($busDetails[0][0]->ticket_price) && isset($sessionData['totalPerson']) && isset($sessionData['totalKids']) ?
                                                            ($busDetails[0][0]->ticket_price * $sessionData['totalPerson'])+
                                                            ($busDetails[0][0]->ticket_price * $sessionData['totalKids']) : '' }}
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>


                                    @else
                                        <div class="row  card-body py-4">
                                            <div class="row ">
                                                <div
                                                    class="d-flex align-items-center justify-content-between text-danger">
                                                    <h5>Total</h5>
                                                    @if(isset($sessionData['returnOfDate']))
                                                        {{--                                                        @dd($busDetails[0][0]->ticket_price)--}}
                                                        <h5>
                                                            ${{isset($busDetails[0][0]->ticket_price) && isset($sessionData['totalPerson']) ? ($busDetails[0][0]->ticket_price * $sessionData['totalPerson'])+
                                                            (isset($busDetails[1][0])? $busDetails[1][0]->ticket_price * $sessionData['totalPerson']:'') : '' }}
                                                        </h5>

                                                    @else
                                                        <h5>
                                                            ${{!empty($busDetails) && isset($busDetails[0][0]) && isset($sessionData['totalPerson']) ? $busDetails[0][0]->ticket_price * $sessionData['totalPerson'] : (isset($busDetails)? $busDetails[1][0]->ticket_price * $sessionData['totalPerson']:'') }}
                                                        </h5>

                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>

                    <form class="col-8" action="{{route('reservation.done')}}" method="post">
                        @csrf
                        <div class=" vailidation-container">
                            <div id="allData">
                                <div class="row vailidation-content">
                                    <div class="col-12 all-ticket-card-left">
                                        <div
                                            class="d-flex justify-content-between align-items-center py-4 px-3 border border-secondary-subtle rounded-0 first-passenger">
                                            <h5 class="d-flex align-items-center mb-0">
                                                Bus
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-between border-0 rounded-0">
                                            <div
                                                class="col-3 card rounded-0 border-secondary-subtle border-end-0 pt-4 validation-train-card-left">
                                                <i class="fa fa-universal-access all-ticket-card-left-icon text-center"></i>
                                                <div class="card-body">

                                                    <h5 class="card-title text-center">{{ !empty($busDetails) && isset($busDetails[0][0]) ? $busDetails[0][0]->busDetails->bus_coach : (isset($busDetails)?$busDetails[1][0]->busDetails->bus_coach:'')}}</h5>
                                                    <p class="card-text text-center text-muted">{{!empty($busDetails) && isset($busDetails[0][0])?$busDetails[0][0]->busDetails->busCompany->bus_company:(isset($busDetails)?$busDetails[1][0]->busDetails->busCompany->bus_company:'')}}</p>
                                                </div>
                                            </div>
                                            <div
                                                class="col-6 card border-secondary-subtle rounded-0 validation-train-card-middle">
                                                <div class="row  card-body">
                                                    <div class="row">
                                                        <div class="col-4 all-ticket-card-middle-left-colum">

                                                            <p class="small-text text-light mb-0"></p>
                                                            @if(!empty($busDetails))
                                                                <h5>{{date("g:i a",strtotime(\Carbon\Carbon::parse(!empty($busDetails) && isset($busDetails[0][0])?$busDetails[0][0]->departure_time:(isset($busDetails)?$busDetails[1][0]->departure_time:''))))}}</p></h5>

                                                            @endif
                                                            <small
                                                                class="small-text">{{isset($sessionData['dateOfJourney']) ? \Carbon\Carbon::parse($sessionData['dateOfJourney'])->format('d-m-Y'):''}}
                                                            </small>

                                                            <p class="small text-light  mb-0"></p>
                                                            <h6 class="small">{{isset($sessionData['starting_point']) ? $sessionData['starting_point']:''}}</h6>

                                                        </div>
                                                        <div
                                                            class="col-4 d-flex flex-column justify-content-center all-ticket-card-middle-middle-colum">
                                                            <p class="text-center"><i
                                                                    class="fa fa-long-arrow-right text-muted"></i>
                                                            </p>
                                                        </div>
                                                        <div class="col-4 all-ticket-card-middle-right-colum">
                                                            @if(!empty($busDetails))
                                                                <h5>{{date("g:i a", strtotime(\Carbon\Carbon::parse(!empty($busDetails) && isset($busDetails[0][0])?$busDetails[0][0]->departure_time: (isset($busDetails)?$busDetails[1][0]->departure_time:''))->addHours(!empty($busDetails) && isset($busDetails[0][0]) ? $busDetails[0][0]->arrival_time :  (isset($busDetails)?$busDetails[1][0]->arrival_time:''))))}}</h5>

                                                            <small class="small-text">{{Carbon\Carbon::parse((\Carbon\Carbon::parse(isset($sessionData['dateOfJourney'])?$sessionData['dateOfJourney']:'')->format('Y-m-d') . ' ' .(\Carbon\Carbon::parse(!empty($busDetails) && isset($busDetails[0][0]->departure_time)?$busDetails[0][0]->departure_time:(isset($busDetails)?$busDetails[1][0]->departure_time:''))->format('H:i'))))->addHours(!empty($busDetails) && isset($busDetails[0][0]->arrival_time)?$busDetails[0][0]->arrival_time:(isset($busDetails)?$busDetails[1][0]->arrival_time:''))->format('d-m-Y')}}</small>

                                                                @if(isset($sessionData['arrival_point']) && $sessionData['arrival_point']!==null)
                                                                    <h6 class="small">{{isset($sessionData['arrival_point']) ? $sessionData['arrival_point']:''}}</h6>

                                                                @endif
                                                            @endif
                                                        </div>
                                                    </div>



                                                    @if(isset($sessionData['returnOfDate']))
                                                        <div class="row mt-4">
                                                            <div class="col-4 all-ticket-card-middle-left-colum">
                                                                @if(isset($busDetails[1][0]->departure_time) && $busDetails[1][0]->departure_time!==null)
                                                                    <h5>{{date("g:i a", strtotime(\Carbon\Carbon::parse(isset($busDetails[1][0]->departure_time)?$busDetails[1][0]->departure_time:'')))}}</h5>

                                                                @endif
                                                                <small class="small-text">{{isset($sessionData['returnOfDate']) ? \Carbon\Carbon::parse($sessionData['returnOfDate'])->format('d-m-Y'):''}}</small>
                                                                <h6 class="small">{{isset($sessionData['arrival_point']) ? $sessionData['arrival_point']:''}}</h6>

                                                            </div>
                                                            <div
                                                                class="col-4 d-flex flex-column justify-content-center all-ticket-card-middle-middle-colum">
                                                                <p class="text-center"><i
                                                                        class="fa fa-long-arrow-right text-muted"></i>
                                                                </p>
                                                            </div>

                                                            <div class="col-4 all-ticket-card-middle-right-colum">

                                                                <h5> {{date("g:i a", strtotime(\Carbon\Carbon::parse(isset($busDetails[1][0]->departure_time)?$busDetails[1][0]->departure_time:'')->addHours(isset($busDetails[1][0]->arrival_time)?$busDetails[1][0]->arrival_time:'')))}}</h5>


                                                                <small class="small-text">{{ Carbon\Carbon::parse((\Carbon\Carbon::parse($sessionData['returnOfDate'])->format('Y-m-d') . ' ' .(\Carbon\Carbon::parse(isset($busDetails[1][0]->departure_time)?$busDetails[1][0]->departure_time:'')->format('H:i'))))->addHours(isset($busDetails[1][0]->arrival_time)?$busDetails[1][0]->arrival_time:'')->format('d-m-Y') }}</small>

                                                                <h6 class="small">{{isset($sessionData['starting_point']) ? $sessionData['starting_point']:''}}</h6>

                                                            </div>
                                                        </div>

                                                    @endif

                                                </div>
                                            </div>
                                            <div
                                                class="col-3 card border-secondary-subtle rounded-0 border-start-0 validation-train-card-right pt-4">
                                                <div
                                                    class="all-ticket-card-right-content  d-flex justify-content-end me-3">
                                                    <div>
{{--                                                        @dd($busDetails)--}}

                                                        <p class="text-muted small">
                                                            <span>${{!empty($busDetails) && isset($busDetails[0][0]->ticket_price) ? $busDetails[0][0]->ticket_price:(isset($busDetails)? $busDetails[1][0]->ticket_price:'')}} </span>/person
                                                        </p>

                                                        @if(isset($sessionData['returnOfDate'])?$sessionData['returnOfDate']:'')
                                                            <p class="text-muted small">
                                                                <span>${{isset($busDetails[1][0]->ticket_price) ? $busDetails[1][0]->ticket_price:''}} </span>/person
                                                            </p>
                                                        @endif
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row vailidation-content pt-4">
                                    <div class="col-12 all-ticket-card-left">
                                        <div
                                            class="d-flex justify-content-between align-items-center py-4 px-3 border border-secondary-subtle rounded-0 first-passenger">
                                            <h5 class="d-flex align-items-center mb-0">
                                                Passengers
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex border-0 rounded-0 ">
                                            <div class="col-9 border border-secondary-subtle  rounded-0 px-3">
                                                {{--{{dd($sessionPassengerData['users'])}}--}}
                                                @php
                                                    $idx=1;
                                                @endphp
                                                @if(isset($sessionPassengerData['users']) && $sessionPassengerData!==null)
                                                    @foreach( $sessionPassengerData['users'] as $key=>$data)
                                                        <div class="row border-top">
                                                            <div class="col-12 py-3 passenger-details">
                                                                <h6>Adult {{$idx++}}</h6>
                                                                <ul class="passenger-details-list">
                                                                    <li class="pt-2">
                                                                        <strong class="lavel">Name</strong>
                                                                        <span
                                                                            class="text-muted">{{$data["'first_name'"]}} {{$data["'last_name'"]}}</span>
                                                                    </li>
                                                                    <li class="pt-2">
                                                                        <strong class="lavel">Age</strong>
                                                                        <span
                                                                            class="text-muted">{{$data["'age'"]}}</span>
                                                                    </li>
                                                                    <li class="pt-2">
                                                                        <strong class="lavel">Document</strong>
                                                                        <span
                                                                            class="text-muted">{{$data["'document_type'"]}} of {{$data["'citizenship'"]}} {{$data["'document_number'"]}}</span>
                                                                    </li>
                                                                    <li class="pt-2">
                                                                        <strong class="lavel">Baggage</strong>
                                                                        <span
                                                                            class="text-muted d-flex d-block justify-content-between">
                                                                    {{$data["'additional_baggage'"]}}
                                                            </span>
                                                                    </li>
                                                                    <li class="pt-2">
                                                                        <strong class="lavel"></strong>
                                                                        <span
                                                                            class="text-muted d-flex d-block justify-content-between">
                                                                       <strong>Equipment</strong> {{$data["'equipment'"]}}
                                                                        <br>
                                                                        <strong>Animal</strong>  {{$data["'animal_type'"]}}
                                                                </span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif


                                            </div>
                                            <div
                                                class="col-3 border border-start-0 border-secondary-subtle  rounded-0 pt-3">
                                                @if(isset($busDetails->ticket_price) && $busDetails->ticket_price!==null)
                                                    <div
                                                        class="all-ticket-card-right-content  d-flex justify-content-end me-3">
                                                        <p class="text-danger fs-1">${{isset($busDetails->ticket_price) && isset($sessionData['totalPerson']) && isset($sessionData['totalKids']) ?
                                                            ($busDetails->ticket_price * $sessionData['totalPerson'])+
                                                            ($busDetails->ticket_price * $sessionData['totalKids']) :  ($busDetails->ticket_price * $sessionData['totalPerson']) }}
                                                        </p>
                                                    </div>
                                                @endif


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex border-0 rounded-0 ">
                                            <div class="col-9 border border-secondary-subtle  rounded-0 px-3">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row vailidation-content pt-4">
                                    <div class="col-12 all-ticket-card-left">
                                        <div
                                            class="d-flex justify-content-between align-items-center py-4 px-3 border border-secondary-subtle rounded-0 first-passenger">
                                            <h5 class="d-flex align-items-center mb-0">
                                                Payment
                                            </h5>
                                        </div>
                                    </div>

                                    <div class="12">
                                        <div class="d-flex border-0 rounded-0 ">
                                            <div class="col-9 border border-secondary-subtle  rounded-0 px-3">
                                                <div class="row">
                                                    <div class="col-12 py-3 passenger-details">
                                                        <h6>Personal information</h6>

                                                        @if(!empty($paymentDetails))
                                                            <ul class="passenger-details-list">
                                                                <li class="pt-2">
                                                                    <strong class="lavel">Name</strong>
                                                                    <span
                                                                        class="text-muted">{{$paymentDetails['f_name']}} {{$paymentDetails['l_name']}}</span>
                                                                </li>
                                                                <li class="pt-2">
                                                                    <strong class="lavel">Date of Birth</strong>
                                                                    <span
                                                                        class="text-muted">{{$paymentDetails['dob']}}</span>
                                                                </li>
                                                                <li class="pt-2">
                                                                    <strong class="lavel">Email</strong>
                                                                    <span
                                                                        class="text-muted">{{$paymentDetails['email']}}</span>
                                                                </li>

                                                            </ul>
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="row border-top">
                                                    <div class="col-12 py-3 passenger-details">
                                                        <h6>Card information</h6>

                                                        @if(!empty($paymentDetails))
                                                            <ul class="passenger-details-list">
                                                                <li class="pt-2">
                                                                    <strong class="lavel">Card number</strong>
                                                                    <span
                                                                        class="text-muted">{{$paymentDetails['c_number']}}</span>
                                                                </li>
                                                                <li class="pt-2">
                                                                    <strong class="lavel">Card holder Name</strong>
                                                                    <span
                                                                        class="text-muted">{{$paymentDetails['c_name']}}</span>
                                                                </li>
                                                                <li class="pt-2">
                                                                    <strong class="lavel">Expiration Date</strong>
                                                                    <span
                                                                        class="text-muted">{{$paymentDetails['ex_month']}} {{$paymentDetails['ex_year']}}</span>
                                                                </li>
                                                                <li class="pt-2">
                                                                    <strong class="lavel">CVV</strong>
                                                                    <span
                                                                        class="text-muted">{{$paymentDetails['c_vvv']}}</span>
                                                                </li>
                                                            </ul>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-3 border border-start-0 border-secondary-subtle  rounded-0 pt-4">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between pt-5  total-cost">
                                <div class="total-price">

                                    <h5>Total Cost

                                        @if(!empty($sessionData) && isset($sessionData['returnOfDate'])?$sessionData['returnOfDate']:'')
                                        <span class="text-danger fs-1">
                                                ${{!empty($busDetails) && isset($busDetails[0][0]->ticket_price) && isset($sessionData['totalPerson']) || isset($sessionData['totalKids']) ?
                                                            ($busDetails[0][0]->ticket_price * $sessionData['totalPerson'])+
                                                            ($busDetails[0][0]->ticket_price * $sessionData['totalKids'])+
                                                            (isset($busDetails)?$busDetails[1][0]->ticket_price:(isset($busDetails)?$busDetails[1][0]->ticket_price:'')):''}}

                                        </span>

                                        @else
                                            <span class="text-danger fs-1">
                                                ${{!empty($busDetails) && isset($busDetails[0][0]) && isset($sessionData['totalPerson']) || isset($sessionData['totalKids']) ?
                                                            ($busDetails[0][0]->ticket_price * $sessionData['totalPerson'])+
                                                            ($busDetails[0][0]->ticket_price * $sessionData['totalKids']):(isset($busDetails) ? $busDetails[1][0]->ticket_price:'')}}
                                            </span>
                                        @endif
                                    </h5>
                                </div>

                                @if(!\Illuminate\Support\Facades\Auth::check())
                                    <button type="button" class="py-2 btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalCenter">
                                        Log In
                                    </button>
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog " role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Please Login
                                                        form here</h5>

                                                </div>
                                                <form action="#" method="POST">
                                                    <div class="modal-body">

                                                        <div class="form-group">
                                                            <label for="user_email">Email address</label>
                                                            <input type="email" name="email" class="form-control"
                                                                   id="user_email" aria-describedby="emailHelp"
                                                                   placeholder="Enter email">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="user_pwd">Password</label>
                                                            <input type="password" name="password" class="form-control"
                                                                   id="user_pwd" placeholder="Password">
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close
                                                        </button>
                                                        <button type="button" id="but_submit" class="btn btn-primary">
                                                            Log In
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                @else
                                    <button type="submit" class="py-2 btn btn-danger">BUY
                                        TICKET
                                    </button>
                                @endif

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>

        </section>


        <!-- all processing end-->


    </main>
    <!-- main end -->

    <script>
        $(document).ready(function () {
            $("#but_submit").click(function (e) {
                e.preventDefault();
                let email = $("#user_email").val().trim();
                let password = $("#user_pwd").val().trim();
                console.log(password);

                if (email !== "" && password !== "") {

                    $.ajax({
                        url: '{{route('user.login.ajax')}}',
                        type: 'POST',
                        data: {
                            email: email,
                            password: password,
                            '_token': '{{csrf_token()}}'
                        },
                        success: function (response) {
                            console.log(response)
                            let msg = "";
                            if (response.status) {
                                window.location.reload();
                            } else {
                                console.log(msg);
                            }
                        }
                    });
                }
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
            integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
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

