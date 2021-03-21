<?php
require_once __DIR__ . "/./model.php";

class User extends Model
{
    public $email;
    private $password;
    public $phone;
    public $isOrganizer;

    public function __construct()
    {
        parent::__construct("user");
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->$password = password_hash($password, PASSWORD_DEFAULT);
    }


    public function __set($name, $value)
    {
        if ($name == "is_organizer") {
            $this->isOrganizer = $value;
        }
    }
}
