<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowResultRequest;
use App\Models\Advantage;
use App\Models\BlogPost;
use App\Models\BusDestination;
use App\Models\SightSetting;
use App\Models\Testmonial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Builder;


class HomePageController extends Controller
{
    public function index(Request $request)
    {
        $blogPost = BlogPost::select('post_title', 'post_description', 'post_image', 'created_at')
            ->offset(0)
            ->orderBy('id', 'DESC')
            ->limit(4)
            ->get();
        $eAdvantages = Advantage::get(['advantage_text']);

        //$testmonials=Testmonial::all();
        $testmonials = Testmonial::leftJoin('users', 'users.id', 'testmonials.user_id')
            ->select('testmonials.*', 'users.name')->where('status', '=', 1)->get();
        //dd($testmonials);

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

            $total_passenger = isset($sessionData['totalPerson']) && isset($sessionData['totalKids']) ?
                ($sessionData['totalPerson']) + ($sessionData['totalKids']) : ($sessionData['totalPerson']);

            //dd($total_passenger);
//            select `bus_details`.`bus_seat`, `bus_details`.*, `bus_destinations`.* from `bus_destinations`
//            inner join `bus_details` on `bus_destinations`.`bus_details_id` = `bus_details`.`id`
//            where `bus_details`.`bus_seat` >= 10 and `starting_point`
//            like "Jessor" and `arrival_point` like "Dhaka";
//            GROUP_CONCAT(reservations.id)
            $currentTime=Carbon::now()->format('H:i:s');

            //dd($currentTime);
            if ($request->get('starting_point') && $request->get('arrival_point')) {

                $searchResults = $searchResults
                    ->join('bus_details', 'bus_destinations.bus_details_id','=' ,'bus_details.id')
                    //->leftJoin('reservations','bus_destinations.id','=','reservations.bus_destination_id')
                        ->leftJoin('reservations',function ($q){
                            $q->on( 'reservations.bus_destination_id','=','bus_destinations.id');
                            $q->whereDate('reservations.created_at',Carbon::now()->format('Y-m-d'));
                    })
                    ->where('bus_details.bus_seat', '!=',0)
                    ->where('bus_destinations.starting_point', '=', $request->get('starting_point'))
                    ->where('bus_destinations.arrival_point', '=', $request->get('arrival_point'))
                    ->selectRaw('bus_details.*,bus_destinations.* ,
                    (COALESCE(bus_details.bus_seat,0) - COALESCE(SUM(reservations.total_passenger),0)) as available_seat')
                    ->havingRaw("COALESCE(bus_details.bus_seat,0) - COALESCE(SUM(reservations.total_passenger),0) >= $total_passenger")
                    ->whereTime('bus_destinations.departure_time','>=',$currentTime)
                    ->orderBy('bus_destinations.departure_time','ASC')
                    ->groupBy('bus_destinations.bus_details_id')
                    ->get();

                //return $searchResults;

                //dd($searchResults);
                //dd($searchResults);
                $request->session()->put('searchedResults', $request->all());
            } else {
                //return back
            }
            //dd('1');
            $sessionData = $request->session()->get('searchedResults');
            $min_date = Carbon::today();
            $max_date = Carbon::now()->addWeek();
            //dd($sessionData);
            $froms = BusDestination::select('starting_point')->groupby('starting_point')->get();
            $tos = BusDestination::select('arrival_point')->groupby('arrival_point')->get();
            return view('frontend.showResult', compact('searchResults', 'sessionData', 'min_date', 'max_date','froms','tos'));
            //dd($searchResult);
        }
    }
}
