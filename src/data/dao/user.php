<?php

require_once __DIR__ . "/dao.php";
require_once __DIR__ . "/../models/user.php";

class UserDAO extends DAO
{
    public function __construct($pdoConn)
    {
        parent::__construct($pdoConn, "user");
    }

    /**
     * {@inheritDoc}
     * 
     * @param string $id Email of the user
     * 
     * @return User|boolean
     */
    public function findById($id)
    {
        $stmt = "SELECT * FROM {$this->table} where email=?";
        $prepedStmt = $this->conn->prepare($stmt);
        $prepedStmt->execute(array($id));
        if ($prepedStmt->rowCount() < 1) {
            return false;
        }
        $prepedStmt->setFetchMode(PDO::FETCH_CLASS, "User");
        $result = $prepedStmt->fetch();
        return $result;
    }

    /**
     * Checks is a user of the provided email exists in the database
     * 
     * @param string $email Email of the user to check
     * 
     * @return boolean
     */
    public function emailExists($email)
    {
        $result = $this->findById($email);
        if ($this->findById($email) !== false) {
            return true;
        }
        return false;
    }

    /**
     * {@inheritDoc}
     * 
     * @return User[]
     */
    public function findAll()
    {
        $stmt = "SELECT * FROM {$this->table}";
        $resultSet = $this->conn->query($stmt);
        return $resultSet->fetchAll(PDO::FETCH_CLASS, "User");
    }

    /**
     * {@inheritDoc}
     * 
     * @param User $model The user to be persisted on the database.
     * 
     * @return User 
     */
    public function save($model)
    {
        $stmt = "INSERT INTO {$this->table} (email, password, phone, is_organizer)" .
            " VALUES (?, ?, ?, ?)";
        $preppedStmt = $this->conn->prepare($stmt);
        $preppedStmt->execute(array(
            $model->email,
            $model->getPassword(),
            $model->phone,
            (int)$model->isOrganizer
        ));
        $model = $this->findById($model->email);
        return $model;
    }

    /**
     * {@inheritDoc} 
     * 
     * @param User $model The user to updated in the database. 
     */
    public function update($model)
    {
        $this->save($model);
    }
}
