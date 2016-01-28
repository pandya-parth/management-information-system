@extends('layouts.app')
@section('content')
<div class= "content">
<!-- START CONTAINER FLUID -->
          <div class="container-fluid container-fixed-lg">
          <div class="inner">
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                  <li>
                    <a href="{!!url('/')!!}">Home</a>
                  </li>
                  <li><a href="{!!url('projects')!!}" class="active">Projects</a>
                  </li>
                </ul>
              </div>
            <!-- START PANEL -->
            <div class="panel panel-transparent">
              <div class="panel-heading">
                <div class="panel-title">
                <h4>Projects</h4>
                </div>
                <div class="pull-right">
                  <div class="col-xs-12">
                  <!-- {!! link_to("project/create","Add",array('class'=>'btn btn-primary btn-cons   pull-right')) !!}
                   -->  <button id="show-modal" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Add project</button>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-body">
                <table class="table table-hover demo-table-dynamic">
                  <thead>
                    <tr>
                      <th>Project name</th>
                      <th>Description</th>
                      <th>Price Type</th>
                      <th>Notes</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                      @forelse($projects as $project)
                      <tr>
                      <td class="v-align-middle" >
                      <p>{{ $project->id }}</p>
                      </td>
                      <td class="v-align-middle" >
                      <p>{{ $project->name }}</p>
                      </td>
                      </tr>
                      
                   @empty
                     
                  </tbody>
                </table>
                      <p>No Project to display</p>
                    @endforelse
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h4 class="p-b-5"><h4>Add New Project</h4></h4>
              </div>
              <div class="modal-body">
               <form role="form">
                  <ul class="nav nav-tabs nav-tabs-fillup">
                    <li class="active"><a data-toggle="tab" href="#home">Description</a></li>
                    <li><a data-toggle="tab" href="#menu1">Company</a></li>
                    <li><a data-toggle="tab" href="#menu2">Category</a></li>
                    <li><a data-toggle="tab" href="#menu3">Features</a></li>
                    <li><a data-toggle="tab" href="#menu4">Dates</a></li>
                  </ul>
                  <div class="tab-content">
                    <div id="home" class="tab-pane slide-left active">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group form-group-default">
                              <label>Name</label>
                              <input type="text" class="form-control" id="name" placeholder="Name of Project" ng-model='project.name' required>
                            </div>
                            <div class="form-group form-group-default">
                              <label>Description</label>
                              <input type="text" class="form-control" id="description" placeholder="Description of Project" ng-model='project.description' required>
                            </div>
                            <div class="checkbox check-success ">
                              <input type="checkbox" checked="checked" value="1" id="checkbox1" ng-model='checkbox1'>
                              <label for="checkbox1">Status</label>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div id="menu1" class="tab-pane slide-left">
                        <div class="row">
                          <div class="col-sm-12">
                            
                              <form class="m-t-10" role="form">
                                <div class="form-group form-group-default form-group-default-select2">
                                 <label>Client Name</label>
                                  <select class="full-width" data-placeholder="Select Country" data-init-plugin="select2" id="client" ng-model='project.client' >
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
                              <label>Notes</label>
                              <input type="text" class="form-control" id="notes" placeholder="Notes of Project" ng-model='project.notes' required>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div id="menu2" class="tab-pane slide-left">
                        <div class="row">
                          <div class="col-sm-12">
                            <form class="m-t-10" role="form">
                                <div class="form-group form-group-default form-group-default-select2">
                                 <label>Category Of Project</label>
                                  <select class="full-width" data-placeholder="Select Country" data-init-plugin="select2" id="category" ng-model='project_category.name'>
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
                    </div>
                    <div id="menu3" class="tab-pane slide-left">
                        <div class="row">
                          <div class="col-sm-12">
                            <form class="m-t-10" role="form">
                                <div class="form-group form-group-default form-group-default-select2">
                                 <label>Price Type</label>
                                  <select class="full-width" data-placeholder="Select Country" data-init-plugin="select2" id="price_type" ng-model='project.price_type'>
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
                            <div class="checkbox check-success ">
                              <input type="checkbox" checked="checked" value="1" id="archive" ng-model='project.archive'>
                              <label for="checkbox1">Archive</label>
                            </div>
                          </div>
                        </div>
                    </div>
                     <div id="menu4" class="tab-pane slide-left">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group form-group-default input-group col-sm-10">
                              <input type="email" class="form-control" placeholder="Pick a date" id="datepicker-component2">
                              
                              <input class="form-control" placeholder="Pick a date" id="datepicker-component2" id="start_date" ng-model='project.start_date'>
                              <span class="input-group-addon">
                                                          <i class="fa fa-calendar"></i>
                                                        </span>
                            </div>
                            <div class="form-group form-group-default input-group col-sm-10">
                              <input type="email" class="form-control" placeholder="Pick a date" id="datepicker-component2">
                              
                              <input class="form-control" placeholder="Pick a date" id="datepicker-component2" id="end_date" ng-model='project.end_date'>
                              <span class="input-group-addon">
                                                          <i class="fa fa-calendar"></i>
                                                        </span>
                            </div>
                            <div class="form-group form-group-default">
                              <label>Fix Hour</label>
                              <input type="text" name="fix_hour" class="form-control" id="fix_hour" placeholder="Fix Hour of Project" ng-model='project.fix_hour' required>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                   <div class="modal-footer">
                <button id="add-app" type="button" class="btn btn-primary  btn-cons">Add</button>
                <button type="button" class="btn btn-cons" id="close" data-dismiss="modal">Close</button>
                
              </div>              
                </form>
              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- END MODAL STICK UP  -->
          
@endsection
