@extends('layouts.app')
@section('title','Task Category')
@section('content')
    <div ng-controller="TaskCategoryCtrl" ng-cloak>
        <div class="content">
            <!-- START CONTAINER FLUID -->
            <div class="container-fluid container-fixed-lg">
                <div class="inner">
                    <!-- START BREADCRUMB -->
                    <ul class="breadcrumb">
                        <li>
                            <a href="{!!url('/')!!}">Home</a>
                        </li>
                        <li><a href="{!!url('task_categories')!!}" class="active">Task Categories</a>
                        </li>
                    </ul>
                </div>
                <!-- START PANEL -->
                <div class="panel panel-transparent">
                    <div class="panel-heading">
                        <div class="panel-title">Task Categories
                        </div>
                        <div class="pull-right">
                             <div class="col-xs-4" ng-show="task_categories.length > 0">
                                 <input ng-model="q" type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                            </div>
                            <div class="col-xs-4" ng-cloak ng-show="task_categories.length>0">
                                    <select class=" full-width" data-init-plugin="select2" ng-model='pageSize'>
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                        <option value="60">60</option>
                                        <option value="70">70</option>
                                        <option value="80">80</option>
                                        <option value="90">90</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                            <div class="col-xs-4">
                                <button id="show-modal" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Add
                                    Task Category
                                </button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <p class="text-center" ng-show="loading"><img src="{!! asset('img/demo/progress.svg') !!}"/></p>
                        <table class="table table-hover demo-table-dynamic" ng-show="task_categories.length != 0" ng-cloak>
                            <thead>
                            <tr role='row'>
                                <th class="sorting">#Id</th>
                                <th class="sorting">Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                    <tr dir-paginate="category in task_categories| orderBy:'-id' | filter:q | itemsPerPage: pageSize    " current-page="currentPage" ng-show="task_categories.length != 0" >
                                        <td class="v-align-middle">
                                            <p  ng-cloak>{% category.id %}</p>
                                        </td>
                                        <td class="v-align-middle">
                                            <p ng-cloak>{% category.name ? category.name : '-' %}</p>
                                        </td>
                                        <td class="v-align-middle">
                                            <p>
                                                <a  ng-click="editCategory(category.id)">Edit</a>
                                                <a  ng-click="deleteCategory(category.id)">Delete</a>
                                            </p>
                                        </td>
                                    </tr>
                            </tbody>
                          </table>
                        <div class="col-md-12 sm-p-t-15" ng-if="task_categories.length==0" ng-cloak>
                            <div style="text-align:center;">
                                <img src="{!! asset('img/noTasks.png') !!}" />
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
        <div class="modal fade stick-up" id="addNewAppModal" tabindex="-1" role="dialog"
             aria-labelledby="addNewAppModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header clearfix ">

                        <button type="button" class="close" ng-click="cancelAll()" data-dismiss="modal" aria-hidden="true"><i
                                    class="pg-close fs-14"></i>
                        </button>

                        <h4 class="p-b-5" ng-bind="edit==false ? 'Add New Task Category' : 'Edit New Task Category'"></h4>
                    </div>
                    <form name='taskCategory' class='p-t-15' role='form' novalidate>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>name</label>
                                        <input id="appName" type="text" class="form-control"
                                               placeholder="Name of Category" ng-model='task_category.name'
                                               ng-keyup="$event.keyCode == 13 && submit('taskCategory')" required>
                                        <span class="error" ng-show="submitted && taskCategory.$error.required">* Please enter task category</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    <div class="modal-footer">
                        <button id="add-app" type="button" class="btn btn-primary  btn-cons" ng-click="submit(taskCategory)" ng-bind="edit==false ? 'Add' : 'Edit'"></button>
                        <button type="button" class="btn btn-cons" id="close" ng-click='clearAll(taskCategory)'>Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- END MODAL STICK UP  -->
    </div>
@endsection
