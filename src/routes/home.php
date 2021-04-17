<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . "/../data/dao/event.php";
require_once __DIR__ . "/../utils/templates.php";

$eventRepo = new EventDAO(PDOConn::instance());
$eventRepo->init();
$eventsClosingSoon = $eventRepo->getClosingSoon();
$eventOfTheDay = $eventRepo->getEventOfDay();
