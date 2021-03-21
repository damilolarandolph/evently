<?php

require_once __DIR__ . "/./model.php";


class EventCategory extends Model
{
    public $id;
    public $name;

    public function __construct()
    {
        parent::__construct("event_category");
    }
}
