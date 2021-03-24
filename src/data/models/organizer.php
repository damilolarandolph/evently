<?php
require_once __DIR__ . "/./user.php";


class Organizer extends Model
{

    /** @var User */
    public $user;
    public $name;

    public function __construct()
    {
        parent::__construct("organizer");
    }

    /**
     * 
     * @var User $user
     * @var string $name
     * 
     * @return Organizer
     */
    public static function withArgs($user, $name)
    {
        $organizer = new self;
        $organizer->user = $user;
        $organizer->name = $name;

        return $organizer;
    }
}
