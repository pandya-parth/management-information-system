@extends('layouts.app')
@section('title',"$company->name")
@section('content')
<div ng-controller="ProjectCtrl">
  <div class="content">
    <!-- START CONTAINER FLUID -->
    <div class="container-fluid container-fixed-lg">
      <!-- START PANEL -->
      <div class="panel panel-transparent">
        <div class="panel-heading">
          <div class="panel-title">
            <div class="datas people_id_pic">
              @if($company->logo == '')
              <div class="pic"><img src="{!! url('img/noIndustry.png') !!}" /><span>{!! $company->name !!}</span></div>
              @else
              <div class="pic"><img src="{!! url('uploads/company-thumb',$company->logo) !!}" /><span>{!! $company->name !!}</span></div>
              @endif                 
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <div ng-cloak class="panel-body" >
          <div> <b> Website: </b>  {!! $company->website !!}</div><hr />
          <div> <b> Email: </b>  {!! $company->email !!}</div><hr />
          <div> <b> Phone: </b>  {!! $company->phone !!}</div><hr />
          <div> <b> Fax: </b>  {!! $company->fax !!}</div><hr />
          <div> <b> Street 1: </b>  {!! $company->adrs1 !!}</div><hr />
          <div> <b> Street 2: </b>  {!! $company->adrs2 !!}</div><hr />
          <div> <b> City: </b>  {!! $company->city !!}</div><hr />
          <div> <b> State: </b>  {!! $company->state !!}</div><hr />
          <div> <b> Country: </b>  {!! $company->country !!}</div><hr />
          <div> <b> Zipcode: </b>  {!! $company->zipcode !!}</div><hr />
          <div><b>Projects: </b> 
            @foreach($projects as $project)
            <a href="{!! url('/projects',$project->id)!!}">{!! $project->name !!}</a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
