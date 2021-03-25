<?php
require_once  __DIR__ . "/../data/dao/person.php";
require_once __DIR__ . "/../auth/session.php";
require_once __DIR__ . "/../utils/form.php";

$checker = FieldTester::withArgs($_POST, array(
    new TestItem("firstName", array((Test::$exists)())),
    new TestItem("lastName", array((Test::$exists)())),
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
));
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $checker->test();

    if (!$checker->getFoundErrors()) {
        $person = Person::withArgs(User::withArgs(
            $_POST["email"],
            $_POST["password"],
            $_POST["phone"],
        ), $_POST["firstName"], $_POST["lastName"]);

        $personDAO = new PersonDAO(PDOConn::instance());
        $personDAO->save($person);
        header("Location: /signin.php");
    }
}
