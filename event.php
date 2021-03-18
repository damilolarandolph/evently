<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
                <img src="/assets/images/placeholder_avatar.jpg" />
            </div>
            <aside>
                <h2 class="event-title">Event Title</h2>
                <ul class="badges event-badges">
                    <li class="badge">
                        <i class="fas fa-check"></i>
                        <span>Attending</span>
                    </li>
                    <li class="badge">
                        <i class="fas fa-check"></i>
                        <span>Hello</span>
                    </li>
                </ul>
                <p class="event-details">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab illo
                    eius vero nostrum repudiandae amet, optio sapiente illum
                    necessitatibus inventore distinctio perferendis at tempora expedita
                    magnam id ex doloremque et.
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab illo
                    eius vero nostrum repudiandae amet, optio sapiente illum
                    necessitatibus inventore distinctio perferendis at tempora expedita
                    magnam id ex doloremque et.
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab illo
                    eius vero nostrum repudiandae amet, optio sapiente illum
                    necessitatibus inventore distinctio perferendis at tempora expedita
                    magnam id ex doloremque et.
                </p>
                <button class="ui-button attend-button">
                    <i class="fas fa-ticket-alt"></i> Attend</button>
            </aside>
        </div>
    </section>
</body>

</html>