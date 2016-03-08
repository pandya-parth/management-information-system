<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Company;
use App\Project;
use App\Industry;
use Illuminate\Support\Facades\Input;
use Image;
// use Former\Facades\Former;


class CompaniesController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $industries = Industry::all();
        return view('companies.index',compact('industries'));   
    }
    
    public function getCompanies()
    {
       $companies = Company::get();
       return response()->json($companies);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $companies = new Company;
        $companies->name = Input::get('name');
        $companies->logo = Input::get('logo');
        $companies->website = Input::get('website');
        $companies->email = Input::get('email');
        $companies->industry_id = Input::get('industry');
        $companies->phone = Input::get('phone');
        $companies->fax = Input::get('fax');
        $companies->adrs1 = Input::get('adrs1');
        $companies->adrs2 = Input::get('adrs2');
        $companies->city = Input::get('city');
        $companies->state = Input::get('state');
        $companies->country = Input::get('country');
        $companies->zipcode = Input::get('zipcode');
        $companies->save();
        return response()->json(['success'=>true]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        $projects = Project::where('client_id','=',$company->id)->get();
        return view('companies.view',compact('company','projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function getCompany($id)
    {
        $company = Company::findOrFail($id);
        return response()->json($company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company = Company::find($id);
       
        $company->update(Input::all());  
        return response()->json(['success'=>true]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();    
        return response()->json(['success'=>true]);
    }
}
