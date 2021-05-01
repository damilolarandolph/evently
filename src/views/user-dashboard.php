<!DOCTYPE html>
<?php
require_once __DIR__  . "/../auth/person-guard.php";
require_once __DIR__ . "/../utils/templates.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/all.min.css" />
    <link rel="stylesheet" href="/assets/css/common.css" />
    <link rel="stylesheet" href="/assets/css/dashboard.css" />
    <title>Attendee Dashboard</title>
</head>

<body>
    <?php
    include_once __DIR__ . "../../partials/navbar.php";
    ?>
    <div class="layout-wrapper">
        <aside for="sidebar-content" class="sidebar">
            <a class="item selected">
                <i class="far fa-calendar-plus"></i>
                <span>Upcoming Reservations</span>
            </a>
            <a class="item">
                <i class="far fa-calendar-check"></i>
                <span>Past Reservations</span>
            </a>

        </aside>
        <main id="sidebar-content" class="main-content sidebar-routes">
            <div class="route">
                <ul class="events-list">
                    <?php
                    foreach (getSession()->user->getUpcomingReservations() as $reservation) {
                        echo genEventCountdownCard($reservation->getEvent());
                    }
                    ?>
                </ul>
            </div>
            <div class="route">
                <ul class="events-list">
                    <?php
                    foreach (getSession()->user->getPastReservations() as $reservation) {
                        echo genEventPreviewCard($reservation->getEvent());
                    }
                    ?>
                </ul>

            </div>

        </main>
    </div>

    <?php require_once __DIR__ . "/../partials/footer.php" ?>
</body>
<script src="/assets/js/common.js"></script>

</html>