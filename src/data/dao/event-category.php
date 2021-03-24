<?php
require_once __DIR__ . "/../models/event-category.php";
require_once __DIR__ . "/dao.php";
require_once __DIR__ . "/event.php";

class EventCategoryDAO extends DAO
{
    /** @var EventDAO */
    private $eventDAO;

    public function __construct($pdoConn)
    {
        parent::__construct($pdoConn, "event_category");
        $this->eventDAO = new EventDAO($pdoConn);
    }

    /**
     * {@inheritDoc}
     * 
     * @param int $id
     * 
     * @return EventCategory
     */
    public function findById($id)
    {
        $q = "SELECT * FROM {$this->table} WHERE id=?";
        $stmt = $this->conn->prepare($q);
        $stmt->execute(array($id));
        $res = $stmt->fetch(null, "EventCategory");
        return $res;
    }

    /**
     * {@inheritDoc}
     * 
     * @return EventCategory[]
     */
    public function findAll()
    {
        $q  = "SELECT * FROM {$this->table}";
        $stmt = $this->conn->query($q);
        $res = $stmt->fetchAll(PDO::FETCH_CLASS, "EventCategory");
        return $res;
    }

    /**
     *  {@inheritDoc}
     * 
     * @param EventCategory $model
     */
    public function save($model)
    {
        $q = "INSERT INTO {$this->table} (name) " .
            "VALUES (?)";
        $stmt = $this->conn->prepare($q);
        $stmt->execute(array($model->name));
    }

    /**
     *  {@inheritDoc}
     * 
     * @param EventCategory $model
     */
    public function update($model)
    {
        $this->save($model);
    }
}
