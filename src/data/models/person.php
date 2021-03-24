<?php

require_once __DIR__ . "/./model.php";
require_once __DIR__ . "/user.php";

class Person extends Model
{
    /** @var User */
    public $user;

    /** @var string */
    public $firstName;

    /** @var string */
    public $lastName;

    public function __construct()
    {
        parent::__construct("person");
    }

    /**
     * 
     * @param User $user
     * @param string $firstName
     * @param string $lastName
     * 
     * @return Person
     * 
     */
    public static function withArgs($user, $firstName, $lastName)
    {

        $person = new self;
        $person->user = $user;
        $person->lastName = $lastName;
        $person->firstName = $firstName;
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
