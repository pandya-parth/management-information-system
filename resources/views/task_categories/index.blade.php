@extends('layouts.app')
@section('title','Task Categories')
@section('content')

 <div class="modal fade slide-up disable-scroll" id="my-modal" tabindex="-1" role="dialog" aria-hidden="false" >
      <div class="modal-dialog ">
        <div class="modal-content-wrapper">
          <div class="modal-content">
            <div class="modal-header clearfix text-left">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
              </button>
              <h5>Payment <span class="semi-bold">Information</span></h5>
              <p class="p-b-10">We need payment information inorder to process your order</p>
            </div>
            <div class="modal-body">
              <form role="form">
                <div class="form-group-attached">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group form-group-default">
                        <label>Company Name</label>
                        <input type="email" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group form-group-default">
                        <label>Card Number</label>
                        <input type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group form-group-default">
                        <label>Card Holder</label>
                        <input type="text" class="form-control">
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              <div class="row">
                <div class="col-sm-8">
                  <div class="p-t-20 clearfix p-l-10 p-r-10">
                    <div class="pull-left">
                      <p class="bold font-montserrat text-uppercase">TOTAL</p>
                    </div>
                    <div class="pull-right">
                      <p class="bold font-montserrat text-uppercase">$20.00</p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4 m-t-10 sm-m-t-10">
                  <button type="button" class="btn btn-primary btn-block m-t-5">Pay Now</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
    </div>


<div class= "content">

<!-- START CONTAINER FLUID -->
          <div class="container-fluid container-fixed-lg">
            <!-- START PANEL -->
            <div class="panel panel-transparent">
              <div class="panel-heading">
                <div class="panel-title">Task Categories
                </div>
                <div class="pull-right">
                  <div class="col-xs-12">
                    
                    <a class="btn" data-controls-modal="my-modal" keyboard=true data-backdrop="static">Launch Modal</a>
                   <!-- <button id="show-modal" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Add New</button -->
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-body">
                <table class="table table-hover demo-table-dynamic" id="tableWithDynamicRows">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Category Name</th>
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

          

@endsection