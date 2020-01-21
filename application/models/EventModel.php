<?php

class EventModel extends BaseModel implements IModel
{
    protected $table_name = "event";

    public $id;
	public $name;
	public $institution;
	public $location_long;
	public $location_lat;
    public $blurb;

}

?>