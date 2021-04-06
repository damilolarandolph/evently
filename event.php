<!DOCTYPE html>
<?php
require_once __DIR__ . "/src/routes/event.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon-16x16.png">
    <link rel="stylesheet" href="./assets/css/all.min.css" />
    <link rel="stylesheet" href="./assets/css/common.css" />
    <link rel="stylesheet" href="./assets/css/view-event.css" />
    <title>Event Name</title>
</head>

<body>
    <?php
    include_once __DIR__ . "/src/partials/navbar.php"
    ?>

    <section class="main-section">
        <div class="first-div">
            <div class="preview-image">
                <img src="<?php echo $event->image; ?>" />
            </div>
            <aside>
                <h2 class="event-title"><?php echo $event->name; ?></h2>
                <ul class="badges event-badges">
                    <li class="badge">
                        <i class="fas fa-project-diagram"></i>
                        <span><?php echo $event->type->name ?></span>
                    </li>
                    <li class="badge">
                        <i class="fas fa-project-diagram"></i>
                        <span><?php echo $event->category->name ?></span>
                    </li>

                </ul>
                <p class="event-details">
                    <?php echo $event->description; ?>
                </p>
                <?php
                if (getSession() === false) {
                    echo " <a href='/signin.php' class='ui-button attend-button'>
                    <i class='fas fa-ticket-alt'></i> Login to attend</a>";
                } else if (getSession()->user instanceof Organizer) {
                    echo " <a class='ui-button attend-button'>
                    <i class='fas fa-ticket-alt'></i>Something </a>";
                } else if (getSession()->user instanceof Person) {

                    $attendaceText = $reservation !== false ? "Attending" : "Attend";

                    echo "<form method='POST'><button type='submit'class='ui-button attend-button'>
                    <i class='fas fa-ticket-alt'></i> {$attendaceText}</button></form>";
                }

                ?>
            </aside>
        </div>
    </section>
    <?php

    if (!$event->isOnline)
        $encodedUrl = urlencode($event->location);
    echo "
    <section class='map-section'>
        <iframe  loading='lazy' allowfullscreen
         src='https://www.google.com/maps/embed/v1/place?key=$googleKey&q=$encodedUrl'>
        </iframe>
    </section>
    ";
    ?>
    <section class="other-info-section">
        <ul class="info-cards">
            <?php
            if (!$event->isOnline) {
                echo "
            <li class='card mini'>
                <span class='title'>Location</span>
                <div class='body'>{$event->location}</div>
            </li>";
            }
            ?>
            <?php

            $speakers = explode(",", $event->speaker);
            if (count($speakers) != 0 && $event->speaker !== "") {
                $speakersHTML = "";
                foreach ($speakers as $speaker) {
                    $speakersHTML .= "<li>$speaker</li>";
                }
                echo " <li class='card mini'>
                <span class='title'>
<ul>
$speakersHTML
</ul>
                </span>
                <div class='body'></div>
            </li>";
            }
            ?>
            <li class="card mini">
                <span class="title">
                    Starts At
                </span>
                <div class="body">
                    <?php
                    $startDate = date("jS F Y - g:iA", $event->startTime);
                    echo $startDate;
                    ?>
                </div>
            </li>
            <li class="card mini">
                <span class="title">
                    Ends At
                </span>
                <div class="body">
                    <?php
                    $endDate = date("jS F Y - g:iA", $event->endTime);
                    echo $endDate;
                    ?>
                </div>
            </li>
            <li class="card mini">
                <span class="title">
                    Tickets Left
                </span>
                <div class="body">some cool body</div>
            </li>
        </ul>
    </section>
</body>

</html>