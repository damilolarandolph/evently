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
    $location = $event->isOnline ? $event->location : "Remote";
    return "<div class='preview-card'>
                <div>
                    <img class='image' src='{$event->image}' />
                </div>
                <div class='content'>
                    <h2 class='title'>{$event->name}</h2>
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
            </div>";
}
