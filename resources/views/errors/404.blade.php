@extends('layouts.register')
@section('title','404')
@section('content')
<div class="container-xs-height full-height error-page">
      <div class="row-xs-height">
        <div class="col-xs-height col-middle">
          <div class="error-container text-center">
            <img src="{!! asset('img/404.jpg') !!}" width="500px" height="500px">
            
            <p><a href="{!! url('/') !!}">Back to HOME page.</a></p>
          </div>
        </div>
      </div>
</div>
@endsection