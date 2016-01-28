@extends('layouts.app')
@section('title','Companies')
@section('content')
<div ng-controller="companyCtrl">
        <div class="content">
            <!-- START CONTAINER FLUID -->
            <div class="container-fluid container-fixed-lg">
                <div class="inner">
                    <!-- START BREADCRUMB -->
                    <ul class="breadcrumb">
                        <li>
                            <a href="{!!url('/')!!}">Home</a>
                        </li>
                        <li><a href="{!!url('companies')!!}" class="active">Companies</a>
                        </li>
                    </ul>
                </div>
                <!-- START PANEL -->
                <div class="panel panel-transparent">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Companies</h4>
                        </div>
                        <div class="pull-right">
                            <div class="col-xs-12">
                                <button id="show-modal" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Add
                                    Company
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
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody ng-cloak>
                            <tr ng-if="companies.length != 0" ng-repeat="company in companies" ng-cloak>
                                <td class="v-align-middle" >
                                    <p ng-cloak>{% company.id %}</p>
                                </td>
                                <td class="v-align-middle">
                                    <p ng-cloak>{% company.name ? company.name : '-' %}</p>
                                </td>
                                <td class="v-align-middle">
                                    <p >
                                        <a href="#">Edit</a>
                                        <a href="javascript:;" ng-click="deleteCompany(company.id)">Delete</a>
                                    </p>
                                </td>
                            </tr>
                            <tr ng-if="companies.length == 0">
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
        <div class="modal fade stick-up" id="addNewAppModal" tabindex="-1" role="dialog"
             aria-labelledby="addNewAppModal"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header clearfix ">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                                    class="pg-close fs-14"></i>
                        </button>
                        <h4 class="p-b-5"><h4>Add New Company</h4></h4>
                    </div>
                    <div class="modal-body">
                        <form name='companies' class='p-t-15' role='form' novalidate>
                            <ul class="nav nav-tabs nav-tabs-fillup">
                                <li class="active"><a data-toggle="tab" href="#home">Description</a></li>
                                <li><a data-toggle="tab" href="#menu1">Industry</a></li>
                                <li><a data-toggle="tab" href="#menu2">Address</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="home" class="tab-pane slide-left active">
                                    <div class="row">
                                        <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>name</label>
                                                    <input id="appName" type="text" class="form-control" placeholder="Name of Company" ng-model='company.name'  required>
                                                    <span class="error" ng-show="submitted && companies.$error.required">* Please enter company name</span>
                                                </div>
                                                <div class="form-group form-group-default">
                                                    <label>Website</label>
                                                    <input id="appName" type="text" class="form-control" placeholder="Website of Company" ng-model='company.website'  required>
                                                    <span class="error" ng-show="submitted && companies.$error.required">* Please enter website</span>
                                                </div>
                                            <div class="form-group form-group-default">
                                                    <label>Email</label>
                                                    <input id="appName" type="text" class="form-control" placeholder="Email" ng-model='company.email' required>
                                                    <span class="error" ng-show="submitted && companies.$error.required">* Please enter email</span>
                                            </div>
                                            <div class="form-group form-group-default">
                                                  <label>Company Logo</label>
                                                    <input id="appName" type="text" class="form-control" placeholder="logo" ng-model='company.logo' >
                                                    <span class="error" ng-show="submitted && companies.$error.required">* Please enter logo</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="menu1" class="tab-pane slide-left">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            
                                            <div class="form-group form-group-default">
                                                <label>Industry</label>
                                                <input id="appName" type="text" class="form-control" placeholder="Industry" ng-model='company.industry'  >
                                            </div>
                                           
                                             <div class="form-group form-group-default">
                                                <label>Phone</label>
                                                <input id="appName" type="text" class="form-control" placeholder="Phone" ng-model='company.phone'>
                                                <!-- <span class="error" ng-show="submitted && company.$error.required">* Please enter phone number</span> -->
                                            </div>
                                            <div class="form-group form-group-default">
                                                <label>Fax</label>
                                                <input id="appName" type="text" class="form-control" placeholder="Fax" ng-model='company.fax'  >
                                                <!-- <span class="error" ng-show="submitted && company.$error.required">* Please enter fax</span> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="menu2" class="tab-pane slide-left">
                                    <div class="row">
                                    <div class="col-sm-6">
                                            <div class="form-group form-group-default">
                                           <label>Address 1</label>
                                                <textarea id="appName" type="text" class="form-control" placeholder="Address 1" ng-model='company.adrs1' > </textarea> 
                                                <!-- <span class="error" ng-show="submitted && company.$error.required">* Please enter address 2</span> -->
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-default">
                                                <label>Address 2</label>
                                                <textarea id="appName" type="text" class="form-control" placeholder="Address 2" ng-model='company.adrs2'> </textarea> 
                                                <!-- <span class="error" ng-show="submitted && company.$error.required">* Please enter address 2</span> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                             <div class="form-group form-group-default">
                                                <label>City</label>
                                                <input id="appName" type="text" class="form-control" placeholder="city" ng-model='company.city' >
                                            </div>
                                           
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-default">
                                                <label>Zipcode</label>
                                                <input id="appName" type="text" class="form-control" placeholder="Zipcode" ng-model='company.zipcode'  >
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-default">
                                                <label>State</label>
                                                <input id="appName" type="text" class="form-control" placeholder="State" ng-model='company.state'  >
                                            </div>
                                           
                                        </div> 
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-default">
                                                <label>Country</label>
                                                <input id="appName" type="text" class="form-control" placeholder="Country" ng-model='company.country'>
                                            </div>
                                            
                                        </div>
                                     </div>
                                </div>
                          </div>
                    </div>
                    <div class="modal-footer">
                            <button id="add-app" type="button" class="btn btn-primary  btn-cons" ng-click="submit(companies)">Add </button>
                            <button type="button" class="btn btn-cons" id="close" ng-click='clearAll()'>Close</button>
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
