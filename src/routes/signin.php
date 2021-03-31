<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once  __DIR__ . "/../data/dao/person.php";
require_once  __DIR__ . "/../data/dao/organizer.php";
require_once __DIR__ . "/../auth/session.php";
require_once __DIR__ . "/../utils/form.php";


$checker = FieldTester::withArgs($_POST, array(
    new TestItem("email", array(
        (Test::$exists)()
    )),
    new TestItem("password", array(
        (Test::$exists)()
    )),
), array(
    new TestItem(
        "auth-error",
        array(

            (Test::$testFunction)(function ($key, $map, $tester) {

                // var_dump($tester);
                if ($tester->getFoundErrors()) {
                    return false;
                }


                $userDAO = new UserDAO(PDOConn::instance());
                $orgDAO = new OrganizerDAO(PDOConn::instance());
                $personDAO = new PersonDAO(PDOConn::instance());
                $userDAO->init();
                $orgDAO->init();
                $personDAO->init();
                $user = $userDAO->findById($map["email"]);
                if ($user === false) {
                    var_dump($user);
                    return "email or password incorrect";
                }

                if (!$user->verifyPassword($map["password"])) {
                    return "email or password incorrect";
                }

                $entity = NULL;

                if ($user->isOrganizer) {
                    $entity = $orgDAO->findById($user->email);
                } else {
                    $entity = $personDAO->findById($user->email);
                }

                setSession($entity);
                return true;
            })
        )
    )
));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $checker->test();

    if (!$checker->getFoundErrors()) {
        header("Location: /");
    }
}
