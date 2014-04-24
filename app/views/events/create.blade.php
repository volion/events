@extends('layouts.main')

@section('content')

<h1 class="text-center">Add Event</h1>

<div class="row">
{{ Form::open(array('route' => 'events.store')) }}

	<div class="col-md-6 col-md-offset-3">
    	{{ Form::label('date', 'Date:') }}
        {{ Form::text('date', NULL, array('class' => 'form-control', 'id'=> 'event_date')) }}
    </div>

    <div class="col-md-6 col-md-offset-3">
    	{{ Form::label('time', 'Time:') }}
        {{ Form::text('time', NULL, array('class' => 'form-control', 'id'=> 'event_time')) }}
    </div>

    <div class="col-md-6 col-md-offset-3">
    	{{ Form::label('start', 'Start point:') }}
        {{ Form::text('start', NULL, array('class' => 'form-control')) }}
    </div>

    <div class="col-md-6 col-md-offset-3">
    	{{ Form::label('comment', 'End point/Comment:') }}
        {{ Form::textarea('comment', NULL, array('class' => 'form-control', 'rows'=> 4)) }}
    </div>

    <div class="col-md-6 col-md-offset-3">
    	<br />
    	{{ Form::submit('Add event', array('class' => 'btn btn-info pull-right')) }}
    </div>

{{ Form::close() }}

</div>

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop

@section('scripts')
<script>
$(document).ready(function(){
	$('#event_date').datepicker({dateFormat: "yy-mm-dd"});
	$('#event_time').timepicker({timeFormat: "HH:mm:ss"});
});
</script>
@stop