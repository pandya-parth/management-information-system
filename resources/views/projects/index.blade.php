@extends('layouts.app')
@section('title','Project')
@section('content')
<div ng-controller="ProjectCtrl">
    <div class= "content">
        <!-- START CONTAINER FLUID -->
        <div class="container-fluid container-fixed-lg">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <div class="breadcrumb"></div>
                <div class="clearfix"></div>
            </div>
            <!-- START PANEL -->
            <div class="panel panel-transparent">
                <div class="panel-heading">
                    <div class="panel-title">Project Listing
                    </div>
                    <div class="pull-right text-right">
                        <div ng-cloak class="row">
                            <div class="col-xs-5" ng-show="projects.length>0">
                                <input ng-cloak ng-model="q" type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                            </div>
                            @if(Auth::user()->roles == "admin")
                            <div ng-cloak class="col-xs-4">                                
                                <button ng-cloak id="show-modal" class="btn button_color"><i class="fa fa-plus"></i> Add Project</button>                                
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div ng-cloak class="panel-body" >
                    <p class="text-center" ng-show="loading"><img src="{!! asset('img/demo/progress.svg') !!}" /></p>
                    <div ng-cloak class="panel-group"  role="tablist" aria-multiselectable="true" ng-repeat='company in companies' >
                        <div ng-cloak class="panel panel-default" id="{%company.id%}" class="accordion">
                            <div ng-cloak class="panel-heading" role="tab" id="headingOne" >
                                <h4 class="panel-title">
                                    <a ng-cloak data-toggle="collapse" data-parent="#{%company.id%}" href="#project{% company.id %}" aria-expanded="true" aria-controls="collapseOne" class='ng-binding(collapsed)'>
                                        {% company.name %}
                                    </a>
                                </h4>
                            </div>
                            <div id="project{% company.id %}" class="panel-collapse collapse in" role="tabpanel"  aria-labelledby="headingOne" aria-expanded="false">
                                <div class="panel-body">
                                    <div class="topTask" ng-repeat="project in projects| orderBy:'-id'" ng-if="project.client_id == company.id "  ng-show="tasks.length != 0">
                                        <i class="fa fa-book"></i>
                                        <div class="task_detail">
                                            <a href="{!!url('/projects/{% project.id %}/tasks')!!}" class="task_name"><h2>{% project.name %}</h2></a>
                                        </div>
                                        @if(Auth::user()->roles == "admin")
                                        <div class="datas people_action pull-right">
                                            <a class="btn btn-success btn-sm" ng-click="editProject(project.id)" ><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-success btn-sm" ng-click="deleteProject(project.id)" ><i class="fa fa-trash"></i></a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <dir-pagination-controls boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)"></dir-pagination-controls>
            </div>
            <!-- END PANEL -->
        </div>
        <!-- END CONTAINER FLUID -->
    </div>
    <!-- MODAL STICK UP  -->
    <div class="modal fade stick-up" id="addNewAppModal" tabindex="-1" role="dialog" aria-labelledby="addNewAppModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header clearfix ">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ng-click="cancelAll()"><i class="pg-close fs-14"></i>
                    </button>
                    <h4 class="p-b-5">
                        <h4 ng-bind="edit==false ? 'Add New Project' : 'Edit Project'"></h4>
                    </h4>
                </div>
                <form name='project' class='p-t-15' role='form' novalidate>
                    <div class="modal-body">
                        <ul class="nav nav-tabs nav-tabs-fillup">
                            <li class="active"><a data-toggle="tab" href="#home">Company</a></li>
                            <li><a data-toggle="tab" href="#menu1">Category</a></li>
                            <li><a data-toggle="tab" href="#menu2">Features</a></li>
                            <li><a data-toggle="tab" href="#menu3">Dates</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="home" class="tab-pane slide-left active">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                            <label>name</label>
                                            <input id="name" name="name" type="text" class="form-control" placeholder="Name of Project" ng-model='project_array.name' required>
                                            <span class="error" ng-show="submitted && project.name.$error.required">* Please enter project name</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                            <label>Description</label>
                                            <textarea id="description" name="description" type="text" class="form-control" placeholder="Description of Project" ng-model='project_array.description' required></textarea>
                                            <span class="error" ng-show="submitted && project.description.$error.required">* Please enter description</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default form-group-default-select2">
                                            <label class="">Client</label>
                                            <select class="full-width" data-placeholder="Select Country" data-init-plugin="select2" ng-model="project_array.client_id">
                                                <option selected="selected">-- Select One --</option>
                                                @foreach($companies as $company)
                                                <option value="{!! $company->id !!}">{!! $company->name !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div id="menu1" class="tab-pane slide-left">                                                               
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default form-group-default-select2">
                                            <label class="">Project Category</label>
                                            <select class="full-width" data-placeholder="Select Country"  name="category_id" ng-model="project_array.category_id" data-init-plugin="select2" required>
                                                <option >-- Select One --</option>
                                                @foreach($projects as $project)
                                                <option value="{!! $project->id !!}">{!! $project->name !!}</option>
                                                @endforeach
                                            </select>
                                            <span class="error" ng-show="submitted && project.category_id.$error.required">* Please enter project category</span>
                                        </div>

                                    </div>
                                    
                                     <span><a href="{!! url('/project-categories') !!}">Add New Project Category</a></span>
                                     
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                            <label>Notes</label>
                                            <textarea id="notes" name="notes" type="text" class="form-control" placeholder="Notes of Project" ng-model='project_array.notes'></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="menu2" class="tab-pane slide-left">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Status</label>
                                        <div class="radio radio-success" ng-init="project_array.status='active'">
                                            <input type="radio" ng-model="project_array.status" name='status' id="onhold" ng-value="'onhold'">
                                            <label for="onhold">On Hold</label>
                                            <input type="radio" ng-model='project_array.status' name='status' id="active" ng-value="'active'">
                                            <label for="active">Active</label>
                                            <input type="radio" ng-model='project_array.status' name='status' id="completed" ng-value="'completed'">
                                            <label for="completed">Completed</label>
                                        </div>
                                    </div>
                                </div>
                                <div class=" row ">
                                    <div class="col-sm-12">
                                        <label>Choose the project price type. </label>
                                        <div class="radio radio-success" ng-init="project_array.price_types='per_hour'">
                                            <input type="radio" ng-model="project_array.price_types" name='price_types' id="fix" ng-value="'fix'">
                                            <label for="fix">Fix</label>
                                            <input type="radio" ng-model='project_array.price_types' name='price_types' id="per_hour" ng-value="'per_hour'">
                                            <label for="per_hour">Per Hour</label>
                                            <input type="radio" ng-model='project_array.price_types' name='price_types' id="hiring" ng-value="'hiring'">
                                            <label for="hiring">Hiring</label>
                                        </div>    
                                    </div>
                                </div>
                            </div>
                            <div id="menu3" class="tab-pane slide-left">
                                <div class="row">
                                    
                                    <div class="col-md-12 ">
                                      <div class="datepicker" date-format="yyyy-MM-dd" selector="form-control">
                                        <div class="form-group custom-datepicker form-group-default input-group col-md-12">
                                          <label>Start Date</label>
                                            <input type="text" name="start_date" class="form-control" placeholder="Pick a date" id="start-date" ng-model='project_array.start_date' >
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                          </div>
                                        </div>
                                    </div>



                                </div>
                                <div class="row">

                                    


                                    <div class="col-md-12 ">
                                      <div class="datepicker" date-format="yyyy-MM-dd" selector="form-control">
                                        <div class="form-group custom-datepicker form-group-default input-group col-md-12">
                                          <label>End Date</label>
                                            <input type="text" name="end_date" class="form-control" placeholder="Pick a date" id="start-date" ng-model='project_array.end_date' >
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                          </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="add-app" type="button" class="btn btn-primary  btn-cons" ng-click="submit(project)" ng-bind="edit==false ? 'Add' : 'Edit'"></button>
                        <button type="button" class="btn btn-cons" id="close" ng-click="clearAll(project)">Close</button>
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
