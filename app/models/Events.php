<?php

class Events extends \Eloquent {

	protected $table = 'tbl_event';

	protected $primaryKey = 'pk';

	protected $guarded = array();

	public $timestamps = false;

	public static $rules = array(
		'date' => 'required|date_format:Y-m-d',
		'time' => 'required|date_format:H:i:s',
		'start' => 'required|max:150',
		'comment' => 'required'
		);

	public function rating()
	{
		return $this->hasOne('Rating', 'id', 'pk');
	}

	public function user()
	{
		return $this->belongsTo('User', 'id', 'pk');
	}

	public function visitors()
	{
		return $this->belongsToMany('Visitor', 'tbl_event_tbl_visitor', 'tbl_event_id', 'tbl_visitor_id');
	}

	public static function getTimeFormat($datetime)
	{
		$date_time = new DateTime($datetime);
		$event_time = $date_time->format('H:i');

		return $event_time;
	}

	public static function getDate($date = null)
	{
		$dt = $dt = new DateTime($date);
		$date = $dt->format('d-m-Y');

		return $date;
	}
}