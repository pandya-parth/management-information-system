@extends('layouts.app')
@section('content')
<div class= "content">
<div class="col-md-12">
            <!-- START PANEL -->
               <div class="panel panel-default">
                  <div class="panel-heading">
                    <div class="panel-title">
                      <h5>Create New Task Category</h5>
                    </div>
                  </div>
                  <div class="panel-body">
                    {!! Former::open()!!}
                      {!! Former::token()!!}
                      {!!Former::label('Name')!!}
                      {!! Former::text('name','')->class('form-control')!!}
                      {!! Former::submit('Save')!!}
                      {!! Former::close()!!}
<!--                  <form role="form">
                      <div class="form-group">
                        <label>Your name</label>
                        <span class="help">e.g. "Mona Lisa Portrait"</span>
                        <input type="text" class="form-control" required>
                      </div>
                      </form>
 -->
                  </div>


                </div>
                <!-- END PANEL -->
              </div>
            

</div>






          

@endsection