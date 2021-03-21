<?php

require_once __DIR__ . "/./model.php";

class Person extends Model
{
    public $user;
    public $firstName;
    public $lastName;

    public function __construct()
    {
        parent::__construct("person");
    }

    public function __set($name, $value)
    {
        if ($name === "first_name") {
            $this->firstName = $value;
        } else if ($name === "last_name") {
            $this->lastName = $value;
        }
    }
}
