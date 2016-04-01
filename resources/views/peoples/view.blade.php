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

            <div class="datas company-logo">
              @if($people->logo == '')
              <div class="pic"><img src="{!! url('img/noPhoto.png') !!}" /><span>{!! $people->fname !!}</span></div>
              @else
              <div class="pic"><img src="{!! url('uploads/people-thumb',$people->photo) !!}" /><span>{!! $people->name !!}{!! $people->lname !!}</span></div>
             @endif           
            </div>

          </div>
          <div class="clearfix"></div>
        </div>
        <div ng-cloak class="panel-body" id="company_form">

          <div class="row clerfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label><b>Mobile: </b></label>
                   <div class="view_input">{!! $people->mobile !!}</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label><b>Phone:</b> </label>
                   <div class="view_input">{!! $people->phone !!}</div>
                </div>
            </div>
          </div>

          <div class="row clerfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label><b>Address:</b> </label>
                   <div class="view_input">{!! $people->adrs1 !!}    {!! $people->adrs2 !!}</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label><b>City:</b> </label>
                   <div class="view_input">{!! $people->city !!}</div>
                </div>
            </div>
          </div>

          <div class="row clerfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label><b>State:</b> </label>
                   <div class="view_input">{!! $people->state !!}</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label><b>Country:</b> </label>
                   <div class="view_input">{!! $people->country !!}</div>
                </div>
            </div>
          </div>

          <div class="row clerfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label><b>Zipcode: </b></label>
                   <div class="view_input">{!! $people->zipcode !!}</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label><b>D.O.B:</b> </label>
                   <div class="view_input">{!! $people->dob !!}</div>
                </div>
            </div>
          </div>

          <div class="row clerfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label><b>Gender: </b></label>
                   <div class="view_input">{!! $people->gender !!}</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label><b>Marital status:</b> </label>
                   <div class="view_input">{!! $people->marital_status !!}</div>
                </div>
            </div>
          </div>

          <div class="row clerfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label><b>Pan Number:</b> </label>
                   <div class="view_input">{!! $people->pan_number !!}</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label><b>Department:</b> </label>
                   <div class="view_input">{!! $people->department->name !!}</div>
                </div>
            </div>
          </div>

          <div class="row clerfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label><b>Designation:</b> </label>
                   <div class="view_input">{!! $people->designation->name !!}</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label><b>Management Leval: </b></label>
                   <div class="view_input">{!! $people->management_leval !!}</div>
                </div>
            </div>
          </div>

          <div class="row clerfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label><b>Join Date:</b></label>
                   <div class="view_input">{!! $people->join_date !!}</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label><b>Atach:</b> </label>
                   <div class="view_input">{!! $people->attach !!}</div>
                </div>
            </div>
          </div>

          <div class="row clerfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label><b>Google: </b></label>
                   <div class="view_input">{!! $people->google !!}</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label><b>Facebook:</b> </label>
                   <div class="view_input">{!! $people->facebook !!}</div>
                </div>
            </div>
          </div>

          <div class="row clerfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label><b>Website: </b></label>
                   <div class="view_input">{!! $people->website !!}</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label><b>Skype: </b></label>
                   <div class="view_input">{!! $people->skype !!}</div>
                </div>
            </div>
          </div>

          <div class="row clerfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label><b>Linkedin: </b></label>
                   <div class="view_input">{!! $people->linkedin !!}</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label><b>Twitter: </b></label>
                   <div class="view_input">{!! $people->twitter !!}</div>
                </div>
            </div>
          </div>

           <div class="row clerfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label><b>Projects: </b></label>
                  @foreach($projects as $project)
                   <div class="view_input">{!! $project->name !!}</div>
                   @endforeach
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
