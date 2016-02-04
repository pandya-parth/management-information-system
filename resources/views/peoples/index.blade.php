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
                    <?php
                    $marital_statuses = array('maried'=>'maried',
                        'single'=>'single',
                        'other'=>'other');
                    ?>
                    <div class="pull-right">
                        <div class="col-xs-6" ng-show="peoples.length>0">
                            <input ng-cloak ng-model="q" type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                        </div>
                        <div class="col-xs-6">
                            <button id="show-modal" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Add People</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                <p class="text-center" ng-show="loading"><img src="{!! asset('img/demo/progress.svg') !!}" /></p>
                       <table class="table table-hover demo-table-dynamic" ng-show="peoples.length != 0" ng-cloak>
                            <thead>
                                <tr ng-cloak>
                                    <th>#Id</th>
                                    <th>Name</th>
                                    <th>Date of Birth</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr dir-paginate="people in peoples | filter:q | itemsPerPage: pageSize | orderBy:'-id'" current-page="currentPage">
                                <td class="v-align-middle">
                                    <p ng-cloak>{% people.id %}</p>
                                </td>
                                <td class="v-align-middle">
                                    <p ng-cloak>{% people.fname %} {% people.lname %}</p>
                                </td>
                                <td class="v-align-middle">
                                    <p ng-cloak>{% people.dob %}</p>
                                </td>
                                <td class="v-align-middle">
                                    <p ng-cloak>{% people.phone %}</p>
                                </td>
                                <td class="v-align-middle">
                                    <p>
                                        <a ng-click="editPeople(people.id)">Edit</a>
                                        <a ng-click="deletePeople(people.id)">Delete</a>
                                    </p>
                                </td>
                            </tr>
                            
                            </tbody>
                            
                        </table>
                        
                            <div ng-cloak class="col-md-12 sm-p-t-15" ng-if="peoples.length==0">
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
    <div class="modal fade stick-up" id="addNewAppModal" tabindex="-1" role="dialog" aria-labelledby="addNewAppModal"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header clearfix ">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ng-click="clearAll()"><i class="pg-close fs-14"></i>
                    </button>
                    <h4 class="p-b-5"><h4 ng-bind="edit==false ? 'Add New People' : 'Edit People'"></h4></h4>
                </div>
                <form name='people' class='p-t-15' role='form' novalidate enctype="multipart/form-data">
                <div class="modal-body">
                    <ul class="nav nav-tabs nav-tabs-fillup">
                        <li class="active"><a data-toggle="tab" href="#home">Personal</a></li>
                        <li><a data-toggle="tab" href="#menu1">Address</a></li>
                        <li><a data-toggle="tab" href="#menu2">Employment</a></li>
                        <li><a data-toggle="tab" href="#menu3">Social</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="home" class="tab-pane slide-left active">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label>First Name </label>
                                        <input type="text" name="fname" class="form-control" placeholder="First Name" ng-model='people_array.fname' required>
                                        <span class="error" ng-show="submitted && people.fname.$error.required">* Please enter First Name</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label>Last Name</label>
                                        <input type="text" name="lname" class="form-control" placeholder="Last Name" ng-model='people_array.lname' required>
                                        <span class="error" ng-show="submitted && people.lname.$error.required">* Please enter Last Name </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control" placeholder="Email" ng-model='people_array.email' required ng-pattern='/^[_a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/'>
                                        <span class="error" ng-show="submitted && people.email.$error.required">* Please enter Email </span>
                                        <span class="error" ng-show="submitted && people.email.$error.pattern">* Please enter valid email</span>
                                    </div>
                                </div>
                              </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Mobile</label>
                                        <input type="text" name="mobile" class="form-control" placeholder="Mobile Number" ng-model='people_array.mobile' required>
                                        <span class="error" ng-show="submitted && people.mobile.$error.required">* Please enter Mobile Number </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Phone Number" ng-model='people_array.phone' required>
                                        <span class="error" ng-show="submitted && people.phone.$error.required">* Please enter Phone Number </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group form-group-default input-group col-md-12">
                                        <label>Date Of Birth</label>
                                        <input type="text" name="dob" class="form-control" placeholder="Pick a date" id="birth-date" ng-model='people_array.dob'>
                                        
                              <span class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                              </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Gender</label>
                                    <div class="radio radio-success">
                                        <input type="radio" checked="checked" value="male" ng-model="people_array.gender"  name="gender" id="yes">
                                        <label for="yes">Male</label>
                                        <input type="radio" value="female" ng-model="people_array.gender" name="gender" id="no">
                                        <label for="no">Female</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default form-group-default-select2">
                                        <label>Marital Status</label>
                                        
                                        <select class="full-width" data-placeholder="Select Country" data-init-plugin="select2">
                                        @foreach($marital_statuses as $marital_status)
                                            <option value="{!! $marital_status !!}">{!! $marital_status !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <div id="filelist">Upload photos from here..</div>
                                            <div id="progressbar"></div>
                                            <br />
                                            <div class="form-group">
                                            <div class="col-lg-6 clearfix">
                                            <div id="container">
                                            <a id="pickfiles" href="javascript:;">Upload Photo</a>
                                            </div>  
                                            </div>  
                                            </div>
                                            <input type="text" name='photo' id="photo"  ng-modal='people_array.photo'>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Preview</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        <div id="menu1" class="tab-pane slide-left">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group form-group-default">
                                        <label>Address 1</label>
                                        <input type="text" name="adrs1" class="form-control" placeholder="Address 1" ng-model='people_array.adrs1' >
                                       
                                    </div>
                                    <div class="form-group form-group-default">
                                        <label>City</label>
                                        <input type="text" name="city" class="form-control" placeholder="City" ng-model='people_array.city' >
                                        
                                    </div>
                                    <div class="form-group form-group-default">
                                        <label>Country</label>
                                        <input type="text" name="country" class="form-control" placeholder="Country" ng-model='people_array.country' >
                                       
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-group-default">
                                        <label>Address 2</label>
                                        <input type="text" name="adrs2" class="form-control" placeholder="Address 2" ng-model='people_array.adrs2' >
                                                                         </div>
                                    <div class="form-group form-group-default">
                                        <label>State</label>
                                        <input type="text" name="state" class="form-control" placeholder="State" ng-model='people_array.state' >
                                                                       </div>
                                    <div class="form-group form-group-default">
                                        <label>Zipcode</label>
                                        <input type="text" name="zipcode" class="form-control" placeholder="Zipcode" ng-model='people_array.zipcode' >
                                                                         </div>
                                </div>
                            </div>
                        </div>
                        <div id="menu2" class="tab-pane slide-left">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>PAN Number</label>
                                        <input type="text" name="pan_number" class="form-control" placeholder="Pan Number" ng-model='people_array.pan_number' >
                                                                            </div>
                                    <div class="form-group form-group-default">
                                        <label>Education</label>
                                        <input type="text" name="education" class="form-control" placeholder="Education" ng-model='people_array.education' >
                                                                            </div>
                                    <div class="form-group form-group-default">
                                        <label>Departmentr</label>
                                        <input type="text" name="department" class="form-control" placeholder="Department" ng-model='people_array.department' >
                                                                            </div>
                                    <div class="form-group form-group-default">
                                        <label>Designation/Job Title</label>
                                        <input type="text" name="designation" class="form-control" placeholder="Designation" ng-model='people_array.designation' >
                                        
                                    </div>
                                    <div class="form-group form-group-default">
                                        <label>Management Level</label>
                                        <input type="text" class="form-control" placeholder="First Name" ng-model='people_array.management_level'>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default input-group col-md-12">
                                        <label>Joining Date</label>

                                        <input type="text" name="join_date" class="form-control" placeholder="Pick a date" id="joining-date" ng-model='people_array.join_date'>

                                        
                              <span class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                              </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div id="menu3" class="tab-pane slide-left">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Google</label>
                                        <input type="text" name="google" class="form-control" placeholder="Google" ng-model='people_array.google' >
                                                                           </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Facebook</label>
                                        <input type="text" name="facebook" class="form-control" placeholder="Facebook" ng-model='people_array.facebook' >
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Web Site</label>
                                        <input type="text" name="website" class="form-control" placeholder="Web Site" ng-model='people_array.website' >
                                                                         </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Linkedin</label>
                                        <input type="text" name="linkedin" class="form-control" placeholder="Linkedin" ng-model='people_array.linkedin' >
                                                                           </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Skype</label>
                                        <input type="text" name="skype" class="form-control" placeholder="Skype" ng-model='people_array.skype' >
                                                                           </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Twitter</label>
                                        <input type="text" name="twitter" class="form-control" placeholder="Twitterl" ng-model='people_array.twitter' >
                                                                         </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="add-app" type="button" class="btn btn-primary  btn-cons" ng-click="submit(people)" ng-bind="edit==false ? 'Add' : 'Edit'"></button>
                    <button type="button" class="btn btn-cons" id="close_btn" data-dismiss="modal" aria-hidden="true" ng-click="clearAll()">
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
