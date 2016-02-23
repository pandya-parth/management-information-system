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
                    <li>
                        <a href="{!!url('people')!!}" class="active">People</a>
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
                        <div class="pull-right text-right">
                            <div class="row">
                                <div class="col-xs-5" ng-show="peoples.length>0">
                                    <input ng-cloak ng-model="q" type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                                </div>
                                <div class="col-xs-3" ng-cloak ng-show="peoples.length>0">
                                    <select class="cs-select cs-skin-slide" data-init-plugin="cs-select" ng-model='pageSize'>
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                    </select>
                                </div>
                                <div class="col-xs-4">
                                    <button id="show-modal" class="btn button_color"><i class="fa fa-plus"></i> Add People</button>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <p class="text-center" ng-show="loading"><img src="{!! asset('img/demo/progress.svg') !!}" /></p>
                        <!-- hitesh -->
                        <div class="grid_action">
                            <div class="row">
                                <div class="col-lg-12 text-right">
                                    <div ng-cloak class="btn-toolbar" ng-show="peoples.length>0">
                                        <a class="btn btn-success btn-sm btn-list-action btn-cons"><i class="fa fa-list-ul"></i></a>
                                        <a class="btn btn-success btn-sm btn-grid-action btn-cons"><i class="fs-14 fa fa-bars"></i></a>
                                        <a class="btn btn-success btn-sm btn-box-action btn-cons"><i class="fs-14 fa fa-th "></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div ng-cloak class="grid_list_view">
                            <div ng-cloak class="head list_view border_class" ng-show="peoples.length>0">
                                <div ng-cloak class="row">
                                    <div class="datas people_id_pic">Profile</div>
                                    <div class="datas people_name">Name</div>
                                    <div class="datas people_designation">Date Of Birth</div>
                                    <div class="datas people_email">Department</div>
                                    <div class="datas people_phone">Phone</div>
                                    <div class="datas people_action">Action</div>
                                </div>
                            </div>
                            <div ng-cloak class="data_area list_view " dir-paginate="people in peoples | filter:q | itemsPerPage: pageSize | orderBy:'-id'" current-page="currentPage">
                                <!-- row 1 -->
                                <div ng-cloak class="row border_class">
                                    <div class="datas people_id_pic">
                                        <div ng-cloak class="pic" ng-if="people.photo==''"><img ng-src={!! asset("img/noPhoto.png") !!} /></div>
                                        <div ng-cloak class="pic" ng-if="people.photo!=''"><img ng-src={!! asset("uploads/people-thumb/{%people.photo%}") !!} /></div>
                                    </div> 
                                    <div ng-cloak class="datas people_name box_real">
                                        {% people.fname %} {% people.lname %}
                                    </div>
                                    <div ng-cloak class="datas people_designation">
                                        {% people.dob %}
                                    </div>
                                    <div ng-cloak class="datas people_email">
                                        {% people.department %}
                                    </div>
                                    <div ng-cloak class="datas people_phone">
                                        {% people.phone %}
                                    </div>
                                    <div class="datas people_action">
                                        <a class="btn btn-success btn-sm" ng-click="editPeople(people.id)"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-success btn-sm" ng-click="deletePeople(people.user_id)"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                                <!-- row 1 complete -->
                            </div>
                        </div>
                        <div ng-cloak class="col-md-12 sm-p-t-15" ng-if="peoples.length==0">
                            <div style="text-align:center;">
                                <img src="{!! asset('img/noPeople.png') !!}" />
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
        <div class="modal fade stick-up" id="addNewAppModal" tabindex="-1" role="dialog" aria-labelledby="addNewAppModal"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header clearfix ">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ng-click="clearAll()"><i class="pg-close fs-14"></i>
                    </button>
                    <h4 class="p-b-5"><h4 ng-bind="edit==false ? 'Add New People' : 'Edit People'"></h4></h4>
                </div>
                <form name='people' class='p-t-15' role='form' enctype="multipart/form-data" novalidate >
                    <div class="modal-body">
                        <ul class="nav nav-tabs nav-tabs-fillup">
                            <li class="active"><a data-toggle="tab" href="#home">Personal</a></li>
                            <li><a data-toggle="tab" href="#menu1">Address</a></li>
                            <li><a data-toggle="tab" href="#menu4">Education</a></li>
                            <li><a data-toggle="tab" href="#menu5">Experence</a></li>
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
                                            <input type="text" name="mobile" class="form-control" placeholder="Mobile Number" ng-model='people_array.mobile' required ng-pattern="/^\d{10}$/">
                                            <span class="error" ng-show="submitted && people.mobile.$error.required">* Please enter Mobile Number </span>
                                            <span class="error" ng-show="submitted && people.mobile.$error.pattern">Not valid number!</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Phone</label>
                                            <input type="text" name="phone" class="form-control" placeholder="Phone Number" ng-model='people_array.phone' required ng-pattern="/^\d{10}$/">
                                            <span class="error" ng-show="submitted && people.phone.$error.required">* Please enter Phone Number </span>
                                            <span class="error" ng-show="submitted && people.phone.$error.pattern">Not valid number!</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <div class="form-group form-group-default input-group col-md-12">
                                            <label>Date Of Birth</label>
                                            <input type="text" name="dob" class="form-control" placeholder="Pick a date" id="birth-date" ng-model='people_array.dob'>
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Gender </label>
                                        <div class="radio radio-success" ng-init="people_array.gender='male'">
                                            <input type="radio" ng-model="people_array  .gender" name='gender' id="male" ng-value="'male'">
                                            <label for="male">Male</label>
                                            <input type="radio" ng-model='people_array.gender' name='gender' id="female" ng-value="'female'">
                                            <label for="female">Female</label>
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
                                    <div class="row form-group form-group-default input-group col-md-12">
                                        <div class="col-md-6">
                                            <div id="preview">
                                                <div class='noimage'>
                                                    <img src="{!! asset('img/noPhoto.png')!!}" id="noimage"style="height:100px;width:100px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
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
                                            <input type="hidden" name='photo' id="photo"
                                            ng-modal='people_array.photo'>
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
                                        <div class="form-group form-group-default form-group-default-select2">
                                            <label>Department</label>
                                            <select class="full-width" data-placeholder="Select Department"
                                            data-init-plugin="select2" ng-model='people_array.department'>
                                            @foreach($departments as $department)
                                                <option value="{!! $department->name !!}">{!! $department->name !!}</option>
                                            @endforeach
                                            </select> 
                                    </div>
                                    <div class="form-group form-group-default form-group-default-select2">
                                        <label>Designation/Job Title</label>
                                        <select class="full-width" data-placeholder="select Designation"
                                        data-init-plugin="select2" ng-model='people_array.designation'>
                                        @foreach($designations as $designation)
                                                <option value="{!! $designation->name !!}">{!! $designation->name !!}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="form-group form-group-default form-group-default-select2">
                                    <label>Management Level</label>
                                    <select class="full-width" data-placeholder="select Designation"
                                    data-init-plugin="select2" ng-model='people_array.management_level'>
                                    <option value="M1">M1</option>
                                    <option value="M2">M2</option>
                                    <option value="M3">M3</option>
                                    <option value="M4">M4</option>
                                    <option value="M5">M5</option>
                                    <option value="M6">M6</option>
                                    <option value="M7">M7</option>
                                    <option value="M8">M8</option>
                                    <option value="M9">M9</option>
                                    <option value="M10">M10</option>
                                    <option value="M11">M11</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default input-group col-md-12">
                                <label>Joining Date</label>
                                <input type="text"  name="join_date" class="form-control" placeholder="Pick a date"
                                id="joining-date" ng-model='people_array.join_date'>
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu4" class="tab-pane slide-left">
                    <div ng-repeat="education in educations">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    
                                    <label>Qualification</label>

                                    <input type="text" name="qualification" class="form-control" placeholder="Qualification" ng-init="people_array.education[$index].qualification = education.qualification" ng-model="people_array.education[$index].qualification" >
                                    <input type='hidden' name='id' ng-model='people_array.education.id'>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <label>College</label>
                                    <input type="text" name="college" class="form-control" placeholder="College" ng-init="people_array.education[$index].college = education.college" ng-model="people_array.education[$index].college" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group form-group-default">
                                    <label>University</label>
                                    <input type="text" name="university" class="form-control" placeholder="University" ng-init="people_array.education[$index].university = education.university" ng-model="people_array.education[$index].university" >
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group form-group-default">
                                    <label>Passing Year</label>
                                    <input type="text" name="passing_year" class="form-control" placeholder="Passing Year" ng-init="people_array.education[$index].passing_year = education.passing_year" ng-model="people_array.education[$index].passing_year" >
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group form-group-default">
                                    <label>Percentage / Grade</label>
                                    <input type="text" name="percentage" class="form-control" placeholder="Percentage / Grade" ng-init="people_array.education[$index].percentage = education.percentage" ng-model="people_array.education[$index].percentage" >
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <a class="btn btn-danger" tooltip="Delete" ng-if="!$first && edit==false" ng-click="educations.splice($index, 1);">REMOVE</a>
                                     <a class="btn btn-danger" tooltip="Delete" ng-if="edit==true" ng-click="educations.splice($index, 1);">REMOVE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <a class="btn btn-success" tooltip="Add" ng-click="newItem($event)">ADD</a>
                        </div>
                    </div>
                </div>
                <div id="menu5" class="tab-pane slide-left">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group form-group-default">
                                <label>Company Name</label>
                                <input type="text" name="company_name[]" class="form-control" placeholder="Company Name" ng-model='company_name' >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-group-default input-group col-md-12">
                                <label>From</label>
                                <input type="text" name="form" class="form-control" placeholder="Pick a date" id="people_from" ng-model='from'>
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-group-default input-group col-md-12">
                                <label>To</label>
                                <input type="text" name="to" class="form-control" placeholder="Pick a date" id="people_to" ng-model='to'>
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group form-group-default">
                                <label>Salary</label>
                                <input type="text" name="salary[]" class="form-control" placeholder="Salary" ng-model='salary' >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-group-default">
                                <label>Reason </label>
                                <input type="text" name="reason[]" class="form-control" placeholder="Reason for leaving previous job" ng-model='Reason' >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-group-default">
                                <a class="btn btn-success" tooltip="Add" >ADD</a>
                                <a class="btn btn-danger" tooltip="Delete" >REMOVE</a>
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
            <button type="button" class="btn btn-cons" id="close"  ng-click="clearAll(people)">
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
