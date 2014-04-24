@extends('layouts.main')

@section('content')

<h1 class="text-center">Change password</h1>

<div class="row">
{{ Form::open(array('route' => 'password.change')) }}
    
        <div class="col-md-6 col-md-offset-3">
        {{ Form::label('old_password', 'Old password:') }}
        {{ Form::password('old_password', array('class' => 'form-control')) }}
        </div>

        <div class="col-md-6 col-md-offset-3">
        {{ Form::label('password', 'Password:') }}
        {{ Form::password('password', array('class' => 'form-control')) }}
        </div>
        
        <div class="col-md-6 col-md-offset-3">
        	<br />
            {{ Form::submit('Save', array('class' => 'btn btn-info pull-right')) }}
        </div>
    
{{ Form::close() }}

</div>

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop