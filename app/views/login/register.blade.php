@extends('layouts.main')

@section('content')

<h1 class="text-center">Sign up</h1>

<div class="row">
{{ Form::open(array('route' => 'login.register')) }}
    
        <div class="col-md-6 col-md-offset-3">
        	{{ Form::label('username', 'Username:') }}
            {{ Form::text('username', NULL, array('class' => 'form-control')) }}
        </div>
        
        <div class="col-md-6 col-md-offset-3">
        	{{ Form::label('email', 'Email:') }}
        	{{ Form::email('email', NULL, array('class' => 'form-control')) }}
        </div>

        <div class="col-md-6 col-md-offset-3">
        {{ Form::label('password', 'Password:') }}
        {{ Form::password('password', array('class' => 'form-control')) }}
        </div>
        
        <div class="col-md-6 col-md-offset-3">
        	<br />
            {{ Form::submit('Sign Up', array('class' => 'btn btn-info pull-right')) }}
        </div>
    
{{ Form::close() }}

</div>

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop