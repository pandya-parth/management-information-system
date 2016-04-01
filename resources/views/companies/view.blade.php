@extends('layouts.app')
@section('title',"$company->name")
@section('content')
<div ng-controller="companyCtrl">
  <div class="content">
    <!-- START CONTAINER FLUID -->
    <div class="container-fluid container-fixed-lg">
      <!-- START PANEL -->
      <div class="panel panel-transparent">
        <div class="panel-heading">
          <div class="panel-title">
            <div class="datas company-logo">
              @if($company->logo == '')
              <div class="pic"><img src="{!! url('img/noIndustry.png') !!}" /><span>{!! $company->name !!}</span></div>
              @else
              <div class="pic"><img src="{!! url('uploads/company-thumb',$company->logo) !!}" /><span>{!! $company->name !!}</span></div>
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
                   <div class="view_input">{!! $company->website !!}</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>Email: </label>
                   <div class="view_input">{!! $company->website !!}</div>
                </div>
            </div>
          </div>

          <div class="row clerfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>Phone: </label>
                   <div class="view_input">{!! $company->website !!}</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>Fax: </label>
                   <div class="view_input">{!! $company->website !!}</div>
                </div>
            </div>
          </div>

          <div class="row clerfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>Address: </label>
                   <div class="view_input">{!! $company->website !!}</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>City: </label>
                   <div class="view_input">{!! $company->website !!}</div>
                </div>
            </div>
          </div>

          <div class="row clerfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>State: </label>
                   <div class="view_input">{!! $company->website !!}</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>Country: </label>
                   <div class="view_input">{!! $company->website !!}</div>
                </div>
            </div>
          </div>

          <div class="row clerfix">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>Zipcode: </label>
                   <div class="view_input">{!! $company->website !!}</div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <label>Projects: </label>
                   <div class="view_input">{!! $company->website !!}</div>
                </div>
            </div>
          </div>


          {{-- <div> <b> Website: </b>  </div><hr />
          <div> <b> Email: </b>  {!! $company->email !!}</div><hr />
          <div> <b> Phone: </b>  {!! $company->phone !!}</div><hr />
          <div> <b> Fax: </b>  {!! $company->fax !!}</div><hr />
          <div> <b> Address </b>  {!! $company->adrs1 !!} {!! $company->adrs2 !!}</div><hr />
          <div> <b> City: </b>  {!! $company->city !!}</div><hr />
          <div> <b> State: </b>  {!! $company->state !!}</div><hr />
          <div> <b> Country: </b>  {!! $company->country !!}</div><hr />
          <div> <b> Zipcode: </b>  {!! $company->zipcode !!}</div><hr />
          <div><b>Projects: </b> 
            @foreach($projects as $project)
            <a href="{!! url('/projects',$project->id)!!}">{!! $project->name !!}</a>
            @endforeach
          </div> --}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
