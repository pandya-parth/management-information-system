@extends('layouts.app')
@section('title','Designation')
@section('content')
<div ng-controller="DesignationCtrl">
    <div class= "content">
        <!-- START CONTAINER FLUID -->
        <div class="container-fluid container-fixed-lg">
            <div class="inner">
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li>
                        <a href="{!!url('/')!!}">Home</a>
                    </li>
                    <li><a href="{!!url('designations')!!}" class="active">Designations</a>
                    </li>
                </ul>
            </div>
            <!-- START PANEL -->
            <div class="panel panel-transparent">
                <div class="panel-heading">
                    <div class="panel-title">Designation Listing
                    </div>
                    <div class="pull-right">
                        <div class="col-xs-4" ng-show="designations.length>0">
                            <input ng-cloak ng-model="q" type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                        </div>
                        <div class="col-xs-4" ng-cloak ng-show="designations.length>0">
                            <form name="form" novalidate>
                                <input type="text" name="pageSize" ng-model='pageSize' class="form-control" ng-pattern="/^(0|[1-9][0-9]*)$/" placeholder="Record Per Page">
                                <span class="error" ng-show="form.pageSize.$error.pattern" >* Not a valid number !</span>
                            </form>
                        </div>
                        @if(Auth::user()->roles == "admin")
                        <div class="col-xs-4">
                            <button id="show-modal" class="btn button_color"><i class="fa fa-plus"></i> Add Designation</button>
                        </div>
                        @endif
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <div ng-cloak class="grid_list_view" ng-show="(designations | filter:q).length">
                        <div class="head list_view border_class">
                            <div class="row">
                                <div class="datas people_id_pic">Name</div>
                                @if(Auth::user()->roles == "admin")
                                <div class="datas people_action pull-right">Action</div>
                                @endif
                            </div>
                        </div>
                        <div class="data_area list_view " dir-paginate="designation in designations| orderBy:'-id' | filter:q | itemsPerPage: pageSize"
                        current-page="currentPage" ng-show="designations.length != 0">
                        <!-- row 1 -->
                        <div ng-cloak class="row border_class">
                            <div ng-cloak class="datas people_name box_real">
                                {% designation.name ? designation.name : '-' %}
                            </div>
                            @if(Auth::user()->roles == "admin")
                            <div class="datas people_action pull-right">
                                <a class="btn btn-success btn-sm" ng-click="editDesignation(designation.id)" ><i class="fa fa-edit"></i></a>
                                <a class="btn btn-success btn-sm" ng-click="deleteDesignation(designation.id)" ><i class="fa fa-trash"></i></a>
                            </div>
                            @endif
                        </div>
                        <!-- row 1 complete -->
                    </div>
                </div>
                <div ng-cloak class="col-md-12 sm-p-t-15"  ng-if="designations.length==0">
                    <div style="text-align:center;">
                        <i class="icon-designation"></i>
                        <p><h3>No designation found</h3></p>
                    </div>
                </div>
                <div class="text-center">
                    <dir-pagination-controls boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)"></dir-pagination-controls>
                </div>
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ng-click="clearAll()"><i class="pg-close fs-14"></i>
                </button>
                <h4 class="p-b-5">
                    <h4 ng-bind="edit==false ? 'Add New Designation' : 'Edit Designation'"></h4>
                </h4>
            </div>
            <form name='Designation' class='p-t-15' role='form' novalidate>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>name</label>
                                <input id="appName" type="text" name="name" class="form-control" placeholder="Name of Designation" ng-model='designation.name' required>
                                <span class="error" ng-show="submitted && Designation.name.$error.required">* Please enter designation</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="add-app" type="button" class="btn btn-primary  btn-cons" ng-click="submit(Designation)" ng-bind="edit==false ? 'Add' : 'Edit'"></button>
                    <button type="button" class="btn btn-cons" id="close" ng-click="clearAll(Designation)">Close</button>
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
