@extends('layouts.app')
@section('title','Dashboard')
@section('content')
     <div class="page-content-wrapper">
        <!-- START PAGE CONTENT -->
        <div class="content">
          <!-- START JUMBOTRON -->
          <div class="jumbotron" data-pages="parallax">
            <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
              <div class="inner">
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                  <li>
                    <a href="{!! url('/')!!}">Home</a>
                  </li>
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection()

