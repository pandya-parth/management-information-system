<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Task;
use App\LogTime;
use App\User;
use App\Project;
use App\TaskCategory;
use App\People;
use Redirect;
use Auth;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    { 
        $tasks=Project::find($id);
        $projects=Project::all();
        $taskCategories=TaskCategory::all();
        $peoples=People::all();
        $users=People::with('user')->get();
        return view('tasks/index',compact('tasks','projects','taskCategories','peoples','id','users'));
    }

    


    public function getTasks(Request $request)
    {
        
        $tasks =  Task::whereProjectId($request->get('project_id'))->get();
         
        //$tasks = Task::find_by_project_id($pId)->get();
        return response()->json($tasks); 
    }

    public function getLogtimes()
    {
        $logs = LogTime::all();
        return response()->json($logs);
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
        $tasks=Task::create(Input::all());
        $tasks->users()->attach($request->get('user_id'));
        $tasks->status = false;
        $tasks->save();
        return response()->json(['success'=>true]);
        
    }
    public function logStore(Request $request)
    {
        $start_time =  $request->get('start_time');
        $end_time =  $request->get('end_time');

        $t1  = strtotime($start_time);
        $t2 = strtotime($end_time);

        $differenceInSeconds = $t2 - $t1;
        $differenceInMinutes = $differenceInSeconds / 60;
        $differenceInHours = $differenceInSeconds / 3600;

        if($differenceInHours<0) {
        $differenceInHours += 24; 
        }
        $logtimes=LogTime::create(Input::all());
        $logtimes->billable = false;
        $logtimes->hour = $differenceInHours;
        $logtimes->minute = $differenceInMinutes;
        $logtimes->save();
        return response()->json(['success'=>true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $project = Project::find($id); 
        $task = Task::where('project_id','=',$project->id)->get();
        $logs = LogTime::with('task')->get();
        return view('tasks.view',compact('logs'));

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

    public function getLogtime($id)
    {
        $logtime = LogTime::findOrFail($id);
        return response()->json($logtime);
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

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

    public function logUpdate(Request $request, $id)
    {
        $logtime = Logtime::find($request->get('id')); 
        $logtime->update(Input::all());
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
    public function logDestroy($id)
    {
     
        $logtime = Logtime::find($id);
        $logtime->delete();    
        return response()->json(['success'=>true]);
    }
}
