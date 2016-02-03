  @extends('layouts.app')
  @section('title','Task')
  @section('content')
  <div ng-controller="TasksCtrl">
  <div class="content">
    <!-- START CONTAINER FLUID -->
    <div class="container-fluid container-fixed-lg">
      <!-- START PANEL -->
      <div class="inner">
                <!-- START BREADCRUMB -->
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{!! url('tasks') !!}">Task</a></li>
                    <li><a href="{!! url('milestones') !!}">Milestone</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
        <div class="panel panel-transparent">
          <div class="panel-heading">
            <div class="panel-title">
              <h4>Tasks</h4>
            </div>
            <div class="pull-right">
              <div class="col-xs-6" ng-show="tasks.length > 0" ng-cloak>
               <input ng-model="q" type="text" id="search-table" class="form-control pull-right" placeholder="Search" ng-cloak>
             </div>
          
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="panel-body">
          <table class="table table-hover demo-table-dynamic" ng-show="tasks.length != 0" ng-cloak>
            <thead>
              <tr>
                <th>Task name</th>
                <th>Project</th>
                <th>Task Category</th>
                <th>Duration</th>
              </tr>
            </thead>
            <tbody >

              @foreach($taskCategories as $Category)
                <li>{!! $Category->name !!}</li>
                <li>  <button id="#addNewAppModal"  data-id="{!! $Category->id !!}" class="btn btn-primary btn-cons task_category" data-toggle="modal" data-value="{!! $Category->id !!}"><i class="fa fa-plus"></i> Add Task</li>
              @endforeach
              
              <tr dir-paginate="task in tasks| orderBy:'-id' | filter:q | itemsPerPage: pageSize    " current-page="currentPage" ng-show="tasks.length != 0" >
                <td class="v-align-middle">
                  <p  ng-cloak>{% task.id %}</p>
                </td>
                <td class="v-align-middle">
                  <p ng-cloak>{% task.name ? task.name : '-' %}</p>
                </td>
                <td class="v-align-middle">
                  <p ng-cloak>
                    <a  ng-click="editTask(task.id)">Edit</a>
                    <a  ng-click="deleteTask(task.id)">Delete</a>
                  </p>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="col-md-12 sm-p-t-15" ng-if="tasks.length==0" ng-cloak>
            <div class="alert alert-warning" role="alert">
              No record found.
            </div>
          </div>
        </div>
      </div>
      <!-- END PANEL -->
    
    <!-- END CONTAINER FLUID -->
  </div>
  <!-- MODAL STICK UP  -->
  <div class="modal fade stick-up" id="addNewAppModal" tabindex="-1" role="dialog"
  aria-labelledby="addNewAppModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header clearfix ">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
          class="pg-close fs-14"></i>
        </button>
        <h4 class="p-b-5"><h4>Add New Task</h4></h4>
      </div>
      <form name="Task" class='p-t-15' role='form' novalidate>
        <input type="hidden" id='cat_id'>
        <div class="modal-body">

          <div class="panel panel-transparent ">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-fillup">
              <li class="active">
                <a data-toggle="tab" href="#slide1"
                aria-expanded="true"><span>Description</span></a>
              </li>
             
              <li class="">
                <a data-toggle="tab" href="#slide3"
                aria-expanded="false"><span>Priority</span></a>
              </li>
              <li class="">
                <a data-toggle="tab" href="#slide4"
                aria-expanded="false"><span>Assign To.</span></a>
              </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane slide-left active" id="slide1">
                <div class="row column-seperation">
                  <div class="col-md-12">
                    <div class="form-group form-group-default">
                      <label>Task Name</label>
                      <input id="appName" type="text" name="name" class="form-control" placeholder="What needs to be done" ng-model='task.name' required>
                      <span class="error" ng-show="submitted && Task.name.$error.required">* Please enter Task name</span>
                    </div>
                  </div>
                </div>
                <div class="row column-seperation">
                    <div class="col-md-12">
                    <div class="form-group form-group-default">
                      <label>Descripation</label>
                      <textarea id="appName" type="text" name="name" class="form-control" placeholder="Description" ng-model='task.description' required></textarea>
                      <span class="error" ng-show="submitted && Task.name.$error.required">* Please enter description</span>
                      
                    </div>

                  </div>
                  <div class="row">
                <div class="col-md-6">
                  <div class="form-group form-group-default input-group col-md-12">
                    <label>Start Date (optional)</label>
                    <input type="text" name='start_date' class="form-control" placeholder="Select Date" id="task_startdate">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-group-default input-group col-md-12">
                    <label>Due Date (optional)</label>
                    <input type="text" name='end_date' class="form-control" placeholder="Select Date" id="task_enddate">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  </div>
                </div>
              </div>
                  
                   {{--  <div class="col-md-6">
                      <label>Status</label>
                      <div class="radio radio-success">
                         <input type="radio" checked="checked" value="0" name="status"
                        id="yes">
                        <label for="yes">In Progress</label>
                        <input type="radio" value="1" name="status" id="no">
                        <label for="no">Completed</label>
                      </div>                
                    </div>
                    <div class="col-md-6">
                      <label>Billable/Non-Billable</label>
                      <div class="checkbox check-success  ">
                        <input type="checkbox" name="billable" value="1" id="checkbox2">
                        <label for="checkbox2">Billable</label>
                      </div>
                    
                  </div> --}}
                  
                </div>
              </div>
            
            <div class="tab-pane slide-left" id="slide3">
              <div class="row">
              <div class="col-md-12">
                      <label>Choose the priority of this task</label>
                      <div class="radio radio-success">

                         <input type="radio" checked="checked" value="0" ng-modal="task.priority" name='priority'
                        id="none">
                        <label for="none">None</label>
                        <input type="radio" value="1" name="priority" ng-modal='task.priority' id="low">
                        <label for="low">Low</label>
                        <input type="radio" value="2" name="priority" ng-modal='task.priority' id="medium">
                        <label for="medium">Medium</label>

                        <input type="radio" value="3" name="priority" ng-modal='task.priority' id="high">
                        <label for="high">High</label>
                      </div>                
                    </div>
              </div>
            </div>
            <div class="tab-pane slide-left" id="slide4">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group form-group-default">
                   <label class="">Who should do this?</label>
                   <select class=" full-width" name="task.user_id" data-init-plugin="select2" multiple>
                    @foreach($peoples as $people)
                    <option value="{!! $people->id!!}"> {!! $people->fname ." ".$people->lname  !!}</option>
                    @endforeach
                  </select>
                </div>
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
     <div class="modal-footer">
            <button id="add-app" type="button" class="btn btn-primary  btn-cons" ng-click="submit(Task)" ng-bind="edit==false ? 'Add' : 'Edit'"></button>
            <button type="button" class="btn btn-cons" id="close" ng-click="clearAll()">Close</button>
        </div>
  </form>
</div>
</div>
</div>
</div>
@endsection
