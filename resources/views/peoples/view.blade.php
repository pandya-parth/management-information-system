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
              <div class="pic"><img src="{!! url('uploads/people-thumb/{{$people->photo}}') !!}" /><span><h4>{!! $people->fname !!}{!! $people->lname !!}</h4></span></div>
              @endif           
            </div>
          
          <div class="clearfix"></div>
        </div>
        
      </div>
      <!-- END PANEL -->
      <!-- END CONTAINER FLUID -->
    </div>
  </div>
</div>
@endsection
