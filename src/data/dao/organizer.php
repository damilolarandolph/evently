<?php

require_once __DIR__ . "/dao.php";
require_once __DIR__ . "/user.php";
require_once __DIR__ . "/../models/organizer.php";

class OrganizerDAO extends DAO
{
    /** @var UserDAO */
    private $userDAO;
    public function __construct($pdoConn)
    {
        $this->userDAO = new UserDAO($pdoConn);
        parent::__construct($pdoConn, "organizer");
    }

    /**
     * {@inheritDoc}
     * 
     * @param string $id The organizer's primary key
     * 
     * @return Organizer
     */
    public function findById($id)
    {
        $q = "SELECT * FROM {$this->table} where user=?";
        $stmt = $this->conn->prepare($q);
        $stmt->execute(array($id));
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Organizer");
        $result = $stmt->fetch();
        $result->user = $this->userDAO->findById($result->user);
        return $result;
    }

    /**
     * {@inheritDoc}
     * 
     * @return Organizer[]
     */
    public function findAll()
    {
        $query = $this->conn->query("SELECT * FROM {$this->table}");
        $results = $query->fetchAll(NULL, "Organizer");
        foreach ($results as $result) {
            $result->user = $this->userDAO->findById($result->user);
        }
        return $results;
    }

    /**
     * {@inheritDoc} 
     * 
     * @param Organizer $model 
     * 
     * @return Organizer 
     */
    public function save($model)
    {
        $model->user->isOrganizer = TRUE;
        $user = $this->userDAO->save($model->user);
        $q = "INSERT INTO {$this->table} (user, name) " .
            "VALUES (?,?)";
        $stmt = $this->conn->prepare($q);
        $stmt->execute(array($user->email, $model->name));
        $organizer = $this->findById($user->email);
        return $organizer;
    }

    /**
     * {@inheritDoc}
     * 
     * @param Oraganizer $model
     * 
     * @return Organizer
     */
    public function update($model)
    {
        return $this->save($model);
    }
}
