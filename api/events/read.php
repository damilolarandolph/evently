<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . "/../../src/data/dao/event.php";
require_once __DIR__ . "/../../src/utils/form.php";

$checker = FieldTester::withArgs($_GET, array(), array());

header("Content-Type: application/json; charset=UTF-8");

$eventDAO = new EventDAO(PDOConn::instance());
$eventDAO->init();




if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $startDateTime  = strtotime("{$checker->getFieldData('fromDate')} {$checker->getFieldData('fromTime')}");
    $res = $eventDAO->query(
        $checker->getFieldData("query"),
        $checker->getFieldData('type'),
        $checker->getFieldData('category'),
        $startDateTime,
    );

    echo json_encode($res);
}
