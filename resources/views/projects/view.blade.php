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
        <div> <b> Company: </b>  {!! $project->company->name !!}</div><hr />
        <div> <b> category: </b>  {!! $project->category->name !!}</div><hr />
        <div> <b> Description: </b>  {!! $project->description !!}</div><hr />
        <div> <b> Price Types: </b>  {!! $project->price_types !!}</div><hr />
        <div> <b> Status: </b>  {!! $project->status !!}</div><hr />
        <div> <b> Start Date: </b>  {!! $project->start_date !!}</div><hr />
        <div> <b> End Date: </b>  {!! $project->end_date !!}</div>
    </div>
  </div>

  
</div>
</div>
</div>
@endsection
