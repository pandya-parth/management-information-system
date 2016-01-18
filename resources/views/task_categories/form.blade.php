@extends('layouts.app')
@section('content')

<div class= "content">
<div class="col-md-12">
            <div class="panel panel-default">
                  <div class="panel-heading">
                    <div class="panel-title">
                      <h5>Create New Task Category</h5>
                    </div>
                  </div>
                  <div class="panel-body">
                    {!! Former::open()!!}
                    {!! Former::token()!!}
                    {!! Former::label('Name')!!}
                    {!! Former::text('name')}
                    {!! Former::submit()!!}
                    </div>
                </div>
                <!-- END PANEL -->
              </div>
</div>






          

@endsection