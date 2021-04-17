<!DOCTYPE html>
<html lang="en">
<?php require_once __DIR__ . "/src/routes/edit-event.php"; ?>

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

    <title>Edit Event</title>
</head>

<body>
    <?php
    include_once __DIR__ . "/src/partials/navbar.php";
    ?>

    <section>
        <h2 class="heading">Edit Event</h2>
        <form id="add-form" method="POST" class="form add-event-form ">
            <div class="form-group event-title">
                <label>Title</label>
                <input required value="<?php echo $event->name ?>" placeholder="event title..." name="title" type="text" />
            </div>
            <div class="form-group event-description required">
                <label>Description</label>
                <textarea required placeholder="enter description" name="description"><?php echo $event->description ?></textarea>
            </div>
            <div class="form-group">
                <label>Event image link</label>
                <input value="<?php echo $event->image ?>" placeholder="please enter image link" name="imageLink" type="url" />
            </div>
            <div class="form-groups">
                <div class="form-group required">
                    <label>Event Type</label>
                    <select name="eventType">
                        <?php
                        foreach ($types as $type) {
                            $seleted = $type->id == $event->getType()->id ? "selected" : "";
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
                            $seleted = $category->id == $event->getCategory()->id ? "selected" : "";
                            echo "<option {$seleted} value=\"{$category->id}\">$category->name </option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Time Delay</label>
                <input type="number" placeholder="Delay the start time by this amount of hours" name="timeDelay" />
            </div>



            <div class="form-groups">
                <div class="form-group">
                    <label>Speaker(s)</label>
                    <input name="speaker" value="<?php echo $event->speaker; ?>" type="text" />
                </div>
                <div class="form-group">
                    <label>Number of Tickets</label>
                    <input name="tickets" value="<?php echo $event->tickets; ?>" type="number" />
                </div>
            </div>

            <div class="form-group required">
                <label>
                    Location
                </label>
                <?php
                if (!$event->isOnline) {
                    echo "
                        <input required value='{$event->location}' placeholder='type to search for locations' id='map-suggestions' type='text' name='location' /> ";
                } else {
                    echo " 
                        <input value='{$event->meetingLink}' placeholder='Please enter meeting link, e.g zoom, skype, google meet' type='url' name='meetingLink' />
                    ";
                }
                ?>
            </div>

            <div class="row">
                <button class="ui-button" type="submit">Submit</button>
            </div>

        </form>
    </section>

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