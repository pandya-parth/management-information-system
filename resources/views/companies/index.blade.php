@extends('layouts.app')

@section('content')

<div class= "content">

<!-- START CONTAINER FLUID -->

          <div class="container-fluid container-fixed-lg">

            <!-- START PANEL -->

            <div class="panel panel-transparent">

              <div class="panel-heading">

                <div class="panel-title">

                <h4>Companies</h4>

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

                      <th>Company name</th>

                      <th>Website</th>

                      <th>Email</th>

                      <th>Phone</th>

                    </tr>

                  </thead>

                  <tbody>

                    

                      @forelse($companies as $company)

                      <tr>

                      <td class="v-align-middle" >

                      <p>{{ $company->id }}</p>

                      </td>

                      <td class="v-align-middle" >

                      <p>{{ $company->name }}</p>

                      </td>

                      </tr>

                      

                   @empty



                      <tr>

                      <td class="v-align-middle" >

                      <p>No Company to display</p>

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

                <h4 class="p-b-5"><h4>Add New Company</h4></h4>

              </div>

              <div class="modal-body">

                

                {!! Former::open()->method('post')->action( url(''))->class('p-t-15')->role('form') !!}



                  <ul class="nav nav-tabs nav-tabs-fillup">

                    <li class="active"><a data-toggle="tab" href="#home">Description</a></li>

                    <li><a data-toggle="tab" href="#menu1">Industry</a></li>

                    <li><a data-toggle="tab" href="#menu2">Address</a></li>

                  </ul>



                  <div class="tab-content">



                    <div id="home" class="tab-pane slide-left active">

                        <div class="row">

                          <div class="col-sm-12">

                            <div class="form-group form-group-default">

                              <label>Name</label>

                              {!! Former::text("name")->label(false)->placeholder('Name of Company') !!}

                            </div>

                            <div class="form-group form-group-default">

                              <label>Website</label>

                              {!! Former::text("website")->label(false)->placeholder('Website of Company') !!}

                            </div>

                            <div class="form-group form-group-default">

                              <label>Email</label>

                              {!! Former::text("email")->label(false)->placeholder('Email of Company') !!}

                            </div>

                            <button class="btn btn-success btn-cons m-b-10" type="button"><i class="fa fa-cloud-upload"></i> <span class="bold">Upload</span>
                            
                            </button>

                          </div>

                        </div>

                    </div>



                    <div id="menu1" class="tab-pane slide-left">

                        <div class="row">

                          <div class="col-sm-12">

                            

                              <form class="m-t-10" role="form">
                                <div class="form-group form-group-default form-group-default-select2">
                                 <label>Industry</label>
                                  <select class="full-width" data-placeholder="Select Country" data-init-plugin="select2">
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
                              </form>

                          

                            <div class="form-group form-group-default">

                              <label>Phone</label>

                              {!! Former::text("phone")->label(false)->placeholder('Phone of Company') !!}

                            </div>

                            <div class="form-group form-group-default">

                              <label>Fax</label>

                              {!! Former::text("fax")->label(false)->placeholder('Fax of Company') !!}

                            </div>

                          </div>

                        </div>

                    </div>



                    <div id="menu2" class="tab-pane slide-left">

                        <div class="row">

                          <div class="col-sm-6">

                          <div class="form-group form-group-default">

                              <label>Address 1</label>

                              {!! Former::text("adrs1")->label(false)->placeholder('Address 1') !!}

                            </div>

                                                

                            <form class="m-t-10" role="form">
                                <div class="form-group form-group-default form-group-default-select2">
                                 <label>City</label>
                                  <select class="full-width" data-placeholder="Select Country" data-init-plugin="select2">
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
                              </form>

                              <form class="m-t-10" role="form">
                                <div class="form-group form-group-default form-group-default-select2">
                                 <label>Country</label>
                                  <select class="full-width" data-placeholder="Select Country" data-init-plugin="select2">
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
                              </form>

                            </div>

                            <div class="col-sm-6">

                            <div class="form-group form-group-default">

                              <label>Address 2</label>

                              {!! Former::text("adrs1")->label(false)->placeholder('Address 2') !!}

                            </div>

                            <form class="m-t-10" role="form">
                                <div class="form-group form-group-default form-group-default-select2">
                                 <label>State</label>
                                  <select class="full-width" data-placeholder="Select Country" data-init-plugin="select2">
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
                              </form>

                              <div class="form-group form-group-default">

                              <label>Zipcode</label>

                              {!! Former::text("zipcode")->label(false)->placeholder('Zipcode') !!}

                            </div>

                            </div>



                        </div>

                    </div>



                    <div id="menu3" class="tab-pane slide-left">

                        <div class="row">

                          <div class="col-sm-12">

                            <div class="checkbox check-success ">
                              <input type="checkbox" checked="checked" value="1" id="checkbox1">
                              <label for="checkbox1">Archive</label>
                            </div>

                          </div>

                        </div>

                    </div>

                  

                    <div id="menu4" class="tab-pane slide-left">

                        <div class="row">

                          <div class="col-sm-12">

                            <div class="form-group form-group-default input-group col-sm-10">
                              <label>Check In</label>
                              <input type="email" class="form-control" placeholder="Pick a date" id="datepicker-component2">
                              <span class="input-group-addon">
                                                          <i class="fa fa-calendar"></i>
                                                        </span>
                            </div>

                            <div class="form-group form-group-default input-group col-sm-10">
                              <label>Check In</label>
                              <input type="email" class="form-control" placeholder="Pick a date" id="datepicker-component2">
                              <span class="input-group-addon">
                                                          <i class="fa fa-calendar"></i>
                                                        </span>
                            </div>

                            <div class="form-group form-group-default">

                              <label>Fix Hour</label>

                              {!! Former::text('fix_hour')->label(false) !!}

                            </div>

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


