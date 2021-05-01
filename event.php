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
    <link rel="stylesheet" href="/assets/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="./assets/css/all.min.css" />
    <link rel="stylesheet" href="./assets/css/common.css" />
    <link rel="stylesheet" href="./assets/css/view-event.css" />
    <title>Event Name</title>
    <style>
        /*
 * Table styles
 */
        table.dataTable {
            width: 100%;
            margin: 0 auto;
            clear: both;
            border-collapse: separate;
            border-spacing: 0;
            /*
   * Header and footer styles
   */
            /*
   * Body styles
   */
        }

        table.dataTable thead th,
        table.dataTable tfoot th {
            font-weight: bold;
        }

        table.dataTable thead th,
        table.dataTable thead td {
            padding: 10px 18px;
            border-bottom: 1px solid #114b5f;
        }

        table.dataTable thead th:active,
        table.dataTable thead td:active {
            outline: none;
        }

        table.dataTable tfoot th,
        table.dataTable tfoot td {
            padding: 10px 18px 6px 18px;
            border-top: 1px solid #114b5f;
        }

        table.dataTable thead .sorting,
        table.dataTable thead .sorting_asc,
        table.dataTable thead .sorting_desc,
        table.dataTable thead .sorting_asc_disabled,
        table.dataTable thead .sorting_desc_disabled {
            cursor: pointer;
            *cursor: hand;
            background-repeat: no-repeat;
            background-position: center right;
        }

        table.dataTable thead .sorting {
            background-image: url("../images/sort_both.png");
        }

        table.dataTable thead .sorting_asc {
            background-image: url("../images/sort_asc.png") !important;
        }

        table.dataTable thead .sorting_desc {
            background-image: url("../images/sort_desc.png") !important;
        }

        table.dataTable thead .sorting_asc_disabled {
            background-image: url("../images/sort_asc_disabled.png");
        }

        table.dataTable thead .sorting_desc_disabled {
            background-image: url("../images/sort_desc_disabled.png");
        }

        table.dataTable tbody tr {
            background-color: #c6dabf;
        }

        table.dataTable tbody tr.selected {
            background-color: #b0bed9;
        }

        table.dataTable tbody th,
        table.dataTable tbody td {
            padding: 8px 10px;
        }

        table.dataTable.row-border tbody th,
        table.dataTable.row-border tbody td,
        table.dataTable.display tbody th,
        table.dataTable.display tbody td {
            border-top: 1px solid #dddddd;
        }

        table.dataTable.row-border tbody tr:first-child th,
        table.dataTable.row-border tbody tr:first-child td,
        table.dataTable.display tbody tr:first-child th,
        table.dataTable.display tbody tr:first-child td {
            border-top: none;
        }

        table.dataTable.cell-border tbody th,
        table.dataTable.cell-border tbody td {
            border-top: 1px solid #dddddd;
            border-right: 1px solid #dddddd;
        }

        table.dataTable.cell-border tbody tr th:first-child,
        table.dataTable.cell-border tbody tr td:first-child {
            border-left: 1px solid #dddddd;
        }

        table.dataTable.cell-border tbody tr:first-child th,
        table.dataTable.cell-border tbody tr:first-child td {
            border-top: none;
        }

        table.dataTable.stripe tbody tr.odd,
        table.dataTable.display tbody tr.odd {
            background-color: #c1d5bb;
        }

        table.dataTable.stripe tbody tr.odd.selected,
        table.dataTable.display tbody tr.odd.selected {
            background-color: #acbad4;
        }

        table.dataTable.hover tbody tr:hover,
        table.dataTable.display tbody tr:hover {
            background-color: #bfd2b8;
        }

        table.dataTable.hover tbody tr:hover.selected,
        table.dataTable.display tbody tr:hover.selected {
            background-color: #aab7d1;
        }

        table.dataTable.order-column tbody tr>.sorting_1,
        table.dataTable.order-column tbody tr>.sorting_2,
        table.dataTable.order-column tbody tr>.sorting_3,
        table.dataTable.display tbody tr>.sorting_1,
        table.dataTable.display tbody tr>.sorting_2,
        table.dataTable.display tbody tr>.sorting_3 {
            background-color: #c2d6bb;
        }

        table.dataTable.order-column tbody tr.selected>.sorting_1,
        table.dataTable.order-column tbody tr.selected>.sorting_2,
        table.dataTable.order-column tbody tr.selected>.sorting_3,
        table.dataTable.display tbody tr.selected>.sorting_1,
        table.dataTable.display tbody tr.selected>.sorting_2,
        table.dataTable.display tbody tr.selected>.sorting_3 {
            background-color: #acbad5;
        }

        table.dataTable.display tbody tr.odd>.sorting_1,
        table.dataTable.order-column.stripe tbody tr.odd>.sorting_1 {
            background-color: #bbceb5;
        }

        table.dataTable.display tbody tr.odd>.sorting_2,
        table.dataTable.order-column.stripe tbody tr.odd>.sorting_2 {
            background-color: #bdd0b6;
        }

        table.dataTable.display tbody tr.odd>.sorting_3,
        table.dataTable.order-column.stripe tbody tr.odd>.sorting_3 {
            background-color: #bed1b8;
        }

        table.dataTable.display tbody tr.odd.selected>.sorting_1,
        table.dataTable.order-column.stripe tbody tr.odd.selected>.sorting_1 {
            background-color: #a6b4cd;
        }

        table.dataTable.display tbody tr.odd.selected>.sorting_2,
        table.dataTable.order-column.stripe tbody tr.odd.selected>.sorting_2 {
            background-color: #a8b5cf;
        }

        table.dataTable.display tbody tr.odd.selected>.sorting_3,
        table.dataTable.order-column.stripe tbody tr.odd.selected>.sorting_3 {
            background-color: #a9b7d1;
        }

        table.dataTable.display tbody tr.even>.sorting_1,
        table.dataTable.order-column.stripe tbody tr.even>.sorting_1 {
            background-color: #c2d6bb;
        }

        table.dataTable.display tbody tr.even>.sorting_2,
        table.dataTable.order-column.stripe tbody tr.even>.sorting_2 {
            background-color: #c4d7bd;
        }

        table.dataTable.display tbody tr.even>.sorting_3,
        table.dataTable.order-column.stripe tbody tr.even>.sorting_3 {
            background-color: #c5d9be;
        }

        table.dataTable.display tbody tr.even.selected>.sorting_1,
        table.dataTable.order-column.stripe tbody tr.even.selected>.sorting_1 {
            background-color: #acbad5;
        }

        table.dataTable.display tbody tr.even.selected>.sorting_2,
        table.dataTable.order-column.stripe tbody tr.even.selected>.sorting_2 {
            background-color: #aebcd6;
        }

        table.dataTable.display tbody tr.even.selected>.sorting_3,
        table.dataTable.order-column.stripe tbody tr.even.selected>.sorting_3 {
            background-color: #afbdd8;
        }

        table.dataTable.display tbody tr:hover>.sorting_1,
        table.dataTable.order-column.hover tbody tr:hover>.sorting_1 {
            background-color: #b6c8af;
        }

        table.dataTable.display tbody tr:hover>.sorting_2,
        table.dataTable.order-column.hover tbody tr:hover>.sorting_2 {
            background-color: #b7cab1;
        }

        table.dataTable.display tbody tr:hover>.sorting_3,
        table.dataTable.order-column.hover tbody tr:hover>.sorting_3 {
            background-color: #baccb3;
        }

        table.dataTable.display tbody tr:hover.selected>.sorting_1,
        table.dataTable.order-column.hover tbody tr:hover.selected>.sorting_1 {
            background-color: #a2aec7;
        }

        table.dataTable.display tbody tr:hover.selected>.sorting_2,
        table.dataTable.order-column.hover tbody tr:hover.selected>.sorting_2 {
            background-color: #a3b0c9;
        }

        table.dataTable.display tbody tr:hover.selected>.sorting_3,
        table.dataTable.order-column.hover tbody tr:hover.selected>.sorting_3 {
            background-color: #a5b2cb;
        }

        table.dataTable.no-footer {
            border-bottom: 1px solid #114b5f;
        }

        table.dataTable.nowrap th,
        table.dataTable.nowrap td {
            white-space: nowrap;
        }

        table.dataTable.compact thead th,
        table.dataTable.compact thead td {
            padding: 4px 17px;
        }

        table.dataTable.compact tfoot th,
        table.dataTable.compact tfoot td {
            padding: 4px;
        }

        table.dataTable.compact tbody th,
        table.dataTable.compact tbody td {
            padding: 4px;
        }

        table.dataTable th.dt-left,
        table.dataTable td.dt-left {
            text-align: left;
        }

        table.dataTable th.dt-center,
        table.dataTable td.dt-center,
        table.dataTable td.dataTables_empty {
            text-align: center;
        }

        table.dataTable th.dt-right,
        table.dataTable td.dt-right {
            text-align: right;
        }

        table.dataTable th.dt-justify,
        table.dataTable td.dt-justify {
            text-align: justify;
        }

        table.dataTable th.dt-nowrap,
        table.dataTable td.dt-nowrap {
            white-space: nowrap;
        }

        table.dataTable thead th.dt-head-left,
        table.dataTable thead td.dt-head-left,
        table.dataTable tfoot th.dt-head-left,
        table.dataTable tfoot td.dt-head-left {
            text-align: left;
        }

        table.dataTable thead th.dt-head-center,
        table.dataTable thead td.dt-head-center,
        table.dataTable tfoot th.dt-head-center,
        table.dataTable tfoot td.dt-head-center {
            text-align: center;
        }

        table.dataTable thead th.dt-head-right,
        table.dataTable thead td.dt-head-right,
        table.dataTable tfoot th.dt-head-right,
        table.dataTable tfoot td.dt-head-right {
            text-align: right;
        }

        table.dataTable thead th.dt-head-justify,
        table.dataTable thead td.dt-head-justify,
        table.dataTable tfoot th.dt-head-justify,
        table.dataTable tfoot td.dt-head-justify {
            text-align: justify;
        }

        table.dataTable thead th.dt-head-nowrap,
        table.dataTable thead td.dt-head-nowrap,
        table.dataTable tfoot th.dt-head-nowrap,
        table.dataTable tfoot td.dt-head-nowrap {
            white-space: nowrap;
        }

        table.dataTable tbody th.dt-body-left,
        table.dataTable tbody td.dt-body-left {
            text-align: left;
        }

        table.dataTable tbody th.dt-body-center,
        table.dataTable tbody td.dt-body-center {
            text-align: center;
        }

        table.dataTable tbody th.dt-body-right,
        table.dataTable tbody td.dt-body-right {
            text-align: right;
        }

        table.dataTable tbody th.dt-body-justify,
        table.dataTable tbody td.dt-body-justify {
            text-align: justify;
        }

        table.dataTable tbody th.dt-body-nowrap,
        table.dataTable tbody td.dt-body-nowrap {
            white-space: nowrap;
        }

        table.dataTable,
        table.dataTable th,
        table.dataTable td {
            box-sizing: content-box;
        }

        /*
 * Control feature layout
 */
        .dataTables_wrapper {
            position: relative;
            clear: both;
            *zoom: 1;
            zoom: 1;
        }

        .dataTables_wrapper .dataTables_length {
            float: left;
        }

        .dataTables_wrapper .dataTables_length select {
            border: 1px solid #aaa;
            border-radius: 3px;
            padding: 5px;
            background-color: transparent;
            padding: 4px;
        }

        .dataTables_wrapper .dataTables_filter {
            float: right;
            text-align: right;
        }

        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #aaa;
            border-radius: 3px;
            padding: 5px;
            background-color: transparent;
            margin-left: 3px;
        }

        .dataTables_wrapper .dataTables_info {
            clear: both;
            float: left;
            padding-top: 0.755em;
        }

        .dataTables_wrapper .dataTables_paginate {
            float: right;
            text-align: right;
            padding-top: 0.25em;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            box-sizing: border-box;
            display: inline-block;
            min-width: 1.5em;
            padding: 0.5em 1em;
            margin-left: 2px;
            text-align: center;
            text-decoration: none !important;
            cursor: pointer;
            *cursor: hand;
            color: #1a936f !important;
            border: 1px solid transparent;
            border-radius: 2px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            color: #1a936f !important;
            border: 1px solid #979797;
            background-color: white;
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, white), color-stop(100%, #dcdcdc));
            /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(top, white 0%, #dcdcdc 100%);
            /* Chrome10+,Safari5.1+ */
            background: -moz-linear-gradient(top, white 0%, #dcdcdc 100%);
            /* FF3.6+ */
            background: -ms-linear-gradient(top, white 0%, #dcdcdc 100%);
            /* IE10+ */
            background: -o-linear-gradient(top, white 0%, #dcdcdc 100%);
            /* Opera 11.10+ */
            background: linear-gradient(to bottom, white 0%, #dcdcdc 100%);
            /* W3C */
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled,
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover,
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
            cursor: default;
            color: #666 !important;
            border: 1px solid transparent;
            background: transparent;
            box-shadow: none;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: white !important;
            border: 1px solid #1a936f;
            background-color: #5ae2b9;
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #5ae2b9), color-stop(100%, #1a936f));
            /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(top, #5ae2b9 0%, #1a936f 100%);
            /* Chrome10+,Safari5.1+ */
            background: -moz-linear-gradient(top, #5ae2b9 0%, #1a936f 100%);
            /* FF3.6+ */
            background: -ms-linear-gradient(top, #5ae2b9 0%, #1a936f 100%);
            /* IE10+ */
            background: -o-linear-gradient(top, #5ae2b9 0%, #1a936f 100%);
            /* Opera 11.10+ */
            background: linear-gradient(to bottom, #5ae2b9 0%, #1a936f 100%);
            /* W3C */
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:active {
            outline: none;
            background-color: #22be90;
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #22be90), color-stop(100%, #188a68));
            /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(top, #22be90 0%, #188a68 100%);
            /* Chrome10+,Safari5.1+ */
            background: -moz-linear-gradient(top, #22be90 0%, #188a68 100%);
            /* FF3.6+ */
            background: -ms-linear-gradient(top, #22be90 0%, #188a68 100%);
            /* IE10+ */
            background: -o-linear-gradient(top, #22be90 0%, #188a68 100%);
            /* Opera 11.10+ */
            background: linear-gradient(to bottom, #22be90 0%, #188a68 100%);
            /* W3C */
            box-shadow: inset 0 0 3px #111;
        }

        .dataTables_wrapper .dataTables_paginate .ellipsis {
            padding: 0 1em;
        }

        .dataTables_wrapper .dataTables_processing {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 40px;
            margin-left: -50%;
            margin-top: -25px;
            padding-top: 20px;
            text-align: center;
            font-size: 1.2em;
            background-color: white;
            background: -webkit-gradient(linear, left top, right top, color-stop(0%, rgba(198, 218, 191, 0)), color-stop(25%, rgba(198, 218, 191, 0.9)), color-stop(75%, rgba(198, 218, 191, 0.9)), color-stop(100%, rgba(255, 255, 255, 0)));
            background: -webkit-linear-gradient(left, rgba(198, 218, 191, 0) 0%, rgba(198, 218, 191, 0.9) 25%, rgba(198, 218, 191, 0.9) 75%, rgba(198, 218, 191, 0) 100%);
            background: -moz-linear-gradient(left, rgba(198, 218, 191, 0) 0%, rgba(198, 218, 191, 0.9) 25%, rgba(198, 218, 191, 0.9) 75%, rgba(198, 218, 191, 0) 100%);
            background: -ms-linear-gradient(left, rgba(198, 218, 191, 0) 0%, rgba(198, 218, 191, 0.9) 25%, rgba(198, 218, 191, 0.9) 75%, rgba(198, 218, 191, 0) 100%);
            background: -o-linear-gradient(left, rgba(198, 218, 191, 0) 0%, rgba(198, 218, 191, 0.9) 25%, rgba(198, 218, 191, 0.9) 75%, rgba(198, 218, 191, 0) 100%);
            background: linear-gradient(to right, rgba(198, 218, 191, 0) 0%, rgba(198, 218, 191, 0.9) 25%, rgba(198, 218, 191, 0.9) 75%, rgba(198, 218, 191, 0) 100%);
        }

        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_processing,
        .dataTables_wrapper .dataTables_paginate {
            color: #1a936f;
        }

        .dataTables_wrapper .dataTables_scroll {
            clear: both;
        }

        .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody {
            *margin-top: -1px;
            -webkit-overflow-scrolling: touch;
        }

        .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody>table>thead>tr>th,
        .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody>table>thead>tr>td,
        .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody>table>tbody>tr>th,
        .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody>table>tbody>tr>td {
            vertical-align: middle;
        }

        .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody>table>thead>tr>th>div.dataTables_sizing,
        .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody>table>thead>tr>td>div.dataTables_sizing,
        .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody>table>tbody>tr>th>div.dataTables_sizing,
        .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody>table>tbody>tr>td>div.dataTables_sizing {
            height: 0;
            overflow: hidden;
            margin: 0 !important;
            padding: 0 !important;
        }

        .dataTables_wrapper.no-footer .dataTables_scrollBody {
            border-bottom: 1px solid #114b5f;
        }

        .dataTables_wrapper.no-footer div.dataTables_scrollHead table.dataTable,
        .dataTables_wrapper.no-footer div.dataTables_scrollBody>table {
            border-bottom: none;
        }

        .dataTables_wrapper:after {
            visibility: hidden;
            display: block;
            content: "";
            clear: both;
            height: 0;
        }

        @media screen and (max-width: 767px) {

            .dataTables_wrapper .dataTables_info,
            .dataTables_wrapper .dataTables_paginate {
                float: none;
                text-align: center;
            }

            .dataTables_wrapper .dataTables_paginate {
                margin-top: 0.5em;
            }
        }

        @media screen and (max-width: 640px) {

            .dataTables_wrapper .dataTables_length,
            .dataTables_wrapper .dataTables_filter {
                float: none;
                text-align: center;
            }

            .dataTables_wrapper .dataTables_filter {
                margin-top: 0.5em;
            }
        }
    </style>
</head>

<body>
    <?php
    include_once __DIR__ . "/src/partials/navbar.php"
    ?>

    <section class="main-section">
        <div class="first-div" style="background-image: url(<?php echo $event->image; ?>);">
            <div class="preview-image">
                <img src="<?php echo $event->image; ?>" />
            </div>
            <aside>
                <h2 class="event-title"><?php echo htmlspecialchars($event->name); ?></h2>
                <ul class="badges event-badges">
                    <li class="badge">
                        <i class="fas fa-project-diagram"></i>
                        <span><?php echo $event->getType()->name ?></span>
                    </li>
                    <li class="badge">
                        <i class="fas fa-project-diagram"></i>
                        <span><?php echo $event->getCategory()->name ?></span>
                    </li>

                </ul>
                <p class="event-details">
                    <?php echo htmlspecialchars($event->description); ?>
                </p>
                <?php

                if (time() >= $event->startTime) {
                    echo "";
                } else if (getSession() === false) {
                    echo "<a href='/signin.php' class='ui-button attend-button'>
                    <i class='fas fa-ticket-alt'></i> Login to attend</a>";
                } else if ($event->getTicketsLeft() != "Unlimited" && $event->getTicketsLeft() == 0) {
                    echo "";
                } else if (
                    getSession()->user instanceof Organizer &&
                    (getSession()->user->user->email == $event->getOrganizer()->user->email)
                ) {
                    $isOrganizerOfEvent = true;
                    echo " <a href='/edit-event.php?event={$event->id}' class='ui-button attend-button'>
                    <i class='fas fa-pen'></i>   Edit</a>";
                } else if (getSession()->user instanceof Person) {

                    $attendaceText = $reservation !== false ? "Attending" : "Attend";

                    echo "<form method='POST'><button type='submit'class='ui-button attend-button'>
                    <i class='fas fa-ticket-alt'></i> {$attendaceText}</button></form>";
                }

                ?>
            </aside>
        </div>
    </section>
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
Speakers
                </span>
                <div class='body'>
<ul>
$speakersHTML
</ul>
                </div>
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
                <div class="body">

                    <?php
                    echo $event->getTicketsLeft();
                    ?>
                </div>
            </li>
        </ul>
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
    <?php
    if (!empty($isOrganizerOfEvent)) {
        echo ' <section class="stats-sections">
        <h3>Attendee Information</h3>
        <table id="stats"></table>
    </section>';
    }
    ?>

    <?php require_once __DIR__ . "/src/partials/footer.php" ?>
</body>
<script src="/assets/js/jquery-3.6.0.min.js"></script>
<script src="/assets/js/jquery.dataTables.min.js"></script>
<script>
    let data = [
        <?php
        if ($isOrganizerOfEvent) {
            foreach ($event->getReservations() as $reservation) {
                $date = date("j/n/Y", $reservation->reservedAt);
                $time = date("G:i", $reservation->reservedAt);
                $person = $reservation->getPerson();
                $name = $reservation->getPerson()->firstName . " " . $reservation->getPerson()->lastName;
                echo "['{$name}', '{$person->user->email}', '{$person->user->phone}', '{$date}', '{$time}'],";
            }
        }
        ?>
    ];

    $('#stats').DataTable({
        data: data,
        columns: [{
                title: "Name"
            },
            {
                title: "Email"
            },
            {
                title: "Phone"
            },
            {
                title: "Reservation Date"
            },
            {
                title: "Reservation Time"
            },

        ]
    });
</script>

</html>