@extends('layouts.login')
@section('title','Change Password')
@section('content')
<div class="register-container full-height sm-p-t-30">
    <div class="container-sm-height full-height">
        <div class="row row-sm-height">
            <div class="col-sm-12 col-sm-height col-middle">
                <img src="{{asset('img/logo.png')}}" alt="logo" data-src="{{asset('img/logo.png')}}" data-src-retina="{{asset('img/img/logo_2x.png')}}" width="150" height="30">
                <h3>Change Profile</h3>
                <?php
                $marital_statuses = array('maried'=>'maried',
                    'single'=>'single',
                    'other'=>'other');
                    ?>
                    <form name='form' action="url('change-profile')" class='p-t-15' role='form'>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <label>First Name</label>
                                    <input id="fname" type="text" name="fname" class="form-control" placeholder="first name" ng-model='project_category.name' >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <label>Last Name</label>
                                    <input id="lname" type="text" name="lname" class="form-control" placeholder="last name" ng-model='project_category.name' >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Email" ng-model='people_array.email' required ng-pattern='/^[_a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/'>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <label>Phone</label>
                                    <input id="phone" type="text" name="phone" class="form-control" placeholder="phone" ng-model='project_category.name' >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <label>Mobile</label>
                                    <input id="mobile" type="text" name="mobile" class="form-control" placeholder="mobile" ng-model='project_category.name' >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <label>Street 1</label>
                                    <input id="adrs1" type="text" name="adrs1" class="form-control" placeholder="street 1" ng-model='project_category.name' >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <label>Street 2</label>
                                    <input id="adrs2" type="text" name="adrs2" class="form-control" placeholder="street 2" ng-model='project_category.name' >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <label>City</label>
                                    <input id="city" type="text" name="city" class="form-control" placeholder="city" ng-model='project_category.name' >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <label>State</label>
                                    <input id="state" type="text" name="state" class="form-control" placeholder="state" ng-model='project_category.name' >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <label>Country</label>
                                    <input country-select data-ng-model="people_array.country">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <label>Zipcode</label>
                                    <input id="appName" name="zipcode" type="text" class="form-control"
                                    placeholder="Zipcode" ng-model='people_array.zipcode' ng-pattern="/^(0|[1-9][0-9]*)$/">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <label>Date Of Birth</label>
                                    <input type="text" name="dob" class="form-control" placeholder="Pick a date" id="birth-date" ng-model='people_array.dob'>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <label>Marital Status</label>
                                    <select class="full-width" data-placeholder="Select Country" data-init-plugin="select2">
                                        @foreach($marital_statuses as $marital_status)
                                        <option value="{!! $marital_status !!}">{!! $marital_status !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>Gender </label>
                                    <div class="radio radio-success" ng-init="people_array.gender='male'">
                                        <input type="radio" ng-model="people_array  .gender" name='gender' id="male" ng-value="'male'">
                                        <label for="male">Male</label>
                                        <input type="radio" ng-model='people_array.gender' name='gender' id="female" ng-value="'female'">
                                        <label for="female">Female</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <label>Department</label>
                                    <select class="full-width" data-placeholder="Select Department"
                                    data-init-plugin="select2" ng-model='people_array.department'>
                                    @foreach($departments as $department)
                                    <option value="{!! $department->name !!}">{!! $department->name !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-group-default">
                                <label>Designation/Job Title</label>
                                <select class="full-width" data-placeholder="select Designation"
                                data-init-plugin="select2" ng-model='people_array.designation'>
                                @foreach($designations as $designation)
                                <option value="{!! $designation->name !!}">{!! $designation->name !!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
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
                <div class="col-sm-6">
                    <div class="form-group form-group-default">
                        <label>Joining Date</label>
                        <input type="text"  name="join_date" class="form-control" placeholder="Pick a date"
                        id="joining-date" ng-model='people_array.join_date'>
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-default">
                        <label>Google</label>
                        <input type="text" name="google" class="form-control" placeholder="Google" ng-model='people_array.google' >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-default">
                        <label>Facebook</label>
                        <input type="text" name="facebook" class="form-control" placeholder="Facebook" ng-model='people_array.facebook' >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-default">
                        <label>Web Site</label>
                        <input type="text" name="website" class="form-control" placeholder="Web Site" ng-model='people_array.website' >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-default">
                        <label>Linkedin</label>
                        <input type="text" name="linkedin" class="form-control" placeholder="Linkedin" ng-model='people_array.linkedin' >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-default">
                        <label>Skype</label>
                        <input type="text" name="skype" class="form-control" placeholder="Skype" ng-model='people_array.skype' >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-default">
                        <label>Twitter</label>
                        <input type="text" name="twitter" class="form-control" placeholder="Twitterl" ng-model='people_array.twitter' >
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-cons m-t-10" form="form1" value="Submit">Submit</button>
        </form>
    </div>
</div>
</div>
</div>
@endsection
