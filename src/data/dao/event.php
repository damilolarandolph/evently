<?php
require_once __DIR__ . "/dao.php";
require_once __DIR__ . "/../models/event.php";
require_once __DIR__ . "/event-category.php";
require_once __DIR__ . "/event-type.php";
require_once __DIR__ .  "/organizer.php";


class EventDAO extends DAO
{

    /** @var EventCategoryDAO */
    private $eventCategoryDAO;

    /** @var EventTypeDAO */
    private $eventTypeDAO;

    /** @var OraganizerDAO */
    private $organizerDAO;


    public function __construct($pdoConn)
    {
        parent::__construct($pdoConn, "event");
    }

    public function init()
    {
        $this->eventCategoryDAO = new EventCategoryDAO(PDOConn::instance());
        $this->eventCategoryDAO->init();
        $this->eventTypeDAO = new EventTypeDAO(PDOConn::instance());
        $this->eventTypeDAO->init();
        $this->organizerDAO = new OrganizerDAO(PDOConn::instance());
        $this->organizerDAO->init();
    }

    /**
     * {@inheritDoc}
     * 
     * @param int $id
     * 
     * @return Event
     */

    public function findById($id)
    {

        $q = "SELECT * FROM {$this->table} WHERE id=?";
        $stmt = $this->conn->prepare($q);;
        $stmt->execute(array($id));
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Event");
        $res = $stmt->fetch();
        return $res;
    }

    /**
     * {@inheritDoc}
     * 
     * @return Event[]
     */
    public function findAll()
    {
        $q = "SELECT * FROM {$this->table}";
        $res = $this->conn->query($q)->fetchAll(PDO::FETCH_CLASS, "Event");
        return $res;
    }

    /**
     * {@inheritDoc}
     *
     * @param Event $model
     *  
     * @return Event
     */
    public function save($model)
    {
        $q = "INSERT INTO {$this->table} (name,
         tickets,
         image,
         start_time,
         end_time,
         speaker,
         is_online,
         meeting_link,
         description,
         organizer,
         longitude,
         latitude,
         location,
         type,
         category) VALUES " .
            "(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($q);
        $res =       $stmt->execute(array(
            $model->name,
            $model->tickets,
            $model->image,
            $model->startTime,
            $model->endTime,
            $model->speaker,
            (int) $model->isOnline,
            $model->meetingLink,
            $model->description,
            $model->organizer->user->email,
            $model->longitude,
            $model->latitude,
            $model->location,
            $model->type->id,
            $model->category->id
        ));
    }

    /**
     * {@inheritDoc}
     * 
     * @param Event $model
     */
    public function update($model)
    {
        return $this->save($model);
    }

    /**
     * 
     * Hydrates type, category and organizer fields of an event.
     * 
     * @param Event $event
     */
    private function hydrateEvent($event)
    {
        $event->type = $this->eventTypeDAO->findById($event->type);
        $event->category = $this->eventCategoryDAO->findById($event->category);
        $event->organizer = $this->organizerDAO->findById($event->organizer);
    }

    /**
     * Hyrdrates an array of events.
     * 
     * @param Event[]
     */
    private function hydrateEvents($events)
    {
        foreach ($events as $event) {
            $this->hydrateEvent($event);
        }
    }

    /**
     * Gets open events that will be closing soon.
     * 
     * @param int $amount The amount of events to fetch.
     * 
     * @return Event[] 
     */
    public function getClosingSoon($amount = 4)
    {
        $timeStamp = time();
        $q = "SELECT * FROM {$this->table}
        WHERE start_time > ? 
        ORDER BY start_time DESC
        LIMIT ?
        ";

        $stmt = $this->conn->prepare($q);
        $stmt->execute(array($timeStamp, $amount));
        $res = $stmt->fetchAll(PDO::FETCH_CLASS, "Event");
        $this->hydrateEvents($res);
        return $res;
    }

    /**
     * Query for events. 
     * 
     * @param string $queryString
     * @param int $fromDate
     * @param int $fromTime
     * @param boolean $online
     * @param EventType $eventType
     * @param EventCategory $eventCategory
     * 
     * 
     * @return Event[]
     */
    public function query(
        $queryString,
        $fromDate,
        $fromTime,
        $online,
        $eventType,
        $eventCategory
    ) {
    }
}
