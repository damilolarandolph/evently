<?php
require_once __DIR__ . "/./user.php";
require_once __DIR__ . "/../dao/event.php";


class Organizer extends Model
{

    /** @var User */
    public $user;
    public $name;
    private $events;
    private $eventDAO;

    public function __construct()
    {
        parent::__construct("organizer");
        $this->eventDAO = new EventDAO(PDOConn::instance());
    }

    /**
     * 
     * @var User $user
     * @var string $name
     * 
     * @return Organizer
     */
    public static function withArgs($user, $name)
    {
        $organizer = new self;
        $organizer->user = $user;
        $organizer->name = $name;

        return $organizer;
    }

    public function getEvents()
    {
        if ($this->events == NULL) {
            $this->events = $this->eventDAO->getForOrganizer($this);
        }
        return $this->events;
    }

    public function getUpcomingEvents()
    {
        $time = time();

        $events = $this->getEvents();
        $result = array_filter($events, function ($item) use ($time) {
            return $item->startTime > $time;
        });

        return $result;
    }

    public function getPastEvents()
    {
        $time = time();
        $events = $this->getEvents();

        $result = array_filter($events, function ($item) use ($time) {
            return $item->startTime < $time;
        });

        return $result;
    }
}
