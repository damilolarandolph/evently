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

    /**
     * 
     * Constructs a new User object with the provided 
     * parameters.
     * 
     * @param string $email
     * @param string $password
     * @param string phone
     * @param boolean $isOrganizer
     *
     * @return User 
     */
    public static function withArgs(
        $email,
        $password,
        $phone,
        $isOrganizer = FALSE
    ) {

        $user = new self;
        $user->email = $email;
        $user->phone = $phone;
        $user->setPassword($password);
        $user->isOrganizer = $isOrganizer;

        return $user;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {

        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * Confirms plaintext input password to the saved saved hashed password.
     * Returns true or false based on whether the passwords match.
     * 
     * @param string $comparePassword The plaintext password
     * 
     * @return boolean
     * 
     */
    public function verifyPassword($comparePassword)
    {
        return password_verify($comparePassword, $this->password);
    }


    public function __set($name, $value)
    {
        if ($name == "is_organizer") {
            $this->isOrganizer = $value;
        }
    }
}
