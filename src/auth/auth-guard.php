<?php
require_once __DIR__ . "/session.php";

if (getSession() === false) {
    header("Location: /signin.php");
}
