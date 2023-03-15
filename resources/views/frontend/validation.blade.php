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
                            <input type="text" class="form-control" id="inputtext1" placeholder="From">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="col-md-2 col-xl-1 d-flex align-items-end">
                            <button type="submit" class="form-control">
                                <i class="fa fa-refresh"></i>
                            </button>
                        </div>
                        <div class="col-md-5 col-xl-2 d-flex align-items-end hero-input-with-icon">
                            <input type="text" class="form-control" id="inputtext2" placeholder="To">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <!-- travelling route end -->
                        <!-- travelling date start -->
                        <div class="col-md-3 col-xl-2 hero-input-with-icon mt-4">
                            <label for="inputtext3" class="form-label pb-2">Travelling Date</label>
                            <input type="text" class="form-control" id="inputtext3" placeholder="MM/DD/YY">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <div class="col-md-3 col-xl-2 d-flex align-items-end hero-input-with-icon mt-4">
                            <input type="text" class="form-control" id="inputtext4" placeholder="One Way">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <!-- travelling date end -->
                        <!-- travelling person start -->
                        <div class="col-md-3 col-xl-2 hero-input-with-icon mt-4 hide-numberType-icon">
                            <label for="inputtext5" class="form-label pb-2">Travelling Persons</label>
                            <input type="number" class="form-control" id="inputtext5" placeholder="1 Adult">
                            <i class="fa fa-caret-down"></i>
                        </div>
                        <div
                            class="col-md-3 col-xl-1 d-flex align-items-end hero-input-with-icon mt-4 hide-numberType-icon">
                            <input type="number" class="form-control" id="inputtext4" placeholder="0 Kids">
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
                                                    <p class="small-text text-gray mb-0">Train</p>
                                                    <p class="small text-light  mb-0">048A</p>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="small-text text-gray mb-0">Name</p>
                                                    <p class="small text-light  mb-0">North Express</p>
                                                </div>
                                            </div>
                                            <div class="mt-4 d-flex align-items-center justify-content-between">
                                                <div class="">
                                                    <p class="text-light mb-0">8:30a</p>
                                                    <p class="small-text text-light mb-0">Feb 12 MON</p>
                                                </div>
                                                <div
                                                    class="d-flex flex-column align-items-center justify-content-center">
                                                    <p class="small-text text-light">8:20</p>
                                                    <i class="fa fa-long-arrow-right mb-0 text-light"></i>
                                                </div>
                                                <div class="d-flex flex-column align-items-end">
                                                    <p class="text-light mb-0">4:15p</p>
                                                    <p class="small-text text-light mb-0">Feb 13 TUE</p>
                                                </div>
                                            </div>
                                            <div class="pt-4">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="small text-light mb-0">New York</p>
                                                    <p class="small text-light  mb-0">Los Angeles</p>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="small-text text-gray mb-0">Peen Station,</p>
                                                    <p class="small-text text-gray  mb-0">Union Station,</p>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="small-text text-gray mb-0">NY, USA</p>
                                                    <p class="small-text text-gray mb-0">CA, USA</p>
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
                                                    <p class="small-text text-gray mb-0">Train</p>
                                                    <p class="small text-light  mb-0">048A</p>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="small-text text-gray mb-0">Name</p>
                                                    <p class="small text-light  mb-0">North Express</p>
                                                </div>
                                            </div>
                                            <div class="mt-4 d-flex align-items-center justify-content-between">
                                                <div class="">
                                                    <p class="text-light mb-0">8:30a</p>
                                                    <p class="small-text text-light mb-0">Feb 12 MON</p>
                                                </div>
                                                <div
                                                    class="d-flex flex-column align-items-center justify-content-center">
                                                    <p class="small-text text-light">9:10</p>
                                                    <i class="fa fa-long-arrow-left mb-0 text-light"></i>
                                                </div>
                                                <div class="d-flex flex-column align-items-end">
                                                    <p class="text-light mb-0">4:15p</p>
                                                    <p class="small-text text-light mb-0">Feb 13 TUE</p>
                                                </div>
                                            </div>
                                            <div class="pt-4">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="small text-light mb-0">New York</p>
                                                    <p class="small text-light  mb-0">Los Angeles</p>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="small-text text-gray mb-0">Peen Station,</p>
                                                    <p class="small-text text-gray  mb-0">Union Station,</p>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="small-text text-gray mb-0">NY, USA</p>
                                                    <p class="small-text text-gray mb-0">CA, USA</p>
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
                                                    <p class="small-text text-gray mb-0">1 Adult</p>
                                                    <p class="small text-light  mb-0">$260</p>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="small-text text-gray mb-0">0 Children</p>
                                                    <p class="small text-light  mb-0">$0</p>
                                                </div>
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
                                                    <p class="small text-light  mb-0">$44</p>
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
                                    <div class="row  card-body py-4">
                                        <div class="row ">
                                            <div class="d-flex align-items-center justify-content-between text-danger">
                                                <h5>Total</h5>
                                                <h5>$304.00</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 vailidation-container">
                        <div id="allData">
                            <div class="row vailidation-content">
                                <div class="col-12 all-ticket-card-left">
                                    <div
                                        class="d-flex justify-content-between align-items-center py-4 px-3 border border-secondary-subtle rounded-0 first-passenger">
                                        <h5 class="d-flex align-items-center mb-0">
                                            Train
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-between border-0 rounded-0">
                                        <div
                                            class="col-3 card rounded-0 border-secondary-subtle border-end-0 pt-4 validation-train-card-left">
                                            <i class="fa fa-universal-access all-ticket-card-left-icon text-center"></i>
                                            <div class="card-body">
                                                <h5 class="card-title text-center">048A</h5>
                                                <p class="card-text text-center text-muted">North Express</p>
                                            </div>
                                        </div>
                                        <div
                                            class="col-6 card border-secondary-subtle rounded-0 validation-train-card-middle">
                                            <div class="row  card-body">
                                                <div class="row">
                                                    <div class="col-4 all-ticket-card-middle-left-colum">
                                                        <h5>8:30p</h5>
                                                        <small class="small-text">Feb 14 SUN</small>
                                                        <h6 class="small">New York</h6>
                                                        <small class="small-text">Peen Station,NY</small>
                                                    </div>
                                                    <div
                                                        class="col-4 d-flex flex-column justify-content-center all-ticket-card-middle-middle-colum">
                                                        <p class="text-muted small text-center">07:25</p>
                                                        <p class="text-center"><i
                                                                class="fa fa-long-arrow-right text-muted"></i>
                                                        </p>
                                                    </div>
                                                    <div class="col-4 all-ticket-card-middle-right-colum">
                                                        <h5>2:50a</h5>
                                                        <small class="small-text">Feb 15 SUN</small>
                                                        <h6 class="small">Los Angels</h6>
                                                        <small class="small-text">Union Station,CA</small>
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-4 all-ticket-card-middle-left-colum">
                                                        <h5>10:20p</h5>
                                                        <small class="small-text">Feb 18 THU</small>
                                                        <h6 class="small">New York</h6>
                                                        <small class="small-text">Peen Station,NY</small>
                                                    </div>
                                                    <div
                                                        class="col-4 d-flex flex-column justify-content-center all-ticket-card-middle-middle-colum">
                                                        <p class="text-muted small text-center">11:30</p>
                                                        <p class="text-center"><i
                                                                class="fa fa-long-arrow-left text-muted"></i>
                                                        </p>
                                                    </div>
                                                    <div class="col-4 all-ticket-card-middle-right-colum">
                                                        <h5>9:50a</h5>
                                                        <small class="small-text">Feb 19 THU</small>
                                                        <h6 class="small">Los Angels</h6>
                                                        <small class="small-text">Union Station,CA</small>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div
                                            class="col-3 card border-secondary-subtle rounded-0 border-start-0 validation-train-card-right pt-4">
                                            <div class="all-ticket-card-right-content  d-flex justify-content-end me-3">
                                                <p class="text-muted small"><span>$38 </span>/person</p>
                                            </div>
                                            <div class="row d-flex align-items-center justify-content-end">
                                                <button type="button"
                                                        class="col-6 me-4 btn btn-outline-dark border-2 ">Change</button>
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
                                            <div class="row">
                                                <div class="col-12 py-3 passenger-details">
                                                    <h6>Adult 1</h6>
                                                    <ul class="passenger-details-list">
                                                        <li class="pt-2">
                                                            <strong class="lavel">Name</strong>
                                                            <span class="text-muted">John Doe</span>
                                                        </li>
                                                        <li class="pt-2">
                                                            <strong class="lavel">Date of Birth</strong>
                                                            <span class="text-muted">07/17/87</span>
                                                        </li>
                                                        <li class="pt-2">
                                                            <strong class="lavel">Document</strong>
                                                            <span class="text-muted">Passport of USA MD357895</span>
                                                        </li>
                                                        <li class="pt-2">
                                                            <strong class="lavel">Baggage</strong>
                                                            <span
                                                                class="text-muted d-flex d-block justify-content-between">1
                                                                Excess
                                                                <strong>$44</strong>
                                                            </span>
                                                        </li>
                                                        <li class="pt-2">
                                                            <strong class="lavel"></strong>
                                                            <span
                                                                class="text-muted d-flex d-block justify-content-between">1
                                                                Equipment
                                                                <strong>$32</strong>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row border-top">
                                                <div class="col-12 py-3 passenger-details">
                                                    <h6>Adult 2</h6>
                                                    <ul class="passenger-details-list">
                                                        <li class="pt-2">
                                                            <strong class="lavel">Name</strong>
                                                            <span class="text-muted">John Doe</span>
                                                        </li>
                                                        <li class="pt-2">
                                                            <strong class="lavel">Date of Birth</strong>
                                                            <span class="text-muted">08/28/89</span>
                                                        </li>
                                                        <li class="pt-2">
                                                            <strong class="lavel">Document</strong>
                                                            <span class="text-muted">Passport of USA MD654321</span>
                                                        </li>
                                                        <li class="pt-2">
                                                            <strong class="lavel">Mobility</strong>
                                                            <span class="text-muted">Reduced mobility</span>
                                                        </li>
                                                        <li class="pt-2">
                                                            <strong class="lavel">Baggage</strong>
                                                            <span
                                                                class="text-muted d-flex d-block justify-content-between">2
                                                                Excess
                                                                <strong>$88</strong>
                                                            </span>
                                                        </li>
                                                        <li class="pt-2">
                                                            <strong class="lavel"></strong>
                                                            <span
                                                                class="text-muted d-flex d-block justify-content-between">1
                                                                Animal/bird
                                                                <strong>$62</strong>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row border-top">
                                                <div class="col-12 py-3 passenger-details">
                                                    <h6>Kid 1</h6>
                                                    <ul class="passenger-details-list">
                                                        <li class="pt-2">
                                                            <strong class="lavel">Name</strong>
                                                            <span class="text-muted">Jim Doe</span>
                                                        </li>
                                                        <li class="pt-2">
                                                            <strong class="lavel">Date of Birth</strong>
                                                            <span class="text-muted">11/26/00</span>
                                                        </li>
                                                        <li class="pt-2">
                                                            <strong class="lavel">Document</strong>
                                                            <span class="text-muted">Passport of USA CI159876</span>
                                                        </li>

                                                        <li class="pt-2">
                                                            <strong class="lavel">Baggage</strong>
                                                            <span
                                                                class="text-muted d-flex d-block justify-content-between">1
                                                                Excess
                                                                <strong>$44</strong>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="col-3 border border-start-0 border-secondary-subtle  rounded-0 pt-3">
                                            <div class="all-ticket-card-right-content  d-flex justify-content-end me-3">
                                                <p class="text-danger fs-1">$210
                                                </p>
                                            </div>
                                            <div class="row d-flex align-items-center justify-content-end">
                                                <button type="button"
                                                        class="col-6 me-4 btn btn-outline-dark border-2">Change</button>
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
                                                    <ul class="passenger-details-list">
                                                        <li class="pt-2">
                                                            <strong class="lavel">Name</strong>
                                                            <span class="text-muted">John Doe</span>
                                                        </li>
                                                        <li class="pt-2">
                                                            <strong class="lavel">Date of Birth</strong>
                                                            <span class="text-muted">07/17/87</span>
                                                        </li>
                                                        <li class="pt-2">
                                                            <strong class="lavel">Email</strong>
                                                            <span class="text-muted">qweqwe@mail.com</span>
                                                        </li>
                                                        <li class="pt-2">
                                                            <strong class="lavel">Document</strong>
                                                            <span class="text-muted">Passport of USA MD357895</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row border-top">
                                                <div class="col-12 py-3 passenger-details">
                                                    <h6>Card information</h6>
                                                    <ul class="passenger-details-list">
                                                        <li class="pt-2">
                                                            <strong class="lavel">Card number</strong>
                                                            <span class="text-muted">6666 6666 6666 6666</span>
                                                        </li>
                                                        <li class="pt-2">
                                                            <strong class="lavel">Card holder Name</strong>
                                                            <span class="text-muted">John Doe</span>
                                                        </li>
                                                        <li class="pt-2">
                                                            <strong class="lavel">Expiration Date</strong>
                                                            <span class="text-muted">April 2020</span>
                                                        </li>
                                                        <li class="pt-2">
                                                            <strong class="lavel">CVV</strong>
                                                            <span class="text-muted">5051</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="col-3 border border-start-0 border-secondary-subtle  rounded-0 pt-4">
                                            <div class="row d-flex align-items-center justify-content-end">
                                                <button type="button"
                                                        class="col-6 me-4 btn btn-outline-dark border-2">Change</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between pt-5  total-cost">
                            <div class="total-price">
                                <h5>Total Cost <span class="text-danger fs-1">$999</span></h5>
                            </div>
                            <button class="py-2 btn btn-danger">BUY
                                TICKET
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- all processing end-->


    </main>
    <!-- main end -->

@endsection

