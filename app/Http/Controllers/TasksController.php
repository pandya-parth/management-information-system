<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Task;
use App\Project;
use App\TaskCategory;
use App\People;
use Redirect;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    { 
        $tasks=Project::find($id);
        $projects=Project::all();
        $taskCategories=TaskCategory::all();
        $peoples=People::all();
        return view('tasks/index',compact('tasks','projects','taskCategories','peoples','id'));
    }


    public function getTasks(Request $request)
    {
        $tasks =  Task::whereProjectId($request->get('project_id'))->get();
         
        //$tasks = Task::find_by_project_id($pId)->get();
        return response()->json($tasks); 
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
        $tasks=Task::create($input);
        $tasks->save();
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

    public function getTask($id)
    {
        $task = Task::findOrFail($id);
        return response()->json($task);
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
         $task = Task::find($request->get('id')); 
         $task->update(Input::all());
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
        $task = Task::find($id);
        $task->delete();    
        return response()->json(['success'=>true]);
    }
}
