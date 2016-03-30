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
            <h4>All Tasks</h4>
          </div>
          <div class="pull-right">
            <div class="col-xs-6" ng-show="logs.length > 0" ng-cloak>
              <input ng-model="q" type="text" id="search-table" class="form-control pull-right" placeholder="Search" ng-cloak>
            </div>
            <div class="col-xs-4">
              <form action="{!! url('/exportTask') !!}" method="GET">
                <button id="export-button" class="btn button_color">Export</button>
              </form>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="panel-body">
          <p class="text-center" ng-show="loading"><img src="{!! asset('img/demo/progress.svg') !!}" /></p>
          <div ng-cloak class="grid_list_view" ng-show="logs.length>0">
            <div class="head list_view border_class">
              <div class="row">
                <div class="datas people_name">Date</div>
                <div class="datas people_name">Who</div>
                <div class="datas people_name">Description</div>
                <div class="datas people_name">start Time</div>
                <div class="datas people_name">End Time</div>
                <div class="datas people_action pull-right">Action</div>
              </div>
            </div>
            <div class="data_area list_view " dir-paginate="(key, value) in logs| orderBy:'-id' | filter:q | itemsPerPage: pageSize | groupBy: 'date'"
            current-page="currentPage" ng-show="logs.length != 0">
            <span class="date_class">{% key %}</span>
            <!-- row 1 -->
            <div ng-cloak class="row border_class" ng-repeat="log in value">
              <div ng-cloak class="datas people_name box_real">
                {% log.date | date:'shortDate' %}
              </div>
              <div ng-cloak class="datas people_name box_real">
                {% log.user_id ? log.user_id : '-' %}
              </div>
              <div ng-cloak class="datas people_name box_real">
                {% log.description ? log.description : '-' %}
              </div>
              <div ng-cloak class="datas people_name box_real">
                {% log.start_time ? log.start_time : '-' %}
              </div>
              <div ng-cloak class="datas people_name box_real">
                {% log.end_time ? log.end_time : '-' %}
              </div>
              <div class="datas people_action pull-right">
                <a class="btn btn-success btn-sm" ng-click="editLog(log.id)" ><i class="fa fa-edit"></i></a>
                <a class="btn btn-success btn-sm" ng-click="deleteLog(log.id)" ><i class="fa fa-trash"></i></a>
              </div>
            </div>
            <!-- row 1 complete -->
          </div>
        </div>
        <div ng-cloak class="col-md-12 sm-p-t-15" ng-if="categories.length==0">
          <div style="text-align:center;">
            <img src="{!! asset('img/noTasks.png') !!}"  />
            <p><h3>No found</h3></p>
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
