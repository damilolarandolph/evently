<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . "/../auth/organizer-guard.php";
require_once __DIR__ . "/../data/dao/event.php";

$categoryDAO = new EventCategoryDAO(PDOConn::instance());
$typesDAO = new EventTypeDAO(PDOConn::instance());
$eventDAO = new EventDAO(PDOConn::instance());

$categories = $categoryDAO->findAll();
$types = $typesDAO->findAll();

if (isset($_GET['event'])) {

    $eventID = intval($_GET['event']);
} else {
    header("Location: /");
}
$eventID = intval($_GET['event']);
$event = $eventDAO->findById($eventID);



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["title"])) {
        $event->name = $_POST["title"];
    }
    if (!empty($_POST["description"])) {
        $event->description = $_POST["description"];
    }

    if (!empty($_POST["imageLink"])) {
        $event->image = $_POST['imageLink'];
    }

    if (!empty($_POST['eventType'])) {
        var_dump($_POST['eventType']);
        $event->setType(intval($_POST['eventType']));
    }

    if (!empty($_POST['eventCategory'])) {
        $event->setCategory(intval($_POST['eventCategory']));
    }

    if (!empty($_POST['timeDelay'])) {
        $seconds = intval($_POST['timeDelay']) * 60 * 60;
        $event->startTime += $seconds;
        $event->endTime += $seconds;
    }

    if (!empty($_POST['speaker'])) {
        $event->speaker = $_POST['speaker'];
    }

    if (!empty($_POST['tickets'])) {
        $event->tickets = $_POST['tickets'];
    }

    if (!$event->isOnline && !empty($_POST['location'])) {
        $event->location = $_POST['location'];
    } else if ($event->isOnline && !empty($_POST['meetingLink'])) {
        $event->meetingLink = $_POST['meetingLink'];
    }

    $eventDAO->update($event);
    header("Location: /event.php?event={$event->id}");
}
