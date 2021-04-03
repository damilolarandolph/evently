<?php

require_once __DIR__ . "/dao.php";
require_once __DIR__ . "/../models/event-type.php";


class EventTypeDAO extends DAO
{

    public function __construct($pdoConn)
    {
        parent::__construct($pdoConn, "event_type");
    }

    /**
     * {@inheritDoc}
     *
     * @param int $id
     * 
     * @return EventType|false
     *  
     */
    public function findById($id)
    {

        $q = "SELECT * FROM {$this->table} WHERE id=?";
        $stmt = $this->conn->prepare($q);
        $stmt->execute(array($id));
        if ($stmt->rowCount() == 0) {
            return false;
        }
        $stmt->setFetchMode(PDO::FETCH_CLASS, "EventType");
        $res = $stmt->fetch();
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
