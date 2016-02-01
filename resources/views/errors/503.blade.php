@extends('layouts.register')
@section('title','503')
@section('content')
<div class="container-xs-height full-height error-page">
      <div class="row-xs-height">
        <div class="col-xs-height col-middle">
          <div class="error-container text-center">
            <img src="{!! asset('img/503.png') !!}" width="500px" height="500px">
            
            <p>We will right back to you very soon.</p>
          </div>
        </div>
      </div>
</div>
    
@endsection