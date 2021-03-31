<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once  __DIR__ . "/../data/dao/organizer.php";
require_once __DIR__ . "/../auth/session.php";
require_once __DIR__ . "/../utils/form.php";

$checker = FieldTester::withArgs($_POST, array(
    new TestItem("name", array((Test::$exists)())),
    new TestItem("phone", array((Test::$exists)())),
    new TestItem("email", array(
        (Test::$exists)(),
        (Test::$isEmail)(),
        (Test::$emailIsUnique)()
    )),
    new TestItem("password", array((Test::$exists)())),
    new TestItem("confirmPassword", array(
        (Test::$exists)(),
        (Test::$isEqualTo)("password")
    )),
), array());


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $checker->test();

    if (!$checker->getFoundErrors()) {
        $organizer = Organizer::withArgs(User::withArgs(
            $_POST["email"],
            $_POST["password"],
            $_POST["phone"],
        ), $_POST['name']);

        $organizerDAO = new OrganizerDAO(PDOConn::instance());
        $organizerDAO->init();
        $organizerDAO->save($organizer);
        header("Location: /signin.php");
    }
}
