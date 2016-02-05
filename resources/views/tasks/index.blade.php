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
                    <li class="active"><a href="{!! url('tasks') !!}">Task</a></li>
                    <li><a href="{!! url('milestones') !!}">Milestone</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="panel panel-transparent">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>Tasks</h4>
                    </div>
                    <div class="pull-right">
                        <div class="col-xs-6" ng-show="tasks.length > 0" ng-cloak>
                            <input ng-model="q" type="text" id="search-table" class="form-control pull-right" placeholder="Search" ng-cloak>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <table class="table table-hover demo-table-dynamic" ng-show="tasks.length != 0" ng-cloak>
                        <thead>
                        <tr>
                        <th>Id</th>
                        <th>Task Name</th>
                        <th>Action</th>
                        </tr>
                        </thead>
                        <tbody >
                            @foreach($taskCategories as $Category)
                                <li>{!! $Category->name !!}</li>
                                <li>  <button target="#addNewAppModal"  data-id="{!! $Category->id !!}" class="btn btn-primary btn-cons task_category" data-toggle="modal" data-value="{!! $Category->id !!}"><i class="fa fa-plus"></i> Add Task</button></li>
                            @endforeach

                            <tr dir-paginate="task in tasks| orderBy:'-id' | filter:q | itemsPerPage: pageSize    " current-page="currentPage" ng-show="tasks.length != 0" >
                                <td class="v-align-middle">
                                    <p  ng-cloak>{% task.id %}</p>
                                </td>
                                <td class="v-align-middle">
                                    <p ng-cloak>{% task.name ? task.name : '-' %}</p>
                                </td>
                                <td class="v-align-middle">
                                    <p ng-cloak>
                                        <a  ng-click="editTask(task.id)">Edit</a>
                                        <a  ng-click="deleteTask(task.id)">Delete</a>
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                        </table>
                        <div class="col-md-12 sm-p-t-15" ng-if="tasks.length==0" ng-cloak>
                        <div class="alert alert-warning" role="alert">
                        No record found.
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
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
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
    <li><a data-toggle="tab" href="#menu2" aria-expanded="true"><span>Assign To.</span></a></li>
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
    <div class="form-group form-group-default">
    <label>Notes</label>
    <input id="notes" type="text" name="notes" class="form-control" placeholder="Notes Of Task" ng-model='task.notes' required>
    <span class="error" ng-show="submitted && Task.notes.$error.required">* Please enter Task Notes</span>
    </div>
    </div>
    <input type="hidden" name="project_id" id="pro_id" ng-value="{!! $id !!}" ng-model="task.project_id">
    <input type="hidden" name="category_id" id="cat_id" ng-model="task.category_id">                                      
    </div>
    </div>
    <div class="tab-pane slide-left" id="menu1">
    <div class=" row ">
    <div class="col-md-12">
    <div class="form-group form-group-default input-group col-md-12">
    <label>Start Date</label>
    <input type="text" name="start_date" class="form-control" placeholder="Pick a start date" id="task-start-date" ng-model='task.start_date'>
    <span class="input-group-addon">
    <i class="fa fa-calendar"></i>
    </span>
    </div>
    </div>
    </div>
    <div class="row">
    <div class="col-md-12">
    <div class="form-group form-group-default input-group col-md-12">
    <label>Due Date</label>
    <input type="text" name="due_date" class="form-control" placeholder="Pick a due date" id="due-date" ng-model='task.due_date'>
    <span class="input-group-addon">
    <i class="fa fa-calendar"></i>
    </span>
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
    <button type="button" class="btn btn-cons" id="close" ng-click="clearAll()">Close</button>
    </div>
    </form>
    </div>
    </div>
    </div>
</div>
@endsection
