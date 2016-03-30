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
                        <div class="data_area list_view " dir-paginate="log in logs| orderBy:'-id' | filter:q | itemsPerPage: pageSize"
                        current-page="currentPage" ng-show="logs.length != 0">

                        <!-- row 1 -->
                        <div ng-cloak class="row border_class">
                            <div ng-cloak class="datas people_name box_real">
                                {% log.date ? log.date : '-' %}
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

  <!-- MODAL FOR LOG TIME  -->
  <div class="modal fade stick-up" id="logTimeModal" tabindex="-1" role="dialog" aria-labelledby="logTimeModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header clearfix ">
          <button type="button" class="close" ng-click="logCancel()" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
          </button>
          <h4 class="p-b-5"><h4>Log time on this task</h4></h4>

        </div>
        <form name="Logtime" class='p-t-15' role='form' novalidate>
          <div class="modal-body">
            <div class="panel panel-transparent ">
              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane slide-left active" id="loghome">
                  <div class=" row ">
                    <input type="hidden" name="task_id"  ng-model="logtime.task_id">
                    <div class="col-md-6">
                      <div class="form-group form-group-default form-group-default-select2">
                        <label>Who</label>
                        <select class="form-control input-group form-group form-group-default" id="user_ids"  name="user_id" ng-model="logtime.user_id" >
                          @foreach($users as $user)
                          <option value="{!! $user->user_id !!}">{!! $user->fname !!}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group form-group-default input-group col-md-12">
                        <input type="text" name="date" class="form-control" placeholder="Pick a date" id="log-date" ng-model='logtime.date'>
                        <span class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class=" row ">
                    <div class="col-md-4">
                      <div class="form-group  input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                        <input type="text" class="form-control" id="from_time" name="start_time" ng-model="logtime.start_time" placeholder="Start Time" required>
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-time"></span>
                        </span>
                      </div>
                      <span class="error" ng-show="submitted && Logtime.start_time.$error.required">* Please enter start time</span>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group  input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                        <input type="text" class="form-control" id="to_time" name="end_time" ng-model="logtime.end_time" placeholder="End Time" required>
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-time"></span>
                        </span>
                      </div>
                      <span class="error" ng-show="submitted && Logtime.end_time.$error.required">* Please enter end time</span>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group form-group-default">
                        <input id="hour" type="text" name="hour" class="form-control"  ng-model='logtime.hour' placeholder="Hour">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group form-group-default">
                        <input id="minute" type="text" name="minute" class="form-control"  ng-model='logtime.minute' placeholder="Minute">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group form-group-default">
                        <label>Description</label>
                        <textarea id="description" name="description" type="text" class="form-control" placeholder="Description of Log Time" ng-model='logtime.description'></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="checkbox check-success  ">
                        <input type="checkbox" name="billable" ng-model="logtime.billable" id="k">
                        <label for="k">Billable</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button id="add-app" type="button" class="btn btn-primary  btn-cons" ng-click="submitLog(Logtime)" ng-bind="edit==false ? 'Add' : 'Edit'"></button>
            <button type="button" class="btn btn-cons" id="close" ng-click="logClearAll(Logtime)">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>










  
  
</div>
@endsection
