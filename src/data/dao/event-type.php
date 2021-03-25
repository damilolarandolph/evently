<?php

require_once __DIR__ . "/dao.php";
require_once __DIR__ . "/../models/event-type.php";


class EventTypeDAO extends DAO
{
    /** @var EventDAO */
    private $eventDAO;

    public function __construct($pdoConn)
    {
        $this->eventDAO = new EventDAO($pdoConn);
        parent::__construct($pdoConn, "event_type");
    }

    /**
     * {@inheritDoc}
     *
     * @param int $id
     * 
     * @return EventType
     *  
     */
    public function findById($id)
    {

        $q = "SELECT * FROM {$this->table} WHERE id=?";
        $stmt = $this->conn->prepare($q);
        $stmt->execute(array($id));
        $res = $stmt->fetch(null, "EventType");
        return $res;
    }

    /**
     * {@inheritDoc}
     * 
     * @return EventType[]
     */
    public function findAll()
    {
        $q = "SELECT * FROM {$this->table}";
        $stmt = $this->conn->query($q);
        $res = $stmt->fetchAll(PDO::FETCH_CLASS, "EventType");
        return $res;
    }

    /**
     * {@inheritDoc}
     * 
     * @param EventType $model
     */
    public function save($model)
    {
        $q = "INSERT INTO {$this->table} (name) " .
            "VALUES (?)";
        $stmt = $this->conn->prepare($q);
        $stmt->execute(array($model->name));
    }

    /**
     * {@inheritDoc}
     * 
     * @param EventType $model
     */
    public function update($model)
    {
        $this->save($model);
    }
}