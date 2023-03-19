<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BusCompany;
use App\Models\BusDestination;
use App\Models\BusDetails;
use App\Models\Category;
use App\Models\Reservation;
use App\Models\Team;
use App\Models\Testmonial;

class AdminDashboard extends Controller
{
    public function adminDashboard(){
        $data=array();
       $data['busCompanies']=BusCompany::count();
       $data['busRoutes']=BusDestination::count();
       $data['categories']=Category::count();
       $data['posts']=BlogPost::count();
       $data['testimonials']=Testmonial::count();
       $data['teams']=Team::count();
       $data['totalTickets']=BusDetails::sum('bus_seat');
       $data['totalReservations']=Reservation::count();

        return view('admin.interface.dashboard.dashboard',$data);
    }
}
