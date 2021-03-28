<?php
require_once __DIR__ . "/dao.php";
require_once __DIR__ . "/../models/event.php";


class EventDAO extends DAO
{

    public function __construct($pdoConn)
    {
        parent::__construct($pdoConn, "event");
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
        $stmt = $this->conn->prepare($q);
        $stmt->execute(array($id));
        $res = $stmt->fetch(null, "Event");
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
        $res = $this->conn->query($q)->fetchAll(null, "Event");
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
}
