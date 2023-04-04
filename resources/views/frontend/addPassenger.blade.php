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
                            <input name="dateOfJourney"
                                   value="{{isset($sessionData['dateOfJourney']) ? $sessionData['dateOfJourney']:''}}"
                                   min="{{ $min_date->format('Y-m-d\TH:i:s') }}"
                                   max="{{ $max_date->format('Y-m-d\TH:i:s') }}"
                                   type="datetime-local"
                                   class="form-control" id="inputtext3" placeholder="MM/DD/YY">

                        </div>
                        <div class="col-md-3 col-xl-2 d-flex align-items-end hero-input-with-icon mt-4">
                            <input name="returnOfDate"
                                   value="{{isset($sessionData['returnOfDate']) ? $sessionData['returnOfDate']:''}}"
                                   min="{{ $min_date->format('Y-m-d\TH:i:s') }}"
                                   max="{{ $max_date->format('Y-m-d\TH:i:s') }}"
                                   type="datetime-local"
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
        <section class="passenger-results-steps">
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
{{--                                                    @dd(isset($busDetails[0][0]) ? $busDetails[0][0] : '')--}}
{{--                                                    @dd($busDetails)--}}
                                                    <p class="small text-light  mb-0">{{isset($busDetails[0][0]) ? $busDetails[0][0]->load('busDetails.busCompany')->busDetails->bus_coach : $busDetails[1][0]->load('busDetails.busCompany')->busDetails->bus_coach}}</p>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="small-text text-gray mb-0">Company</p>
                                                    <p class="small text-light  mb-0">{{isset($busDetails[0][0])?$busDetails[0][0]->load('busDetails.busCompany')->busDetails->busCompany->bus_company :$busDetails[1][0]->load('busDetails.busCompany')->busDetails->busCompany->bus_company}}</p>
                                                </div>
                                            </div>
                                            <div class="mt-4 d-flex align-items-center justify-content-between">
                                                <div class="">
                                                    <p class="text-light mb-0">
{{--                                                        @dd($busDetails)--}}
{{--                                                        @dd($busDetails[0]->departure_time)--}}
                                                        {{date("g:i a",strtotime(\Carbon\Carbon::parse(isset($busDetails[0][0]) ? $busDetails[0][0]->departure_time : $busDetails[1][0]->departure_time)))}}</p>
                                                    <p class="small-text text-light mb-0">{{isset($sessionData['dateOfJourney']) ? \Carbon\Carbon::parse($sessionData['dateOfJourney'])->format('d-m-Y'):''}}</p>
                                                </div>
                                                <div
                                                    class="d-flex flex-column align-items-center justify-content-center">
                                                    <i class="fa fa-long-arrow-right mb-0 text-light"></i>
                                                </div>
                                                <div class="d-flex flex-column align-items-end">
                                                    <p class="text-light mb-0">

                                                        {{date("g:i a", strtotime(\Carbon\Carbon::parse(isset($busDetails[0][0]) ? $busDetails[0][0]->departure_time : $busDetails[1][0]->departure_time)->addHours(isset($busDetails[0][0])?$busDetails[0][0]->arrival_time : $busDetails[1][0]->arrival_time)))}}

                                                    </p>

                                                    <p class="small-text text-light mb-0">{{ Carbon\Carbon::parse((\Carbon\Carbon::parse(isset($sessionData['dateOfJourney'])?$sessionData['dateOfJourney']:'')->format('Y-m-d') . ' ' .(\Carbon\Carbon::parse(isset($busDetails[0][0])?$busDetails[0][0]->departure_time :$busDetails[1][0]->departure_time)->format('H:i'))))
                                                    ->addHours(isset($busDetails[0][0])?$busDetails[0][0]->arrival_time :$busDetails[1][0]->arrival_time)->format('d-m-Y') }}</p>


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

                                                        @if(isset($sessionData['returnOfDate']) ? $sessionData['returnOfDate']:'')
                                                            <p class="small-text text-gray mb-0">
                                                                Return Ticket Price
                                                            </p>
                                                        @endif
                                                    </div>

                                                    <div>

                                                        <p class="small text-light  mb-0">
{{--                                                            @dd($busDetails)--}}
                                                           ${{isset($busDetails[0][0]->ticket_price) && isset($sessionData['totalPerson']) ? $busDetails[0][0]->ticket_price * $sessionData['totalPerson'] : $busDetails[1][0]->ticket_price * $sessionData['totalPerson'] }}
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
                                                            ${{isset($busDetails[0][0]->ticket_price) && isset($sessionData['totalPerson']) ? $busDetails[0][0]->ticket_price * $sessionData['totalPerson'] : $busDetails[1][0]->ticket_price * $sessionData['totalPerson'] }}
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


                    <div class="col-8 processing-form">
                        @if(\Illuminate\Support\Facades\Session::has('error'))
                            <div class="alert  alert-danger m-2" role="alert">
                                <i class="dripicons-checkmark me-2"></i>
                                <strong>{{\Illuminate\Support\Facades\Session::get('error')}}</strong>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                        aria-label="Close"
                                        style="float: right"></button>
                            </div>
                        @endif

                        <form action="{{route('frontend.add.passenger.session')}}" method="get">

                            <div id="allData">
                                <div class="row available-all-ticket-content">
                                    <div class="col-12 border border-secondary-subtle  rounded-0  all-ticket-card-left">
                                        <div
                                            class="d-flex justify-content-between align-items-center py-4 first-passenger">
                                            <h5 class="d-flex align-items-center mb-0">
                                                <a id="collapse-uncollapse" class="collapse-uncollapse"
                                                   data-bs-toggle="collapse" href="#collapseExample" role="button"
                                                   aria-expanded="false" aria-controls="collapseExample">
                                                    <i class="fa fa-minus-circle pe-2"></i>
                                                </a>
                                                Passenger 1
                                            </h5>
                                            <button id="1st-passenger"
                                                    class="d-flex align-items-center mb-0 border-0 btn btn-light removeDate d-none">
                                                Remove
                                                <i class="fa fa-times ps-2 text-danger fs-4 "></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="collapse show" id="collapseExample">
                                        <div
                                            class="row border  border-secondary-subtle rounded-0  all-ticket-card-left py-3">
                                            <div class="col-md-4">
                                                <label for="inputFirstName" class="form-label small">First Name</label>
                                                <input type="text" name="users[0]['first_name']" class="form-control"
                                                       id="inputFirstName">
                                            </div>


                                            @error('users.*')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror

                                            <div class="col-md-4">
                                                <label for="inputLastName" class="form-label small">Last Name</label>
                                                <input type="text" name="users[0]['last_name']" class="form-control"
                                                       id="inputLastName">
                                            </div>

                                            @error('users.*')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror

                                            <div class="col-md-4">
                                                <label for="ageNumber" class="form-label small">Age</label>
                                                <input type="number" name="users[0]['age']" class="form-control"
                                                       id="ageNumber">
                                            </div>
                                            <div class="col-md-4 py-4">
                                                <div class="form-check d-flex align-items-center">
                                                    <input name="users[0]['user_mobility'] "
                                                           class="form-check-input rounded-0 p-3"
                                                           type="checkbox"
                                                           id="gridCheck">
                                                    <label class="form-check-label small ps-4" for="gridCheck">
                                                        Reduced mobility
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="row border border-top-0 border-secondary-subtle rounded-0  all-ticket-card-left py-3">
                                            <div class="col-md-4">
                                                <label for="documentType" class="form-label small">Document Type</label>
                                                <select id="documentType" name="users[0]['document_type']"
                                                        class="form-select">
                                                    <option selected>Select Document</option>
                                                    @foreach(documents() as $doc)
                                                        <option value="{{$doc}}">{{$doc}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="documentNumber" class="form-label small">Document
                                                    Number</label>
                                                <input type="number" name="users[0]['document_number']"
                                                       class="form-control"
                                                       id="documentNumber">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="citizenship" class="form-label small">Citizenship</label>
                                                <select id="citizenship" name="users[0]['citizenship']"
                                                        class="form-select">
                                                    <option selected>Select Citizenship</option>
                                                    @foreach(nationals() as $nation)
                                                        <option value="{{$nation}}">{{$nation}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div
                                            class="row border border-top-0 border-secondary-subtle rounded-0 all-ticket-card-left pt-3 pb-4">
                                            <div class="col-md-4">
                                                <label for="additionalBaggage" class="form-label small">Additional
                                                    Baggage</label>
                                                <select id="additionalBaggage" name="users[0]['additional_baggage']"
                                                        class="form-select">
                                                    <option selected>Select Baggage</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="animals" class="form-label small">Animals</label>
                                                <select id="animals" name="users[0]['animal_type']" class="form-select">
                                                    <option selected>Select Animal</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="equipment" class="form-label small">Equipment</label>
                                                <select id="equipment" name="users[0]['equipment']" class="form-select">
                                                    <option selected>Select Equipment</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="row py-4">
                                <div id="appendData" class="col-12 card rounded-0  all-ticket-card-left">
                                    <div class="d-flex justify-content-between align-items-center py-4">
                                        <h5 class="d-flex align-items-center mb-0">
                                            New Passenger
                                        </h5>
                                        <button type="button" class="d-flex align-items-center mb-0 btn btn-light">Add
                                            <i class="fa fa-plus ps-2 text-danger" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class=" row d-flex align-items-center justify-content-end">
                                <button type="submit" class="col-4 py-2 btn btn-danger">BUY
                                    TICKET
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- all processing end-->


    </main>
    <!-- main end -->
    <script>
        {{--        @if (isset($sessionData['totalPerson']) && isset($sessionData['totalKids']))--}}
        {{--            $sessionData['totalPerson'] + $sessionData['totalKids']--}}
        {{--        @elseif(isset($sessionData['totalPerson']))--}}
        {{--            $sessionData['totalPerson']--}}
        {{--        @else--}}
        {{--            --}}
        {{--        @endif--}}
        let count = 1;
        let passengerCount = "{!! (isset($sessionData['totalPerson']) && isset($sessionData['totalKids']))
                                                            ? $sessionData['totalPerson']+
                                                            $sessionData['totalKids']:
                                                            (isset($sessionData['totalPerson']) ? $sessionData['totalPerson'] :
                                                            '') !!}";


        {{--let citizenship=[{!! json_encode(nationals())  !!}];--}}
        {{--citizenship.forEach((item, index)=>{--}}
        {{--    console.log(index, item)--}}
        {{--})--}}

        //console.log(citizenship);

        $('#appendData').on('click', function () {
            count++

            if (passengerCount >= count) {
                $('#allData').append(`<div class="row available-all-ticket-content pt-4">
                                <div class="col-12 border border-secondary-subtle  rounded-0  all-ticket-card-left">
                                    <div class="d-flex justify-content-between align-items-center py-4">
                                        <h5 class="d-flex align-items-center mb-0">
                                            <a id="collapse-uncollapse" class="collapse-uncollapse" data-bs-toggle="collapse" href="#${count}"
                                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <i class="fa fa-minus-circle pe-2"></i>
                                            </a>
                                            Passenger ${count}
                                        </h5>
                                        <button class="d-flex align-items-center mb-0 border-0 btn btn-light removeDate">Remove
                                            <i class="fa fa-times ps-2 text-danger fs-4 "></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="collapse show" id="${count}">
                                    <div
                                        class="row border  border-secondary-subtle rounded-0  all-ticket-card-left py-3">
                                        <div class="col-md-4">
                                            <label for="inputFirstName" class="form-label small">First Name</label>
                                            <input type="text" name="users[${count}]['first_name']" class="form-control" id="inputFirstName">
                                        </div>
                                        @error('users.*')
                <span class="text-danger">{{$message}}</span>
                                            @enderror


                <div class="col-md-4">
                    <label for="inputLastName" class="form-label small">Last Name</label>
                    <input type="text" name="users[${count}]['last_name']" class="form-control" id="inputLastName">
                                        </div>

@error('users.*')
                <span class="text-danger">{{$message}}</span>
                                            @enderror


                <div class="col-md-4">
                    <label for="ageNumber" class="form-label small">Age</label>
                    <input type="number" name="users[${count}]['age']" class="form-control" id="ageNumber">
                                        </div>
                                        <div class="col-md-4 py-2">
                                            <div class="form-check d-flex align-items-center">
                                                <input name="users[${count}]['user_mobility']" class="form-check-input rounded-0 p-3" type="checkbox"
                                                    id="gridCheck">
                                                <label class="form-check-label small ps-4" for="gridCheck">
                                                    Reduced mobility
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="row border border-top-0 border-secondary-subtle rounded-0  all-ticket-card-left py-3">
                                        <div class="col-md-4">
                                            <label for="documentType" class="form-label small">Document Type</label>
                                            <select id="documentType" name="users[${count}]['document_type']" class="form-select">
                                                <option selected>Select A Document</option>
                                                @foreach(documents() as $doc)
                <option value={{$doc}}>{{$doc}}</option>
@endforeach

                </select>
            </div>
            <div class="col-md-4">
                <label for="documentNumber" class="form-label small">Document
                    Number</label>
                <input type="number" name="users[${count}]['document_number']" class="form-control" id="documentNumber">
            </div>
            <div class="col-md-4">
                <label for="citizenship" class="form-label small">Citizenship</label>
                <select id="citizenship" name="users[${count}]['citizenship']" class="form-select">
                    <option selected></option>
@foreach(nationals() as $nation)
                <option value={{$nation}}>{{$nation}}</option>
@endforeach
                </select>
            </div>
        </div>
        <div
            class="row border border-top-0 border-secondary-subtle rounded-0 all-ticket-card-left py-3">
            <div class="col-md-4">
                <label for="additionalBaggage" class="form-label small">Additional
                    Baggage</label>
                <select id="additionalBaggage" name="users[${count}]['additional_baggage']" class="form-select">
                    <option selected>Select Baggage</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="animals" class="form-label small">Animals</label>
                <select id="animals" name="users[${count}]['animal_type']" class="form-select">
                    <option selected>Select Animal</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="equipment" class="form-label small">Equipment</label>
                <select id="equipment" name="users[${count}]['equipment']" class="form-select">
                    <option selected>Select Equipment</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
        </div>
    </div>
</div>`)
            }

            $('#1st-passenger').addClass('d-block').removeClass('d-none')
        })

        $(document).on('click', '.removeDate', function () {
            count--
            $(this).parents('.available-all-ticket-content').remove()
            if (count == 1) {
                $('.removeDate').addClass('d-none').removeClass('d-block')
            }
        })


        $(document).on('click', '.collapse-uncollapse', function () {
            $(this).toggleClass('active')
            if ($(this).hasClass('active')) {
                $(this).find('i').addClass('fa-plus-circle').removeClass('fa-minus-circle')
            } else {
                $(this).find('i').removeClass('fa-plus-circle').addClass('fa-minus-circle')

            }
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

