@extends('layouts.app')
@section('title','Task')
@section('content')
  <div ng-controller="TasksCtrl">
    <div class="content">
      <div class="container-fluid container-fixed-lg">
        <div class="inner">
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
                  <li>  <button target="#addNewAppModal"  data-id="{!! $Category->id !!}" class="btn btn-primary btn-cons task_category" data-toggle="modal" data-value="{!! $Category->id !!}"><i class="fa fa-plus"></i> Add Task</li>
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
      </div>    
    </div>
  </div>
@endsection