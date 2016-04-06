@extends('layouts.app')
@section('title','People')
@section('content')
<div ng-controller="PeopleCtrl">
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
            </div>
            <div class="clearfix"></div>
            <!-- START PANEL -->
            <div class="panel panel-transparent">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h1> <b> People On This Project </b> </h1>
                    </div>
                    <div class="pull-right">
                        <div class="col-xs-4" ng-show="peoples.length > 0">
                            <input ng-model="q" type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                        </div>
                        <div class="col-xs-4" ng-cloak ng-show="peoples.length>0">
                            <form name="form" novalidate>
                                <input type="text" name="pageSize" ng-model='pageSize' class="form-control" ng-pattern="/^(0|[1-9][0-9]*)$/" placeholder="Record Per Page">
                                <span class="error" ng-show="form.pageSize.$error.pattern" >* Not a valid number !</span>
                            </form>
                        </div>
                        @if(Auth::user()->roles == "admin")
                        <div class="col-xs-4">
                            <button id="show-modal" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Add People
                            </button>
                        </div>
                        @endif
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <p class="text-center" ng-show="loading"><img src="{!! asset('img/demo/progress.svg') !!}"/></p>
                    <table class="table table-hover demo-table-dynamic" ng-show="peoples.length != 0" ng-cloak>
                        <thead>
                            <tr role='row'>
                                <th class="sorting">#Id</th>
                                <th class="sorting">Project Id</th>
                                
                            </tr>
                        </thead>
                        <tbody>

                            <tr ng-repeat="people in peoples| orderBy:'-id' | filter:q "  ng-show="peoples.length != 0 && selected_users.indexOf(people.id) > -1" >

                                <td class="v-align-middle">
                                    <p  ng-cloak>{% people.id %}</p>
                                </td>
                                <td class="v-align-middle">
                                    <p ng-cloak>{% people.name %}</p>
                                </td>
                                
                            </tr>
                        </tbody>
                    </table>
                    <div class="col-md-12 sm-p-t-15" ng-if="peoples.length==0" ng-cloak>
                        <div style="text-align:center;">
                            <img src="{!! asset('img/noTasks.png') !!}" />
                            <p><h3>No match found</h3></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PANEL -->
        </div>
        <!-- END CONTAINER FLUID -->
    </div>
    <!-- MODAL STICK UP  -->
    <div class="modal fade stick-up " id="addPeopleToProjectModal" tabindex="-1" role="dialog"
    aria-labelledby="addPeopleToProjectModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                    class="pg-close fs-14"></i>
                </button>
                <h4 class="p-b-5"> Add people to project </h4>
            </div>
            <form name='addPeople' class='p-t-15' role='form' novalidate>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-4" ng-show="peoples.length > 0">
                            <input ng-model="query" type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                        </div>
                    </div>
                    </br>
                    <div class="add_project_people">
                        <ul class="row clearfix" data-toggle="buttons">
                            

                            <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12" ng-repeat="people in peoples|filter:query">
                                
                                    <input type="checkbox" name="selectedPeoples[]" value="people_{% people.id %}" id="{%people.id%}" ng-checked="selected_users.indexOf(people.id) > -1" ng-click="toggleSelection(people.id)">
                                    {% people.fname %} {% people.lname %}   



                                
                            </li>
                        </ul>
                    </div>
                </div>
            <!-- /.modal-content -->
            <div class="modal-footer">
                <button  type="button" class="btn btn-primary  btn-cons" ng-click="addPeopleToProject()">Add</button>
                <button type="button" class="btn btn-cons" id="close" ng-click="clearPeople(addPeople)">Close</button>
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
