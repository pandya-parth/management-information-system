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
                  <button id="show-modal" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Add row</button>
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
                      <td>Internet Explorer 5.5</td>
                      <td>Win 95+</td>
                      <td class="center">5.5</td>
                      <td class="center">A</td>
                    </tr>
                    <tr class="even gradeA">
                      <td>Trident</td>
                      <td>Internet Explorer 6</td>
                      <td>Win 98+</td>
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

                <h4 class="p-b-5"><h4>Add New Project</h4></h4>

              </div>

              <div class="modal-body">

                

                {!! Former::open()->method('post')->action( url('login'))->class('p-t-15')->role('form') !!}



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
                        <li>
                          <a data-toggle="tab" href="#slide4"><span>Profile</span></a>
                        </li>
                        <li>
                          <a data-toggle="tab" href="#slide5"><span>Messages</span></a>
                        </li>
                      </ul>



                  <div class="tab-content">

                   <div class="tab-pane slide-left active" id="slide1">
                          <div class="row column-seperation">
                            <div class="col-md-12">
                              <label>Name</label>

                              {!! Former::text("name")->label(false)->placeholder('Name of Project') !!}
                            </div>
                            
                          </div>
                        </div>
                        <div class="tab-pane slide-left" id="slide2">
                          <div class="row">
                            <div class="col-md-12">
                              <h3>“ Nothing is
                                                <span class="semi-bold">impossible</span>, the word itself says 'I'm
                                                <span class="semi-bold">possible</span>'! ”</h3>
                              <p>A style represents visual customizations on top of a layout. By editing a style, you can use Squarespace's visual interface to customize your...</p>
                              <br>
                              <p class="pull-right">
                                <button type="button" class="btn btn-default btn-cons">White</button>
                                <button type="button" class="btn btn-success btn-cons">Success</button>
                              </p>
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
                        <div class="tab-pane slide-left" id="slide4">
                          <div class="row">
                            <div class="col-md-12">
                              <h3>“ Nothing is
                                                <span class="semi-bold">impossible</span>, the word itself says 'I'm
                                                <span class="semi-bold">possible</span>'! ”</h3>
                              <p>A style represents visual customizations on top of a layout. By editing a style, you can use Squarespace's visual interface to customize your...</p>
                              <br>
                              <p class="pull-right">
                                <button type="button" class="btn btn-default btn-cons">White</button>
                                <button type="button" class="btn btn-success btn-cons">Success</button>
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane slide-left" id="slide5">
                          <div class="row">
                            <div class="col-md-12">
                              <h3>Follow us &amp; get updated!</h3>
                              <p>Instantly connect to what's most important to you. Follow your friends, experts, favorite celebrities, and breaking news.</p>
                              <br>
                            </div>
                          </div>
                        </div>

                </div>

                                 

                {!! Former::close() !!}

              </div>

              <div class="modal-footer">

                <button id="add-app" type="button" class="btn btn-primary  btn-cons">Add</button>

                <button type="button" class="btn btn-cons" id="close_btn" data-dismiss="modal" aria-hidden="true">Close</button>

              </div>

            </div>

            <!-- /.modal-content -->

          </div>

          <!-- /.modal-dialog -->

        </div>

        <!-- END MODAL STICK UP  -->
@endsection