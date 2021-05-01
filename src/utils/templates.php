<?php
require_once __DIR__ . "/../data/models/event.php";


/**
 * 
 * Generates the HTML for the preview card of a given
 * event.
 * 
 * @param Event $event
 * 
 * @return string
 */
function genEventPreviewCard($event)
{
    $startDate = date("jS F Y", $event->startTime);
    $endDate = date("jS F Y", $event->endTime);
    $endTime = date("g:iA", $event->endTime);
    $startTime = date("g:iA", $event->startTime);
    $endDate = $startDate === $endDate ? "" : " - " . $endDate;
    $location = $event->isOnline ? "Remote" : $event->location;
    $name = htmlspecialchars($event->name);
    return "<a href='/event.php?event={$event->id}' class='preview-card'>
                <div>
                    <img class='image' src='{$event->image}' />
                </div>
                <div class='content'>
                    <h2 class='title'>{$name}</h2>
                    <ul class='extra-details'>
                        <li>
                            <i class='far fa-clock'></i>
                            {$startTime} - {$endTime}
                        </li>
                        <li>
                            <i class='far fa-calendar-alt'></i>
                            {$startDate}{$endDate}
                        </li>
                        <li>
                            <i class='fas fa-map-marked-alt'></i>
                            {$location}
                        </li>
                    </ul>
                </div>
            </a>";
}


/**
 * Generates a countdown preview card for an event
 * 
 * @param Event $event
 * 
 * @return string
 */

function genEventCountdownCard($event)
{

    $startDate = date("jS F Y", $event->startTime);
    $endDate = date("jS F Y", $event->endTime);
    $endTime = date("g:iA", $event->endTime);
    $startTime = date("g:iA", $event->startTime);
    $endDate = $startDate === $endDate ? "" : " - " . $endDate;
    $location = $event->isOnline ? "Remote" : $event->location;
    $reservationsLeft = $event->tickets == 0 ? "Unlimited" : $event->getTicketsLeft();
    $name = htmlspecialchars($event->name);
    echo " <a href='/event.php?event={$event->id}' class='upcoming-event'>
            <main class='content'>
                <h4 class='title'>{$name}</h4>
                <img class='event-image' src='{$event->image}' />
                <ul class='extra-details'>
                    <li>
                        <i class='far fa-clock'></i>
                        {$startTime} - {$endTime}
                    </li>
                    <li>
                        <i class='far fa-calendar-alt'></i>
                            {$startDate}{$endDate}
                    </li>
                    <li>
                        <i class='fas fa-map-marked-alt'></i>

                            {$location}
                    </li>
                </ul>
            </main>
            <div class='kitchen-sink'>
                <div class='item'>
                    <p>Reservations Left</p>
                    <h5>{$reservationsLeft}</h5>
                </div>
                <div class='item'>
                    <p>Event registeration ends in</p>
                    <h5 class='countdown' endTime='{$event->endTime}'></h5>
                </div>

            </div>
        </a>";
}
