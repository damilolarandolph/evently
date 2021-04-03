<?php
require_once __DIR__ . "/../data/dao/event-category.php";
require_once __DIR__ . "/../data/dao/event-type.php";


$eventCategoryDAO = new EventCategoryDAO(PDOConn::instance());
$eventCategoryDAO->init();
$eventTypeDAO = new EventTypeDAO(PDOConn::instance());
$eventTypeDAO->init();
$eventCategories = $eventCategoryDAO->findAll();
$eventTypes = $eventTypeDAO->findAll();
$date = date("Y-m-d");
