@extends('layouts.app')
@section('content')
<div class= "content">
<!-- START CONTAINER FLUID -->
          <div class="container-fluid container-fixed-lg">
            <!-- START PANEL -->
            <div class="panel panel-transparent">
              <div class="panel-heading">
                <div class="panel-title">Table with Dynamic Rows
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
                <table class="table table-hover demo-table-dynamic" id="tableWithDynamicRows">
                  <thead>
                    <tr>
                      <th>Project name</th>
                      <th>Description</th>
                      <th>Price Type</th>
                      <th>Notes</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="v-align-middle">
                        <p>Hyperlapse</p>
                      </td>
                      <td class="v-align-middle">
                        <p>Description goes here</p>
                      </td>
                      <td class="v-align-middle">
                        <p>FREE</p>
                      </td>
                      <td class="v-align-middle">
                        <p>Notes go here</p>
                      </td>
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
                <h4 class="p-b-5"><h4>Add New Project</h4></h4>
              </div>
              <div class="modal-body">
                
                {!! Former::open()->method('post')->action( url('login'))->class('p-t-15')->role('form') !!}

                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Description</a></li>
                    <li><a data-toggle="tab" href="#menu1">Company</a></li>
                    <li><a data-toggle="tab" href="#menu2">Category</a></li>
                    <li><a data-toggle="tab" href="#menu3">Features</a></li>
                    <li><a data-toggle="tab" href="#menu4">Dates</a></li>
                  </ul>

                  <div class="tab-content">

                    <div id="home" class="tab-pane fade in active">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group form-group-default">
                              <label>Name</label>
                              {!! Former::text("name")->label(false)->placeholder('Name of Project') !!}
                            </div>
                            <div class="form-group form-group-default">
                              <label>Description</label>
                              {!! Former::text("description")->label(false)->placeholder('Description of project') !!}
                            </div>
                            <div class="form-group form-group-default">
                              <label>Status</label>
                              {!! Former::checkbox('status')->token()->label(false) !!}
                            </div>
                          </div>
                        </div>
                    </div>

                    <div id="menu1" class="tab-pane fade">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group form-group-default">
                              <label>Client Name</label>
                              <input id="appName" type="text" class="form-control" placeholder="Name of your app">
                            </div>
                            <div class="form-group form-group-default">
                              <label>Notes</label>
                              {!! Former::text("name")->label(false)->placeholder('Notes for project') !!}
                            </div>
                          </div>
                        </div>
                    </div>

                    <div id="menu2" class="tab-pane fade">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group form-group-default">
                              <label>Category</label>
                              <input id="appName" type="text" class="form-control" placeholder="Name of your app">
                            </div>
                          </div>
                        </div>
                    </div>

                    <div id="menu3" class="tab-pane fade">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group form-group-default">
                              <label>Archive</label>
                              {!! Former::checkbox('archive')->token()->label(false) !!}
                            </div>
                          </div>
                        </div>
                    </div>
                  
                    <div id="menu4" class="tab-pane fade">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group form-group-default">
                              <label>Start Date</label>
                              {!! Former::date('start_date') !!}
                            </div>
                            <div class="form-group form-group-default">
                              <label>End Date</label>
                              {!! Former::date('end_date') !!}
                            </div>
                            <div class="form-group form-group-default">
                              <label>Fix Hour</label>
                              {!! Former::number('fix_hour') !!}
                            </div>
                          </div>
                        </div>
                    </div>

                </div>
                                 
                {!! Former::close() !!}
              </div>
              <div class="modal-footer">
                <button id="add-app" type="button" class="btn btn-primary  btn-cons">Add</button>
                <button type="button" class="btn btn-cons">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- END MODAL STICK UP  -->

          

@endsection