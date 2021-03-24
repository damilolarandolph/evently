<?php

require_once __DIR__ . "/../models/reservation.php";
require_once __DIR__ . "/dao.php";
require_once __DIR__ . "/event.php";

class ReservationDAO extends DAO
{
    /** @var EventDAO */
    private $eventDAO;

    /** @var PersonDAO */
    private $personDAO;

    public function __construct($pdoConn)
    {

        parent::__construct($pdoConn, "reservation");
        $this->eventDAO = new EventDAO($pdoConn);
        $this->personDAO = new PersonDAO($pdoConn);
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
}
