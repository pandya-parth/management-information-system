
@extends('layouts.register')
@section('title','Reset Password')
@section('content')

<div class="register-container full-height sm-p-t-30">
     <div class="container-sm-height full-height">
        <div class="row row-sm-height">
          <div class="col-sm-12 col-sm-height col-middle">
            <img src="{{asset('img/logo.png')}}" alt="logo" data-src="{{asset('img/logo.png')}}" data-src-retina="{{asset('img/img/logo_2x.png')}}" width="150" height="30">
            <h3>Reset Password</h3>
            {!! Former::open()->method('post')->action( url('/password/reset'))->class('p-t-15')->role('form')->token() !!}
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="row">
                <div class="col-sm-12">
                  <div class="form-group form-group-default">
                    {!!  Former::label('E-Mail Address')!!}
                    {!!  Former::email('email','' )->class('form-control')->placeholder('Email Address')->id(false)!!}

                  </div>
                </div>
              </div>
            <div class="row">
                <div class="col-sm-12">
                  <div class="form-group form-group-default">
                    {!!  Former::label('Password')!!}
                    {!!  Former::password('password')->placeholder('Password')->id(false)->label(false)->class('form-control required') !!}
                  </div>
                </div>
              </div>
            <div class="row">
                <div class="col-sm-12">
                  <div class="form-group form-group-default">
                    {!!  Former::label('Confirm Password')!!}
                    {!!  Former::password('password_confirmation')->id(false)->placeholder('Confirm Password')->label(false)->class('form-control required') !!}
                  </div>
                </div>
              </div>
            {!!Former::submit('Send Password Reset')->class('btn btn-primary btn-cons m-t-10')!!}
            {!! Former::close() !!}
          </div>
      </div>
    </div>
</div>
@endsection
