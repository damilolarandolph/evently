<?php

require_once __DIR__ . "/../models/reservation.php";
require_once __DIR__ . "/dao.php";
require_once __DIR__ . "/event.php";
require_once  __DIR__ . "/../models/event.php";
require_once __DIR__ . "/person.php";

class ReservationDAO extends DAO
{

    private $eventDAO;
    private $personDAO;


    public function __construct($pdoConn)
    {
        parent::__construct($pdoConn, "reservation");
    }


    public function init()
    {
        $this->eventDAO = new EventDAO($this->conn);
        $this->eventDAO->init();
        $this->personDAO = new PersonDAO($this->conn);
        $this->personDAO->init();
    }


    /**
     * {@inheritDoc}
     * 
     * @param int $id
     * 
     * @return Reservation
     */
    public function findById($id)
    {
        $q = "SELECT * FROM {$this->table} WHERE id=?";
        $stmt = $this->conn->prepare($q);
        $stmt->execute(array($id));
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Reservation");
        $res = $stmt->fetch();
        $res->event = $this->eventDAO->findById($res->event->event);
        $res->person = $this->personDAO->findById($res->person);
        return $res;
    }

    /**
     * {@inheritDoc}
     *
     * @return Reservation[]
     */
    public function findAll()
    {
        $q = "SELECT * FROM {$this->table}";
        $stmt = $this->conn->query($q);
        $reserves = $stmt->fetchAll(PDO::FETCH_CLASS, "Reservation");

        foreach ($reserves as $reserve) {
            $reserve->person = $this->personDAO->findById($reserve->person);
            $reserve->event = $this->eventDAO->findById($reserve->event);
        }
        return $reserves;
    }

    /**
     *  {@inheritDoc}
     *
     * @param Reservation $model 
     */

    public function save($model)
    {
        $q = "INSERT INTO {$this->table} (person, event, reserved_at) " .
            "VALUES(?,?,?)";
        $stmt = $this->conn->prepare($q);
        $stmt->execute(array($model->person->user->email, $model->event->id));
    }

    /**
     * {@inheritDoc}
     * 
     * @param Reservation $model
     */
    public function update($model)
    {
        $this->save($model);
    }

    /**
     * Get number of reservation for account
     * 
     * @param Event $event
     * 
     * @return int
     */
    public function reservationCountForEvent($event)
    {
        $q = "SELECT COUNT(*) FROM {$this->table} WHERE event=?";
        $stmt = $this->conn->prepare($q);
        $stmt->execute($event->id);
        return $stmt->fetchColumn();
    }

    public function getReservationsForEvent($event)
    {
        $q = "SELECT * FROM {$this->table} WHERE event=?";
        $stmt = $this->conn->prepare($q);
        $reservations = $stmt->fetchAll(PDO::FETCH_CLASS, "Reservation");
        foreach ($reservations as $reservation) {
            $reservation->event = $event;
        }
        return $reservations;
    }
}
