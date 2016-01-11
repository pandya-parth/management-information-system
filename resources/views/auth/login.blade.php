@extends('layouts.login')

@section('content')
     <!-- START PAGE-CONTAINER -->

      <!-- START Login Background Pic Wrapper-->
      <div class="bg-pic">
        <!-- START Background Pic-->
        <img src="{{ asset('img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg')}}" data-src="{{asset('img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg')}}" data-src-retina="{{ asset('img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg')}}" alt="" class="lazy">
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
          <form id="form-login" class="p-t-15" role="form" action="index.html">
            <!-- START Form Control-->
            <div class="form-group form-group-default">
              <label>Login</label>
              <div class="controls">
                <input type="text" name="username" placeholder="User Name" class="form-control" required>
              </div>
            </div>
            <!-- END Form Control-->
            <!-- START Form Control-->
            <div class="form-group form-group-default">
              <label>Password</label>
              <div class="controls">
                <input type="password" class="form-control" name="password" placeholder="Credentials" required>
              </div>
            </div>
            <!-- START Form Control-->
            <div class="row">
              <div class="col-md-6 no-padding">
                <div class="checkbox ">
                  <input type="checkbox" value="1" id="checkbox1">
                  <label for="checkbox1">Keep Me Signed in</label>
                </div>
              </div>
              <div class="col-md-6 text-right">
                
              </div>
            </div>
            <!-- END Form Control-->
            <button class="btn btn-primary btn-cons m-t-10" type="submit">Sign in</button>
          </form>
          <!--END Login Form-->
                 </div>
      </div>
      <!-- END Login Right Container-->
    </div>
    <!-- END PAGE CONTAINER -->

@endsection

