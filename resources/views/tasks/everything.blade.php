@extends('layouts.app')
@section('title','Task')
@section('content')
<div ng-controller="TasksCtrl">
  <div class="content">
    <!-- START CONTAINER FLUID -->
    <div class="container-fluid container-fixed-lg">
      <!-- START PANEL -->
      <div class="panel panel-transparent">
        <div class="panel-heading">
          <div class="panel-title">
            <h4>All Tasks</h4>   
          </div>
          <div class="pull-right">
            
            <div class="col-xs-4">
              <form action="{!! url('/exportTask') !!}" method="GET">
                            <button id="export-button" class="btn button_color">Export</button>
                            </form>
                        </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <div ng-cloak class="panel-body" >
          <p class="text-center" ng-show="loading"><img src="{!! asset('img/demo/progress.svg') !!}" /></p>
          <div ng-cloak class="panel-group"  role="tablist" aria-multiselectable="true" >
            
            
              
            <div  class="accordion">
              <div class="panel-collapse collapse in everything-column" role="tabpanel"  aria-labelledby="headingOne" aria-expanded="false">
                <div class="panel-body">

<div ng-cloak class="grid_list_view everything-column-inner">
                            <div ng-cloak class="head list_view border_class">
                                <div ng-cloak class="row">
                                    <div class="datas people_name">Project Name</div>
                                    <div class="datas people_name">User</div>
                                    <div class="datas people_name">Description</div>
                                    <div class="datas people_name">Category Name</div>
                                    <div class="datas people_name">Date</div>
                                    <div class="datas people_name">Start</div>
                                    <div class="datas people_name">End</div>
                                    <div class="datas people_name">Action</div>
                                </div>
                            </div>
                          </div>
                          

                          @foreach($logtimes as $logtime)
                          
                    
                    <div  class="grid_list_view">
                            
                            <div class="data_area list_view ">
                                <!-- row 1 -->
                                <div  class="row border_class">
                                    <div  class="datas people_designation">
                                        {!! $logtime->task->project->name !!}
                                    </div>
                                    <div  class="datas people_designation">
                                        {!! $logtime->user->people->name !!}
                                    </div>
                                    <div  class="datas people_email">
                                        {!! $logtime->task->name !!}--{!! $logtime->description !!}
                                    </div>
                                    <div  class="datas people_designation">
                                        {!! $logtime->task->category->name !!}
                                    </div>
                                    <div  class="datas people_email">
                                        {!! $logtime->date !!}
                                    </div>
                                    <div  class="datas people_email">
                                        {!! $logtime->start_time !!}
                                    </div>
                                    <div  class="datas people_phone">
                                        {!! $logtime->end_time !!}
                                    </div>
                                    <div class="task_detail">
                                      <a href="{!!url('/projects'),'/',$logtime->task->project_id,'/tasks','/',$logtime->task->id !!}" class="timer timer_button"  id="view_button1">
                                        <i class="fa fa-eye"></i>
                                      </a>
                                    </div>
                                </div>
                                </div>
                                <!-- row 1 complete -->
                            </div>
                        </div>

                        
                      
                    @endforeach     
                                 
                </div>
              </div>
            </div>
            
            
          </div>
        </div>
      </div>
      <!-- END PANEL -->
      <!-- END CONTAINER FLUID -->
    </div>
  </div>
</div>
@endsection
