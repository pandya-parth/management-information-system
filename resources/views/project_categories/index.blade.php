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
                  <li><a href="{!!url('project_categories')!!}" class="active">Project Categories</a>
                  </li>
                </ul>
          </div>
            <!-- START PANEL -->
          <div class="panel panel-transparent">
              <div class="panel-heading">
                <div class="panel-title">
                  <h4>Project Categories</h4>
                </div>
                <div class="pull-right">
                  <div class="col-xs-12">
                    <button id="show-modal" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Add project category</button>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-body">
                <table class="table table-hover demo-table-dynamic">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Project Category name</th>
                      <th>Description</th>
                    </tr>
                  </thead>
                  <tbody>
                  @forelse($categories as $category)
                     <tr>
                      <td class="v-align-middle" >
                        <p>{{ $category->id }}</p>
                      </td>
                      <td class="v-align-middle" >
                        <p>{{ $category->name }}</p>
                      </td>
                      <td class="v-align-middle" >
                        <p>{{ $category->description }}</p>
                      </td>
                      </tr>
                  @empty
                  </tbody>
                </table>                
                      <p>No Category to display</p>
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
              <h4 class="p-b-5"><h4>Add New Category</h4></h4>
              </div>

              <form name='categoryForm' class='p-t-15' role='form' ng-controller='CategoryCtrl' novalidate>
                <div class="modal-body">
                  <div class="success"></div>
                
                    <ul class="nav nav-tabs nav-tabs-fillup">
                        <li class="active"><a data-toggle="tab" href="#home">Description</a></li>
                    </ul>
                          <div class="tab-content">
                            <div id="home" class="tab-pane slide-left active">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                            <label>Name</label>
                                            <input type="text" class="form-control" id="name" placeholder="Name of Category" ng-model='project_category.name' required>
                                            <div class="errors" ng-show="submitted && categoryForm.$error.required">Please enter category name</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add-app" type="button" class="btn btn-primary  btn-cons" ng-click="submit(categoryForm)">Add</button>
                    <!-- 
                    <input type="submit" name="send" id='send' value="" class="off-20-submit" ng-click="submit(offerForm)">
                     -->
                    <button type="button" class="btn btn-cons" id="close" data-dismiss="modal">Close</button>
                </div>
              </form>
          </div>
      <!-- /.modal-content -->
      </div>
  <!-- /.modal-dialog -->
  </div>
<!-- END MODAL STICK UP  -->
@endsection


