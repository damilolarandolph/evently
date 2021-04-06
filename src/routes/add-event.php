<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . "/../data/dao/event.php";
require_once __DIR__ . "/../auth/organizer-guard.php";
require_once __DIR__ . "/../data/dao/event-category.php";
require_once __DIR__ . "/../data/dao/event-type.php";
require_once __DIR__ . "/../utils/form.php";

$categoryDAO = new EventCategoryDAO(PDOConn::instance());
$typesDAO = new EventTypeDAO(PDOConn::instance());

$categories = $categoryDAO->findAll();
$types = $typesDAO->findAll();

$checker = FieldTester::withArgs($_POST, array(
    new TestItem("title", array((Test::$exists)())),
    new TestItem(
        "description",
        array((Test::$exists)())
    ),
    new TestItem(
        "eventType",
        array((Test::$exists)())
    ),
    new TestItem(
        "eventCategory",
        array((Test::$exists)())
    ),
    new TestItem(
        "startDate",
        array((Test::$exists)())
    ),
    new TestItem(
        "endDate",
        array((Test::$exists)())
    ),
    new TestItem(
        "startTime",
        array((Test::$exists)())
    ),
    new TestItem(
        "endTime",
        array((Test::$exists)())
    ),

    new TestItem(
        "venue",
        array((Test::$exists)(),
            (Test::$testFunction)(function ($key, $map, $tester) {
                if ($map[$key] === "physical") {
                    if (!isset($map["location"])) {
                        return "Location is required";
                    }

                    if (!isset($map['lat']) || !isset($map['long'])) {
                        return "Location is malformed, please ensure you choose an option from the drop down";
                    }
                    return true;
                } else if ($map[$key] === "remote") {
                    if (!isset($map["meetingLink"])) {
                        return "Please provide a meeting link";
                    }
                    return true;
                }

                return "An error occurred";
            })
        )
    )

), array(
    new TestItem(
        "startDateTime",
        array((Test::$isTodayOrLater)("startDate", "startTime"))
    ),
    new TestItem(
        "endDateTime",
        array((Test::$isTodayOrLater)("endDate", "endTime"))
    ),
    new TestItem(
        "eventDuration",
        array((Test::$dateIsGreaterThan)("startDate", "startTime", "endDate", "endTime"))
    ),

));


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $checker->test();

    if (!$checker->getFoundErrors()) {
        $eventDAO = new EventDAO(PDOConn::instance());
        $eventCategoryDAO = new EventCategoryDAO(PDOConn::instance());
        $eventTypeDAO = new EventTypeDAO(PDOConn::instance());
        $eventDAO->init();
        $eventCategoryDAO->init();
        $eventTypeDAO->init();
        $event = Event::withArgs(
            $checker->getFieldData("title"),
            $checker->getFieldData('tickets'),
            strtotime("{$checker->getFieldData('startDate')} {$checker->getFieldData('startTime')}"),
            strtotime("{$checker->getFieldData('endDate')} {$checker->getFieldData('endTime')}"),
            $checker->getFieldData("speaker"),
            $checker->getFieldData("description"),
            getSession()->user,
            $eventTypeDAO->findById(intval($checker->getFieldData("eventType"))),
            $eventCategoryDAO->findById(intval($checker->getFieldData("eventCategory"))),
            $checker->getFieldData('imageLink'),
            $checker->getFieldData('venue') == 'remote',
        );

        if ($event->isOnline) {
            $event->meetingLink = $checker->getFieldData('meetingLink');
        } else {
            $event->location = $checker->getFieldData('location');
            $event->latitude = $checker->getFieldData('lat');
            $event->longitude = $checker->getFieldData('long');
        }
        // var_dump($event);
        // die();

        $eventDAO->save($event);
    }
}
