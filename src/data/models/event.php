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

    public static function withArgs(
        $name,
        $tickets,
        $startTime,
        $endTime,
        $speaker,
        $description,
        $organizer,
        $type,
        $category,
        $image,
        $isOnline = true,
        $meetingLink = "",
        $longitude = "",
        $latitude = "",
        $location = "",
    ) {
        $event = new self;
        $event->name = $name;
        $event->tickets = intval($tickets);
        $event->image = $image == "" ? "/assets/images/placeholder_avatar.jpg" : $image;
        $event->startTime  = $startTime;
        $event->endTime = $endTime;
        $event->speaker = $speaker;
        $event->isOnline = $isOnline;
        $event->meetingLink = $meetingLink;
        $event->description = $description;
        $event->organizer = $organizer;
        $event->longitude = $longitude;
        $event->latitude = $latitude;
        $event->location = $location;
        $event->type = $type;
        $event->category = $category;
        return $event;
    }

    public function __set($name, $value)
    {
        switch ($name) {
            case 'start_time':
                $this->startTime = $value;
                break;
            case "end_time":
                $this->endTime = $value;
                break;
            case "meetingLink":
                $this->meetingLink = $value;
                break;
        }
    }
}
