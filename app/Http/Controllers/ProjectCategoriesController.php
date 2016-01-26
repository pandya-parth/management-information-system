<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

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
        return view('project_categories.index',compact('categories'));   
    }

    public function getProjectCategories()
    {
       $categories = ProjectCategory::get();
       return response()->json($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
            $categories=ProjectCategory::create($input);
            $categories->save();
            // return Redirect::route('project-categories.index')->with("success","Record Save");
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
        $categories=ProjectCategory::findOrFail($id);
        Former::populate($categories);
        return view('project_categories.form',compact('categories'));
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
             $categories = ProjectCategory::find($id);
             $categories->fill( Input::all() );   
             
             $categories->save();
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
        $project_category = ProjectCategory::find($id);
        $project_category->delete();    

        return response()->json(['success'=>true]);
    }
}
