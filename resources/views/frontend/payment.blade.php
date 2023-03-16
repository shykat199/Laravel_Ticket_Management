@extends('frontend.layout.master_frontend')
@section('show.frontend')

    <!-- header hero start -->
    <section class="result-header-hero">
        <div class="container ticket-booking-home-header-hero-container">
            <div class="row gy-4 ticket-booking-home-header-hero-content">
                <div
                    class="col-12 ticket-booking-home-header-search-ticket-form d-flex flex-column justify-content-end">
                    <form class="row g-3 pt-3 pb-5 px-2">
                        <!-- travelling route start -->
                        <div class="col-md-5 col-xl-2 hero-input-with-icon mt-4">
                            <label for="inputtext1" class="form-label pb-2">Travelling Route</label>
                            <input name="starting_point"
                                   value="{{isset($sessionData['starting_point']) ? $sessionData['starting_point']:''}}"
                                   type="text" class="form-control" id="inputtext1" placeholder="From">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="col-md-2 col-xl-1 d-flex align-items-end">
                            <button type="submit" class="form-control">
                                <i class="fa fa-refresh"></i>
                            </button>
                        </div>
                        <div class="col-md-5 col-xl-2 d-flex align-items-end hero-input-with-icon">
                            <input name="arrival_point"
                                   value="{{isset($sessionData['arrival_point']) ? $sessionData['arrival_point']:''}}"
                                   type="text"
                                   class="form-control" id="inputtext2" placeholder="To">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <!-- travelling route end -->
                        <!-- travelling date start -->
                        <div class="col-md-3 col-xl-2 hero-input-with-icon mt-4">
                            <label for="inputtext3" class="form-label pb-2">Travelling Date</label>
                            <input name="dateOfJourney"
                                   value="{{isset($sessionData['dateOfJourney']) ? $sessionData['dateOfJourney']:''}}"
                                   type="date"
                                   class="form-control" id="inputtext3" placeholder="MM/DD/YY">

                        </div>
                        <div class="col-md-3 col-xl-2 d-flex align-items-end hero-input-with-icon mt-4">
                            <input name="returnOfDate"
                                   value="{{isset($sessionData['returnOfDate']) ? $sessionData['returnOfDate']:''}}" type="date"
                                   class="form-control" id="inputtext4" placeholder="One Way">
                            <i class="fa fa-calendar"></i>
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
        <!-- processing steps start-->
        <section class="payment-steps">
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
                                                    <p class="small text-light  mb-0">{{isset($busDetails->busDetails->bus_coach) ? $busDetails->busDetails->bus_coach:''}}</p>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="small-text text-gray mb-0">Company</p>
                                                    <p class="small text-light  mb-0">{{isset($busDetails->busDetails->busCompany->bus_company) ? $busDetails->busDetails->busCompany->bus_company:''}}</p>
                                                </div>
                                            </div>
                                            <div class="mt-4 d-flex align-items-center justify-content-between">
                                                <div class="">
                                                    <p class="text-light mb-0">{{isset($busDetails->departure_time) ? $busDetails->departure_time:''}}</p>
                                                    <p class="small-text text-light mb-0">{{isset($sessionData['dateOfJourney']) ? $sessionData['dateOfJourney']:''}}</p>
                                                </div>
                                                <div
                                                    class="d-flex flex-column align-items-center justify-content-center">
                                                    <p class="small-text text-light">8:20</p>
                                                    <i class="fa fa-long-arrow-right mb-0 text-light"></i>
                                                </div>
                                                <div class="d-flex flex-column align-items-end">
                                                    <p class="text-light mb-0">{{isset($busDetails->arrival_time) ? $busDetails->arrival_time:''}}</p>
                                                    <p class="small-text text-light mb-0">Feb 13 TUE</p>
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
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="small-text text-gray mb-0">Coach</p>
                                                    <p class="small text-light  mb-0">{{isset($busDetails->busDetails->bus_coach) ? $busDetails->busDetails->bus_coach:''}}</p>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="small-text text-gray mb-0">Company</p>
                                                    <p class="small text-light  mb-0">{{isset($busDetails->busDetails->busCompany->bus_company) ? $busDetails->busDetails->busCompany->bus_company:''}}</p>
                                                </div>
                                            </div>


                                            <div class="mt-4 d-flex align-items-center justify-content-between">
                                                <div class="">
                                                    <p class="text-light mb-0">{{isset($busDetails->departure_time) ? $busDetails->departure_time:''}}</p>
                                                    <p class="small-text text-light mb-0">{{isset($sessionData['dateOfJourney']) ? $sessionData['dateOfJourney']:''}}</p>
                                                </div>
                                                <div
                                                    class="d-flex flex-column align-items-center justify-content-center">
                                                    <p class="small-text text-light">8:20</p>
                                                    <i class="fa fa-long-arrow-right mb-0 text-light"></i>
                                                </div>
                                                <div class="d-flex flex-column align-items-end">
                                                    <p class="text-light mb-0">{{isset($busDetails->arrival_time) ? $busDetails->arrival_time:''}}</p>
                                                    <p class="small-text text-light mb-0">Feb 13 TUE</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
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
                                                    <p class="small-text text-gray mb-0">{{isset($sessionData['totalPerson']) ? $sessionData['totalPerson']:''}}
                                                        Adult</p>
                                                    <p class="small text-light  mb-0">
                                                        ${{isset($busDetails->ticket_price) && isset($sessionData['totalPerson']) ? $busDetails->ticket_price * $sessionData['totalPerson'] : '' }}
                                                    </p>
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
                                    <div class="row  card-body border-top border-bottom  py-4">
                                        <div class="row ">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h5 class="text-light fw-normal ps-0 mb-0">
                                                    <i class="fa fa-suitcase pe-2" aria-hidden="true"></i>
                                                    Baggage
                                                </h5>
                                                <i class="fa fa-th-large text-light"></i>
                                            </div>
                                            <div class="pt-4">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="small-text text-gray mb-0">1 Excess</p>
                                                    <p class="small text-light  mb-0">$0</p>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="small-text text-gray mb-0">0 Animals/Birds</p>
                                                    <p class="small text-light  mb-0">$0</p>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="small-text text-gray mb-0">0 Equipment</p>
                                                    <p class="small text-light  mb-0">$0</p>
                                                </div>
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
                                                        ${{isset($busDetails->ticket_price) && isset($sessionData['totalPerson']) && isset($sessionData['totalKids']) ?
                                                            ($busDetails->ticket_price * $sessionData['totalPerson'])+
                                                            ($busDetails->ticket_price * $sessionData['totalKids']) : '' }}
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
                                                    <h5>
                                                        ${{isset($busDetails->ticket_price) && isset($sessionData['totalPerson']) ? $busDetails->ticket_price * $sessionData['totalPerson'] : '' }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <form class="col-8 personal-form-container" action="{{route('frontend.ticket.store.payment-details')}}" method="post">
                        @csrf
                        <div id="allData">
                            <div class="row personal-form-content shadow-sm">
                                <div class="col-12 border border-secondary-subtle  rounded-0  all-ticket-card-left">
                                    <div class="d-flex justify-content-between align-items-center py-4 first-passenger">
                                        <h5 class="d-flex align-items-center mb-0">
                                            Your personal information
                                        </h5>
                                    </div>
                                </div>

                                <div class="collapse show personal-form" id="collapseExample" >

                                    <div
                                        class="row border border-bottom-0 border-secondary-subtle rounded-0  all-ticket-card-left pt-3">
                                        <div class="col-md-4">
                                            <label for="inputFirstName" class="form-label small">First Name</label>
                                            <input type="text" name="f_name" class="form-control" id="inputFirstName">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputLastName" class="form-label small">Last Name</label>
                                            <input type="text" name="l_name" class="form-control" id="inputLastName">
                                        </div>
                                        <div class="col-md-4 personal-form-input-with-icon">
                                            <label for="birth-date" class="form-label small">Birth Date</label>
                                            <input type="text" name="dob" class="form-control" id="birth-date" placeholder="">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <div class="col-md-4 py-4">
                                            <label for="inputEmail" class="form-label small">E-mail</label>
                                            <input type="email" name="email" class="form-control" id="inputEmail">
                                        </div>
                                        <div class="col-md-2 pt-4 d-flex align-items-center">
                                            <input class="form-check-input" value="male" type="radio" name="gander"
                                                   id="flexRadioDefault1">
                                            <label class="form-check-label small ps-3" for="flexRadioDefault1">
                                                Male
                                            </label>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-center pt-4">
                                            <input class="form-check-input" value="female" type="radio" name="gander"
                                                   id="flexRadioDefault2">
                                            <label class="form-check-label small ps-3" for="flexRadioDefault2">
                                                Female
                                            </label>
                                        </div>
                                    </div>


                            </div>
                            <div class="row personal-form-content pt-4">
                                <div class="col-12 border border-secondary-subtle  rounded-0  all-ticket-card-left">
                                    <div class="d-flex justify-content-between align-items-center py-4 first-passenger">
                                        <h5 class="d-flex align-items-center mb-0">
                                            Your card information
                                        </h5>
                                    </div>
                                </div>


                                    <div
                                        class="row border border-bottom-0 border-secondary-subtle rounded-0  all-ticket-card-left pt-3">
                                        <div class="col-md-6">
                                            <label for="cardNumber" class="form-label small">Card number</label>
                                            <input type="text" name="c_number" class="form-control" id="cardNumber"
                                                   placeholder="xxxx-xxxx-xxxx-xxxx">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="CardHolderName" class="form-label small">Card Holder
                                                Name</label>
                                            <input type="text" name="c_name" class="form-control" id="CardHolderName">
                                        </div>
                                    </div>
                                    <div
                                        class="row border border-top-0 border-secondary-subtle rounded-0  all-ticket-card-left py-4">
                                        <div class="col-md-3">
                                            <label for="documentType" class="form-label small">Expiration Date</label>
                                            <select id="documentType" name="ex_month" class="form-select small text-secondary">
                                                <option selected>Month</option>
                                                @foreach(months() as $month)
                                                    <option value="{{$month}}">{{$month}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-md-3 ">
                                            <label for="documentType" class="form-label small pb-3"></label>
                                            <select id="documentType" name="ex_year" class="form-select small text-secondary">
                                                <option selected>Year</option>
                                                @foreach(years() as $year)
                                                    <option value="{{$year}}">{{$year}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="documentType" class="form-label small">CVV</label>
                                            <input type="text" name="c_vvv" class="form-control" id="CardHolderName" placeholder="Cvv">
                                        </div>
                                    </div>

                            </div>
                        </div>
                        <div class="row attention-part pt-5">
                            <div class="col-1">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                            <div class="col-11 pt-3 ps-5">
                                <h6 class="text-danger">
                                    Attention! Please read important information!
                                </h6>
                                <p class="small text-secondary">Lorem ipsum dolor sit, amet consectetur adipisicing
                                    elit. Eveniet omnis dolor
                                    explicabo voluptas. Dolore omnis repellat fuga eaque repellendus labore dignissimos
                                    optio nostrum quisquam unde iusto, in voluptatum molestias accusamus.</p>
                            </div>
                        </div>

                        <div class="row d-flex align-items-center pt-4">
                            <div class="col-8 form-check d-flex align-items-center">
                                <input class="form-check-input rounded-0 p-3" type="checkbox" id="gridCheck">
                                <label class="form-check-label text-secondary ps-3" for="gridCheck">
                                    By continuing, you agree to the <span class="fs-6 text-danger fw-semibold">
                                        Terms and Conditions
                                    </span>
                                </label>
                            </div>
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

@endsection

