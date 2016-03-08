@extends('layouts.app')
@section('title','Task')
@section('content')
<div ng-controller="TaskCategoryCtrl">
  <div class="content">
    <!-- START CONTAINER FLUID -->
    <div class="container-fluid container-fixed-lg">
      <!-- START PANEL -->
      <div class="panel panel-transparent">
        <div class="panel-heading">
          <div class="panel-title">
            <h4>{!! $project_category->name !!}</h4>
            @foreach($projects as $project)
            <span><a href="{!! url('/projects',$project->id)!!}"><p>{!! $project->name !!}</p></a></span></br>
            @endforeach
          </div>
          <div class="pull-right">
            <div class="col-xs-6" ng-cloak>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="panel-body">
        </div>
      </div>
      <!-- END PANEL -->
      <!-- END CONTAINER FLUID -->
    </div>
  </div>
</div>
@endsection
