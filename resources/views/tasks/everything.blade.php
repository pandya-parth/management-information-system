@extends('layouts.app')
@section('title','Task')
@section('content')
<div ng-controller="TasksCtrl">
  <div class="content">
    <!-- START CONTAINER FLUID -->
    <div class="container-fluid container-fixed-lg">
      <!-- START PANEL -->
      <div class="panel panel-transparent">
        <div class="panel-heading">
          <div class="panel-title">
            <h4>All Tasks</h4>   
          </div>
          <div class="pull-right">
            <div class="col-xs-6" ng-show="tasks.length > 0" ng-cloak>
              <input ng-model="q" type="text" id="search-table" class="form-control pull-right" placeholder="Search" ng-cloak>
            </div>
            <div class="col-xs-4">
              <form action="{!! url('/exportTask') !!}" method="GET">
                            <button id="export-button" class="btn button_color">Export</button>
                            </form>
                        </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <div ng-cloak class="panel-body" >
          <p class="text-center" ng-show="loading"><img src="{!! asset('img/demo/progress.svg') !!}" /></p>
          <div ng-cloak class="panel-group"  role="tablist" aria-multiselectable="true" >
            @foreach($task_categories as $category)
            <div  class="accordion">
              <div ng-cloak class="panel-heading" role="tab" id="headingOne" >
                <h4 class="panel-title">
                  <a>
                    {!! $category->name !!}
                  </a>
                </h4>
              </div>
              <div id="tasklist{!! $category->id !!}" class="panel-collapse collapse in" role="tabpanel"  aria-labelledby="headingOne" aria-expanded="false">
                <div class="panel-body">
                  <div class="topTask" >
                    @foreach($tasks as $task)
                    @if($category->id == $task->category_id)
                    <div class="taskInner">
                      <div class="checkbox check-success">
                        <input type="checkbox" name="status[]" id="checkbox-{!! $task->id !!}">
                        <label for="checkbox-{!! $task->id !!}">
                          <span class="taskBubble">{!! $task->id !!}</span>
                          <span class="task_name">{!! $task->name !!}</span>
                        </label>
                      </div>
                    </div>
                    
                    <div class="task_detail" style="padding:0 0 0 50px;">
                      <a href="{!!url('/projects'),'/',$task->project_id,'/tasks','/',$task->id !!}" class="timer timer_button"  id="view_button1">
                        <i class="fa fa-eye"></i>
                      </a>
                    </div>
                    
                    </br>
                    @endif
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      <!-- END PANEL -->
      <!-- END CONTAINER FLUID -->
    </div>
  </div>
</div>
@endsection
