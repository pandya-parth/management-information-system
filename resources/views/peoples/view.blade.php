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

            <div class="datas people-logo">
              @if($people->logo == '')
              <div class="pic"><img src="{!! url('img/noPhoto.png') !!}" /><span>{!! $people->name !!}</span></div>
              @else
              uploads/people-thumb/{%people.photo%}
              <div class="pic"><img src="{!! url('uploads/people-thumb/{{$people->photo}}') !!}" /><span>{!! $people->fname !!}{!! $people->lname !!}</span></div>
              @endif                 

            <h4>{!! $people->fname !!}</h4>
            {!! $people->department->name !!}
            
          </div>
          <div class="pull-right">
            <div class="col-xs-6" ng-cloak>

            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <div ng-cloak class="panel-body" id="people_form">
          <div class="row clerfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>Mobile: </label>
                   <div class="view_input">{!! $people->mobile !!}</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>Phone: </label>
                   <div class="view_input">{!! $people->phone !!}</div>
                </div>
            </div>
          </div>

          <div class="row clerfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>Address: </label>
                   <div class="view_input">{!! $people->adrs1 !!}{!! $people->adrs2 !!}</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>City: </label>
                   <div class="view_input">{!! $people->city !!}</div>
                </div>
            </div>
          </div>

          <div class="row clerfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>State: </label>
                   <div class="view_input">{!! $people->state !!}</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>Country: </label>
                   <div class="view_input">{!! $people->country !!}</div>
                </div>
            </div>
          </div>

          <div class="row clerfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>Zipcode: </label>
                   <div class="view_input">{!! $people->zipcode !!}</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>dob: </label>
                   <div class="view_input">{!! $people->dob !!}</div>
                </div>
            </div>
          </div>

          <div class="row clerfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>Gender: </label>
                   <div class="view_input">{!! $people->gender !!}</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>Marital status: </label>
                   <div class="view_input">{!! $people->marital_status !!}</div>
                </div>
            </div>
          </div>

          <div class="row clerfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>Pan Number: </label>
                   <div class="view_input">{!! $people->pan_number !!}</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>Department: </label>
                   <div class="view_input">{!! $people->department->name !!}</div>
                </div>
            </div>
          </div>

          <div class="row clerfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>Designation: </label>
                   <div class="view_input">{!! $people->gender !!}</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>Marital status: </label>
                   <div class="view_input">{!! $people->designation !!}</div>
                </div>
            </div>
          </div>

          <div class="row clerfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>Management leval: </label>
                   <div class="view_input">{!! $people->management_leval !!}</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>Join Date: </label>
                   <div class="view_input">{!! $people->join_date !!}</div>
                </div>
            </div>
          </div>

          <div class="row clerfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>Atach: </label>
                   <div class="view_input">{!! $people->attach !!}</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>Google: </label>
                   <div class="view_input">{!! $people->google !!}</div>
                </div>
            </div>
          </div>

          <div class="row clerfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>Facebook: </label>
                   <div class="view_input">{!! $people->facebook !!}</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>Website: </label>
                   <div class="view_input">{!! $people->website !!}</div>
                </div>
            </div>
          </div>

          <div class="row clerfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>Skype: </label>
                   <div class="view_input">{!! $people->skype !!}</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>Linkedin: </label>
                   <div class="view_input">{!! $people->linkedin !!}</div>
                </div>
            </div>
          </div>

           <div class="row clerfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>Twitter: </label>
                   <div class="view_input">{!! $people->twitter !!}</div>
                </div>
            </div>
          </div>
          

        </div>
      </div>
      <!-- END PANEL -->
      <!-- END CONTAINER FLUID -->
    </div>
  </div>
</div>
@endsection
