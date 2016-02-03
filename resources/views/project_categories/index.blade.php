@extends('layouts.app')
@section('title','Project Category')

@section('content')
<div ng-controller="ProjectCategoryCtrl">
    <div class= "content">
        <!-- START CONTAINER FLUID -->
        <div class="container-fluid container-fixed-lg">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li>
                        <a href="{!!url('/')!!}">Home</a>
                    </li>
                    <li><a href="{!!url('project-categories')!!}" class="active">Project Categories</a>
                    </li>
                </ul>
            </div>
            <!-- START PANEL -->
            <div class="panel panel-transparent">
                <div class="panel-heading">
                    <div class="panel-title">Project Category Listing
                    </div>
                    <div class="pull-right">
                        <div class="col-xs-6" ng-show="categories.length>0">
                            <input ng-cloak ng-model="q" type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                        </div>
                        <div class="col-xs-6">
                            <button id="show-modal" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Add project category</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <p class="text-center" ng-show="loading"><img src="{!! asset('img/demo/progress.svg') !!}" /></p>
                        <table class="table table-hover demo-table-dynamic" ng-show="categories.length != 0" ng-cloak>
                            <thead>
                            <tr ng-cloak>
                                <th>#Id</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody >
                            <tr dir-paginate="category in categories | filter:q | itemsPerPage: pageSize" current-page="currentPage">
                                <td class="v-align-middle">
                                    <p ng-cloak>{% category.id %}</p>
                                </td>
                                <td class="v-align-middle">
                                    <p ng-cloak>{% category.name ? category.name : '-' %}</p>
                                </td>
                                <td class="v-align-middle">
                                    <p>
                                        <a ng-click="editCategory(category.id)">Edit</a>
                                        <a ng-click="deleteCategory(category.id)">Delete</a>
                                    </p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div ng-cloak class="col-md-12 sm-p-t-15" ng-if="categories.length==0">
                            <div style="text-align:center;">
                                <img src="{!! asset('img/noProjects.png') !!}" />
                                <p><h3>No match found</h3></p>
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
                        <h4 ng-bind="edit==false ? 'Add New Project Category' : 'Edit Project Category'"></h4>
                    </h4>
                </div>

                <form name='projectCategory' class='p-t-15' role='form' novalidate>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>name</label>
                                    <input id="appName" type="text" name="name" class="form-control" placeholder="Name of Category" ng-model='project_category.name' required>
                                    <span class="error" ng-show="submitted && projectCategory.name.$error.required">* Please enter project category</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="add-app" type="button" class="btn btn-primary  btn-cons" ng-click="submit(projectCategory)" ng-bind="edit==false ? 'Add' : 'Edit'"></button>
                        <button type="button" class="btn btn-cons" id="close" ng-click="clearAll(projectCategory)">Close</button>
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

