@extends('layouts.app')
@section('title','People')

@section('content')
<div ng-controller="PeopleCtrl">
    <div class= "content">
        <!-- START CONTAINER FLUID -->
        <div class="container-fluid container-fixed-lg">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li>
                        <a href="{!!url('/')!!}">Home</a>
                    </li>
                    <li><a href="{!!url('people')!!}" class="active">People</a>
                    </li>
                </ul>
            </div>
            <!-- START PANEL -->
            <div class="panel panel-transparent">
                <div class="panel-heading">
                    <div class="panel-title">People Listing
                    </div>
                    <div class="pull-right">
                        <div class="col-xs-6">
                            <input ng-model="q" type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                        </div>
                        <div class="col-xs-6">
                            <button id="show-modal" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Add people</button>
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
                            <tbody ng-cloak>
                            <tr dir-paginate="people_data in people_datas | filter:q | itemsPerPage: pageSize" current-page="currentPage" ng-show="people_datas.length != 0">
                                <td class="v-align-middle">
                                    <p ng-cloak>{% people_data.id %}</p>
                                </td>
                                <td class="v-align-middle">
                                    <p ng-cloak>{% people_data.fname %}</p>
                                </td>
                                <td class="v-align-middle">
                                    <p>
                                        <a ng-click="editCategory(people_data.id)">Edit</a>
                                        <a ng-click="deleteCategory(people_data.id)">Delete</a>
                                    </p>
                                </td>
                            </tr>
                            <tr ng-if="people_datas.length == 0">
                                <td>No record found.</td>
                                <td> &nbsp; </td>
                                <td> &nbsp; </td>
                            </tr>
                            </tbody>
                        </table>
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
                        <h4 ng-bind="edit==false ? 'Add New People' : 'Edit People'"></h4>
                    </h4>
                </div>

                <form name='people' class='p-t-15' role='form' novalidate>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>First Name</label>
                                    <input id="appName" type="text" class="form-control" placeholder="First Name" ng-model='people_array.fname' required>
                                    <span class="error" ng-show="submitted && people.$error.required">* Please enter name</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="add-app" type="button" class="btn btn-primary  btn-cons" ng-click="submit(people)" ng-bind="edit==false ? 'Add' : 'Edit'"></button>
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

