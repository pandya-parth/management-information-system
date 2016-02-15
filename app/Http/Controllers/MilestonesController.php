<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Milestone;
use App\Project;
use App\User;
use App\People;
use Redirect;

class MilestonesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    { 
        $milestones=Project::find($id);
        $peoples=People::all();
        $users = User::all();
        return view('milestones/index',compact('milestones','peoples','id','users'));
    }


    public function getMilestones(Request $request)
    {
        $milestones =  Milestone::whereProjectId($request->get('project_id'))->get();
         
        //$milestones = Milestone::find_by_project_id($pId)->get();
        return response()->json($milestones); 
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

        $input= Input::all();
        $milestones=Milestone::create($input);
        $milestones->save();
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
        //
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

    public function getMilestone($id)
    {
        $milestone = Milestone::findOrFail($id);
        return response()->json($milestone);
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
         $milestone = Milestone::find($request->get('id')); 
         $milestone->update(Input::all());
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
        $milestone = Milestone::find($id);
        $milestone->delete();    
        return response()->json(['success'=>true]);
    }
}
