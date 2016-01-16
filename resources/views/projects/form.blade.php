@extends('layouts.app')
@section('content')

<div class= "content">

      <!-- Form Start  -->
        <div class="row">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header clearfix ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h4 class="p-b-5"><span class="semi-bold">New</span> App</h4>
              </div>
              <div class="modal-body">
                <p class="small-text">Create a new app using this form, make sure you fill them all</p>
                <form role="form">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group form-group-default">
                        <label>name</label>
                        <input id="appName" type="text" class="form-control" placeholder="Name of your app">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group form-group-default">
                        <label>Description</label>
                        <input id="appDescription" type="text" class="form-control" placeholder="Tell us more about it">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group form-group-default">
                        <label>Price</label>
                        <input id="appPrice" type="text" class="form-control" placeholder="your price">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group form-group-default">
                        <label>Notes</label>
                        <input id="appNotes" type="text" class="form-control" placeholder="a note">
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
        <!-- Form End  -->


</div>

          

@endsection