<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TaskCategory;
use Illuminate\Support\Facades\Input;


class TaskCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('task_categories.index',compact('categories'));   
    }
    
    public function getTaskCategories()
    {
       $categories = TaskCategory::get();
       
       return response()->json($categories);
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
        $categories=TaskCategory::create($input);
        $categories->save();
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

    public function getCategory($id)
    {
        $category = TaskCategory::findOrFail($id);
        return response()->json($category);
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
         $category = TaskCategory::find($id);
         $category->name = Input::get('name');
         $category->save();  
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
        $task_category = TaskCategory::find($id);
        $task_category->delete();    
        return response()->json(['success'=>true]);
    }
}
