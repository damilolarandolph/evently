<?php
require_once __DIR__ . "/./user.php";


class Organizer extends Model
{

    public $user;
    public $name;

    public function __construct()
    {
        parent::__construct("organizer");
    }
}
