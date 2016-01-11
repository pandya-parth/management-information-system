@extends('layouts.register')

<!-- Main Content -->
@section('content')

 <div class="register-container full-height sm-p-t-30">
      <div class="container-sm-height full-height">
        <div class="row row-sm-height">
          <div class="col-sm-12 col-sm-height col-middle">
            <img src="{{asset('img/logo.png')}}" alt="logo" data-src="{{asset('img/logo.png')}}" data-src-retina="{{asset('img/img/logo_2x.png')}}" width="150" height="30">
            <h3>Reset Password</h3>

            {!! Former::open()->action(url('password/email'))->class('p-t-15')->role('form')->id('form-register')!!}
               <div class="row">
                   @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                <div class="row">
                <div class="col-sm-12">
                  <div class="form-group form-group-default">
                    {!!  Former::label('E-Mail Address')!!}
                    {!!  Former::email('email','' )->class('form-control')->placeholder('We will send loging details to you')!!}

                    <!-- <input type="email" name="email" placeholder="We will send loging details to you" class="form-control" value="{{ old('email') }}" required> -->
            
                  </div>
                </div>
              </div>
              {!!Former::submit('Send Password reset')->class('btn btn-primary btn-cons m-t-10')!!}
                <!-- <button class="btn btn-primary btn-cons m-t-10" type="submit">Send Password Reset Link</button> -->
                
            {!! Former::close()!!}
            <!-- <form class="p-t-15" id="form-register" role="form" method="POST" action="{{ url('/password/email') }}">
                 {!! csrf_field() !!}
             --> 
              
            
            
          </div>
        </div>
      </div>
    </div>
 @endsection
