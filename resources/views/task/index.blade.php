@extends('layouts.app')
@section('title','Task')
@section('content')


<div class= "content">

<!-- START CONTAINER FLUID -->

          <div class="container-fluid container-fixed-lg">

            <!-- START PANEL -->
             <div class="inner">
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                  <li>
                    <a href="{!!url('/')!!}">Home</a>
                  </li>
                  <li><a href="{!!url('tasks')!!}" class="active">Tasks</a>
                  </li>
                </ul>

            <div class="panel panel-transparent">

              <div class="panel-heading">

                <div class="panel-title">

                <h4>Tasks</h4>

                </div>

                <div class="pull-right">

                  <div class="col-xs-12">

                  <!-- {!! link_to("project/create","Add",array('class'=>'btn btn-primary btn-cons   pull-right')) !!}

                   -->  <button id="show-modal" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Add row</button>

                  </div>

                </div>

                <div class="clearfix"></div>

              </div>

              <div class="panel-body">

                <table class="table table-hover demo-table-dynamic">

                  <thead>

                    <tr>

                      <th>task name</th>

                      <th>Project</th>

                      <th>Task Category</th>

                      <th>Duration</th>

                    </tr>

                  </thead>

                  <tbody>

                    

                      @forelse($tasks as $task)

                      <tr>

                      <td class="v-align-middle" >

                      <p>{{ $task->id }}</p>

                      </td>

                      <td class="v-align-middle" >

                      <p>{{ $task->name }}</p>

                      </td>

                      </tr>

                      

                   @empty



                      <tr>

                      <td class="v-align-middle" >

                      <p>No tasks to display</p>

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
        <div class="modal fade stick-up" id="addNewAppModal" tabindex="-1" role="dialog" aria-labelledby="addNewAppModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h4 class="p-b-5"><h4>Add New Task</h4></h4>
              </div>
              <div class="modal-body">
                {!! Former::open()->method('post')->action( url(''))->class('p-t-15')->role('form') !!}
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

                            <div class="form-group form-group-default">                                                      
                            <div class="checkbox check-success  ">
                              <input type="checkbox"  value="1" id="checkbox2">
                              <label for="checkbox2">Billable</label>
                            </div> 
                          </div>

                            <div class="form-group form-group-default">
                            <label>Status</label>
                            <div class="radio radio-success">
                               <input type="radio" checked="checked" value="yes" name="status" id="yes">
                              <label for="yes">In Progress</label>
                              <input type="radio"  value="no" name="status" id="no">
                              <label for="no">Completed</label>
                            </div>
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
                 {!! Former::close() !!}
          </div>
              <div class="modal-footer">
                <button id="add-app" type="button" class="btn btn-primary  btn-cons">Add</button>
                <button type="button" class="btn btn-cons" id="close" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    

          

@endsection

