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
                        Companies
                    </div>
                    <div class="pull-right text-right">
                            <div class="row">
                            <div class="col-xs-5" ng-cloak ng-show="companies.length>0">
                                <input ng-cloak ng-model="q" type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                            </div>
                            <div class="col-xs-3" ng-cloak ng-show="companies.length>0">
                                <select class="cs-select cs-skin-slide" data-init-plugin="cs-select">
                                      <option value="sightseeing">Web-safe</option>
                                      <option value="business">Helvetica</option>
                                      <option value="honeymoon">SegeoUI</option>
                                    </select>
                            </div>
                            <div class="col-xs-4">
                                <button id="show-modal" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Add Company</button>
                            </div>
                            </div>
                        </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">


        <p class="text-center" ng-show="loading"><img src="{!! asset('img/demo/progress.svg') !!}" /></p>


                <div ng-cloak class="grid_list_view" ng-show="companies.length>0">
                            <div class="head list_view border_class">
                                <div class="row">
                                    <div class="datas people_id_pic">Logo</div>
                                    <div class="datas people_name">Name</div>
                                    <div class="datas people_designation">Website</div>
                                    <div class="datas people_email">Email</div>
                                    <div class="datas people_phone">Phone</div>
                                    <div class="datas people_action">Action</div>
                                </div>
                            </div>
                            <div class="data_area list_view " dir-paginate="company in companies| orderBy:'-id' | filter:q | itemsPerPage: pageSize"
                            current-page="currentPage" ng-show="companies.length != 0">
                                <!-- row 1 -->
                                <div ng-cloak class="row border_class">
                                    <div class="datas people_id_pic">
                                        <div ng-cloak class="pic"><img src="{!! asset('img/noPhoto.png') !!}" /></div>
                                        
                                        
                                    </div>
                                    <div ng-cloak class="datas people_name box_real">
                                        {% company.name ? company.name : '-' %}
                                    </div>
                                    <div ng-cloak class="datas people_designation">
                                        {% company.website %}
                                    </div>
                                    <div ng-cloak class="datas people_email">
                                        <a href="hitesh@krishaweb.com" target="_blank">{% company.email %}</a>
                                    </div>
                                    <div ng-cloak class="datas people_phone">
                                        {% company.phone %}
                                    </div>
                                    <div class="datas people_action">
                                       <a href="#" class="btn btn-success btn-sm" ng-click="editCompany(company.id)" ><i class="fa fa-edit"></i></a>
                                       <a href="#" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                       <a href="#" class="btn btn-success btn-sm" ng-click="deleteCompany(company.id)" ><i class="fa fa-trash"></i></a>
                                   </div>
                               </div>
                               <!-- row 1 complete -->
                               

                            </div>
                       </div>
    
                <div ng-cloak class="col-md-12 sm-p-t-15" ng-if="companies.length==0">
                            <div style="text-align:center;">
                                <img src="{!! asset('img/noCompany.png') !!}" style=" width:100px; height:100px; " />
                                <p><h3>No match found</h3></p>
                            </div>
                        </div>
            </div>
            <dir-pagination-controls boundary-links="true"
            on-page-change="pageChangeHandler(newPageNumber)"></dir-pagination-controls>
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
            <h4 class="p-b-5" ng-bind="edit==false ? 'Add New Company' : 'Edit Company'">
            </div>
            <form name="Companies" class='p-t-15' role='form' novalidate>
                <div class="modal-body">
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
                                        <input id="appName" type="text" name="name" class="form-control"
                                        placeholder="Name of Company" ng-model='company.name' required>
                                        <span class="error"
                                        ng-show="submitted && Companies.name.$error.required">* Please enter company name</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>Website</label>
                                        <input id="appName" name="website" type="url" class="form-control"
                                        placeholder="Website of Company" ng-model='company.website'
                                        required>
                                        <span class="error"
                                        ng-show="submitted && Companies.website.$error.required">* Please enter website</span>
                                        <span class="error" ng-show="submitted && Companies.website.$error.url">* Please enter valid website url</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control" placeholder="Email" ng-model='company.email' required ng-pattern='/^[_a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/'>
                                        <span class="error" ng-show="submitted && Companies.email.$error.required">* Please enter Email </span>
                                        <span class="error" ng-show="submitted && Companies.email.$error.pattern">* Please enter valid email</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div  id="preview">
                                        <img src="{!! asset('img/noPhoto.png')!!}" id="noimage" style="height:100px;width:100px;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div id="filelist">Upload logo from here..</div>
                                    <div id="progressbar"></div>
                                    <br />
                                    <div class="form-group">
                                        <div class="col-lg-6 clearfix">
                                            <div id="container">
                                                <a id="pickfiles" href="javascript:;">Upload Logo</a>
                                            </div>  
                                        </div>  
                                    </div>
                                    <input type="hidden" name='logo' id="logo"
                                    ng-modal='company.logo'>
                                </div>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane slide-left">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>Industry</label>
                                        <input id="appName" name="industry" type="text" class="form-control"
                                        placeholder="Industry" ng-model='company.industry'>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>Phone</label>
                                        <input id="appName" type="text" name="phone" class="form-control"
                                        placeholder="Phone" ng-model='company.phone'>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>Fax</label>
                                        <input id="appName" type="text" name="mobile" class="form-control"
                                        placeholder="Fax" ng-model='company.fax'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="menu2" class="tab-pane slide-left">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group form-group-default">
                                        <label>Address 1</label>
                                        <textarea id="appName" type="text" name="adrs1" class="form-control"
                                        placeholder="Address 1" ng-model='company.adrs1'> </textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-group-default">
                                        <label>Address 2</label>
                                        <textarea id="appName" type="text" name="adrs2" class="form-control"
                                        placeholder="Address 2" ng-model='company.adrs2'> </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group form-group-default">
                                        <label>City</label>
                                        <input id="appName" name="city" type="text" class="form-control"
                                        placeholder="city" ng-model='company.city'>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-group-default">
                                        <label>Zipcode</label>
                                        <input id="appName" name="zipcode" type="text" class="form-control"
                                        placeholder="Zipcode" ng-model='company.zipcode'>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group form-group-default">
                                        <label>State</label>
                                        <input id="appName" name="state" type="text" class="form-control"
                                        placeholder="State" ng-model='company.state'>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-group-default">
                                        <div id="basic"  data-input-name="country" data-selected-country="US" data-button-size="btn-lg" data-button-type="btn-warning" data-scrollable="true" data-scrollable-height="250px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="add-app" type="button" class="btn btn-primary  btn-cons"
                    ng-click="submit(Companies)" ng-bind="edit==false ? 'Add' : 'Edit'">Add
                </button>
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
