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
                <div class="export-options-container pull-right"></div>
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

<div class="col-sm-6">
                    <h5>Fill In Tabs</h5> Add the class
                    <code>nav-tabs-fillup</code> to the main wrapper of the tabs
                    <br>
                    <br>
                    <div class="panel panel-transparent ">
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs nav-tabs-fillup">
                        <li class="active">
                          <a data-toggle="tab" href="#tab-fillup1"><span>Home</span></a>
                        </li>
                        <li>
                          <a data-toggle="tab" href="#tab-fillup2"><span>Profile</span></a>
                        </li>
                        <li>
                          <a data-toggle="tab" href="#tab-fillup3"><span>Messages</span></a>
                        </li>
                      </ul>
                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div class="tab-pane active" id="tab-fillup1">
                          <div class="row column-seperation">
                            <div class="col-md-6">
                              <h3>
                                                <span class="semi-bold">Sometimes</span> Small things in life means the most
                                            </h3>
                            </div>
                            <div class="col-md-6">
                              <h3 class="semi-bold">great tabs</h3>
                              <p>Native boostrap tabs customized to Pages look and feel, simply changing class name you can change color as well as its animations</p>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="tab-fillup2">
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
                        <div class="tab-pane" id="tab-fillup3">
                          <div class="row">
                            <div class="col-md-12">
                              <h3>Follow us &amp; get updated!</h3>
                              <p>Instantly connect to what's most important to you. Follow your friends, experts, favorite celebrities, and breaking news.</p>
                              <br>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
@endsection