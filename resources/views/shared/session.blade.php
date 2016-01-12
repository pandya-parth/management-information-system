  <div class="row">

@if(Session::has('status'))
<div class="alert alert-success ">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif 
</div>
@endif


@if ($errors->has('email'))
<div class="alert alert-danger ">
        <span class="alert-danger">
               <strong>{{ $errors->first('email') }}</strong>
        </span>
</div>
@endif




@if(Session::has('success'))
<div class="alert alert-success ">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  @if(Session::get('success') != 1)
    {{ Session::get('success') }}
  @else
    An e-mail with the password reset has been sent.
  @endif    
</div>
@endif

 

@if(Session::has('error'))
<div class="alert alert-danger">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  @if(Session::get('error') != 1)
    {{ Session::get('error') }}
  @else
   {{ trans(Session::get('reason')) }}
  @endif
</div>
@endif
</div>