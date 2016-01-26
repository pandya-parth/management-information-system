@extends('layouts.app')
@section('content')
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
                            <th>name</th>
                            <th>Photo</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($peoples as $people)
                            <tr>
                                <td class="v-align-middle">
                                    <p>{{ $people->id }}</p>
                                </td>
                                <td class="v-align-middle">
                                    <p>{{ $people->name }}</p>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="v-align-middle">
                                    <p>No User to display</p>
                                </td>
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
                <div class="modal-body">
                    {!! Former::open()->method('post')->action( url(''))->class('p-t-15')->role('form') !!}
                    <ul class="nav nav-tabs nav-tabs-fillup">
                        <li class="active"><a data-toggle="tab" href="#home">Personal</a></li>
                        <li><a data-toggle="tab" href="#menu1">Address</a></li>
                        <li><a data-toggle="tab" href="#menu2">Employment</a></li>
                        <li><a data-toggle="tab" href="#menu3">Experience<span>Qualification</span></a></li>
                        <li><a data-toggle="tab" href="#menu4">Social</a></li>

                    </ul>
                    <div class="tab-content">
                        <div id="home" class="tab-pane slide-left active">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label>First Name</label>
                                        {!! Former::text("first_name")->label(false)->placeholder('First Name') !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label>Last Name</label>
                                        {!! Former::text("last_name")->label(false)->placeholder('Last Name') !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label>Email</label>
                                        {!! Former::text("email")->label(false)->placeholder('Email') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Mobile</label>
                                        {!! Former::text("mobile")->label(false)->placeholder('Mobile Number') !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Phone</label>
                                        {!! Former::text("phone")->label(false)->placeholder('Phone Number') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group form-group-default input-group col-md-12">
                                        <label>Date of Birth</label>
                                        <input type="email" class="form-control" placeholder="Pick a date"
                                               id="datepicker-component2">
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
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group form-group-default">
                                        <label>Photo</label>
                                        <button class="btn btn-success btn-cons m-b-10" type="button"><i
                                                    class="fa fa-cloud-upload"></i> <span class="bold">Upload</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group form-group-default">
                                        <label>Preview</label>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane slide-left">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group form-group-default">
                                        <label>Address 1</label>
                                        {!! Former::text("adrs1")->label(false)->placeholder('Address 1') !!}
                                    </div>
                                    <form class="m-t-10" role="form">
                                        <div class="form-group form-group-default form-group-default-select2">
                                            <label>City</label>
                                            <select class="full-width" data-placeholder="Select Country"
                                                    data-init-plugin="select2">
                                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                                    <option value="AK">Alaska</option>
                                                    <option value="HI">Hawaii</option>
                                                </optgroup>
                                                <optgroup label="Pacific Time Zone">
                                                    <option value="CA">California</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="WA">Washington</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </form>
                                    <form class="m-t-10" role="form">
                                        <div class="form-group form-group-default form-group-default-select2">
                                            <label>Country</label>
                                            <select class="full-width" data-placeholder="Select Country"
                                                    data-init-plugin="select2">
                                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                                    <option value="AK">Alaska</option>
                                                    <option value="HI">Hawaii</option>
                                                </optgroup>
                                                <optgroup label="Pacific Time Zone">
                                                    <option value="CA">California</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="WA">Washington</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-group-default">
                                        <label>Address 2</label>
                                        {!! Former::text("adrs1")->label(false)->placeholder('Address 2') !!}
                                    </div>
                                    <form class="m-t-10" role="form">
                                        <div class="form-group form-group-default form-group-default-select2">
                                            <label>State</label>
                                            <select class="full-width" data-placeholder="Select Country"
                                                    data-init-plugin="select2">
                                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                                    <option value="AK">Alaska</option>
                                                    <option value="HI">Hawaii</option>
                                                </optgroup>
                                                <optgroup label="Pacific Time Zone">
                                                    <option value="CA">California</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="WA">Washington</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </form>
                                    <div class="form-group form-group-default">
                                        <label>Zipcode</label>
                                        {!! Former::text("zipcode")->label(false)->placeholder('Zipcode') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="menu2" class="tab-pane slide-left">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>PAN Number</label>
                                        {!! Former::text("pan_number")->label(false)->placeholder('PAN Number') !!}
                                    </div>
                                    <form class="m-t-10" role="form">
                                        <div class="form-group form-group-default form-group-default-select2">
                                            <label>Department</label>
                                            <select class="full-width" data-placeholder="Select Country"
                                                    data-init-plugin="select2">
                                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                                    <option value="AK">Alaska</option>
                                                    <option value="HI">Hawaii</option>
                                                </optgroup>
                                                <optgroup label="Pacific Time Zone">
                                                    <option value="CA">California</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="WA">Washington</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </form>
                                    <form class="m-t-10" role="form">
                                        <div class="form-group form-group-default form-group-default-select2">
                                            <label>Designation/Job Title</label>
                                            <select class="full-width" data-placeholder="Select Country"
                                                    data-init-plugin="select2">
                                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                                    <option value="AK">Alaska</option>
                                                    <option value="HI">Hawaii</option>
                                                </optgroup>
                                                <optgroup label="Pacific Time Zone">
                                                    <option value="CA">California</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="WA">Washington</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </form>
                                    <form class="m-t-10" role="form">
                                        <div class="form-group form-group-default form-group-default-select2">
                                            <label>Management Level</label>
                                            <select class="full-width" data-placeholder="Select Country"
                                                    data-init-plugin="select2">
                                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                                    <option value="AK">Alaska</option>
                                                    <option value="HI">Hawaii</option>
                                                </optgroup>
                                                <optgroup label="Pacific Time Zone">
                                                    <option value="CA">California</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="WA">Washington</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </form>
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
                        <div id="menu3" class="tab-pane slide-left">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Company Name</label>
                                        {!! Former::text("phone")->label(false)->placeholder('Name of Company') !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default form-group-default-select2">
                                        <label>Designation</label>
                                        <select class="full-width" data-placeholder="Select Country"
                                                data-init-plugin="select2">
                                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                                <option value="AK">Alaska</option>
                                                <option value="HI">Hawaii</option>
                                            </optgroup>
                                            <optgroup label="Pacific Time Zone">
                                                <option value="CA">California</option>
                                                <option value="NV">Nevada</option>
                                                <option value="OR">Oregon</option>
                                                <option value="WA">Washington</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default input-group col-md-12">
                                        <label>From</label>
                                        <input type="email" class="form-control" placeholder="Pick a date"
                                               id="datepicker-component2">
                              <span class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                              </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default input-group col-md-12">
                                        <label>To</label>
                                        <input type="email" class="form-control" placeholder="Pick a date"
                                               id="datepicker-component2">
                              <span class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                              </span>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default form-group-default-select2">
                                        <label>Education</label>
                                        <select class="full-width" data-placeholder="Select Country"
                                                data-init-plugin="select2">
                                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                                <option value="AK">Alaska</option>
                                                <option value="HI">Hawaii</option>
                                            </optgroup>
                                            <optgroup label="Pacific Time Zone">
                                                <option value="CA">California</option>
                                                <option value="NV">Nevada</option>
                                                <option value="OR">Oregon</option>
                                                <option value="WA">Washington</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Attached Documents</label>
                                        <button class="btn btn-success btn-cons m-b-10" type="button">
                                            <i class="fa fa-cloud-upload"></i> <span class="bold">Upload</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="menu4" class="tab-pane slide-left">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Google</label>
                                        {!! Former::text("google")->label(false)->placeholder('Google') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Facebook</label>
                                        {!! Former::text("facebook")->label(false)->placeholder('Facebook') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Web Site</label>
                                        {!! Former::text("skype")->label(false)->placeholder('Skype') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Linkedin</label>
                                        {!! Former::text("linkedin")->label(false)->placeholder('LinkedIn') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Twitter</label>
                                        {!! Former::text("twitter")->label(false)->placeholder('Twitter') !!}
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
                {!! Former::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- END MODAL STICK UP  -->
@endsection
