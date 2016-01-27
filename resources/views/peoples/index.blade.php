@extends('layouts.app')
@section('content')
<div ng-controller="ProjectCtrl">
    <div class="content">
        <!-- START CONTAINER FLUID -->
        <div class="container-fluid container-fixed-lg">
            <!-- START PANEL -->
            <div class="panel panel-transparent">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>Users</h4>
                    </div>
                    <div class="pull-right">
                        <div class="col-xs-12">
                            <!-- {!! link_to("project/create","Add",array('class'=>'btn btn-primary btn-cons   pull-right')) !!}
                                    -->
                            <button id="show-modal" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Add
                                people
                            </button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <table class="table table-hover demo-table-dynamic">
                        <thead>
                        <tr>
                            <th>#Id</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($peoples as $people)
                            <tr ng-if="people_datas.length != 0" ng-repeat="people in people_datas">
                                <td class="v-align-middle">
                                    <p>{% people.id %}</p>
                                </td>
                                <td class="v-align-middle">
                                    <p>{% $people.name %}</p>
                                </td>
                                <td class="v-align-middle">
                                    <p>{% $people.email %}</p>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>No record found.</td>
                                <td> &nbsp; </td>
                                <td> &nbsp; </td>
                                
                            </tr>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END PANEL -->
        </div>
        <!-- END CONTAINER FLUID -->
    </div>
    <!-- MODAL STICK UP  -->
    <div class="modal fade stick-up" id="addNewAppModal" tabindex="-1" role="dialog" aria-labelledby="addNewAppModal"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header clearfix ">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                                class="pg-close fs-14"></i>
                    </button>
                    <h4 class="p-b-5"><h4>Add New People</h4></h4>
                </div>
                <form name='project' class='p-t-15' role='form' novalidate>
                <div class="modal-body">
                    <ul class="nav nav-tabs nav-tabs-fillup">
                        <li class="active"><a data-toggle="tab" href="#home">Personal</a></li>
                        <li><a data-toggle="tab" href="#menu1">Address</a></li>
                        <li><a data-toggle="tab" href="#menu2">Employment</a></li>
                        <li><a data-toggle="tab" href="#menu4">Social</a></li>

                    </ul>
                    <div class="tab-content">
                        <div id="home" class="tab-pane slide-left active">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label>First Name</label>
                                        <input id="appName1" type="text" class="form-control" placeholder="First Name" ng-model='people_array.first_name' required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label>Last Name</label>
                                        <input id="appName2" type="text" class="form-control" placeholder="Last Name" ng-model='people_array.last_name' required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label>Email</label>
                                        <input id="appName3" type="text" class="form-control" placeholder="Email" ng-model='people_array.email' required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Mobile</label>
                                        <input id="appName4" type="text" class="form-control" placeholder="Mobile Number" ng-model='people_array.mobile' required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Phone</label>
                                        <input id="appName5" type="text" class="form-control" placeholder="Phone Number" ng-model='people_array.phone' required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group form-group-default input-group col-md-12">
                                        <label>Date of Birth</label>
                                        <input type="email" class="form-control" placeholder="Pick a date" id="datepicker-component2">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Gender</label>
                                    <div class="radio radio-success">
                                        <input type="radio" checked="checked" value="male" name="gender" id="yes">
                                        <label for="yes">Male</label>
                                        <input type="radio" value="female" name="gender" id="no">
                                        <label for="no">Female</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default form-group-default-select2">
                                        <label>Marital Status</label>
                                        <select class="full-width" data-placeholder="Select Country"
                                                data-init-plugin="select2">
                                            <option value="1">Single</option>
                                            <option value="2">Married</option>
                                            <option value="3">Others</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div id="menu1" class="tab-pane slide-left">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group form-group-default">
                                        <label>Address 1</label>
                                        <input id="appName11" type="text" class="form-control" placeholder="Address 1" ng-model='people_array.adrs1' required>
                                    </div>
                                    <div class="form-group form-group-default">
                                        <label>City</label>
                                        <input id="appName12" type="text" class="form-control" placeholder="City" ng-model='people_array.city' required>
                                    </div>
                                    <div class="form-group form-group-default">
                                        <label>Country</label>
                                        <input id="appName13" type="text" class="form-control" placeholder="Country" ng-model='people_array.country' required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-group-default">
                                        <label>Address 2</label>
                                        <input id="appName14" type="text" class="form-control" placeholder="Address 2" ng-model='people_array.adrs2' required>
                                    </div>
                                    <div class="form-group form-group-default">
                                        <label>State</label>
                                        <input id="appName15" type="text" class="form-control" placeholder="State" ng-model='people_array.state' required>
                                    </div>
                                    <div class="form-group form-group-default">
                                        <label>Zipcode</label>
                                        <input id="appName16" type="text" class="form-control" placeholder="Zipcode" ng-model='people_array.zipcode' required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="menu2" class="tab-pane slide-left">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>PAN Number</label>
                                        <input id="appName17" type="text" class="form-control" placeholder="Pan Number" ng-model='people_array.pan_number' required>
                                    </div>
                                    <div class="form-group form-group-default">
                                        <label>Departmentr</label>
                                        <input id="appName18" type="text" class="form-control" placeholder="Department" ng-model='people_array.department' required>
                                    </div>
                                    <div class="form-group form-group-default">
                                        <label>Designation/Job Title</label>
                                        <input id="appName19" type="text" class="form-control" placeholder="Designation" ng-model='people_array.pan_number' required>
                                    </div>
                                    <div class="form-group form-group-default">
                                        <label>Management Level</label>
                                        <input id="appName20" type="text" class="form-control" placeholder="First Name" ng-model='people_array.pan_number' required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default input-group col-md-12">
                                        <label>Joining Date</label>
                                        <input type="email" class="form-control" placeholder="Pick a date"
                                               id="datepicker-component2">
                              <span class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                              </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div id="menu4" class="tab-pane slide-left">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Google</label>
                                        <input id="appName28" type="text" class="form-control" placeholder="Google" ng-model='people_array.pan_number' required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Facebook</label>
                                        <input id="appName29" type="text" class="form-control" placeholder="Facebook" ng-model='people_array.pan_number' required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Web Site</label>
                                        <input id="appName30" type="text" class="form-control" placeholder="Web Site" ng-model='people_array.pan_number' required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Linkedin</label>
                                        <input id="appName31" type="text" class="form-control" placeholder="Linkedin" ng-model='people_array.pan_number' required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Twitterl</label>
                                        <input id="appName32" type="text" class="form-control" placeholder="Twitterl" ng-model='people_array.pan_number' required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="add-app" type="button" class="btn btn-primary  btn-cons">Add</button>
                    <button type="button" class="btn btn-cons" id="close_btn" data-dismiss="modal" aria-hidden="true">
                        Close
                    </button>
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
