<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Support\Facades\Input;
use Redirect;
use Former\Facades\Former;
use Validator;
use Image;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project=Project::all();
        return view('projects/index',compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = new Project(Input::old());
        $id=false;
        Former::populate($projects);
        return view('projects/form',compact('id','projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:30'
            ]);
        if ($validator->fails()) {
            return redirect('projects/create')
                        ->withErrors($validator)
                        ->withInput();
        }  
              $input= Input::all();
             $projects=Project::create($input);
             $projects->save();
             return Redirect::route('projects.index')->with("success","Record Save");
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
        $projects=Project::findOrFail($id);
        Former::populate($projects);
        return view('projects.form',compact('projects'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:30',
           'description'=>'required'
        ]);
        if ($validator->fails()) {
            return redirect('project/create')
                        ->withErrors($validator)
                        ->withInput();
        }  
             $projects = Project::find($id);
             $projects->fill( Input::all() );   
             
             $projects->save();
             return Redirect::route('project.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affectedRows  = Project::where('id', '=', $id)->delete();

    return $affectedRows;
    }
}
