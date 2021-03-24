<?php

require_once __DIR__ . "/dao.php";
require_once __DIR__ . "/user.php";
require_once __DIR__ . "/../models/person.php";

class PersonDAO extends DAO
{
    /** @var UserDAO */
    private $userDAO;
    public function __construct($pdoConn)
    {
        $this->userDAO = new UserDAO($pdoConn);
        parent::__construct($pdoConn, "person");
    }

    /**
     * {@inheritDoc}
     * 
     * @param string $id The organizer's primary key
     * 
     * @return Person
     */
    public function findById($id)
    {
        $q = "SELECT * FROM {$this->table} where user=?";
        $stmt = $this->conn->prepare($q);
        $stmt->execute(array($id));
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Person");
        $result = $stmt->fetch();
        $result->user = $this->userDAO->findById($result->user);
        return $result;
    }

    /**
     * {@inheritDoc}
     * 
     * @return Person[]
     */
    public function findAll()
    {
        $query = $this->conn->query("SELECT * FROM {$this->table}");
        $results = $query->fetchAll(NULL, "Person");
        foreach ($results as $result) {
            $result->user = $this->userDAO->findById($result->user);
        }
        return $results;
    }

    /**
     * {@inheritDoc} 
     * 
     * @param Person $model 
     * 
     * @return Person
     */
    public function save($model)
    {
        $model->user->isOrganizer = FALSE;
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
     * @param Person $model
     * 
     * @return Person
     */
    public function update($model)
    {
        return $this->save($model);
    }
}
