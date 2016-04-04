@extends('layouts.login')
@section('title','Change Password')
@section('content')
<div class="register-container full-height sm-p-t-30">
    <div class="container-sm-height full-height">
        <div class="row row-sm-height">
            <div class="col-sm-12 col-sm-height col-middle">
                <img src="{{asset('img/logo.png')}}" alt="logo" data-src="{{asset('img/logo.png')}}" data-src-retina="{{asset('img/img/logo_2x.png')}}" width="150" height="30">
                <h3>Change Profile</h3>
                <?php
                $marital_statuses = array('maried'=>'maried',
                    'single'=>'single',
                    'other'=>'other');
                    ?>
                    
                        {!! Former::open()->method('post')->action( url('change-profile'))->class('p-t-15')->role('form')->token() !!}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    
                                    {!!  Former::label('First Name')!!}
                    {!!  Former::text('fname')->placeholder('first name')->id(false)->label(false)->class('form-control') !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    {!!  Former::label('Last Name')!!}
                    {!!  Former::text('lname')->placeholder('last name')->id(false)->label(false)->class('form-control') !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    {!!  Former::label('Phone')!!}
                    {!!  Former::text('phone')->placeholder('phone')->id(false)->label(false)->class('form-control') !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    {!!  Former::label('Mobile')!!}
                    {!!  Former::text('mobile')->placeholder('mobile')->id(false)->label(false)->class('form-control') !!}
                                </div>
                            </div>
                        </div>
                        
                        
                       
                        
                        
                      
                
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-default">
                        {!!  Former::label('Google')!!}
                    {!!  Former::text('google')->placeholder('google')->id(false)->label(false)->class('form-control') !!}                </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-default">
                        {!!  Former::label('Facebook')!!}
                    {!!  Former::text('facebook')->placeholder('facebook')->id(false)->label(false)->class('form-control') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-default">
                        {!!  Former::label('Website')!!}
                    {!!  Former::text('website')->placeholder('website')->id(false)->label(false)->class('form-control') !!}                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-default">
                        {!!  Former::label('Linked In')!!}
                    {!!  Former::text('linkedin')->placeholder('linkedin')->id(false)->label(false)->class('form-control') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-default">
                        {!!  Former::label('Skype')!!}
                    {!!  Former::text('skype')->placeholder('skype')->id(false)->label(false)->class('form-control') !!}               </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-default">
                        {!!  Former::label('Twitter')!!}
                    {!!  Former::text('twitter')->placeholder('twitter')->id(false)->label(false)->class('form-control') !!}                    </div>
                </div>
            </div>
            {!!Former::submit('Update')->class('btn btn-primary btn-cons m-t-10')!!}
            {!! Former::close() !!}
    </div>
</div>
</div>
</div>
@endsection
