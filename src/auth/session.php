<?php
require_once __DIR__ . "/../data/dao/organizer.php";
require_once __DIR__ . "/../data/dao/person.php";

session_start();

class Session
{
    /** @var Person|Organizer */
    public $user;
    /** @var Session */
    private static $instance;


    public static function instance()
    {
        if (Session::$instance == NULL) {
            Session::$instance = new Session();
        }
        return Session::$instance;
    }

    public static function hasInstance()
    {
        return Session::$instance !== NULL;
    }
}



/**
 * Gets the current user session or false if a session doesn't exist.
 * 
 * @return Session|false
 */
function getSession()
{
    if (isset($_SESSION["user"])) {
        if (Session::hasInstance()) {
            return Session::instance();
        }
        $dao = $_SESSION["isOrganizer"] == 1 ?
            new OrganizerDAO(PDOConn::instance())
            : new PersonDAO(PDOConn::instance());
        $dao->init();
        $user = $dao->findById($_SESSION["user"]);
        $session = Session::instance();
        $session->user = $user;
        return $session;
    }

    return false;
}

/**
 * Creates a new session
 *
 * @param Person|Organizer $user
 *
 * @return boolean 
 */
function setSession($user)
{
    if (!isset($_SESSION["user"])) {
        $_SESSION["user"] = $user->user->email;
        $_SESSION["isOrganizer"] = $user->user->isOrganizer;
        return true;
    } else {
        return false;
    }
}

/**
 * Ends the current session
 * 
 * @return boolean 
 */
function endSession()
{
    if (isset($_SESSION["user"])) {
        unset($_SESSION["user"]);
        unset($_SESSION["isOrganizer"]);
        return true;
    } else {
        return false;
    }
}
