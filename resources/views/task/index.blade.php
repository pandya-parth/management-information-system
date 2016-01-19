@extends('layouts.app')
@section('title','Task')
@section('content')
<div class= "content">
<!-- START CONTAINER FLUID -->
          <div class="container-fluid container-fixed-lg bg-white">
               <div class="inner">
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                  <li>
                    <a href="{!!url('/')!!}">Home</a>
                  </li>
                  <li><a href="{!!url('tasks')!!}" class="active">Tasks</a>
                  </li>
                </ul>
              </div>
            <!-- START PANEL -->
            <div class="panel panel-transparent">
              <div class="panel-heading">
                <div class="panel-title">Tasks List
                </div>
                <div class="export-options-container pull-right">
                  <div class="col-xs-12">
                      <button id="show-modal" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Add task</button>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-body">
                <table class="table table-striped" id="tableWithExportOptions">
                  <thead>
                    <tr>
                      <th>Rendering engine</th>
                      <th>Browser</th>
                      <th>Platform(s)</th>
                      <th>Engine version</th>
                      <th>CSS grade</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="odd gradeX">
                      <td>Trident</td>
                      <td>Internet Explorer 4.0</td>
                      <td>Win 95+</td>
                      <td class="center"> 4</td>
                      <td class="center">X</td>
                    </tr>
                    <tr class="even gradeC">
                      <td>Trident</td>
                      <td>Internet Explorer 5.0</td>
                      <td>Win 95+</td>
                      <td class="center">5</td>
                      <td class="center">C</td>
                    </tr>
                    <tr class="odd gradeA">
                      <td>Trident</td>
                      <td>Internet Explorer 7</td>
                      <td>Win XP SP2+</td>
                      <td class="center">7</td>
                      <td class="center">A</td>
                    </tr>
                    <tr class="even gradeA">
                      <td>Trident</td>
                      <td>AOL browser (AOL desktop)</td>
                      <td>Win XP</td>
                      <td class="center">6</td>
                      <td class="center">A</td>
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
        <div class="modal fade stick-up" id="addNewAppModal" tabindex="-1" role="dialog" aria-labelledby="addNewAppModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h4 class="p-b-5"><h4>Add New Task</h4></h4>
              </div>
              <div class="modal-body">
                <div class="panel panel-transparent ">
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs nav-tabs-fillup">
                        <li class="active">
                          <a data-toggle="tab" href="#slide1" aria-expanded="true"><span>Description</span></a>
                        </li>
                        <li class="">
                          <a data-toggle="tab" href="#slide2" aria-expanded="false"><span>Project</span></a>
                        </li>
                        <li class="">
                          <a data-toggle="tab" href="#slide3" aria-expanded="false"><span>Date & Time</span></a>
                        </li>
                        <li class="">
                          <a data-toggle="tab" href="#slide4" aria-expanded="false"><span>Task Assign To.</span></a>
                        </li>
                      </ul>
                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div class="tab-pane slide-left active" id="slide1">
                          <div class="row column-seperation">
                            <div class="col-md-12">
                              <div class="form-group form-group-default">
                              <label>Task Name</label>
                              <input id="appName" type="text" class="form-control" >
                            </div>
                            <div class="form-group form-group-default">
                              <label>Descripation</label>
                              <textarea id="appName" type="text" class="form-control" ></textarea>
                            </div>
                            <div class="checkbox check-success  ">
                              <input type="checkbox"  value="1" id="checkbox2">
                              <label for="checkbox2">Billable</label>
                            </div> 
                            
                            
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane slide-left" id="slide2">
                          <div class="row">
                            <div class="col-md-12">
                            <div class="form-group form-group-default form-group-default-select2">
                              <label class="">Project Name</label>
                              <div class="select2-container full-width" id="s2id_autogen3">
                              <select class="full-width select2-offscreen" data-placeholder="Select Country" data-init-plugin="select2" tabindex="-1" title="">
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
                          <div class="col-md-12">
                            <div class="form-group form-group-default form-group-default-select2">
                              <label class="">Task Category</label>
                              <div class="select2-container full-width" id="s2id_autogen3">
                              <select class="full-width select2-offscreen" data-placeholder="Select Country" data-init-plugin="select2" tabindex="-1" title="">
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
                        </div>
                      </div>
                        <div class="tab-pane slide-left" id="slide3">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group form-group-default input-group col-md-12">
                              <label>Start Date</label>
                              <input type="email" class="form-control" placeholder="Pick a date" id="datepicker-component2">
                              <span class="input-group-addon">
                                                          <i class="fa fa-calendar"></i>
                                                        </span>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group form-group-default input-group col-md-12">
                              <label>End Date</label>
                              <input type="email" class="form-control" placeholder="Pick a date" id="datepicker-component2">
                              <span class="input-group-addon">
                                                      <i class="fa fa-calendar"></i>
                              </span>
                            </div>
                        </div>
                      </div>
                    </div>
                      <div class="tab-pane slide-left" id="slide4">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group form-group-default input-group col-md-12">
                             <label class="">Task Asign To</label>
                              <div class="select2-container full-width" id="s2id_autogen3">
                              <select class="full-width select2-offscreen" data-placeholder="Select Country" data-init-plugin="select2" tabindex="-1" title="">
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
                           <div class="form-group form-group-default input-group col-sm-12">
                            <label class="">Files </label>
                            <button class="btn btn-success btn-cons m-b-10" type="button"><i class="fa fa-cloud-upload"></i> <span class="bold">Upload</span>
                    </button>

                           </div>
                          </div>
                      </div>
                    </div>
                    
              </div>
            </div>
          </div>
              <div class="modal-footer">
                <button id="add-app" type="button" class="btn btn-primary  btn-cons">Add</button>
                <button type="button" class="btn btn-cons" id="close_btn" data-dismiss="modal" aria-hidden="true">Close</button>
              </div>
            </div>
          </div>
        </div>
    

          

@endsection

