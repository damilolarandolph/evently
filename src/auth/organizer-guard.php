<?php
require_once __DIR__ . '/auth-guard.php';

if (!(getSession()->user instanceof Organizer)) {
    header("Location: /org-signup.php");
}
