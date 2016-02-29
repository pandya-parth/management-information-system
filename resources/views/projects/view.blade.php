@extends('layouts.app')
@section('title','Task')
@section('content')
<div ng-controller="ProjectCtrl">
  <div class="content">
    <!-- START CONTAINER FLUID -->
    <div class="container-fluid container-fixed-lg">
      <!-- START PANEL -->
      <div class="inner">
        <!-- START BREADCRUMB -->
        <ul class="nav navbar-nav">
          <li class="active"><a href="{!!url('/projects/{% Pro_Id %}')!!}">Overview</a></li>
          <li><a href="{!!url('/projects/{% Pro_Id %}/tasks')!!}">Task</a></li>
          <li><a href="{!! url('/projects/{% Pro_Id %}/milestones') !!}">Milestone</a></li>
          <li><a href="{!! url('/project/{% Pro_Id %}/people') !!}">People</a></li>
        </ul>
        <div class="clearfix"></div>
      </div>



      <div class="panel panel-transparent">
        <div class="panel-heading">
          <div class="panel-title">
            <h4>{!! $project->name !!}</h4>
            
          </div>
          
          <div class="clearfix"></div>
        </div>
        <div ng-cloak class="panel-body" >
        <div>{!! $project->company->name !!}</div>
        <div>{!! $project->category->name !!}</div>
        <div>{!! $project->description !!}</div>
        <div>{!! $project->price_types !!}</div>
        <div>{!! $project->status !!}</div>
        <div>{!! $project->start_date !!}</div>
        <div>{!! $project->end_date !!}</div>
    </div>
  </div>

  
</div>
</div>
</div>
@endsection
