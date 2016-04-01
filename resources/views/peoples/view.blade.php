@extends('layouts.app')
@section('title',"$people->name")
@section('content')
<div ng-controller="PeopleCtrl">
  <div class="content">
    <!-- START CONTAINER FLUID -->
    <div class="container-fluid container-fixed-lg">
      <!-- START PANEL -->
      <div class="panel panel-transparent">
        <div class="panel-heading">
          <div class="panel-title">
            <div class="datas company-logo">
              @if($people->photo == '')
              <div class="pic"><img src="{!! url('img/noIndustry.png') !!}" /><span>{!! $people->name !!}</span></div>
              @else
              <div class="pic"><img src="{!! url('uploads/people-thumb',$people->photo) !!}" /><span>{!! $people->name !!}</span></div>
              @endif                 
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <div ng-cloak class="panel-body" id="company_form">
          <div class="row clerfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>Website: </label>
                   <div class="view_input">{!! $people->mobile !!}</div>
                </div>
            </div>
            
          </div>

          


          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
