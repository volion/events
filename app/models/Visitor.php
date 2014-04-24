<?php

class Visitor extends \Eloquent {
	
	protected $guarded = array();

	protected $table = 'tbl_visitor';

	protected $primaryKey = 'pk';

	public $timestamps = false;

	public function events()
	{
		return $this->belongsToMany('Events', 'tbl_event_tbl_visitor', 'tbl_event_id', 'tbl_visitor_id');
	}
}