<?php

class RatingController extends \BaseController {

	/**
	 * Update the specified resource in storage.
	 * POST events/rating/
	 *
	 * @return Response
	 */
	public function UpdateEventRating()
	{
		$event_id = Input::get('event');
		if (!$event_id) {
			return Redirect::back()->with('info-message', 'Please select the event to rate it!');
		}

		$event_cookie = Cookie::get('event_'.$event_id);
		if (!is_null($event_cookie)) {
			return Redirect::back()->with('warning-message', 'You have already rated this event!');
		}

		$ip = Request::getClientIp();
		$visited = Visitor::where('ip', $ip)->first();
		$event = Events::find($event_id);
		
		if (!is_null($event->visitors->find($visited))) {
			return Redirect::back()->with('warning-message', 'You have already rated this event!');
		}

		$visitor = new Visitor;
		$visitor->ip = $ip;
		$visitor->save();
		
		$event->visitors()->attach($visitor->pk);

		$rating = Rating::where('id', $event_id)->first();
		$rating->rating++;
		$rating->save();

		$cookie = Cookie::forever('event_'.$event_id, 'rated');

		return Redirect::back()->withCookie($cookie);
	}

}