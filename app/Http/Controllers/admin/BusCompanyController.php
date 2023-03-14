<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BusCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class BusCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {

//

        $allCompanies = BusCompany::leftJoin('bus_details','bus_details.company_id','bus_companies.id')
        ->select('bus_companies.*',DB::raw('count(bus_details.id) as total'))
        ->groupBy('bus_details.company_id')->get();
        //dd($allCompanies);
        return view('admin.interface.busCompany.index', compact('allCompanies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'bus_company' => ['required']
        ]);

        $storeCompany = BusCompany::create([
            'bus_company' => $request->get('bus_company'),
        ]);

        if ($storeCompany) {
            return to_route('admin.company.index')->with('success', 'New Company Created Successfully');
        } else {
            return Redirect::back()->with('error', 'Something wrong...');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\BusCompany $busCompany
     * @return \Illuminate\Http\Response
     */
    public function show(BusCompany $busCompany)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\BusCompany $busCompany
     * @return \Illuminate\Http\Response
     */
    public function edit(BusCompany $busCompany)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BusCompany $busCompany
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $id = $request->get('company_id');
        $upCompany = BusCompany::where('id', $id)->update([
            'bus_company' => $request->get('bus_company'),
        ]);

        if ($upCompany) {
            return to_route('admin.company.index')->with('success', 'Company Updated Successfully');
        } else {
            return Redirect::back()->with('error', 'Something wrong...');
        }

    }

    public function updateStatus(Request $request)
    {

        if ($request->get('mode') === 'true') {
            $companyStatus = DB::table('bus_companies')
                ->where('id', '=', $request->get('company_id'))
                ->update(array('status' => 1));
        } else {
            $companyStatus = DB::table('bus_companies')
                ->where('id', '=', $request->get('company_id'))
                ->update(array('status' => 0));
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\BusCompany $busCompany
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        $dltCompany = BusCompany::where('id', $id)->delete();

        if ($dltCompany) {
            return to_route('admin.company.index')->with('success', 'Company Deleted Successfully');
        } else {
            return Redirect::back()->with('error', 'Something wrong...');
        }
    }
}
