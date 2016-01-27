<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\People;
class PeoplesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $peoples=People::all();
        return view('peoples/index',compact('peoples'));
    }

    public function getPeoples()
    {
       $peoples = People::get();
       return response()->json($peoples);
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
            $peoples=People::create($input);
            $peoples->save();
            // return Redirect::route('people.index')->with("success","Record Save");
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
        $peoples=People::findOrFail($id);
        Former::populate($peoples);
        return view('peoples.form',compact('peoples'));
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
            'name' => 'required|min:3|max:30'
           
        ]);
        if ($validator->fails()) {
            return redirect('people/create')
                        ->withErrors($validator)
                        ->withInput();
        }  
             $peoples = People::find($id);
             $peoples->fill( Input::all() );   
             
             $peoples->save();
             return Redirect::route('people.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $people = People::find($id);
        $people->delete();    

        return response()->json(['success'=>true]);
    }
}
