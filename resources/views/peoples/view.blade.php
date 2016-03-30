@extends('layouts.app')
@section('title','People')
@section('content')
<div ng-controller="PeopleCtrl">
  <div class="content">
    <!-- START CONTAINER FLUID -->
    <div class="container-fluid container-fixed-lg">
      <!-- START PANEL -->
      <div class="panel panel-transparent">
        <div class="panel-heading">
          <div class="panel-title">
            <h4>{!! $people->fname !!}</h4>
            {!! $people->department->name !!}
            @foreach($projects as $project)
            <div>Project Name: <a href="{!! url('/projects',$project->id)!!}">{!! $project->name !!}</a></div></br>
            <div>Description: {!! $project->description !!}</div></br>
            <div>Start Date: {!! $project->start_date !!}</div></br>
            <div>Status: {!! $project->status !!}</div></br>
            <div>Company Name: {!! $project->company->name !!}</div></br><hr />
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
