@extends('layouts.app')
@section('content')
<div class= "content">
<!-- START CONTAINER FLUID -->
          <div class="container-fluid container-fixed-lg">
            <!-- START PANEL -->
            <div class="panel panel-transparent">
              <div class="panel-heading">
                <div class="panel-title">Task Category Listing
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
                      <th>Name</th>
                      <th>Action</th>
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
                <h4 class="p-b-5"><h4>Add New Task Category</h4></h4>
              </div>
              <div class="modal-body">
                <div class="row">
                <form role="form">
                    <div class="col-sm-12">
                      <div class="form-group form-group-default">
                        <label>name</label>
                        <input id="appName" type="text" class="form-control" placeholder="Name of Category">
                      </div>
                    </div>
                </form>
                </div>
              </div>
              <div class="modal-footer">
                <button id="add-app" type="button" class="btn btn-primary  btn-cons">Add</button>
                <button type="button" class="btn btn-cons" data-dismiss="modal" aria-hidden="true">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- END MODAL STICK UP  -->
@endsection