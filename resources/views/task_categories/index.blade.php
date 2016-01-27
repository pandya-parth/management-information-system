@extends('layouts.app')
@section('title','Task Category')
@section('content')
<div ng-controller="TaskCategoryCtrl">

    <div class= "content">
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
                    <div class="panel-title">Task Category Listing
                    </div>
                    <div class="pull-right">
                        <div class="col-xs-12">
                            <!-- {!! link_to("project/create","Add",array('class'=>'btn btn-primary btn-cons   pull-right')) !!}-->
                            <button id="show-modal" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Add task category</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <p class="text-center" ng-show="loading"><img src="{!! asset('img/demo/progress.svg') !!}" /></p>
                 <table class="table table-hover demo-table-dynamic">
                            <thead>
                            <tr>
                                <th>#Id</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-if="task_categories.length != 0" ng-repeat="category in task_categories">
                                <td class="v-align-middle">
                                    <p>{% category.id %}</p>
                                </td>
                                <td class="v-align-middle">
                                    <p>{% category.name ? category.name : '-' %}</p>
                                </td>
                                <td class="v-align-middle">
                                    <p>
                                        <a href="#">Edit</a>
                                        <a href="javascript:;" ng-click="deleteCategory(category.id)">Delete</a>
                                    </p>
                                </td>
                            </tr>
                            <tr ng-if="task_categories.length == 0">
                                <td>No record found.</td>
                                <td> &nbsp; </td>
                                <td> &nbsp; </td>
                            </tr>
                            </tbody>
                        </table>
                </div>
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
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                    </button>
                    <h4 class="p-b-5"><h4>Add New Task Category</h4></h4>
                </div>
                  <form name='taskCategory' class='p-t-15' role='form'  novalidate>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>name</label>
                                    <input id="appName" type="text" class="form-control" placeholder="Name of Category" ng-model='task_category.name' ng-keyup="$event.keyCode == 13 && submit('taskCategory')" required>
                                    <span class="error" ng-show="submitted && taskCategory.$error.required">* Please enter task category</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="add-app" type="button" class="btn btn-primary  btn-cons" ng-click="submit(taskCategory)">Add</button>
                        <button type="button" class="btn btn-cons" id="close">Close</button>
                    </div>







            </div>



            
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- END MODAL STICK UP  -->
</div>
@endsection
