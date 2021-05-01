<?php
require_once __DIR__  . "/auth-guard.php";

if (!(getSession()->user instanceof Person)) {
    header("Location: /");
}
