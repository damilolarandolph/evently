<!DOCTYPE html>
<html lang="en">
<?php
require_once __DIR__ . "/src/routes/home.php";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon-16x16.png">
    <link rel="stylesheet" href="./assets/css/patterns.css" />
    <link rel="stylesheet" href="./assets/css/common.css" />
    <link rel="stylesheet" href="./assets/css/home.css" />
    <script src="/assets/js/all.js" defer></script>
    <title>Evently</title>
</head>

<body>
    <?php
    include_once __DIR__ . "/src/partials/navbar.php"
    ?>
    <section class="hero">
        <div class="first">
            <h3>Explore !</h3>
            <p>Our wide selection of events</p>
        </div>
        <?php
        echo genEventCountdownCard($eventOfTheDay);
        ?>
    </section>
    <section class="home-section">
        <h4 class="title">Closing Soon⏱️</h4>
        <div class="content">
            <?php
            foreach ($eventsClosingSoon as $event) {
                echo genEventPreviewCard($event);
            }

            ?>
        </div>
    </section>
    <section class="home-section">
        <h4 class="title">Newly Added🆕</h4>
        <div class="content">
            <div class="preview-card">
                <div>
                    <img class="image" src="/assets/images/placeholder_avatar.jpg" />
                </div>
                <div class="content">
                    <h2 class="title">Event Name</h2>
                    <ul class="extra-details">
                        <li>
                            <i class="far fa-clock"></i>
                            6:00PM - 7:00PM
                        </li>
                        <li>
                            <i class="far fa-calendar-alt"></i>
                            26th August 2020
                        </li>
                        <li>
                            <i class="fas fa-map-marked-alt"></i>
                            Airport Residential, Accra, Ghana.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="preview-card">
                <div>
                    <img class="image" src="/assets/images/placeholder_avatar.jpg" />
                </div>
                <div class="content">
                    <h2 class="title">Event Name</h2>
                    <ul class="extra-details">
                        <li>
                            <i class="far fa-clock"></i>
                            6:00PM - 7:00PM
                        </li>
                        <li>
                            <i class="far fa-calendar-alt"></i>
                            26th August 2020
                        </li>
                        <li>
                            <i class="fas fa-map-marked-alt"></i>
                            Airport Residential, Accra, Ghana.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="preview-card">
                <div>
                    <img class="image" src="/assets/images/placeholder_avatar.jpg" />
                </div>
                <div class="content">
                    <h2 class="title">Event Name</h2>
                    <ul class="extra-details">
                        <li>
                            <i class="far fa-clock"></i>
                            6:00PM - 7:00PM
                        </li>
                        <li>
                            <i class="far fa-calendar-alt"></i>
                            26th August 2020
                        </li>
                        <li>
                            <i class="fas fa-map-marked-alt"></i>
                            Airport Residential, Accra, Ghana.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="preview-card">
                <div>
                    <img class="image" src="/assets/images/placeholder_avatar.jpg" />
                </div>
                <div class="content">
                    <h2 class="title">Event Name</h2>
                    <ul class="extra-details">
                        <li>
                            <i class="far fa-clock"></i>
                            6:00PM - 7:00PM
                        </li>
                        <li>
                            <i class="far fa-calendar-alt"></i>
                            26th August 2020
                        </li>
                        <li>
                            <i class="fas fa-map-marked-alt"></i>
                            Airport Residential, Accra, Ghana.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="home-section">
        <h4 class="title">More Events</h4>
        <div class="content">
            <div class="preview-card">
                <div>
                    <img class="image" src="/assets/images/placeholder_avatar.jpg" />
                </div>
                <div class="content">
                    <h2 class="title">Event Name</h2>
                    <ul class="extra-details">
                        <li>
                            <i class="far fa-clock"></i>
                            6:00PM - 7:00PM
                        </li>
                        <li>
                            <i class="far fa-calendar-alt"></i>
                            26th August 2020
                        </li>
                        <li>
                            <i class="fas fa-map-marked-alt"></i>
                            Airport Residential, Accra, Ghana.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="preview-card">
                <div>
                    <img class="image" src="/assets/images/placeholder_avatar.jpg" />
                </div>
                <div class="content">
                    <h2 class="title">Event Name</h2>
                    <ul class="extra-details">
                        <li>
                            <i class="far fa-clock"></i>
                            6:00PM - 7:00PM
                        </li>
                        <li>
                            <i class="far fa-calendar-alt"></i>
                            26th August 2020
                        </li>
                        <li>
                            <i class="fas fa-map-marked-alt"></i>
                            Airport Residential, Accra, Ghana.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="preview-card">
                <div>
                    <img class="image" src="/assets/images/placeholder_avatar.jpg" />
                </div>
                <div class="content">
                    <h2 class="title">Event Name</h2>
                    <ul class="extra-details">
                        <li>
                            <i class="far fa-clock"></i>
                            6:00PM - 7:00PM
                        </li>
                        <li>
                            <i class="far fa-calendar-alt"></i>
                            26th August 2020
                        </li>
                        <li>
                            <i class="fas fa-map-marked-alt"></i>
                            Airport Residential, Accra, Ghana.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="preview-card">
                <div>
                    <img class="image" src="/assets/images/placeholder_avatar.jpg" />
                </div>
                <div class="content">
                    <h2 class="title">Event Name</h2>
                    <ul class="extra-details">
                        <li>
                            <i class="far fa-clock"></i>
                            6:00PM - 7:00PM
                        </li>
                        <li>
                            <i class="far fa-calendar-alt"></i>
                            26th August 2020
                        </li>
                        <li>
                            <i class="fas fa-map-marked-alt"></i>
                            Airport Residential, Accra, Ghana.
                        </li>
                    </ul>
                </div>
            </div>

            <div class="preview-card">
                <div>
                    <img class="image" src="/assets/images/placeholder_avatar.jpg" />
                </div>
                <div class="content">
                    <h2 class="title">Event Name</h2>
                    <ul class="extra-details">
                        <li>
                            <i class="far fa-clock"></i>
                            6:00PM - 7:00PM
                        </li>
                        <li>
                            <i class="far fa-calendar-alt"></i>
                            26th August 2020
                        </li>
                        <li>
                            <i class="fas fa-map-marked-alt"></i>
                            Airport Residential, Accra, Ghana.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="preview-card">
                <div>
                    <img class="image" src="/assets/images/placeholder_avatar.jpg" />
                </div>
                <div class="content">
                    <h2 class="title">Event Name</h2>
                    <ul class="extra-details">
                        <li>
                            <i class="far fa-clock"></i>
                            6:00PM - 7:00PM
                        </li>
                        <li>
                            <i class="far fa-calendar-alt"></i>
                            26th August 2020
                        </li>
                        <li>
                            <i class="fas fa-map-marked-alt"></i>
                            Airport Residential, Accra, Ghana.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="preview-card">
                <div>
                    <img class="image" src="/assets/images/placeholder_avatar.jpg" />
                </div>
                <div class="content">
                    <h2 class="title">Event Name</h2>
                    <ul class="extra-details">
                        <li>
                            <i class="far fa-clock"></i>
                            6:00PM - 7:00PM
                        </li>
                        <li>
                            <i class="far fa-calendar-alt"></i>
                            26th August 2020
                        </li>
                        <li>
                            <i class="fas fa-map-marked-alt"></i>
                            Airport Residential, Accra, Ghana.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="preview-card">
                <div>
                    <img class="image" src="/assets/images/placeholder_avatar.jpg" />
                </div>
                <div class="content">
                    <h2 class="title">Event Name</h2>
                    <ul class="extra-details">
                        <li>
                            <i class="far fa-clock"></i>
                            6:00PM - 7:00PM
                        </li>
                        <li>
                            <i class="far fa-calendar-alt"></i>
                            26th August 2020
                        </li>
                        <li>
                            <i class="fas fa-map-marked-alt"></i>
                            Airport Residential, Accra, Ghana.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="/assets/js/dayjs.min.js"></script>
<script src="/assets/js/common.js"></script>

</html>