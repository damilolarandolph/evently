<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon-16x16.png">
    <link rel="stylesheet" href="./assets/css/all.min.css" />
    <link rel="stylesheet" href="./assets/css/common.css" />
    <link rel="stylesheet" href="./assets/css/add-event.css" />

    <title>Add Event</title>
</head>

<body>
    <?php
    include_once __DIR__ . "/src/partials/navbar.php";
    ?>

    <section>
        <h2 class="heading">Create Event</h2>
        <form id="add-form" class="form add-event-form">
            <div class="event-title">
                <input placeholder="event title..." name="title" type="text" />
            </div>
            <div class="form-group event-description">
                <label>Description</label>
                <textarea>event description</textarea>
            </div>
            <div class="form-group">
                <label>Event image link</label>
                <input placeholder="please enter image link" name="image-link" type="url" />
            </div>
            <div class="form-groups">
                <div class="form-group">
                    <label>Start Date</label>
                    <input type="date" placeholder="enter start date" name="start-date" />
                </div>
                <div class="form-group">
                    <label>Start Time</label>
                    <select name="start-time" class="time-list">
                    </select>
                </div>
            </div>
            <div class="form-groups">
                <div class="form-group">
                    <label>End Date</label>
                    <input type="date" placeholder="enter start date" />
                </div>
                <div class="form-group">
                    <label>End Time</label>
                    <select class="time-list">
                    </select>
                </div>
            </div>
            <div class="form-groups">
                <div class="form-group">
                    <label>Speaker</label>
                    <input name="speaker" />
                </div>
                <div class="form-group">
                    <label>Number of Tickets</label>
                    <input name="num-tickets" type="number" />
                </div>
            </div>
            <div class="form-group">
                <label>
                    Location
                </label>
                <ul for="venue-tabs" class="inline form-groups radio-tabs">
                    <label class="radio">
                        <input type="radio" name="venue" />
                        <div class="content">
                            <i class="fas fa-check"></i>
                            Venue
                        </div>
                    </label>
                    <label class="radio">
                        <input type="radio" name="venue" />
                        <div class="content">
                            <i class="fas fa-check"></i>
                            Online
                        </div>
                    </label>
                </ul>
                <ul id="venue-tabs" class="tabs">
                    <div class="form-group">
                        <input placeholder="type to search for locations" id="map-suggestions" required type="text" name="location" />
                        <input type="hidden" name="lat" />
                        <input type="hidden" name="long" />
                    </div>
                    <div class="form-group">
                        <input placeholder="Please enter meeting link, e.g zoom, skype, google meet" required type="text" name="location" />
                    </div>
                </ul>
            </div>

        </form>
    </section>

</body>
<script src="/assets/js/common.js"></script>

<?php
include_once __DIR__ . "/src/utils/keystore.php";
$key = $Keystore->getKey(Keys::$GOOGLE_PLACES);
?>

<script async src="https://maps.googleapis.com/maps/api/js?key=<?php echo $key ?>&libraries=places&callback=startMap"></script>;
<script>
    let searchBox;
    let form = document.getElementById(" add-form")

    function startMap(args) {
        let input = document.getElementById("map-suggestions")
        searchBox = new google.maps.places.SearchBox(input)
        console.log(searchBox)
        searchBox.addListener("places_changed", () => {
            const places = searchBox.getPlaces()
            form.elements["lat"].value = places[0].geometry.location.lat()
            form.elements['long'].value = places[0].geometry.location.lng()
            console.log(form.elements["lat"].value)
        })

    }
</script>


</html>