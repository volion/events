<?php

class EventsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /events/
	 *
	 * @return Response
	 */
	public function index()
	{
		$dt = new DateTime();
		$today = $dt->format('Y-m-d');
		$dt->add(new DateInterval('P1D'));
		$tomorrow = $dt->format('Y-m-d');

		$today_events = Events::where('date', '=', $today)->get();
		$tomorrow_events = Events::where('date', '=', $tomorrow)->get();
		return View::make('events.index', compact('today_events', 'tomorrow_events', 'today', 'tomorrow'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /events/create
	 *
	 * @return Response
	 */
	public function create()
	{
		if (!Auth::check()) {
			return Redirect::back()->with('warning-message', 'Only registered users can add events!');
		}
		return View::make('events.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /events/create
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validator = Validator::make($input, Events::$rules);
		
		if ($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$dt = new DateTime();

		$event = new Events;
		$event->id = Auth::user()->pk;
		$event->date = Input::get('date');
		$event->time = Input::get('time');
		$event->start = Input::get('start');
		$event->comment = Input::get('comment');
		$event->date_created = $dt->format('Y-m-d H:i:s');
		$event->save();

		$rating = new Rating;
		$rating->id = $event->pk;
		$rating->save();

		return Redirect::route('events.index')->with('success-message', 'Great! The event has been added!');	
	}
}