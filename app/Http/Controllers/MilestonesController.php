<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Milestone;
use Illuminate\Support\Facades\Input;
use Redirect;
use Former\Facades\Former;
use Validator;
use Image;

class MilestonesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $milestones=Milestone::all();
        return view('milestones/index',compact('milestones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $milestones = new Milestone(Input::old());
        $id=false;
        Former::populate($milestones);
        return view('milestones/form',compact('id','milestones'));
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
            return redirect('milestones/create')
                        ->withErrors($validator)
                        ->withInput();
        }  
              $input= Input::all();
             $milestones=Milestone::create($input);
             $milestones->save();
             return Redirect::route('milestones.index')->with("success","Record Save");
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
        $milestones=Milestone::findOrFail($id);
        Former::populate($milestones);
        return view('milestones.form',compact('milestones'));
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
            return redirect('milestone/create')
                        ->withErrors($validator)
                        ->withInput();
        }  
             $milestones = Milestone::find($id);
             $milestones->fill( Input::all() );   
             
             $milestones->save();
             return Redirect::route('milestone.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affectedRows  = Milestone::where('id', '=', $id)->delete();

        return $affectedRows;
    }
}
