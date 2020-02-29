<?php

class EventModel extends BaseModel implements IModel
{
    protected $table_name = "event";

	public $columns = Array(
		"id" => NULL,
		"name" => NULL,
		"institution" => NULL,
		"location_long" => NULL,
		"location_lat" => NULL,
		"blurb" => NULL
	);


}

?>