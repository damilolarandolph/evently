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
    include_once __DIR__ . "../../partials/navbar.php";
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

        </aside>
        <main id="sidebar-content" class="main-content sidebar-routes">
            <div class="route">
                <ul class="events-list">
                    <div class="upcoming-event mini">
                        <main class="content">
                            <h4 class="title">Event Title</h4>
                            <img class="event-image" src="/assets/images/placeholder_avatar.jpg" />
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
                        </main>
                        <div class="kitchen-sink">
                            <div class="item">
                                <p>Reservations Left</p>
                                <h5>80</h5>
                            </div>
                            <div class="item">
                                <p>Event registeration ends in</p>
                                <h5 class="countdown" endTime="unixtimestamp">16:00:90</h5>
                            </div>

                        </div>
                    </div>
                    <div class="upcoming-event mini">
                        <main class="content">
                            <h4 class="title">Event Title</h4>
                            <img class="event-image" src="/assets/images/placeholder_avatar.jpg" />
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
                        </main>
                        <div class="kitchen-sink">
                            <div class="item">
                                <p>Reservations Left</p>
                                <h5>80</h5>
                            </div>
                            <div class="item">
                                <p>Event registeration ends in</p>
                                <h5 class="countdown" endTime="unixtimestamp">16:00:90</h5>
                            </div>

                        </div>
                    </div>
                    <div class="upcoming-event mini">
                        <main class="content">
                            <h4 class="title">Event Title</h4>
                            <img class="event-image" src="/assets/images/placeholder_avatar.jpg" />
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
                        </main>
                        <div class="kitchen-sink">
                            <div class="item">
                                <p>Reservations Left</p>
                                <h5>80</h5>
                            </div>
                            <div class="item">
                                <p>Event registeration ends in</p>
                                <h5 class="countdown" endTime="unixtimestamp">16:00:90</h5>
                            </div>

                        </div>
                    </div>
                    <div class="upcoming-event mini">
                        <main class="content">
                            <h4 class="title">Event Title</h4>
                            <img class="event-image" src="/assets/images/placeholder_avatar.jpg" />
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
                        </main>
                        <div class="kitchen-sink">
                            <div class="item">
                                <p>Reservations Left</p>
                                <h5>80</h5>
                            </div>
                            <div class="item">
                                <p>Event registeration ends in</p>
                                <h5 class="countdown" endTime="unixtimestamp">16:00:90</h5>
                            </div>

                        </div>
                    </div>
                    <div class="upcoming-event mini">
                        <main class="content">
                            <h4 class="title">Event Title</h4>
                            <img class="event-image" src="/assets/images/placeholder_avatar.jpg" />
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
                        </main>
                        <div class="kitchen-sink">
                            <div class="item">
                                <p>Reservations Left</p>
                                <h5>80</h5>
                            </div>
                            <div class="item">
                                <p>Event registeration ends in</p>
                                <h5 class="countdown" endTime="unixtimestamp">16:00:90</h5>
                            </div>

                        </div>
                    </div>
                </ul>
            </div>
            <div class="route">
                <ul class="events-list">
                    <li>
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
                    </li>
                    <li>
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
                    </li>
                    <li>
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
                    </li>
                    <li>
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
                    </li>
                    <li>
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
                    </li>
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