<?php
require_once __DIR__ . "/./model.php";
require_once __DIR__ . "/../dao/reservation.php";
require_once __DIR__ . "/../dao/event-type.php";
require_once __DIR__ . "/../dao/event-category.php";
require_once __DIR__ . "/../dao/reservation.php";

class Event extends Model implements JsonSerializable
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
    private $organizer;
    public $longitude;
    public $latitude;
    public $location;
    public $reservations;
    private $type;


    private $category;
    private $organizerDAO;
    private $typeDAO;
    private $categoryDAO;
    private $reservationDAO;

    public function __construct()
    {
        parent::__construct("event");
        $this->organizerDAO = new OrganizerDAO(PDOConn::instance());
        $this->typeDAO = new EventTypeDAO(PDOConn::instance());
        $this->categoryDAO = new EventCategoryDAO(PDOConn::instance());
        $this->reservationDAO = new ReservationDAO(PDOConn::instance());
    }

    public function jsonSerialize()
    {
        $publicData = getPublicVars($this);
        $publicData["organizer"] = $this->getOrganizer();
        $publicData["type"] = $this->getType();
        $publicData["category"] = $this->getCategory();
        $publicData["reservations"] = $this->reservations;
        return $publicData;
    }

    public function getTicketsLeft()
    {
        $reservations = $this->getReservations();

        if ($this->tickets == 0) {
            return "Unlimited";
        }

        return $this->tickets - count($reservations);
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
            case "organizer":
                $this->organizer = $value;
                break;
            case "type":
                $this->type = $value;
                break;
            case "category":
                $this->category =  $value;
                break;
        }
    }

    public function getOrganizer()
    {
        if (is_numeric($this->organizer)) {
            $this->organizer = $this->organizerDAO->findById($this->organizer);
        }

        return $this->organizer;
    }

    public function getType()
    {
        if (is_numeric($this->type)) {

            $this->type = $this->typeDAO->findById($this->type);
        }

        return $this->type;
    }

    public function getCategory()
    {
        if (is_numeric($this->category)) {
            $this->category = $this->categoryDAO->findById($this->category);
        }

        return $this->category;
    }

    public function getReservations()
    {

        if ($this->reservations == NULL) {
            $this->reservations = $this->reservationDAO->findAllForEvent($this);
        }
        return $this->reservations;
    }
}
