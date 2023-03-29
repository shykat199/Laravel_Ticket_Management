<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowResultRequest;
use App\Models\Advantage;
use App\Models\BlogPost;
use App\Models\BusCompany;
use App\Models\BusDestination;
use App\Models\SightSetting;
use App\Models\Testmonial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Builder;


class HomePageController extends Controller
{
    public function index(Request $request)
    {
        $blogPost = BlogPost::select('post_title', 'post_description', 'post_image', 'created_at', 'id')
            ->offset(0)
            ->orderBy('id', 'DESC')
            ->limit(4)
            ->get();
        $eAdvantages = Advantage::where('advantages.status','=','1')->get(['advantage_text']);

        //$testmonials=Testmonial::all();
        $testmonials = Testmonial::leftJoin('users', 'users.id', 'testmonials.user_id')
            ->select('testmonials.*')->where('status', '=', 1)->get();
//        dd($testmonials);

        $froms = BusDestination::select('starting_point')->groupby('starting_point')->get();
        $tos = BusDestination::select('arrival_point')->groupby('arrival_point')->get();
        // dd($tos);

        $sessionData = $request->session()->get('searchedResults');

        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeek();


        return view('frontend.home',
            compact('blogPost', 'froms', 'tos', 'eAdvantages', 'testmonials', 'sessionData', 'min_date', 'max_date'));
    }

    public function showResult(ShowResultRequest $request)
    {
        //dd($request->all());


        //Store In Session
        $request->session()->put('searchedResults', $request->all());

        $sessionData = $request->session()->get('searchedResults');
        //dd($sessionData);

        if (empty($request->session()->get("searchedResult"))) {


            $searchResults = new BusDestination();

            $searchResults = $searchResults->with('busDetails.busCompany');
//            dd($searchResults);

            $total_passenger = isset($sessionData['totalPerson']) && isset($sessionData['totalKids']) ?
                ($sessionData['totalPerson']) + ($sessionData['totalKids']) : ($sessionData['totalPerson']);

            $currentTime = Carbon::now()->format('H:i:s');

            //Filter Bus According To Bus Company

            $allBusCompanies = BusCompany::join('bus_details', 'bus_details.company_id', '=', 'bus_companies.id')
                ->join('bus_destinations', 'bus_destinations.bus_details_id', '=', 'bus_details.id')
                ->where('bus_destinations.starting_point', '=', $request->get('starting_point'))
                ->where('bus_destinations.arrival_point', '=', $request->get('arrival_point'))
                ->where('bus_details.bus_seat', '!=', 0)
                ->where('bus_details.status', '!=', 0)
                ->whereTime('bus_destinations.departure_time', '>=', $currentTime)
                ->groupBy('bus_companies.bus_company')
                ->orderBy('bus_destinations.departure_time', 'ASC')
//                ->select('bus_details.*','bus_destinations.*')
                ->get();
            //dd($allBusCompanies);

            //Filter Bus According To Coach Type
            if ($request->ajax()) {
                if ($request->get('ac')) {
                    $ac = $request->get('ac');
                    $searchResults = $searchResults->join('bus_details', 'bus_destinations.bus_details_id', '=', 'bus_details.id')
                        ->leftJoin('reservations', function ($query) {
                            $query->on('reservations.bus_destination_id', '=', 'bus_destinations.id');
                            $query->whereDate('reservations.created_at', Carbon::now()->format('Y-m-d'));
                        })
                        ->where('bus_details.bus_seat', '!=', 0)
                        ->where('bus_details.status', '!=', 0)
                        ->where('bus_destinations.starting_point', '=', $request->get('starting_point'))
                        ->where('bus_destinations.arrival_point', '=', $request->get('arrival_point'))
                        ->whereIn('bus_details.bus_type', $ac)
                        ->selectRaw('bus_details.*,bus_destinations.* ,
                                    (COALESCE(bus_details.bus_seat,0) - COALESCE(SUM(reservations.total_passenger),0)) as available_seat')
                        ->havingRaw("COALESCE(bus_details,0) - COALESCE(SUM(reservations.total_passenger),0)" >= $total_passenger)
                        ->whereTime('bus_destinations.departure_time', '>=', $currentTime)
                        ->groupBy('bus_destinations.bus_details_id')
                        ->orderBy('bus_destinations.departure_time', 'ASC')
                        ->get();

                    $html = '';

                    if (count($searchResults) > 0) {
                        //dd(123);
                        foreach ($searchResults as $searchResult) {
                            $html .= '
                                <div class="row available-all-ticket-content pt-3">
                                    <div class="col-3 card rounded-0 border-end-0 pt-4 all-ticket-card-left">
                                        <i class="fa fa-universal-access all-ticket-card-left-icon text-center"></i>
                                        <div class="card-body">
                                            <h5 class="card-title text-center">' . $searchResult->busDetails->bus_coach . '</h5>
                                            <h6 class="card-title text-center">' . $searchResult->busDetails->bus_type . '</h6>
                                            <p class="card-title text-center">
                                                Seat- ' . $searchResult->available_seat . '</p>
                                            <p class="card-text text-center text-muted">' . $searchResult->busDetails->busCompany->bus_company . '</p>
                                        </div>
                                    </div>
                                    <div class="col-6 card rounded-0 all-ticket-card-middle">
                                        <div class="row  card-body">
                                            <div class="row">
                                                <div class="col-4 all-ticket-card-middle-left-colum">
                                                    <h5>' . date("g:i a", strtotime(\Carbon\Carbon::parse($searchResult->departure_time))) . '</h5>
                                                    <small
                                                        class="small-text">' . (isset($sessionData['dateOfJourney']) ? \Carbon\Carbon::parse($sessionData['dateOfJourney'])->format('d-m-Y') : '') . '</small>
                                                    <h6 class="small">' . $searchResult->starting_point . '</h6>

                                                </div>
                                                <div
                                                    class="col-4 d-flex flex-column justify-content-center all-ticket-card-middle-middle-colum">

                                                    <p class="text-center"><i
                                                            class="fa fa-long-arrow-right text-muted"></i>
                                                    </p>
                                                </div>
                                                <div class="col-4 all-ticket-card-middle-right-colum">

                                                    <h5>' . date("g:i a", strtotime(\Carbon\Carbon::parse($searchResult->departure_time)->addHours($searchResult->arrival_time))) . '</h5>
                                                    <small
                                                        class="small-text">' . (isset($sessionData['dateOfJourney']) ? \Carbon\Carbon::parse($sessionData['dateOfJourney'])->addHour($searchResult->arrival_time)->format('d-m-Y') : '') . '</small>
                                                    <h6 class="small"> ' . $searchResult->arrival_point . '</h6>
                                                </div>
                                            </div>';

                            if (@$sessionData['returnOfDate']) {
                                $html .= '<div class="row mt-4">
                                                    <div class="col-4 all-ticket-card-middle-left-colum">
                                                        <h5>' . date("g:i a", strtotime(\Carbon\Carbon::parse($searchResult->departure_time)->addHours())) . '</h5>
                                                        <small
                                                            class="small-text">' . (isset($sessionData['returnOfDate']) ? \Carbon\Carbon::parse($sessionData['returnOfDate'])->format('d-m-Y') : '') . '</small>
                                                        <h6 class="small">' . $searchResult->arrival_point . '</h6>

                                                    </div>
                                                    <div
                                                        class="col-4 d-flex flex-column justify-content-center all-ticket-card-middle-middle-colum">

                                                        <p class="text-center"><i
                                                                class="fa fa-long-arrow-left text-muted"></i>
                                                        </p>
                                                    </div>
                                                    <div class="col-4 all-ticket-card-middle-right-colum">

                                                        <h5>' . date("g:i a", strtotime(\Carbon\Carbon::parse($searchResult->departure_time)->addHours($searchResult->arrival_time))) . '</h5>
                                                        <small
                                                            class="small-text">' . (isset($sessionData['returnOfDate']) ? \Carbon\Carbon::parse($sessionData['returnOfDate'])->addHour($searchResult->arrival_time)->format('d-m-Y') : '') . '</small>
                                                        <h6 class="small">' . $searchResult->starting_point . '</h6>

                                                    </div>
                                                </div>';
                            }

                            $html .= '</div>
                                    </div>

                                    <div class="col-3 card rounded-0 border-start-0 all-ticket-card-right pt-4">
                                        <div class="all-ticket-card-right-content">
                                            <p class="text-muted small"><span>$' . $searchResult->ticket_price . ' </span>/person
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
                                        <form action="' . route('frontend.add.passenger.list') . '" method="get">
                                            <input type="hidden" name="bus_id" id="" value="' . $searchResult->id . '">
                                            <button type="submit" class="btn btn-primary mt-3">Book Now</button>
                                        </form>

                                    </div>
                                </div>';
                        }
                    } else {
                        //dd(1);
                        $html .= '<div class="col-3 card rounded-0 border-end-0 pt-4 all-ticket-card-left">
                                        <i class="fa fa-universal-access all-ticket-card-left-icon text-center"></i>
                                        <div class="card-body">
                                            <h2>No Data Found</h2>
                                        </div>
                                    </div>';
                    }

//                    dd(1);
                    return response()->json([
                        'status' => true,
                        'html' => $html
                    ]);
                }

            }

            if ($request->ajax()) {
                if ($request->get('nonAc')) {
                    $nonAc = $request->get('nonAc');
                    $searchResults = $searchResults->join('bus_details', 'bus_destinations.bus_details_id', '=', 'bus_details.id')
                        ->leftJoin('reservations', function ($query) {
                            $query->on('reservations.bus_destination_id', '=', 'bus_destinations.id');
                            $query->whereDate('reservations.created_at', Carbon::now()->format('Y-m-d'));
                        })
                        ->where('bus_details.bus_seat', '!=', 0)
                        ->where('bus_details.status', '!=', 0)
                        ->where('bus_destinations.starting_point', '=', $request->get('starting_point'))
                        ->where('bus_destinations.arrival_point', '=', $request->get('arrival_point'))
                        ->whereIn('bus_details.bus_type', $nonAc)
                        ->selectRaw('bus_details.*,bus_destinations.* ,
                                    (COALESCE(bus_details.bus_seat,0) - COALESCE(SUM(reservations.total_passenger),0)) as available_seat')
                        ->havingRaw("COALESCE(bus_details,0) - COALESCE(SUM(reservations.total_passenger),0)" >= $total_passenger)
                        ->whereTime('bus_destinations.departure_time', '>=', $currentTime)
                        ->groupBy('bus_destinations.bus_details_id')
                        ->orderBy('bus_destinations.departure_time', 'ASC')
                        ->get();

                    $html = '';

                    if (count($searchResults) > 0) {
                        //dd(123);
                        foreach ($searchResults as $searchResult) {
                            $html .= '
                                <div class="row available-all-ticket-content pt-3">
                                    <div class="col-3 card rounded-0 border-end-0 pt-4 all-ticket-card-left">
                                        <i class="fa fa-universal-access all-ticket-card-left-icon text-center"></i>
                                        <div class="card-body">
                                            <h5 class="card-title text-center">' . $searchResult->busDetails->bus_coach . '</h5>
                                            <h6 class="card-title text-center">' . $searchResult->busDetails->bus_type . '</h6>
                                            <p class="card-title text-center">
                                                Seat- ' . $searchResult->available_seat . '</p>
                                            <p class="card-text text-center text-muted">' . $searchResult->busDetails->busCompany->bus_company . '</p>
                                        </div>
                                    </div>
                                    <div class="col-6 card rounded-0 all-ticket-card-middle">
                                        <div class="row  card-body">
                                            <div class="row">
                                                <div class="col-4 all-ticket-card-middle-left-colum">
                                                    <h5>' . date("g:i a", strtotime(\Carbon\Carbon::parse($searchResult->departure_time))) . '</h5>
                                                    <small
                                                        class="small-text">' . (isset($sessionData['dateOfJourney']) ? \Carbon\Carbon::parse($sessionData['dateOfJourney'])->format('d-m-Y') : '') . '</small>
                                                    <h6 class="small">' . $searchResult->starting_point . '</h6>

                                                </div>
                                                <div
                                                    class="col-4 d-flex flex-column justify-content-center all-ticket-card-middle-middle-colum">

                                                    <p class="text-center"><i
                                                            class="fa fa-long-arrow-right text-muted"></i>
                                                    </p>
                                                </div>
                                                <div class="col-4 all-ticket-card-middle-right-colum">

                                                    <h5>' . date("g:i a", strtotime(\Carbon\Carbon::parse($searchResult->departure_time)->addHours($searchResult->arrival_time))) . '</h5>
                                                    <small
                                                        class="small-text">' . (isset($sessionData['dateOfJourney']) ? \Carbon\Carbon::parse($sessionData['dateOfJourney'])->addHour($searchResult->arrival_time)->format('d-m-Y') : '') . '</small>
                                                    <h6 class="small"> ' . $searchResult->arrival_point . '</h6>
                                                </div>
                                            </div>';

                            if (@$sessionData['returnOfDate']) {
                                $html .= '<div class="row mt-4">
                                                    <div class="col-4 all-ticket-card-middle-left-colum">
                                                        <h5>' . date("g:i a", strtotime(\Carbon\Carbon::parse($searchResult->departure_time)->addHours())) . '</h5>
                                                        <small
                                                            class="small-text">' . (isset($sessionData['returnOfDate']) ? \Carbon\Carbon::parse($sessionData['returnOfDate'])->format('d-m-Y') : '') . '</small>
                                                        <h6 class="small">' . $searchResult->arrival_point . '</h6>

                                                    </div>
                                                    <div
                                                        class="col-4 d-flex flex-column justify-content-center all-ticket-card-middle-middle-colum">

                                                        <p class="text-center"><i
                                                                class="fa fa-long-arrow-left text-muted"></i>
                                                        </p>
                                                    </div>
                                                    <div class="col-4 all-ticket-card-middle-right-colum">

                                                        <h5>' . date("g:i a", strtotime(\Carbon\Carbon::parse($searchResult->departure_time)->addHours($searchResult->arrival_time))) . '</h5>
                                                        <small
                                                            class="small-text">' . (isset($sessionData['returnOfDate']) ? \Carbon\Carbon::parse($sessionData['returnOfDate'])->addHour($searchResult->arrival_time)->format('d-m-Y') : '') . '</small>
                                                        <h6 class="small">' . $searchResult->starting_point . '</h6>

                                                    </div>
                                                </div>';
                            }

                            $html .= '</div>
                                    </div>

                                    <div class="col-3 card rounded-0 border-start-0 all-ticket-card-right pt-4">
                                        <div class="all-ticket-card-right-content">
                                            <p class="text-muted small"><span>$' . $searchResult->ticket_price . ' </span>/person
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
                                        <form action="' . route('frontend.add.passenger.list') . '" method="get">
                                            <input type="hidden" name="bus_id" id="" value="' . $searchResult->id . '">
                                            <button type="submit" class="btn btn-primary mt-3">Book Now</button>
                                        </form>

                                    </div>
                                </div>';
                        }
                    } else {
                        //dd(1);
                        $html .= '<div class="col-3 card rounded-0 border-end-0 pt-4 all-ticket-card-left">
                                        <i class="fa fa-universal-access all-ticket-card-left-icon text-center"></i>
                                        <div class="card-body">
                                            <h2>No Data Found</h2>
                                        </div>
                                    </div>';
                    }

//                    dd('2');
                    return response()->json([
                        'status' => true,
                        'html' => $html
                    ]);
                }

            }


            if ($request->ajax()) {
                if ($request->get('value')) {

                    $searchResults = $searchResults
                        ->join('bus_details', 'bus_destinations.bus_details_id', '=', 'bus_details.id')
                        //->leftJoin('reservations','bus_destinations.id','=','reservations.bus_destination_id')
                        ->leftJoin('reservations', function ($q) {
                            $q->on('reservations.bus_destination_id', '=', 'bus_destinations.id');
                            $q->whereDate('reservations.created_at', Carbon::now()->format('Y-m-d'));
                        })
                        ->where('bus_details.bus_seat', '!=', 0)
                        ->where('bus_details.status', '!=', 0)
                        ->where('bus_destinations.starting_point', '=', $request->get('starting_point'))
                        ->where('bus_destinations.arrival_point', '=', $request->get('arrival_point'))
                        ->selectRaw('bus_details.*,bus_destinations.* ,
                    (COALESCE(bus_details.bus_seat,0) - COALESCE(SUM(reservations.total_passenger),0)) as available_seat')
                        ->havingRaw("COALESCE(bus_details.bus_seat,0) - COALESCE(SUM(reservations.total_passenger),0) >= $total_passenger")
                        ->whereTime('bus_destinations.departure_time', '>=', $currentTime)
                        ->orderBy('bus_destinations.ticket_price', 'ASC')
                        ->orderBy('bus_destinations.departure_time', 'ASC')
                        ->groupBy('bus_destinations.bus_details_id')
                        ->get();

                    $html = '';

                    if (count($searchResults) > 0) {
                        //dd(123);
                        foreach ($searchResults as $searchResult) {
                            $html .= '
                                <div class="row available-all-ticket-content pt-3">
                                    <div class="col-3 card rounded-0 border-end-0 pt-4 all-ticket-card-left">
                                        <i class="fa fa-universal-access all-ticket-card-left-icon text-center"></i>
                                        <div class="card-body">
                                            <h5 class="card-title text-center">' . $searchResult->busDetails->bus_coach . '</h5>
                                            <h6 class="card-title text-center">' . $searchResult->busDetails->bus_type . '</h6>
                                            <p class="card-title text-center">
                                                Seat- ' . $searchResult->available_seat . '</p>
                                            <p class="card-text text-center text-muted">' . $searchResult->busDetails->busCompany->bus_company . '</p>
                                        </div>
                                    </div>
                                    <div class="col-6 card rounded-0 all-ticket-card-middle">
                                        <div class="row  card-body">
                                            <div class="row">
                                                <div class="col-4 all-ticket-card-middle-left-colum">
                                                    <h5>' . date("g:i a", strtotime(\Carbon\Carbon::parse($searchResult->departure_time))) . '</h5>
                                                    <small
                                                        class="small-text">' . (isset($sessionData['dateOfJourney']) ? \Carbon\Carbon::parse($sessionData['dateOfJourney'])->format('d-m-Y') : '') . '</small>
                                                    <h6 class="small">' . $searchResult->starting_point . '</h6>

                                                </div>
                                                <div
                                                    class="col-4 d-flex flex-column justify-content-center all-ticket-card-middle-middle-colum">

                                                    <p class="text-center"><i
                                                            class="fa fa-long-arrow-right text-muted"></i>
                                                    </p>
                                                </div>
                                                <div class="col-4 all-ticket-card-middle-right-colum">

                                                    <h5>' . date("g:i a", strtotime(\Carbon\Carbon::parse($searchResult->departure_time)->addHours($searchResult->arrival_time))) . '</h5>
                                                    <small
                                                        class="small-text">' . (isset($sessionData['dateOfJourney']) ? \Carbon\Carbon::parse($sessionData['dateOfJourney'])->addHour($searchResult->arrival_time)->format('d-m-Y') : '') . '</small>
                                                    <h6 class="small"> ' . $searchResult->arrival_point . '</h6>
                                                </div>
                                            </div>';

                            if (@$sessionData['returnOfDate']) {
                                $html .= '<div class="row mt-4">
                                                    <div class="col-4 all-ticket-card-middle-left-colum">
                                                        <h5>' . date("g:i a", strtotime(\Carbon\Carbon::parse($searchResult->departure_time)->addHours())) . '</h5>
                                                        <small
                                                            class="small-text">' . (isset($sessionData['returnOfDate']) ? \Carbon\Carbon::parse($sessionData['returnOfDate'])->format('d-m-Y') : '') . '</small>
                                                        <h6 class="small">' . $searchResult->arrival_point . '</h6>

                                                    </div>
                                                    <div
                                                        class="col-4 d-flex flex-column justify-content-center all-ticket-card-middle-middle-colum">

                                                        <p class="text-center"><i
                                                                class="fa fa-long-arrow-left text-muted"></i>
                                                        </p>
                                                    </div>
                                                    <div class="col-4 all-ticket-card-middle-right-colum">

                                                        <h5>' . date("g:i a", strtotime(\Carbon\Carbon::parse($searchResult->departure_time)->addHours($searchResult->arrival_time))) . '</h5>
                                                        <small
                                                            class="small-text">' . (isset($sessionData['returnOfDate']) ? \Carbon\Carbon::parse($sessionData['returnOfDate'])->addHour($searchResult->arrival_time)->format('d-m-Y') : '') . '</small>
                                                        <h6 class="small">' . $searchResult->starting_point . '</h6>

                                                    </div>
                                                </div>';
                            }

                            $html .= '</div>
                                    </div>

                                    <div class="col-3 card rounded-0 border-start-0 all-ticket-card-right pt-4">
                                        <div class="all-ticket-card-right-content">
                                            <p class="text-muted small"><span>$' . $searchResult->ticket_price . ' </span>/person
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
                                        <form action="' . route('frontend.add.passenger.list') . '" method="get">
                                            <input type="hidden" name="bus_id" id="" value="' . $searchResult->id . '">
                                            <button type="submit" class="btn btn-primary mt-3">Book Now</button>
                                        </form>

                                    </div>
                                </div>';
                        }
                    } else {
                        //dd(1);
                        $html .= '<div class="col-3 card rounded-0 border-end-0 pt-4 all-ticket-card-left">
                                        <i class="fa fa-universal-access all-ticket-card-left-icon text-center"></i>
                                        <div class="card-body">
                                            <h2>No Data Found</h2>
                                        </div>
                                    </div>';
                    }


                    return response()->json([
                        'status' => true,
                        'html' => $html
                    ]);
                }

            }

            //Filter Bus According To Bus Company
            if ($request->ajax()) {
                //dd($request->all());
                if ($request->get('busCompany')) {
                    $allBusComapny = $request->get('busCompany');
                    //dd($allBusComapny);
                    if (!empty($allBusComapny)) {
                        $searchResults = $searchResults->join('bus_details', 'bus_destinations.bus_details_id', '=', 'bus_details.id')
                            ->join('bus_companies', 'bus_details.company_id', '=', 'bus_companies.id')
                            ->leftJoin('reservations', function ($query) {
                                $query->on('reservations.bus_destination_id', '=', 'bus_destinations.id');
                                $query->whereDate('reservations.created_at', Carbon::now()->format('Y-m-d'));
                            })
                            ->where('bus_details.bus_seat', '!=', 0)
                            ->where('bus_details.status', '!=', 0)
                            ->where('bus_destinations.starting_point', '=', $request->get('starting_point'))
                            ->where('bus_destinations.arrival_point', '=', $request->get('arrival_point'))
                            ->whereIn('bus_companies.bus_company', $allBusComapny)
                            ->selectRaw('bus_details.*,bus_destinations.* ,bus_companies.*,
                                    (COALESCE(bus_details.bus_seat,0) - COALESCE(SUM(reservations.total_passenger),0)) as available_seat')
                            ->havingRaw("COALESCE(bus_details,0) - COALESCE(SUM(reservations.total_passenger),0)" >= $total_passenger)
                            ->whereTime('bus_destinations.departure_time', '>=', $currentTime)
                            ->groupBy('bus_destinations.bus_details_id')
                            ->orderBy('bus_destinations.departure_time', 'ASC')
                            ->get();

                        $html = '';

                        if (count($searchResults) > 0) {
                            //dd(123);
                            foreach ($searchResults as $searchResult) {
                                $html .= '
                                <div class="row available-all-ticket-content pt-3">
                                    <div class="col-3 card rounded-0 border-end-0 pt-4 all-ticket-card-left">
                                        <i class="fa fa-universal-access all-ticket-card-left-icon text-center"></i>
                                        <div class="card-body">
                                            <h5 class="card-title text-center">' . $searchResult->busDetails->bus_coach . '</h5>
                                            <h6 class="card-title text-center">' . $searchResult->busDetails->bus_type . '</h6>
                                            <p class="card-title text-center">
                                                Seat- ' . $searchResult->available_seat . '</p>
                                            <p class="card-text text-center text-muted">' . $searchResult->busDetails->busCompany->bus_company . '</p>
                                        </div>
                                    </div>
                                    <div class="col-6 card rounded-0 all-ticket-card-middle">
                                        <div class="row  card-body">
                                            <div class="row">
                                                <div class="col-4 all-ticket-card-middle-left-colum">
                                                    <h5>' . date("g:i a", strtotime(\Carbon\Carbon::parse($searchResult->departure_time))) . '</h5>
                                                    <small
                                                        class="small-text">' . (isset($sessionData['dateOfJourney']) ? \Carbon\Carbon::parse($sessionData['dateOfJourney'])->format('d-m-Y') : '') . '</small>
                                                    <h6 class="small">' . $searchResult->starting_point . '</h6>

                                                </div>
                                                <div
                                                    class="col-4 d-flex flex-column justify-content-center all-ticket-card-middle-middle-colum">

                                                    <p class="text-center"><i
                                                            class="fa fa-long-arrow-right text-muted"></i>
                                                    </p>
                                                </div>
                                                <div class="col-4 all-ticket-card-middle-right-colum">

                                                    <h5>' . date("g:i a", strtotime(\Carbon\Carbon::parse($searchResult->departure_time)->addHours($searchResult->arrival_time))) . '</h5>
                                                    <small
                                                        class="small-text">' . (isset($sessionData['dateOfJourney']) ? \Carbon\Carbon::parse($sessionData['dateOfJourney'])->addHour($searchResult->arrival_time)->format('d-m-Y') : '') . '</small>
                                                    <h6 class="small"> ' . $searchResult->arrival_point . '</h6>
                                                </div>
                                            </div>';

                                if (@$sessionData['returnOfDate']) {
                                    $html .= '<div class="row mt-4">
                                                    <div class="col-4 all-ticket-card-middle-left-colum">
                                                        <h5>' . date("g:i a", strtotime(\Carbon\Carbon::parse($searchResult->departure_time)->addHours())) . '</h5>
                                                        <small
                                                            class="small-text">' . (isset($sessionData['returnOfDate']) ? \Carbon\Carbon::parse($sessionData['returnOfDate'])->format('d-m-Y') : '') . '</small>
                                                        <h6 class="small">' . $searchResult->arrival_point . '</h6>

                                                    </div>
                                                    <div
                                                        class="col-4 d-flex flex-column justify-content-center all-ticket-card-middle-middle-colum">

                                                        <p class="text-center"><i
                                                                class="fa fa-long-arrow-left text-muted"></i>
                                                        </p>
                                                    </div>
                                                    <div class="col-4 all-ticket-card-middle-right-colum">

                                                        <h5>' . date("g:i a", strtotime(\Carbon\Carbon::parse($searchResult->departure_time)->addHours($searchResult->arrival_time))) . '</h5>
                                                        <small
                                                            class="small-text">' . (isset($sessionData['returnOfDate']) ? \Carbon\Carbon::parse($sessionData['returnOfDate'])->addHour($searchResult->arrival_time)->format('d-m-Y') : '') . '</small>
                                                        <h6 class="small">' . $searchResult->starting_point . '</h6>

                                                    </div>
                                                </div>';
                                }

                                $html .= '</div>
                                    </div>

                                    <div class="col-3 card rounded-0 border-start-0 all-ticket-card-right pt-4">
                                        <div class="all-ticket-card-right-content">
                                            <p class="text-muted small"><span>$' . $searchResult->ticket_price . ' </span>/person
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
                                        <form action="' . route('frontend.add.passenger.list') . '" method="get">
                                            <input type="hidden" name="bus_id" id="" value="' . $searchResult->id . '">
                                            <button type="submit" class="btn btn-primary mt-3">Book Now</button>
                                        </form>

                                    </div>
                                </div>';
                            }
                        } else {
                            //dd(1);
                            $html .= '<div class="col-3 card rounded-0 border-end-0 pt-4 all-ticket-card-left">
                                        <i class="fa fa-universal-access all-ticket-card-left-icon text-center"></i>
                                        <div class="card-body">
                                            <h2>No Data Found</h2>
                                        </div>
                                    </div>';
                        }


//                        dd(3);
                        return response()->json([
                            'status' => true,
                            'html' => $html
                        ]);
                    } else {
                        $searchResults = $searchResults
                            ->join('bus_details', 'bus_destinations.bus_details_id', '=', 'bus_details.id')
                            //->leftJoin('reservations','bus_destinations.id','=','reservations.bus_destination_id')
                            ->leftJoin('reservations', function ($q) {
                                $q->on('reservations.bus_destination_id', '=', 'bus_destinations.id');
                                $q->whereDate('reservations.created_at', Carbon::now()->format('Y-m-d'));
                            })
                            ->where('bus_details.bus_seat', '!=', 0)
                            ->where('bus_details.status', '!=', 0)
                            ->where('bus_destinations.starting_point', '=', $request->get('starting_point'))
                            ->where('bus_destinations.arrival_point', '=', $request->get('arrival_point'))
                            ->selectRaw('bus_details.*,bus_destinations.* ,
                    (COALESCE(bus_details.bus_seat,0) - COALESCE(SUM(reservations.total_passenger),0)) as available_seat')
                            ->havingRaw("COALESCE(bus_details.bus_seat,0) - COALESCE(SUM(reservations.total_passenger),0) >= $total_passenger")
                            ->whereTime('bus_destinations.departure_time', '>=', $currentTime)
                            ->orderBy('bus_destinations.ticket_price', 'ASC')
                            ->orderBy('bus_destinations.departure_time', 'ASC')
                            ->groupBy('bus_destinations.bus_details_id')
                            ->get();

                        $html = '';

                        if (count($searchResults) > 0) {
                            //dd(123);
                            foreach ($searchResults as $searchResult) {
                                $html .= '
                                <div class="row available-all-ticket-content pt-3">
                                    <div class="col-3 card rounded-0 border-end-0 pt-4 all-ticket-card-left">
                                        <i class="fa fa-universal-access all-ticket-card-left-icon text-center"></i>
                                        <div class="card-body">
                                            <h5 class="card-title text-center">' . $searchResult->busDetails->bus_coach . '</h5>
                                            <h6 class="card-title text-center">' . $searchResult->busDetails->bus_type . '</h6>
                                            <p class="card-title text-center">
                                                Seat- ' . $searchResult->available_seat . '</p>
                                            <p class="card-text text-center text-muted">' . $searchResult->busDetails->busCompany->bus_company . '</p>
                                        </div>
                                    </div>
                                    <div class="col-6 card rounded-0 all-ticket-card-middle">
                                        <div class="row  card-body">
                                            <div class="row">
                                                <div class="col-4 all-ticket-card-middle-left-colum">
                                                    <h5>' . date("g:i a", strtotime(\Carbon\Carbon::parse($searchResult->departure_time))) . '</h5>
                                                    <small
                                                        class="small-text">' . (isset($sessionData['dateOfJourney']) ? \Carbon\Carbon::parse($sessionData['dateOfJourney'])->format('d-m-Y') : '') . '</small>
                                                    <h6 class="small">' . $searchResult->starting_point . '</h6>

                                                </div>
                                                <div
                                                    class="col-4 d-flex flex-column justify-content-center all-ticket-card-middle-middle-colum">

                                                    <p class="text-center"><i
                                                            class="fa fa-long-arrow-right text-muted"></i>
                                                    </p>
                                                </div>
                                                <div class="col-4 all-ticket-card-middle-right-colum">

                                                    <h5>' . date("g:i a", strtotime(\Carbon\Carbon::parse($searchResult->departure_time)->addHours($searchResult->arrival_time))) . '</h5>
                                                    <small
                                                        class="small-text">' . (isset($sessionData['dateOfJourney']) ? \Carbon\Carbon::parse($sessionData['dateOfJourney'])->addHour($searchResult->arrival_time)->format('d-m-Y') : '') . '</small>
                                                    <h6 class="small"> ' . $searchResult->arrival_point . '</h6>
                                                </div>
                                            </div>';

                                if (@$sessionData['returnOfDate']) {
                                    $html .= '<div class="row mt-4">
                                                    <div class="col-4 all-ticket-card-middle-left-colum">
                                                        <h5>' . date("g:i a", strtotime(\Carbon\Carbon::parse($searchResult->departure_time)->addHours())) . '</h5>
                                                        <small
                                                            class="small-text">' . (isset($sessionData['returnOfDate']) ? \Carbon\Carbon::parse($sessionData['returnOfDate'])->format('d-m-Y') : '') . '</small>
                                                        <h6 class="small">' . $searchResult->arrival_point . '</h6>

                                                    </div>
                                                    <div
                                                        class="col-4 d-flex flex-column justify-content-center all-ticket-card-middle-middle-colum">

                                                        <p class="text-center"><i
                                                                class="fa fa-long-arrow-left text-muted"></i>
                                                        </p>
                                                    </div>
                                                    <div class="col-4 all-ticket-card-middle-right-colum">

                                                        <h5>' . date("g:i a", strtotime(\Carbon\Carbon::parse($searchResult->departure_time)->addHours($searchResult->arrival_time))) . '</h5>
                                                        <small
                                                            class="small-text">' . (isset($sessionData['returnOfDate']) ? \Carbon\Carbon::parse($sessionData['returnOfDate'])->addHour($searchResult->arrival_time)->format('d-m-Y') : '') . '</small>
                                                        <h6 class="small">' . $searchResult->starting_point . '</h6>

                                                    </div>
                                                </div>';
                                }

                                $html .= '</div>
                                    </div>

                                    <div class="col-3 card rounded-0 border-start-0 all-ticket-card-right pt-4">
                                        <div class="all-ticket-card-right-content">
                                            <p class="text-muted small"><span>$' . $searchResult->ticket_price . ' </span>/person
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
                                        <form action="' . route('frontend.add.passenger.list') . '" method="get">
                                            <input type="hidden" name="bus_id" id="" value="' . $searchResult->id . '">
                                            <button type="submit" class="btn btn-primary mt-3">Book Now</button>
                                        </form>

                                    </div>
                                </div>';
                            }
                        } else {
                            //dd(1);
                            $html .= '<div class="col-3 card rounded-0 border-end-0 pt-4 all-ticket-card-left">
                                        <i class="fa fa-universal-access all-ticket-card-left-icon text-center"></i>
                                        <div class="card-body">
                                            <h2>No Data Found</h2>
                                        </div>
                                    </div>';
                        }

//                        dd(4);
                        return response()->json([
                            'status' => true,
                            'html' => $html
                        ]);

                    }

                }

            }

            // Filter Bus Ticket From Slider Price

            if ($request->ajax()) {

                if ($request->get('busMinTicketPrice') || $request->get('busMaxTicketPrice')) {
                    $startingPrice = $request->get('busMinTicketPrice');
                    $endPrice = (int)$request->get('busMaxTicketPrice');
                    $searchResults = $searchResults->join('bus_details', 'bus_destinations.bus_details_id', '=', 'bus_details.id')
                        ->leftJoin('reservations', function ($query) {
                            $query->on('reservations.bus_destination_id', '=', 'bus_destinations.id');
                            $query->whereDate('reservations.created_at', Carbon::now()->format('Y-m-d'));
                        })
                        ->where('bus_details.bus_seat', '!=', 0)
                        ->where('bus_details.status', '!=', 0)
                        ->where('bus_destinations.starting_point', '=', $request->get('starting_point'))
                        ->where('bus_destinations.arrival_point', '=', $request->get('arrival_point'))
                        ->whereBetween('bus_destinations.ticket_price', [$startingPrice, $endPrice])
                        ->selectRaw('bus_details.*,bus_destinations.* ,
                                    (COALESCE(bus_details.bus_seat,0) - COALESCE(SUM(reservations.total_passenger),0)) as available_seat')
                        ->havingRaw("COALESCE(bus_details,0) - COALESCE(SUM(reservations.total_passenger),0)" >= $total_passenger)
                        ->whereTime('bus_destinations.departure_time', '>=', $currentTime)
                        ->groupBy('bus_destinations.bus_details_id')
                        ->orderBy('bus_destinations.departure_time', 'ASC')
                        ->get();

                    $html = '';

                    if (count($searchResults) > 0) {
                        //dd(123);
                        foreach ($searchResults as $searchResult) {
                            $html .= '
                                <div class="row available-all-ticket-content pt-3">
                                    <div class="col-3 card rounded-0 border-end-0 pt-4 all-ticket-card-left">
                                        <i class="fa fa-universal-access all-ticket-card-left-icon text-center"></i>
                                        <div class="card-body">
                                            <h5 class="card-title text-center">' . $searchResult->busDetails->bus_coach . '</h5>
                                            <h6 class="card-title text-center">' . $searchResult->busDetails->bus_type . '</h6>
                                            <p class="card-title text-center">
                                                Seat- ' . $searchResult->available_seat . '</p>
                                            <p class="card-text text-center text-muted">' . $searchResult->busDetails->busCompany->bus_company . '</p>
                                        </div>
                                    </div>
                                    <div class="col-6 card rounded-0 all-ticket-card-middle">
                                        <div class="row  card-body">
                                            <div class="row">
                                                <div class="col-4 all-ticket-card-middle-left-colum">
                                                    <h5>' . date("g:i a", strtotime(\Carbon\Carbon::parse($searchResult->departure_time))) . '</h5>
                                                    <small
                                                        class="small-text">' . (isset($sessionData['dateOfJourney']) ? \Carbon\Carbon::parse($sessionData['dateOfJourney'])->format('d-m-Y') : '') . '</small>
                                                    <h6 class="small">' . $searchResult->starting_point . '</h6>

                                                </div>
                                                <div
                                                    class="col-4 d-flex flex-column justify-content-center all-ticket-card-middle-middle-colum">

                                                    <p class="text-center"><i
                                                            class="fa fa-long-arrow-right text-muted"></i>
                                                    </p>
                                                </div>
                                                <div class="col-4 all-ticket-card-middle-right-colum">

                                                    <h5>' . date("g:i a", strtotime(\Carbon\Carbon::parse($searchResult->departure_time)->addHours($searchResult->arrival_time))) . '</h5>
                                                    <small
                                                        class="small-text">' . (isset($sessionData['dateOfJourney']) ? \Carbon\Carbon::parse($sessionData['dateOfJourney'])->addHour($searchResult->arrival_time)->format('d-m-Y') : '') . '</small>
                                                    <h6 class="small"> ' . $searchResult->arrival_point . '</h6>
                                                </div>
                                            </div>';

                            if (@$sessionData['returnOfDate']) {
                                $html .= '<div class="row mt-4">
                                                    <div class="col-4 all-ticket-card-middle-left-colum">
                                                        <h5>' . date("g:i a", strtotime(\Carbon\Carbon::parse($searchResult->departure_time)->addHours())) . '</h5>
                                                        <small
                                                            class="small-text">' . (isset($sessionData['returnOfDate']) ? \Carbon\Carbon::parse($sessionData['returnOfDate'])->format('d-m-Y') : '') . '</small>
                                                        <h6 class="small">' . $searchResult->arrival_point . '</h6>

                                                    </div>
                                                    <div
                                                        class="col-4 d-flex flex-column justify-content-center all-ticket-card-middle-middle-colum">

                                                        <p class="text-center"><i
                                                                class="fa fa-long-arrow-left text-muted"></i>
                                                        </p>
                                                    </div>
                                                    <div class="col-4 all-ticket-card-middle-right-colum">

                                                        <h5>' . date("g:i a", strtotime(\Carbon\Carbon::parse($searchResult->departure_time)->addHours($searchResult->arrival_time))) . '</h5>
                                                        <small
                                                            class="small-text">' . (isset($sessionData['returnOfDate']) ? \Carbon\Carbon::parse($sessionData['returnOfDate'])->addHour($searchResult->arrival_time)->format('d-m-Y') : '') . '</small>
                                                        <h6 class="small">' . $searchResult->starting_point . '</h6>

                                                    </div>
                                                </div>';
                            }

                            $html .= '</div>
                                    </div>

                                    <div class="col-3 card rounded-0 border-start-0 all-ticket-card-right pt-4">
                                        <div class="all-ticket-card-right-content">
                                            <p class="text-muted small"><span>$' . $searchResult->ticket_price . ' </span>/person
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
                                        <form action="' . route('frontend.add.passenger.list') . '" method="get">
                                            <input type="hidden" name="bus_id" id="" value="' . $searchResult->id . '">
                                            <button type="submit" class="btn btn-primary mt-3">Book Now</button>
                                        </form>

                                    </div>
                                </div>';
                        }
                    } else {
                        //dd(1);
                        $html .= '<div class="col-3 card rounded-0 border-end-0 pt-4 all-ticket-card-left">
                                        <i class="fa fa-universal-access all-ticket-card-left-icon text-center"></i>
                                        <div class="card-body">
                                            <h2>No Data Found</h2>
                                        </div>
                                    </div>';
                    }



                    return response()->json([
                        'status' => true,
                        'html' => $html
                    ]);

                }

            }

            //dd($currentTime);
            if ($request->get('starting_point') && $request->get('arrival_point')) {

                $searchResults = $searchResults
                    ->join('bus_details', 'bus_destinations.bus_details_id', '=', 'bus_details.id')
                    //->leftJoin('reservations','bus_destinations.id','=','reservations.bus_destination_id')
                    ->leftJoin('reservations', function ($q) {
                        $q->on('reservations.bus_destination_id', '=', 'bus_destinations.id');
                        $q->whereDate('reservations.created_at', Carbon::now()->format('Y-m-d'));
                    })
                    ->where('bus_details.bus_seat', '!=', 0)
                    ->where('bus_details.status', '!=', 0)
                    ->where('bus_destinations.starting_point', '=', $request->get('starting_point'))
                    ->where('bus_destinations.arrival_point', '=', $request->get('arrival_point'))
                    ->selectRaw('bus_details.*,bus_destinations.* ,
                    (COALESCE(bus_details.bus_seat,0) - COALESCE(SUM(reservations.total_passenger),0)) as available_seat')
                    ->havingRaw("COALESCE(bus_details.bus_seat,0) - COALESCE(SUM(reservations.total_passenger),0) >= $total_passenger")
                    ->whereTime('bus_destinations.departure_time', '>=', $currentTime)
                    ->orderBy('bus_destinations.ticket_price', 'ASC')
                    ->orderBy('bus_destinations.departure_time', 'ASC')
                    ->groupBy('bus_destinations.bus_details_id')
                    ->get();

                $request->session()->put('searchedResults', $request->all());
            } else {
                //return back
            }


            $sessionData = $request->session()->get('searchedResults');
            $min_date = Carbon::today();
            $max_date = Carbon::now()->addWeek();
            //dd($sessionData);

            $maxTicketPrice = DB::table('bus_destinations')
                ->selectRaw('bus_destinations.starting_point,bus_destinations.arrival_point,(COALESCE(MAX(bus_destinations.ticket_price),0)) as maxPrice')
                ->where('bus_destinations.starting_point', '=', $request->get('starting_point'))
                ->where('bus_destinations.arrival_point', '=', $request->get('arrival_point'))
                ->groupBy('bus_destinations.starting_point')
                ->get();
            //dd($maxTicketPrice);

            $minTicketPrice = DB::table('bus_destinations')
                ->selectRaw('bus_destinations.starting_point,bus_destinations.arrival_point,(COALESCE(MIN(bus_destinations.ticket_price),0)) as minPrice')
                ->where('bus_destinations.starting_point', '=', $request->get('starting_point'))
                ->where('bus_destinations.arrival_point', '=', $request->get('arrival_point'))
                ->groupBy('bus_destinations.starting_point')
                ->get();
            //dd($minTicketPrice);

            $froms = BusDestination::select('starting_point')->groupby('starting_point')->get();
            $tos = BusDestination::select('arrival_point')->groupby('arrival_point')->get();
            return view('frontend.showResult', compact('searchResults', 'sessionData',
                'min_date', 'max_date', 'froms', 'tos', 'allBusCompanies', 'maxTicketPrice', 'minTicketPrice'));
            //dd($searchResult);
        }
    }
}
