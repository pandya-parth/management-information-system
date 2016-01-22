
@extends('layouts.register')
@section('title','Change Password')
@section('content')

<div class="register-container full-height sm-p-t-30">
     <div class="container-sm-height full-height">
        <div class="row row-sm-height">
          <div class="col-sm-12 col-sm-height col-middle">
            <img src="{{asset('img/logo.png')}}" alt="logo" data-src="{{asset('img/logo.png')}}" data-src-retina="{{asset('img/img/logo_2x.png')}}" width="150" height="30">
            <h3>Reset Password</h3>
            {!! Former::open()->method('post')->action( url('change-password'))->class('p-t-15')->role('form')->token() !!}
            
            <div class="row">
                <div class="col-sm-12">
                  <div class="form-group form-group-default">
                    {!!  Former::label('Old Password')!!}
                    {!!  Former::password('oldpassword')->placeholder('Current Password')->id(false)->label(false)->class('form-control required') !!}
                  </div>
                </div>
              </div>
            
            <div class="row">
                <div class="col-sm-12">
                  <div class="form-group form-group-default">
                    {!!  Former::label('newPassword')!!}
                    {!!  Former::password('newpassword')->placeholder('New Password')->id(false)->label(false)->class('form-control required') !!}
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
            {!!Former::submit('Update')->class('btn btn-primary btn-cons m-t-10')!!}
            {!! Former::close() !!}
          </div>
      </div>
    </div>
</div>
@endsection
