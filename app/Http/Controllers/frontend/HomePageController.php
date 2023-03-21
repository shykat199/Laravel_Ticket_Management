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

        $froms = BusDestination::select('starting_point')->get();
        $tos = BusDestination::select('arrival_point')->get();

        $sessionData = $request->session()->get('searchedResults');

        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeek();


        return view('frontend.home',
            compact('blogPost', 'froms', 'tos', 'eAdvantages', 'testmonials', 'sessionData', 'min_date', 'max_date'));
    }

    public function showResult(Request $request)
    {
        //dd($request->all());

        //Store In Session
        $sessionData = $request->session()->get('searchedResults');
        if (empty($request->session()->get("searchedResult"))) {

            $searchResults = BusDestination::query();

            $total_passenger = isset($sessionData['totalPerson']) && isset($sessionData['totalKids']) ?
                ($sessionData['totalPerson']) + ($sessionData['totalKids']) : ($sessionData['totalPerson']);

            //dd($searchResults);
            if ($request->get('starting_point') && $request->get('arrival_point'))
            {
//                $searchResults ->$searchResults->load('destinations')->first();
//                dd($searchResults);
                $searchResults = $searchResults
//                    ->whereHas('bus_details',function ($val) use($total_passenger){
//                        $val->where('bus_seat','>=',$total_passenger);
//                    })
                        ->join('bus_details','bus_destinations.bus_details_id','bus_details.id')
                    ->where('bus_details.bus_seat','>=',$total_passenger)
//                    ->orWhere('bus_details.bus_seat','<=',$total_passenger)
//                        ->where('bus_details.bus_seat','>=',$total_passenger)
                    ->where('starting_point', 'like', $request->get('starting_point'))
                    ->where('arrival_point', 'like', $request->get('arrival_point'))
                    ->get();

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
            return view('frontend.showResult', compact('searchResults', 'sessionData','min_date','max_date'));
            //dd($searchResult);
        }
    }
}
