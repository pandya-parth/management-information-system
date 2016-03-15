@extends('layouts.app')
@section('title','Milestones')
@section('content')
<div ng-controller="milestoneCtrl">
  <div class="content">
    <!-- START CONTAINER FLUID -->
    <div class="container-fluid container-fixed-lg">
      <div class="inner">
        <!-- START BREADCRUMB -->
        <ul class="nav navbar-nav">
          <li><a href="{!!url('/projects/{% Pro_Id %}/tasks')!!}">Task</a></li>
          <li><a href="{!! url('/projects/{% Pro_Id %}/milestones') !!}">Milestone</a></li>
          <li><a href="{!! url('/project/{% Pro_Id %}/people') !!}">People</a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <!-- START PANEL -->
      <div class="panel panel-transparent">
        <div class="panel-heading">
          <div class="panel-title">
            Milestones

          </div>
          <div class="pull-right text-right">
            <div class="row">

              <div class="col-xs-4" ng-cloak ng-show="milestones.length>0">
                <input ng-cloak ng-model="q" type="text" id="search-table" class="form-control pull-right" placeholder="Search">
              </div>

              <div class="col-xs-4" ng-cloak ng-show="milestones.length>0">
                <form name="form" novalidate>
                  <input type="text" name="pageSize" ng-model='pageSize' class="form-control" ng-pattern="/^(0|[1-9][0-9]*)$/" placeholder="Record Per Page">
                  <span class="error" ng-show="form.pageSize.$error.pattern" >* Not a valid number !</span>
                </form>
              </div>

              <div class="col-xs-4">
                <button id="show-modal" class="btn button_color"><i class="fa fa-plus"></i> Add Milestone</button>
              </div>

            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="panel-body">
          <div ng-cloak class="grid_list_view" ng-show="milestones.length>0">
            
            <div class="data_area list_view milestone-list" dir-paginate="milestone in milestones| orderBy:'-id' | filter:q | itemsPerPage: pageSize" current-page="currentPage" ng-show="milestones.length != 0">
              <!-- row 1 -->
              <div ng-cloak class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                  <div class="msupcoming">
                    <div class="msupcoming-header">{!! $time->format('M Y')!!}</div>
                    <div class="msbody">
                      <div class="msbodyday">{!! $time->format('d')!!}</div>
                      <div class="msbodyweekday">{!! $time->format('l')!!}</div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                <div ng-cloak class="msname">
                  {{-- {% milestone.name ? milestone.name : '-' %} --}}
                      <div class="checkbox check-success">
                        <input type="checkbox" name="billable" ng-model="logtime.billable" id="k">
                        <label for="k">
                          <strong>Test 1</strong>
                          <div class="user_name">Baldev P</div>
                        </label>
                      </div>
                      <div class="milestone-tools">
                  <a class="btn btn-success btn-sm" ng-click="editMilestone(milestone.id)" ><i class="fa fa-edit"></i></a>
                  <a class="btn btn-success btn-sm" ng-click="deleteMilestone(milestone.id)" ><i class="fa fa-trash"></i></a>
                      </div>
                </div>
                </div>                

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-right">
                  <div class="msDaysAway">1 Day Away</div>
                </div>
              <div class="clearfix"></div>
              </div>
              <!-- row 1 complete -->
            </div>
          </div>
          <div ng-cloak class="col-md-12 sm-p-t-15" ng-if="milestones.length==0">
            <div style="text-align:center;">
              <i class="icon-Milestones"></i>
              <p><h3>No milestone found</h3></p>
            </div>
          </div>
        </div>
        <dir-pagination-controls boundary-links="true"
        on-page-change="pageChangeHandler(newPageNumber)"></dir-pagination-controls>
      </div>
      <!-- END PANEL -->
    </div>
    <!-- END CONTAINER FLUID -->
  </div>
  <!-- MODAL STICK UP  -->
  <div class="modal fade stick-up" id="addNewAppModal" tabindex="-1" role="dialog"
  aria-labelledby="addNewAppModal"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header clearfix ">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
          class="pg-close fs-14"></i>
        </button>
        <h4 class="p-b-5" ng-bind="edit==false ? 'Add New Milestone' : 'Edit Milestone'">
        </div>
        <form name="Milestone" class='p-t-15' role='form' novalidate>
          <div class="modal-body">
            
            <div class="tab-content">
              <div id="home" class="tab-pane slide-left active">
                <div class="row clearfix">
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="msupcoming">
                      <div class="msupcoming-header">{!! $time->format('M Y')!!}</div>
                        <div class="msbody">
                        <div class="msbodyday">{!! $time->format('d')!!}</div>
                        <div class="msbodyweekday">{!! $time->format('l')!!}</div>
                        </div>
                    </div>
                  </div>
                  <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>name</label>
                      <input id="name" type="text" name="name" class="form-control"
                      placeholder="Name of Milestone" ng-model='milestone.name' required>
                      <span class="error"
                      ng-show="submitted && Milestone.name.$error.required">* Please enter milestone name.</span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>Description</label>
                      <input id="description" type="text" name="description" class="form-control"
                      placeholder="Description of Milestone" ng-model='milestone.description' required>
                      <span class="error"
                      ng-show="submitted && Milestone.description.$error.required">* Please enter milestone description.</span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group form-group-default input-group col-md-12">
                      <label>Due Date</label>
                      <input type="text" id="milestone-due-date" name="due_date" class="form-control" placeholder="Pick a due date" id="milestone-due-date" ng-model='milestone.due_date'>
                      <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </span>
                    </div>
                  </div>
                
                  <div class="col-md-6">
                    <div class="form-group form-group-default form-group-default-select2">
                      <label>Assign to.</label>
                      <select class=" full-width" data-init-plugin="select2" id="user_ids" multiple name="user_id" ng-model="milestone.user_id">
                        @foreach($users as $user)
                        <option value="{!! $user->id !!}">{!! $user->fname !!}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>Notes</label>
                      <input id="notes" type="text" name="notes" class="form-control"
                      placeholder="Notes of Milestone" ng-model='milestone.notes' required>
                      <span class="error"
                      ng-show="submitted && Milestone.notes.$error.required">* Please enter milestone notes.</span>
                    </div>
                    <input type="hidden" name="project_id"  ng-model="milestone.project_id">
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <div class="checkbox check-success  ">
                      <input type="checkbox" name="reminder" value="1" id="reminder">
                      <label for="reminder">Reminder</label>
                    </div>
                  </div>
                </div>

                  </div>
                </div>

              </div>
              
            </div>
          </div>
          <div class="modal-footer">
            <button id="add-app" type="button" class="btn btn-primary  btn-cons"
            ng-click="submit(Milestone)" ng-bind="edit==false ? 'Add' : 'Edit'">Add
          </button>
          <button type="button" class="btn btn-cons" id="close" ng-click='clearAll(Milestone)'>Close</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- END MODAL STICK UP  -->
</div>
@endsection
