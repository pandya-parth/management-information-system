@extends('layouts.app')
@section('title','Task')
@section('content')
<div ng-controller="TasksCtrl">
  <div class="content">
    <!-- START CONTAINER FLUID -->
    <div class="container-fluid container-fixed-lg">
      <!-- START PANEL -->
      
      <div class="panel panel-transparent">
        <div class="panel-heading">
          <div class="panel-title">
            <h4>Log Time</h4>
            
            </div>
          
          <div class="clearfix"></div>
        </div>
       <div class="panel-body">


        <p class="text-center" ng-show="loading"><img src="{!! asset('img/demo/progress.svg') !!}" /></p>


                <div  class="grid_list_view" >
                            <div class="head list_view border_class">
                                <div class="row">
                                    <div class="datas people_name">Date</div>
                                    <div class="datas people_name">Who</div>
                                    <div class="datas people_name">Description</div>
                                    <div class="datas people_designation">Start Time</div>
                                    <div class="datas people_email">End Time</div>
                                    <div class="datas people_phone">Total Time</div>
                                </div>
                            </div>
                            <div class="data_area list_view " current-page="currentPage" >
                                <!-- row 1 -->
                                @foreach($logs as $log)
                                <div class="row border_class">
                                {!! $log->date !!}
                               </div>
                               <div class="row border_class">
                                {!! $log->user_id !!}
                               </div>
                               <div class="row border_class">
                                {!! $log->description !!}
                               </div>
                               <div class="row border_class">
                                {!! $log->start_time !!}
                               </div>
                               <div class="row border_class">
                                {!! $log->end_time !!}
                               </div>
                               
                                
                               @endforeach
                               <!-- row 1 complete -->
                               

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
