<?php
require_once __DIR__ . "/./model.php";


class Reservation extends Model
{

    public $id;
    public $person;
    public $event;
    public $reservedAt;

    public function __construct()
    {
        parent::__construct("reservation");
        $this->reservedAt = time();
    }

    public function __set($name, $value)
    {
        if ($name === "reserved_at") {
            $this->reservedAt = $value;
        }
    }
}
