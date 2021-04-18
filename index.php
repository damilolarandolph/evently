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
    <?php
    if (count($eventsClosingSoon) > 0) {
        echo "<section class='home-section'>
        <h4 class='title'>Closing Soon⏱️</h4>
        <div class='content'>
        ";
        foreach ($eventsClosingSoon as $event) {
            echo genEventPreviewCard($event);
        }

        echo "</div></section>";
    }
    ?>

    <?php
    $newlyAdded =  $eventRepo->getNewlyAddedEvents();

    if (count($newlyAdded) > 0) {
        echo "<section class='home-section'>
        <h4 class='title'>Newly Added🆕</h4>
        <div class='content'>
        ";

        foreach ($newlyAdded as $event) {
            echo genEventPreviewCard($event);
        }

        echo "</div></section>";
    }
    ?>
    <?php
    $moreEvents =  $eventRepo->getMoreEvents();

    if (count($moreEvents) > 0) {
        echo "<section class='home-section'>
        <h4 class='title'>Newly Added🆕</h4>
        <div class='content'>
        ";

        foreach ($moreEvents as $event) {
            echo genEventPreviewCard($event);
        }

        echo "</div></section>";
    }
    ?>


    <?php require_once __DIR__ . "/src/partials/footer.php" ?>
</body>
<script src="/assets/js/dayjs.min.js"></script>
<script src="/assets/js/common.js"></script>

</html>