<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . "/../data/dao/event.php";
require_once __DIR__ . "/../utils/templates.php";
require_once __DIR__ . "/../auth/session.php";
require_once __DIR__ . "/../data/dao/event.php";
require_once __DIR__ . "/../utils/keystore.php";
require_once __DIR__ . "/../data/dao/reservation.php";




$eventDAO = new EventDAO(PDOConn::instance());
$eventDAO->init();

$reservationDAO = new ReservationDAO(PDOConn::instance());
$reservationDAO->init();

$eventID = $_GET["event"];
$event = $eventDAO->findById(intval($eventID));

if ($session = getSession()) {
    if ($session->user instanceof Organizer) {
    } else {
        $reservation = $reservationDAO->getReservation($event, $session->user);
    }
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    if ($session && $session->user instanceof Person) {
        if ($reservation !== false) {
            $reservationDAO->delete($reservation);
        } else {
            $reservation = new Reservation();
            $reservation->event = $event;
            $reservation->person = $session->user;
            $reservationDAO->save($reservation);
        }
    }

    header("Location: {$_SERVER['REQUEST_URI']}");
}
$googleKey = $Keystore->getKey(Keys::$GOOGLE_PLACES);
