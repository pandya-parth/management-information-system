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


                <div ng-cloak class="grid_list_view" ng-show="logtimes.length>0">
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
                            <div class="data_area list_view " ng-repeat="logtime in logtimes"
                            current-page="currentPage" ng-if="logtimes.length != 0">
                                <!-- row 1 -->
                                <div ng-cloak class="row border_class">
                                
                               </div>
                               <!-- row 1 complete -->
                               

                            </div>
                       </div>
    
                <div ng-cloak class="col-md-12 sm-p-t-15" ng-if="logtimes.length==0">
                            <div style="text-align:center;">
                                <img src="{!! asset('img/noCompany.png') !!}" style=" width:100px; height:100px; " />
                                <p><h3>No match found</h3></p>
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
