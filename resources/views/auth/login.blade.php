@extends('layouts.login')

@section('content')
    <!-- START PAGE-CONTAINER -->
    <div class="login-wrapper ">
      <!-- START Login Background Pic Wrapper-->
      <div class="bg-pic">
        <!-- START Background Pic-->
       <img src="{!! asset('img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg')!!}" data-src="{!! asset('img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg')!!}" data-src-retina="{!! asset('img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg')!!}" alt="" class="lazy">
        <!-- END Background Pic-->
        <!-- START Background Caption-->
        <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
          <h2 class="semi-bold text-white">
          Pages make it easy to enjoy what matters the most in the life</h2>
          <p class="small">
            images Displayed are solely for representation purposes only, All work copyright of respective owner, otherwise © 2013-2014 REVOX.
          </p>
        </div>
        <!-- END Background Caption-->
      </div>
      <!-- END Login Background Pic Wrapper-->
      <!-- START Login Right Container-->
      <div class="login-container bg-white">
        <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
          <img src="{{asset('img/logo.png')}}" alt="logo" data-src="{{asset('img/logo.png')}}" data-src-retina="{{ asset('img/logo_2x.png')}}" width="200" >
          <p class="p-t-35">Sign into your pages account</p>
          <!-- START Login Form -->

          {!!Former::framework('Nude') !!}
          @include('shared.session')
          
          {!! Former::open()->method('post')->action( url('login'))->class('p-t-15')->role('form') !!}

            <!-- START Form Control-->
            <div class="form-group form-group-default">
              <label>Login</label>
              <div class="controls">
              {!! Former::email("email")->placeholder('User Name')->label(false)->class('form-control') !!}
              </div>
            </div>
            <!-- END Form Control-->
            <!-- START Form Control-->
            <div class="form-group form-group-default">
              <label>Password</label>
              <div class="controls">
                {!! Former::password('password')->placeholder('Credentials')->label(false)->class('form-control') !!}
              </div>
            </div>
            <!-- START Form Control-->
            <div class="row">
              <div class="col-md-6 no-padding">
                <div class="checkbox ">
                  {!! Former::checkbox('remember')->token()->label(false) !!}
                  <label for="checkbox1">Keep Me Signed in</label>
                </div>
              </div>
              <div class="col-md-6 text-right">
                <a href="#" class="text-info small">Help? Contact Support</a>
              </div>
            </div>
            <!-- END Form Control-->
           {!! Former::submit('Sign in')->class('btn btn-primary btn-cons m-t-10') !!}
            
            {!! Former::close() !!}
          <!--END Login Form-->
         
        </div>
      </div>
      <!-- END Login Right Container-->
    </div>
    <!-- END PAGE CONTAINER -->
    @endsection

   