<?php
require_once __DIR__ . "/src/auth/session.php";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    endSession();
    header("Location: /");
}
