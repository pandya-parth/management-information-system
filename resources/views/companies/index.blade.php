@extends('layouts.app')
@section('content')
<div class= "content">
<!-- START CONTAINER FLUID -->
          <div class="container-fluid container-fixed-lg bg-white">
            <!-- START PANEL -->
            <div class="panel panel-transparent">
              <div class="panel-heading">
                <div class="panel-title">Table with export options
                </div>
                <div class="export-options-container pull-right">
                  <div class="col-xs-12">
                      <button id="show-modal" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Add row</button>
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
                    <tr class="gradeA">
                      <td>Gecko</td>
                      <td>Firefox 1.0</td>
                      <td>Win 98+ / OSX.2+</td>
                      <td class="center">1.7</td>
                      <td class="center">A</td>
                    </tr>
                    <tr class="gradeC">
                      <td>Misc</td>
                      <td>PSP browser</td>
                      <td>PSP</td>
                      <td class="center">-</td>
                      <td class="center">C</td>
                    </tr>
                    <tr class="gradeU">
                      <td>Other browsers</td>
                      <td>All others</td>
                      <td>-</td>
                      <td class="center">-</td>
                      <td class="center">U</td>
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
                <h4 class="p-b-5"><span class="semi-bold">New</span> App</h4>
              </div>
              <div class="modal-body">
              <ul class="nav nav-tabs nav-tabs-fillup">
                        <li class="active">
                          <a data-toggle="tab" href="#slide1"><span>Home</span></a>
                        </li>
                        <li>
                          <a data-toggle="tab" href="#slide2"><span>Profile</span></a>
                        </li>
                        <li>
                          <a data-toggle="tab" href="#slide3"><span>Messages</span></a>
                        </li>
              </ul>
                <form role="form">
                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div class="tab-pane slide-left active" id="slide1">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group form-group-default">
                              <label>Name</label>
                              {!! Former::text("name")->label(false)->placeholder('Name of Project') !!}
                            </div>
                            </div>
                            
                          </div>
                        </div>
                        <div class="tab-pane slide-left" id="slide2">
                          <div class="row">
                            <div class="col-md-12">
                              <span class="semi-bold">Sometimes</span>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane slide-left" id="slide3">
                          <div class="row">
                            <div class="col-md-12">
                              <h3>Follow us &amp; get updated!</h3>
                              <p>Instantly connect to what's most important to you. Follow your friends, experts, favorite celebrities, and breaking news.</p>
                              <br>
                            </div>
                          </div>
                        </div>
                      </div>
                      </form>
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