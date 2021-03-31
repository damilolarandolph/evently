<?php

require_once __DIR__ . "/../dbconfig/pdo.php";

abstract class DAO
{
    /** @var \PDO $conn */
    protected $conn;
    /** @var string $table */
    protected $table;

    public function __construct($pdoConn, $table)
    {
        $this->conn = $pdoConn;
        $this->table = $table;
    }

    public function init()
    {
    }
    /**
     * Returns a single instance of the object from the database filtered by
     * a primary key.
     */
    abstract public function findById($id);

    /**
     * Returns all the instance of a model in the database. 
     */
    abstract public function findAll();

    /**
     * Persists a model to the database.
     */
    abstract public function save($model);

    /**
     * Updates an already existing model.
     */
    abstract public function update($model);
}
