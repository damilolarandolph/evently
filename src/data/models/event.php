<?php
require_once __DIR__ . "/./model.php";

class Event extends Model
{
    public $id;
    public $name;
    public $tickets;
    public $image;
    public $startTime;
    public $endTime;
    public $speaker;
    public $isOnline;
    public $meetingLink;
    public $description;
    public $organizer;
    public $longitude;
    public $latitude;
    public $location;
    public $type;
    public $category;

    public function __construct()
    {
        parent::__construct("event");
    }

    public function __set($name, $value)
    {
        switch ($name) {
            case 'start-time':
                $this->startTime = $value;
                break;
            case "end-time":
                $this->endTime = $value;
                break;
            case "meetingLink":
                $this->meetingLink = $value;
                break;
        }
    }
}
