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
use App\TaskUser;
use App\People;
use Redirect;
use Auth;
use Excel;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    { 
        $projects=Project::all();
        $taskCategories=TaskCategory::all();
        $peoples=People::all();
        $users=People::with('user')->get();
        $tasks = Task::where('project_id','=',$id)->get();
        return view('tasks/index',compact('tasks','projects','taskCategories','peoples','id','users'));
    }

    


    public function getTasks(Request $request)
    {
        
        $tasks =  Task::whereProjectId($request->get('project_id'))->with('users')->get();
        
        return response()->json($tasks); 
    }

    public function getLogtimes(Request $request)
    {
        $logs = LogTime::whereTaskId($request->get('task_id'))->get();
        return response()->json($logs);
    }

    public function postTaskStatus(Request $request)
    {
        $task = Task::find(Input::get('id'));
        $task->completed = Input::get('completed');
        $task->save();
        return response()->json(['success'=>true]);
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
        $tasks->completed = false;
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
        $users = People::with('user')->get();
        $project = Project::find($id); 
        $task = Task::where('project_id','=',$project->id)->get();
        $logs = LogTime::with('task')->get();
        return view('tasks.view',compact('logs','users'));

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

    public function everything()
    {
        $tasks = Task::with('users')->oredrBy('created_at','desc')->get();
        $task_categories = TaskCategory::all();
        return view('tasks/everything',compact('tasks','task_categories'));
    }
    public function exportTask(){

        Excel::create('tasks', function($excel) {

            $excel->sheet('Sheet1', function($sheet) {
  $sheet->row(1, '');

                $employees = Task::all();

                $arr =array();
                foreach($employees as $employee) {
                    
                        $data =  array($employee->id, $employee->project->name, $employee->name, $employee->notes, $employee->start_date, $employee->due_date,
                             $employee->category->name, $employee->created_at, $employee->updated_at);
                        array_push($arr, $data);
                    
                }

                //set the titles
                $sheet->fromArray($arr,null,'A1',false,false)->prependRow(array('Task Id', 'Project Name', 'Task Name', 'Notes', 'Start Date', 'Due Date', 'Task Category Name', 'Created At', 'Updated At')

                );

            });

            })->export('xls');

        }
}
