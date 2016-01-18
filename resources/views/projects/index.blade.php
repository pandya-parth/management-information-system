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
                <p class="small-text">Create a new app using this form, make sure you fill them all</p>
                <form role="form">

                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                    <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
                    <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
                    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
                  </ul>

                  <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                      <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group form-group-default">
                        <label>name</label>
                        <input id="appName" type="text" class="form-control" placeholder="Name of your app">
                      </div>
                    </div>
                  </div>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                      <h3>Menu 1</h3>
                      <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group form-group-default">
                        <label>name</label>
                        <input id="appName" type="text" class="form-control" placeholder="Name of your app">
                      </div>
                    </div>
                  </div>
                  </div>
                    <div id="menu2" class="tab-pane fade">
                      <h3>Menu 2</h3>
                      <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group form-group-default">
                        <label>name</label>
                        <input id="appName" type="text" class="form-control" placeholder="Name of your app">
                      </div>
                    </div>
                  </div>
                  </div>
                    <div id="menu3" class="tab-pane fade">
                      <h3>Menu 3</h3>
                      <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group form-group-default">
                        <label>name</label>
                        <input id="appName" type="text" class="form-control" placeholder="Name of your app">
                      </div>
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