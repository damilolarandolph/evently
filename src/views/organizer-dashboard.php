<?php
require_once __DIR__ . "/../auth/organizer-guard.php";
require_once __DIR__ . "/../utils/templates.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/all.min.css" />
    <link rel="stylesheet" href="/assets/css/common.css" />
    <link rel="stylesheet" href="/assets/css/dashboard.css" />
    <title>Organizer Dashboard</title>
</head>

<body>
    <?php
    require_once __DIR__ . "../../partials/navbar.php";
    ?>
    <div class="layout-wrapper">
        <aside for="sidebar-content" class="sidebar">
            <a class="item selected">
                <i class="far fa-calendar-plus"></i>
                <span>Upcoming Events</span>
            </a>
            <a class="item">
                <i class="far fa-calendar-check"></i>
                <span>Past Events</span>
            </a>
            <a class="item">
                <i class="far fa-user-circle"></i>
                <span>Profile</span>
            </a>
        </aside>
        <main id="sidebar-content" class="main-content sidebar-routes">
            <div class="route">
                <ul class="events-list">
                    <?php
                    $upcomingEvents = getSession()->user->getUpcomingEvents();
                    foreach ($upcomingEvents as $upcomingEvent) {
                        echo genEventCountdownCard($upcomingEvent);
                    }
                    ?>
                </ul>
            </div>
            <div class="route">
                <ul class="events-list">
                    <?php
                    $pastEvents = getSession()->user->getPastEvents();
                    foreach ($pastEvents as $pastEvent) {
                        echo genEventPreviewCard($pastEvent);
                    }
                    ?>
                </ul>

            </div>
            <div class="route">
                How are you
            </div>
        </main>
    </div>
</body>
<script src="/assets/js/common.js"></script>

</html>