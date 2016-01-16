@extends('layouts.app')
@section('content')

<div class= "content">
<div class="col-md-12">
                <!-- START PANEL -->
                <div class="panel panel-default">

                  <div class="panel-heading">
                    <div class="panel-title">
                      <h5>Create new project</h5>
                    </div>
                  </div>

                  <div class="panel-body">

                    {!! Former::open()->action($projects? URL::route("project.update",array($projects->id)) : URL::route("project.store") )->method(isset($projects->id)? 'put':'post')->enctype("multipart/form-data") !!}
                      {!! Former::token()!!}
                    <form role="form">
                      <div class="form-group">
                        <label>Your name</label>
                        <span class="help">e.g. "Mona Lisa Portrait"</span>
                        <input type="email" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label>Password</label>
                        <span class="help">e.g. "Mona Lisa Portrait"</span>
                        <input type="password" class="form-control" required>
                      </div>
                     </form>

                  </div>


                </div>
                <!-- END PANEL -->
              </div>
            

</div>






          

@endsection