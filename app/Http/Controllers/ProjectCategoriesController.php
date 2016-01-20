<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ProjectCategory;
use Illuminate\Support\Facades\Input;
use Redirect;
use Former\Facades\Former;
use Validator;
use Image;

class ProjectCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=ProjectCategory::all();
        return view('project_categories/index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project_cats = new ProjectCategory(Input::old());
        $id=false;
        Former::populate($project_cats);
        return view('project_categories/form',compact('id','project_cats'));
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
            return redirect('project_categories/create')
                        ->withErrors($validator)
                        ->withInput();
        }  
              $input= Input::all();
             $project_cats=ProjectCategory::create($input);
             $project_cats->save();
             return Redirect::route('project_categories.index')->with("success","Record Save");
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
        $project_cats=ProjectCategory::findOrFail($id);
        Former::populate($project_cats);
        return view('project_categories.form',compact('project_cats'));
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
            return redirect('project_categories/create')
                        ->withErrors($validator)
                        ->withInput();
        }  
             $project_cats = ProjectCategory::find($id);
             $project_cats->fill( Input::all() );   
             
             $project_cats->save();
             return Redirect::route('project_categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affectedRows  = ProjectCategory::where('id', '=', $id)->delete();

        return $affectedRows;
    }
}
