@extends('layouts.app')
@section('title','Project')

@section('content')
<div ng-controller="ProjectCtrl">
    <div class= "content">
        <!-- START CONTAINER FLUID -->
        <div class="container-fluid container-fixed-lg">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li>
                        <a href="{!!url('/')!!}">Home</a>
                    </li>
                    <li><a href="{!!url('projects')!!}" class="active">Projects</a>
                    </li>
                </ul>
            </div>
            <!-- START PANEL -->
            <div class="panel panel-transparent">
                <div class="panel-heading">
                    <div class="panel-title">Project Listing
                    </div>
                    <div class="pull-right">
                        <div class="col-xs-6" ng-if="projects.length>0">
                            <input ng-cloak ng-model="q" type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                        </div>
                        <div class="col-xs-6">
                            <button id="show-modal" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Add project</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <p class="text-center" ng-show="loading"><img src="{!! asset('img/demo/progress.svg') !!}" /></p>
                        <table class="table table-hover demo-table-dynamic" ng-show="projects.length != 0" ng-cloak>
                            <thead>
                            <tr ng-cloak>
                                <th>#Id</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody >
                            <tr dir-paginate="project in projects | filter:q | itemsPerPage: pageSize" current-page="currentPage">
                                <td class="v-align-middle">
                                    <p ng-cloak>{% project.id %}</p>
                                </td>
                                <td class="v-align-middle">
                                    <p ng-cloak>{% project.name %}</p>
                                </td>
                                <td class="v-align-middle">
                                    <p>
                                        <a ng-click="editProject(project.id)">Edit</a>
                                        <a ng-click="deleteProject(project.id)">Delete</a>
                                    </p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div ng-cloak class="col-md-12 sm-p-t-15" ng-if="projects.length==0">
                            <div class="alert alert-warning" role="alert">
                                No record found.
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
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ng-click="clearAll()"><i class="pg-close fs-14"></i>
                    </button>
                    <h4 class="p-b-5">
                        <h4 ng-bind="edit==false ? 'Add New Project' : 'Edit Project'"></h4>
                    </h4>
                </div>

                <form name='project' class='p-t-15' role='form' novalidate>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>name</label>
                                    <input id="appName" name="name" type="text" class="form-control" placeholder="Name of Project" ng-model='project_array.name' required>
                                    <span class="error" ng-show="submitted && project.name.$error.required">* Please enter project</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="add-app" type="button" class="btn btn-primary  btn-cons" ng-click="submit(project)" ng-bind="edit==false ? 'Add' : 'Edit'"></button>
                        <button type="button" class="btn btn-cons" id="close" ng-click="clearAll()">Close</button>
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

