@extends('layouts.main')

@section('content')

<h1 class="text-center">Events</h1>

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<ul class="nav nav-pills nav-justified">
			<li class="active">
			<a href="#today" data-toggle="pill">Today ({{ Events::getDate($today) }})</a>
			</li>
			<li>
			<a href="#tomorrow" data-toggle="pill">{{ Events::getDate($tomorrow) }}</a>
			</li>
		</ul>
		<br />
		<div class="tab-content">
			<div class="tab-pane active" id="today">
				<div class="col-md-12">
					@if ($today_events->count())
							{{ Form::open(array('route' => 'events.rating')) }}
								@foreach ($today_events as $today_event)
									<input class="col-md-2" type="radio" name="event" value="{{ $today_event->pk }}">
									<div class="col-md-10">
										<p>
											<strong>Creator:</strong> {{ $today_event->user->username }}<br />
											<strong>Start point:</strong> {{ $today_event->start }}<br />
											<strong>Time:</strong> {{ Events::getTimeFormat($today_event->time) }}<br />
											<strong>Comment:</strong> {{ $today_event->comment }}
										</p>
										<p class="max_rating" id="{{ $today_event->rating->rating }}">
											<span class="today_rating">{{ $today_event->rating->rating }}</span> people rating
										</p>
										<hr >
									</div>
								@endforeach
								<div class="col-md-4 col-md-offset-4">
									{{ Form::submit('Rate', array('class' => 'btn btn-primary btn-block')) }}
								</div>
							{{ Form::close() }}
					@else
						<p class="text-center">There are no events this day</p>
					@endif
				</div>
			</div>
			<div class="tab-pane" id="tomorrow">
				<div class="col-md-12">
					@if ($tomorrow_events->count())
							{{ Form::open(array('route' => 'events.rating')) }}
								@foreach ($tomorrow_events as $tomorrow_event)
									<input class="col-md-2" type="radio" name="event" value="{{ $tomorrow_event->pk }}">
									<div class="col-md-10">
										<p>
											<strong>Creator:</strong> {{ $tomorrow_event->user->username }}<br />
											<strong>Start point:</strong> {{ $tomorrow_event->start }}<br />
											<strong>Time:</strong> {{ Events::getTimeFormat($tomorrow_event->time) }}<br />
											<strong>Comment:</strong> {{ $tomorrow_event->comment }}
										</p>
										<p class="max_rating" id="{{ $tomorrow_event->rating->rating }}">
											<span class="tomorrow_rating">{{ $tomorrow_event->rating->rating }}</span> people rating
										</p>
										<hr >
									</div>
								@endforeach
								<div class="col-md-4 col-md-offset-4">
									{{ Form::submit('Rate', array('class' => 'btn btn-primary btn-block')) }}
								</div>
							{{ Form::close() }}
					@else
						<p class="text-center">There are no events this day</p>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>

@stop

@section('scripts')
<script>
function setMax(ratings) {
	var rating_values = [];
	var max_rating;
	for ( var i = 0; i < ratings.length; i++ ) {
		rating_values.push(ratings[i].innerHTML);
	}
	max_rating = Math.max.apply(Math, rating_values);
	$( ratings ).parent( "p" ).removeClass("max_rating");
	// $("p.max_rating").removeClass("max_rating");
	alert(max_rating);
	$( ratings ).parent("p#"+max_rating).addClass("max_rating");
}
setMax( $( "span.today_rating" ).get() );
setMax( $( "span.tomorrow_rating" ).get() );
</script>
@stop