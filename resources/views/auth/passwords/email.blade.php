@extends('layouts.register')
@section('title','Reset Password')
<!-- Main Content -->
@section('content')

 <div class="register-container full-height sm-p-t-30">
      <div class="container-sm-height full-height">
        <div class="row row-sm-height">
          <div class="col-sm-12 col-sm-height col-middle">
            <img src="{{asset('img/logo.png')}}" alt="logo" data-src="{{asset('img/logo.png')}}" data-src-retina="{{asset('img/img/logo_2x.png')}}" width="150" height="30">


            <h3>Reset Password</h3>
          <!-- {!! Former::framework('Nude') !!} -->
            {!! Former::open()->action(url('password/email'))->class('p-t-15')->role('form')->id('form-register')!!}


              @include('shared.session')
             <div class="row">

                <div class="col-sm-12">
                  <div class="form-group form-group-default">
                    {!!  Former::label('E-Mail Address')!!}
                    {!!  Former::email('email','' )->class('form-control')->placeholder('We will send loging details to you')!!}
                  </div>
                </div>
              </div>
              {!!Former::submit('Send Password Reset')->class('btn btn-primary btn-cons m-t-10')!!}
            {!! Former::close()!!}
        </div>
      </div>
    </div>
 @endsection
