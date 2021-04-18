<!DOCTYPE html>
<html lang="en">
<?php require_once __DIR__ . "/src/routes/add-event.php"; ?>

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
        <form id="add-form" method="POST" class="form add-event-form <?php $checker->getFoundErrors() ? print("has-errors") : ""; ?>">
            <div class="form-group event-title required">
                <label>Title</label>
                <input required value="<?php print($checker->getFieldData('title')) ?>" placeholder="event title..." name="title" type="text" />
                <p class="error"><?php print($checker->getFieldError('title')) ?></p>
            </div>
            <div class="form-group event-description required">
                <label>Description</label>
                <textarea required placeholder="enter description" name="description"><?php print($checker->getFieldData('description')); ?></textarea>
                <p class="error"><?php print($checker->getFieldError('description')); ?></p>
            </div>
            <div class="form-group">
                <label>Event image link</label>
                <input value="<?php print($checker->getFieldData('imageLink'));  ?>" placeholder="please enter image link" name="imageLink" type="url" />
                <p class="error"><?php print($checker->getFieldError('description')); ?></p>
            </div>
            <div class="form-groups">
                <div class="form-group required">
                    <label>Event Type</label>
                    <select name="eventType">
                        <?php
                        foreach ($types as $type) {
                            $seleted = $type->id == $checker->getFieldData('eventType');
                            echo "<option {$seleted} value=\"{$type->id}\">$type->name </option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group required">
                    <label>Event Category</label>
                    <select name="eventCategory">
                        <?php
                        foreach ($categories as $category) {
                            $seleted = $category->id == $checker->getFieldData('eventCategory');
                            echo "<option value=\"{$category->id}\">$category->name </option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-groups">
                <div class="form-group required">
                    <label>Start Date</label>
                    <input value="<?php print($checker->getFieldData('startDate')) ?>" required type="date" placeholder="enter start date" name="startDate" />
                    <p class="error"><?php print($checker->getFieldError('startDate')); ?></p>
                    <p class="error"><?php print($checker->getFieldError('startDateTime')); ?></p>
                </div>
                <div class="form-group required">
                    <label>End Date</label>
                    <input type="date" value="<?php print($checker->getFieldData('endDate')); ?>" required name="endDate" placeholder="enter end date" />
                    <p class="error"><?php print($checker->getFieldError('endDate')); ?></p>
                    <p class="error"><?php print($checker->getFieldError('endDateTime')); ?></p>
                    <p class="error"><?php print($checker->getFieldError('eventDuration')); ?></p>
                </div>
            </div>
            <div class="form-groups">
                <div class="form-group required">
                    <label>Start Time</label>
                    <select required name="startTime">
                        <option> 00:00 </option>
                        <option>00:30 </option>
                        <option> 01:00 </option>
                        <option>01:30 </option>
                        <option> 02:00 </option>
                        <option>02:30 </option>
                        <option> 03:00 </option>
                        <option>03:30 </option>
                        <option> 04:00 </option>
                        <option>04:30 </option>
                        <option> 05:00 </option>
                        <option>05:30 </option>
                        <option> 06:00 </option>
                        <option>06:30 </option>
                        <option> 07:00 </option>
                        <option>07:30 </option>
                        <option> 08:00 </option>
                        <option>08:30 </option>
                        <option> 09:00 </option>
                        <option>09:30 </option>
                        <option> 10:00 </option>
                        <option>10:30 </option>
                        <option> 11:00 </option>
                        <option>11:30 </option>
                        <option> 12:00 </option>
                        <option>12:30 </option>
                        <option> 13:00 </option>
                        <option>13:30 </option>
                        <option> 14:00 </option>
                        <option>14:30 </option>
                        <option> 15:00 </option>
                        <option>15:30 </option>
                        <option> 16:00 </option>
                        <option>16:30 </option>
                        <option> 17:00 </option>
                        <option>17:30 </option>
                        <option> 18:00 </option>
                        <option>18:30 </option>
                        <option> 19:00 </option>
                        <option>19:30 </option>
                        <option> 20:00 </option>
                        <option>20:30 </option>
                        <option> 21:00 </option>
                        <option>21:30 </option>
                        <option> 22:00 </option>
                        <option>22:30 </option>
                        <option> 23:00 </option>
                        <option>23:30 </option>
                    </select>
                    <p class="error"><?php print($checker->getFieldError('startDateTime')); ?></p>
                </div>

                <div class="form-group required">
                    <label>End Time</label>
                    <select required name="endTime">

                        <option> 00:00 </option>
                        <option>00:30 </option>
                        <option> 01:00 </option>
                        <option>01:30 </option>
                        <option> 02:00 </option>
                        <option>02:30 </option>
                        <option> 03:00 </option>
                        <option>03:30 </option>
                        <option> 04:00 </option>
                        <option>04:30 </option>
                        <option> 05:00 </option>
                        <option>05:30 </option>
                        <option> 06:00 </option>
                        <option>06:30 </option>
                        <option> 07:00 </option>
                        <option>07:30 </option>
                        <option> 08:00 </option>
                        <option>08:30 </option>
                        <option> 09:00 </option>
                        <option>09:30 </option>
                        <option> 10:00 </option>
                        <option>10:30 </option>
                        <option> 11:00 </option>
                        <option>11:30 </option>
                        <option> 12:00 </option>
                        <option>12:30 </option>
                        <option> 13:00 </option>
                        <option>13:30 </option>
                        <option> 14:00 </option>
                        <option>14:30 </option>
                        <option> 15:00 </option>
                        <option>15:30 </option>
                        <option> 16:00 </option>
                        <option>16:30 </option>
                        <option> 17:00 </option>
                        <option>17:30 </option>
                        <option> 18:00 </option>
                        <option>18:30 </option>
                        <option> 19:00 </option>
                        <option>19:30 </option>
                        <option> 20:00 </option>
                        <option>20:30 </option>
                        <option> 21:00 </option>
                        <option>21:30 </option>
                        <option> 22:00 </option>
                        <option>22:30 </option>
                        <option> 23:00 </option>
                        <option>23:30 </option>

                    </select>
                    <p class="error"><?php print($checker->getFieldError('endDateTime')); ?></p>
                    <p class="error"><?php print($checker->getFieldError('eventDuration')); ?></p>
                </div>
            </div>
            <div class="form-groups">
                <div class="form-group">
                    <label>Speaker(s)</label>
                    <input name="speaker" type="text" />
                    <p class="hint">List of speakers as a comma separated list</p>
                </div>
                <div class="form-group">
                    <label>Number of Tickets</label>
                    <input name="tickets" type="number" />
                    <p class="hint">If left blank, there will be an unlimited amount of tickets available</p>
                </div>
            </div>
            <div class="form-group required">
                <label>
                    Location
                </label>
                <ul for="venue-tabs" class="inline form-groups radio-tabs">
                    <label class="radio">
                        <input type="radio" class="selected" name="venue" value="physical" />
                        <div class="content">
                            <i class="fas fa-check"></i>
                            Venue
                        </div>
                    </label>
                    <label class="radio">
                        <input type="radio" name="venue" value="remote" />
                        <div class="content">
                            <i class="fas fa-check"></i>
                            Online
                        </div>
                    </label>
                </ul>
                <ul id="venue-tabs" class="tabs">
                    <div class="form-group">
                        <input required value="<?php print($checker->getFieldData('location')) ?>" placeholder="type to search for locations" id="map-suggestions" type="text" name="location" />
                        <input value="<?php print($checker->getFieldData('lat')) ?>" type="hidden" name="lat" />
                        <input value="<?php print($checker->getFieldData('long')) ?>" type="hidden" name="long" />
                    </div>
                    <div class="form-group">
                        <input value="<?php print($checker->getFieldData('meetingLink')); ?>" placeholder="Please enter meeting link, e.g zoom, skype, google meet" type="url" name="meetingLink" />
                    </div>
                </ul>
                <p class="error"><?php print($checker->getFieldError('venue')); ?></p>
            </div>

            <div class="row">
                <button class="ui-button" type="submit">Submit</button>
            </div>

        </form>
    </section>

    <?php require_once __DIR__ . "/src/partials/footer.php" ?>
</body>
<script src="/assets/js/common.js"></script>

<?php
include_once __DIR__ . "/src/utils/keystore.php";
$key = $Keystore->getKey(Keys::$GOOGLE_PLACES);
?>

<script async src="https://maps.googleapis.com/maps/api/js?key=<?php echo $key ?>&libraries=places&callback=startMap"></script>
<script>
    let searchBox;
    let form = document.getElementById("add-form")
    let dateControls = document.querySelectorAll('input[type="date"]');
    let currentDate = new Date(Date.now());
    Date.prototype.htmlDateString = function() {
        return this.getFullYear() + "-" +
            ((this.getMonth() + 1) > 9 ? this.getMonth() + 1 : "0" + (this.getMonth() + 1)) +
            "-" +
            (this.getDate() > 9 ? this.getDate() : "0" + this.getDate());
    }
    form.elements['startDate'].min = currentDate.htmlDateString();
    form.elements['endDate'].min = currentDate.htmlDateString();
    // for (let dateControl of dateControls) {
    //     dateControl.min = dateString
    // }

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

    Date.parseFormDate = function(date, time) {
        let timeSections = time.value.split(":");
        let hours = Number(timeSections[0]);
        let mins = Number(timeSections[1]);
        if (date.value == "") {
            let date = new Date(Date.now());
            date.setHours(hours);
            date.setMinutes(mins);
            return date;
        } else {
            let dateSections = date.value.split("-");
            let year = Number(dateSections[0]);
            let month = Number(dateSections[1]) - 1;
            let accDate = Number(dateSections[2]);
            return new Date(year, month, accDate, hours, mins);
        }
    }
    /** 
     * @param {Date} compareTo
     */
    Date.prototype.isGreaterThan = function(compareTo) {
        return this.getTime() > compareTo.getTime();
    }

    /**
     * @returns {Date} 
     * */
    function getStartDate() {
        return Date.parseFormDate(form.elements['startDate'], form.elements['startTime']);
    }
    /**
     * @returns {Date} 
     * */
    function getEndDate() {
        return Date.parseFormDate(form.elements['endDate'], form.elements['endTime']);
    }

    function checkDate() {
        let now = new Date(Date.now());
        if (!getEndDate().isGreaterThan(now)) {
            alert("End date should be later than the current time");
            return false;
        }
        if (!getStartDate().isGreaterThan(now)) {
            alert("start date should be later than the current time");
            return false;
        }
        if (!getEndDate().isGreaterThan(getStartDate())) {
            alert("The end date should be at a later time than the start date");
            return false;
        }

        return true;

    }

    form.elements['startDate'].addEventListener("change", function(event) {
        checkDate();
    });

    form.elements['endDate'].addEventListener("change", function(event) {
        checkDate();
    });
    form.elements['startTime'].addEventListener("change", function(event) {
        checkDate();
    });
    form.elements['endTime'].addEventListener("change", function(event) {
        checkDate();
    });

    form.addEventListener('submit', function(event) {
        if (!checkDate()) {
            console.log("hello");
            event.preventDefault();
        }
    });

    document.querySelectorAll("input[name='venue']").forEach((elem) => {
        elem.addEventListener('change', function(event) {
            if (event.target.value == 'physical') {
                form.elements['meetingLink'].required = false;
                form.elements['location'].required = true;
                return;
            }
            form.elements['meetingLink'].required = true;
            form.elements['location'].required = false;
        });
    })
</script>


</html>