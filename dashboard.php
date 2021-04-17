<?php
require_once __DIR__ . "/src/auth/auth-guard.php";

if (getSession()->user instanceof Organizer) {
    require_once __DIR__ . "/src/views/organizer-dashboard.php";
} else {
    require_once __DIR__ . "/src/views/user-dashboard.php";
}
