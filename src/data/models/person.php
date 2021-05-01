<?php

require_once __DIR__ . "/./model.php";
require_once __DIR__ . "/../dao/reservation.php";
require_once __DIR__ . "/user.php";

class Person extends Model
{
    /** @var User */
    public $user;

    /** @var string */
    public $firstName;

    /** @var string */
    public $lastName;

    /** @var ReservationDAO */
    private $reservationDAO;

    /** @var Reservation[] */
    private $reservations;

    public function __construct()
    {
        parent::__construct("person");
        $this->reservationDAO = new ReservationDAO(PDOConn::instance());
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

        return $person;
    }

    public function __set($name, $value)
    {
        if ($name === "first_name") {
            $this->firstName = $value;
        } else if ($name === "last_name") {
            $this->lastName = $value;
        }
    }

    public function getReservations()
    {
        if ($this->reservations == NULL) {
            $this->reservations = $this->reservationDAO->findAllForPerson($this);
        }
        return $this->reservations;
    }

    public function getUpcomingReservations()
    {
        $time = time();

        $reservations = $this->getReservations();
        $result = array_filter($reservations, function ($reservation) use ($time) {
            return $reservation->getEvent()->startTime > $time;
        });

        return $result;
    }

    public function getPastReservations()
    {
        $time = time();
        $reservations = $this->getReservations();

        $result = array_filter($reservations, function ($reservation) use ($time) {
            return $reservation->getEvent()->startTime < $time;
        });

        return $result;
    }
}
