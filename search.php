<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon-16x16.png">
    <link rel="manifest" href="/assets/images/site.webmanifest">
    <link rel="stylesheet" href="./assets/css/all.min.css" />
    <link rel="stylesheet" href="./assets/css/common.css" />
    <link rel="stylesheet" href="./assets/css/search.css" />
    <title>Search</title>
</head>

<body>
    <?php
    include_once __DIR__ . "/src/partials/navbar.php";
    ?>

    <div class="layout">
        <main>
            <section class="search-header">
                <h2 class="query">Food and Drink</h2>
                <small class="events-found">15 events found</small>
                <form class="form">
                    <div class="search wide search-button alt-ring event-search">
                        <input value="hey" />
                        <button type="submit" class="ui-button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <div class="form-groups options">
                        <div class="form-group">
                            <label>Date</label>
                            <select class="time-list"></select>
                        </div>
                        <div class="form-group">
                            <label>Time</label>
                            <select class="time-list"></select>
                        </div>
                        <div class="inline form-group">
                            <label class="radio">
                                <input type="checkbox" name="venue" />
                                <div class="content">
                                    <i class="fas fa-check"></i>
                                    Online Only
                                </div>
                            </label>
                        </div>

                    </div>
                </form>
            </section>

            <section class="results-container">
                <ul class="results">
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
            </section>
        </main>
    </div>
</body>
<script src="/assets/js/common.js"></script>

</html>