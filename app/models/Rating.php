<?php

class Rating extends \Eloquent {

	protected $guarded = array();

	protected $table = 'tbl_rating';

	protected $primaryKey = 'pk';

	public $timestamps = false;

	public function event()
	{
		return $this->belongsTo('Event', 'id', 'pk');
	}
}