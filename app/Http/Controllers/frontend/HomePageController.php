<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowResultRequest;
use App\Models\Advantage;
use App\Models\BlogPost;
use App\Models\BusDestination;
use App\Models\Testmonial;
use Illuminate\Http\Request;


class HomePageController extends Controller
{
    public function index(Request $request)
    {
        $blogPost = BlogPost::select('*')
            ->offset(0)
            ->orderBy('id', 'DESC')
            ->limit(4)
            ->get();
        $eAdvantages = Advantage::get(['advantage_text']);

        //$testmonials=Testmonial::all();
        $testmonials = Testmonial::leftJoin('users', 'users.id', 'testmonials.user_id')
            ->select('testmonials.*', 'users.name')->where('status', '=', 1)->get();
        //dd($testmonials);

        $sessionData=$request->session()->get('searchedResults');

        return view('frontend.home',
            compact('blogPost', 'eAdvantages', 'testmonials','sessionData'));
    }

    public function showResult(ShowResultRequest $request)
    {
        //Store In Session
        if (empty($request->session()->get("searchedResult"))) {
            $searchResults = BusDestination::query();
            if ($request->get('starting_point') && $request->get('arrival_point')) {
                $searchResults = $searchResults->with(['busDetails.busCompany'])
                    ->where('starting_point', 'like', "%{$request->get('starting_point')}%")
                    ->orWhere('arrival_point', 'like', "%{$request->get('arrival_point')}%")
                    ->get();
                $request->session()->put('searchedResults', $request->all());
            }
            //dd($searchResults);

            return view('frontend.showResult', compact('searchResults'));
            //dd($searchResult);
        }
    }
}
