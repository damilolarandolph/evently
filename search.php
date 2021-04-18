<!DOCTYPE html>
<html lang="en">
<?php
require_once __DIR__ . "/src/routes/search.php";
?>

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
                <h2 id="actualQuery" class="query">Food and Drink</h2>
                <small id="resCount" class="events-found">15 events found</small>
                <form id="search-form" class="form">
                    <div class="search wide search-button alt-ring event-search">
                        <input name="query" value="hey" />
                        <button type="submit" class="ui-button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <div class="form-groups options">
                        <div class="form-group">
                            <label>From Date</label>
                            <input name="fromDate" type="date" value="<?php echo $date ?>" min="<?php echo $date ?>" name="startDate" />
                        </div>
                        <div class="form-group">
                            <label>From Time</label>
                            <select name="fromTime">
                                <option>All</option>
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
                        </div>
                        <!-- <div class="inline form-group">
                            <label class="radio">
                                <input type="checkbox" name="venue" />
                                <div class="content">
                                    <i class="fas fa-check"></i>
                                    Online Only
                                </div>
                            </label>
                        </div> -->

                    </div>
                    <div class="form-groups options">
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category">
                                <option>All</option>
                                <?php
                                foreach ($eventCategories as $category) {
                                    echo "<option value={$category->id}>{$category->name}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <select name="type">
                                <option>All</option>
                                <?php
                                foreach ($eventTypes as $eventType) {
                                    echo "<option value={$eventType->id}>{$eventType->name}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </form>
            </section>

            <section class="results-container">
                <i id="spinner" class="fas fa-spinner loading-spinner hidden"></i>
                <ul id="event-results" class="results"></ul>
            </section>
        </main>
    </div>

    <?php require_once __DIR__ . "/src/partials/footer.php" ?>
</body>
<script src="/assets/js/common.js"></script>
<script src="/assets/js/dayjs-advanced.min.js"></script>
<script src="/assets/js/dayjs.min.js"></script>
<script src="/assets/js/search.js"></script>

</html>