@extends('layouts.register')
@section('title','404')
@section('content')
<div class="container-xs-height full-height error-page">
      <div class="row-xs-height">
        <div class="col-xs-height col-middle">
          <div class="error-container text-center">
            <h1 class="error-number">404</h1>
            <h2 class="semi-bold">Sorry but we couldnt find this page</h2>
            <p>This page you are looking for does not exsist <a href="{!! url('/') !!}">Back</a>
            </p>
          </div>
        </div>
      </div>
</div>
@endsection