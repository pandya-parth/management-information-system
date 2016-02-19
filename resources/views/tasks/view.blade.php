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
            {% logs %}
          </div>
          <div class="pull-right">
            <div class="col-xs-6" ng-show="tasks.length > 0" ng-cloak>
              <input ng-model="q" type="text" id="search-table" class="form-control pull-right" placeholder="Search" ng-cloak>
            </div>
            <div class="col-xs-6" ng-cloak>
            <button ng-click="showModal($event)" type="button" class="btn btn-primary btn-cons task_category"  id="{% task_cat.id %}" > <i class="fa fa-plus"></i> Add Task </button>
          </div>
          </div>
          <div class="clearfix"></div>
        </div>
       <div class="panel-body">


        <p class="text-center" ng-show="loading"><img src="{!! asset('img/demo/progress.svg') !!}" /></p>


                <div ng-cloak class="grid_list_view" ng-show="companies.length>0">
                            <div class="head list_view border_class">
                                <div class="row">
                                    <div class="datas people_id_pic">Logo</div>
                                    <div class="datas people_name">Name</div>
                                    <div class="datas people_designation">Website</div>
                                    <div class="datas people_email">Email</div>
                                    <div class="datas people_phone">Phone</div>
                                    <div class="datas people_action">Action</div>
                                </div>
                            </div>
                            <div class="data_area list_view " ng-repeat="company in companies"
                            current-page="currentPage" ng-if="companies.length != 0">
                                <!-- row 1 -->
                                <div ng-cloak class="row border_class">
                                
                               </div>
                               <!-- row 1 complete -->
                               

                            </div>
                       </div>
    
                <div ng-cloak class="col-md-12 sm-p-t-15" ng-if="companies.length==0">
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
  <!-- MODAL STICK UP  -->
  <div class="modal fade stick-up" id="addNewAppModal" tabindex="-1" role="dialog" aria-labelledby="addNewAppModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header clearfix ">
          <button type="button" class="close" data-dismiss="modal" ng-click="cancelAll()" aria-hidden="true"><i class="pg-close fs-14"></i>
          </button>
          <h4 class="p-b-5"><h4>Add New Task</h4></h4>
        </div>
        <form name="Task" class='p-t-15' role='form' novalidate>
          <div class="modal-body">








            
          </div>
          <div class="modal-footer">
            <button id="add-app" type="button" class="btn btn-primary  btn-cons" ng-click="submit(Task)" ng-bind="edit==false ? 'Add' : 'Edit'"></button>
            <button type="button" class="btn btn-cons" id="close" ng-click="clearAll(Task)">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  
</div>
@endsection
