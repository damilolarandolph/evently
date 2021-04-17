<?php
require_once __DIR__ . "/./model.php";
require_once __DIR__ . "/../dao/person.php";
require_once __DIR__ . "/../dao/event.php";


class Reservation extends Model implements JsonSerializable
{

    public $id;
    private $person;
    private $event;
    public $reservedAt;
    public $eventDAO;
    public $personDAO;

    public function __construct()
    {
        parent::__construct("reservation");
        $this->reservedAt = time();
        $this->eventDAO = new EventDAO(PDOConn::instance());
        $this->personDAO = new PersonDAO(PDOConn::instance());
    }

    public function jsonSerialize()
    {
        $data = getPublicVars($this);
        $data['person'] = $this->getPerson();
        $data['event'] = $this->getEvent();
        return $data;
    }

    public function __set($name, $value)
    {
        if ($name === "reserved_at") {
            $this->reservedAt = $value;
        } else if ($name === "person") {
            $this->person = $value;
        } else if ($name === "event") {
            $this->event = $value;
        }
    }

    public function getEvent()
    {
        if (is_numeric($this->event)) {
            $this->event = $this->eventDAO->findById($this->event);
        }

        return $this->event;
    }

    public function getPerson()
    {
        if (is_numeric($this->person)) {
            $this->person = $this->personDAO->findById($this->person);
        }

        return $this->person;
    }
}
