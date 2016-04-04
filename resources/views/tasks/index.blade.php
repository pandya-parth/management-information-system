@extends('layouts.app')
@section('title','Task')
@section('content')
<div ng-controller="TasksCtrl">
  <div class="content">
    <!-- START CONTAINER FLUID -->
    <div class="container-fluid container-fixed-lg">
      <!-- START PANEL -->
      <div class="inner">
        <!-- START BREADCRUMB -->
        <ul class="nav navbar-nav">
          <li><a href="{!!url('/projects/{% Pro_Id %}/tasks')!!}">Task</a></li>
          <li><a href="{!! url('/projects/{% Pro_Id %}/milestones') !!}">Milestone</a></li>
          <li><a href="{!! url('/project/{% Pro_Id %}/people') !!}">People</a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="panel panel-transparent">
        <div class="panel-heading">
          <div class="panel-title">
            <h4>Tasks</h4>   
          </div>
          <span><a href="{!! url('/task-categories') !!}">Add New Task Category</a></span>
          <div class="pull-right">
            <div class="col-xs-6" ng-show="tasks.length > 0" ng-cloak>
              <input ng-model="q" type="text" id="search-table" class="form-control pull-right" placeholder="Search" ng-cloak>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <div ng-cloak class="panel-body" >
          <p class="text-center" ng-show="loading"><img src="{!! asset('img/demo/progress.svg') !!}" /></p>
          <div ng-cloak class="panel-group"  role="tablist" aria-multiselectable="true" ng-repeat='task_cat in taskcategories' >
            <div ng-cloak class="panel panel-default" id="{%task_cat.id%}" class="accordion">
              <div ng-cloak class="panel-heading" role="tab" id="headingOne" >
                <h4 class="panel-title">
                  <a ng-cloak data-toggle="collapse" data-parent="#{%task_cat.id%}" href="#tasklist{% task_cat.id %}" aria-expanded="true" aria-controls="collapseOne" class='ng-binding(collapsed)'>
                    {% task_cat.name %}
                  </a>
                </h4>
              </div>
              <div id="tasklist{% task_cat.id %}" class="panel-collapse collapse in" role="tabpanel"  aria-labelledby="headingOne" aria-expanded="false">
                <div class="panel-body">
                  <div class="topTask" ng-repeat="tsk in tasks| orderBy:'-id'|filter:q" ng-if="tsk.category_id == task_cat.id "  ng-show="tasks.length != 0">
                    <div class="taskInner">
                      <div class="checkbox check-success">
                        <input type="checkbox" name="completed{%$index%}" ng-model="tsk[$index].completed" id="completed{%$index%}" ng-click="task_completed(tsk.id, tsk[$index].completed)">
                        <label for="completed{%$index%}">
                          <span class="taskBubble" ng-repeat="u in tsk.users">

                          </span>
                          <span class="task_name-{% tsk[$index].completed %}">{% tsk.name %}</span>
                        </label>
                      </div>
                    </div>
                    <div class="task_detail" style="padding:0 0 0 50px;">
                      <a class="timer timer_button" ng-click="showLogModal($event,tsk.id)" id="timer_button">
                        <i class="glyphicon glyphicon-time"></i>
                      </a>
                    </div>
                    <div class="task_detail" style="padding:0 0 0 50px;">
                      <a href="{!!url('/projects/{% tsk.project_id %}/tasks/{%tsk.id%}')!!}" class="timer timer_button"  id="view_button1">
                        <i class="fa fa-eye"></i>
                      </a>
                    </div>
                    <div class="task_detail" style="padding:0 0 0 50px;">
                      <a class="timer timer_button"  id="view_button2" ng-click="editTask(tsk.id)">
                        <i class="fa fa-edit"></i>
                      </a>
                    </div>
                    <div class="task_detail" style="padding:0 0 0 50px;">
                      <a class="timer timer_button"  id="view_button3" ng-click="deleteTask(tsk.id)">
                        <i class="fa fa-trash"></i>
                      </a>
                    </div>
                  </div>
                  <button ng-click="showModal($event)" type="button" class="btn button_color task_category"  id="{% task_cat.id %}" > <i class="fa fa-plus"></i> Add Task </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END PANEL -->
      <!-- END CONTAINER FLUID -->
    </div>
  </div>
  <!-- MODAL STICK UP  -->
  <div class="modal fade stick-up" id="addNewAppModal" tabindex="-1" role="dialog" aria-labelledby="addNewAppModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header clearfix ">
          <button type="button" class="close" data-dismiss="modal" ng-click="cancelAll()" aria-hidden="true"><i class="pg-close fs-14"></i>
          </button>
          <h4 class="p-b-5"><h4>Add New Task</h4></h4>
        </div>
        <form name="Task" class='p-t-15' role='form' novalidate>
          <div class="modal-body">
            <div class="panel panel-transparent ">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs nav-tabs-fillup">
                <li class="active"><a data-toggle="tab" href="#home" aria-expanded="true"><span>Description</span></a></li>
                <li><a data-toggle="tab" href="#menu1" aria-expanded="true"><span>Date</span></a></li>
                <li><a data-toggle="tab" href="#menu2" aria-expanded="true"><span>Priority</span></a></li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane slide-left active" id="home">
                  <div class=" row ">
                    <div class="col-md-12">
                      <div class="form-group form-group-default">
                        <label>Task Name</label>
                        <input id="name" type="text" name="name" class="form-control" placeholder="Name Of Task" ng-model='task.name' required>
                        <span class="error" ng-show="submitted && Task.name.$error.required">* Please enter Task name</span>
                      </div>
                    </div>
                  </div>
                  <div class=" row ">
                    <div class="col-md-12">
                      <div class="form-group form-group-default form-group-default-select2">
                        <label>Add People</label>
                        <select class=" full-width" data-init-plugin="select2" id="user_ids" multiple name="user_id" ng-model="task.user_id">
                          @foreach($users as $user)
                          <option value="{!! $user->user_id !!}">{!! $user->fname !!}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class=" row ">
                    <div class="col-md-12">
                      <div class="form-group form-group-default">
                        <label>Notes</label>
                        <input id="notes" type="text" name="notes" class="form-control" placeholder="Notes Of Task" ng-model='task.notes' required>
                        <span class="error" ng-show="submitted && Task.notes.$error.required">* Please enter Task Notes</span>
                      </div>
                    </div>
                    <input type="hidden" name="project_id"  ng-model="task.project_id">
                    <input type="hidden" name="category_id" ng-model="task.category_id">                                      
                  </div>
                </div>
                <div class="tab-pane slide-left" id="menu1">
                  <div class=" row ">
                    <div class="col-md-12 ">
                      <div class="datepicker" date-format="yyyy-MM-dd" selector="form-control">
                        <div class="form-group custom-datepicker form-group-default input-group col-md-12">
                          <label>Start Date</label>
                          <input type="text" name="start_date" class="form-control" placeholder="Pick a start date" id="task-start-date" ng-model='task.start_date' >
                          <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 ">
                      <div class="datepicker" date-format="yyyy-MM-dd" selector="form-control">
                        <div class="form-group custom-datepicker form-group-default input-group col-md-12">
                          <label>Due Date</label>
                          <input type="text" name="due_date" class="form-control" placeholder="Pick a due date" id="task-due-date" ng-model='task.due_date' >
                          <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane slide-left" id="menu2">
                  <div class=" row ">
                    <div class="col-md-12">
                      <label>Choose the priority of this task</label>
                      <div class="radio radio-success" ng-init="task.priority='low'">
                        <input type="radio" ng-model="task.priority" name='priority' id="none" ng-value="'none'">
                        <label for="none">None</label>
                        <input type="radio" ng-model='task.priority' name='priority' id="low" ng-value="'low'">
                        <label for="low">Low</label>
                        <input type="radio" ng-model='task.priority' name='priority' id="medium" ng-value="'medium'">
                        <label for="medium">Medium</label>
                        <input type="radio" ng-model='task.priority' name='priority' id="high" ng-value="'high'">
                        <label for="high">High</label>
                      </div>    
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button id="add-app" type="button" class="btn btn-primary  btn-cons" ng-click="submit(Task)" ng-bind="edit==false ? 'Add' : 'Edit'"></button>
            <button type="button" class="btn btn-cons" id="close" ng-click="clearAll(Task)">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- MODAL FOR LOG TIME  -->
  <div class="modal fade stick-up" id="logTimeModal" tabindex="-1" role="dialog" aria-labelledby="logTimeModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header clearfix ">
          <button type="button" class="close" ng-click="logCancel()" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
          </button>
          <h4 class="p-b-5"><h4>Log time on this task</h4></h4>
        </div>
        <form name="Logtime" class='p-t-15' role='form' novalidate>
          <div class="modal-body">
            <div class="panel panel-transparent ">
              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane slide-left active" id="loghome">
                  <div class=" row ">
                    <input type="hidden" name="task_id"  ng-model="logtime.task_id">
                    <div class="col-md-6">
                      <div class="form-group form-group-default form-group-default-select2">
                        <label>Who</label>
                        <select class="form-control input-group form-group form-group-default" id="user_ids"  name="user_id" ng-model="logtime.user_id" required>
                          @foreach($users as $user)
                          <option value="{!! $user->user_id !!}">{!! $user->fname !!}</option>
                          @endforeach
                          <span class="error" ng-show="submitted && Logtime.user_id.$error.required">* Please select User</span>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 ">
                      <div class="datepicker" date-format="yyyy-MM-dd" selector="form-control">
                        <div class="form-group custom-datepicker form-group-default input-group col-md-12">
                          <label>Date</label>
                          <input type="text" name="date" class="form-control" placeholder="Pick a date" id="log-date" ng-model='logtime.date' >
                          <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </span>
                          <span class="error" ng-show="submitted && Logtime.date.$error.required">* Please select User</span>
                        </div>
                      </div>
                    </div>
                  </div>
      
                  <div class=" row ">
                    <div class="col-md-6">

                      <div class="input-group bootstrap-timepicker timepicker">
                        <input id="timepicker1" type="text" name="start_time" class="form-control input-small" ng-model="logtime.start_time" placeholder="hh:mm:AM">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-group bootstrap-timepicker timepicker">
                        <input id="timepicker2" type="text" name="end_time" class="form-control input-small" ng-model="logtime.end_time" placeholder="hh:mm:AM">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                      </div>
                    </div>
                  <div class="clearfix"></div>
                  </div>




                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group form-group-default">
                        <label>Description</label>
                        <textarea id="description" name="description" type="text" class="form-control" placeholder="Description of Log Time" ng-model='logtime.description'></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="checkbox check-success  ">
                        <input type="checkbox" name="billable" ng-model="logtime.billable" id="k">
                        <label for="k">Billable</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button id="add-app" type="button" class="btn btn-primary  btn-cons" ng-click="submitLog(Logtime)" ng-bind="edit==false ? 'Add' : 'Edit'"></button>
            <button type="button" class="btn btn-cons" id="close" ng-click="logClearAll(Logtime)">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
