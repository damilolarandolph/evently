<?php
require_once __DIR__ . "/../auth/session.php";

function buildOrganizerOptions()
{
    $name = getSession()->user->name;
    return "<ul class='menu'>
                <li class='fixed'><a>{$name}</a></li>
                <li><a href='/dashboard.php'>Account</a></li>
                <li><a href='/add-event.php'>Create Event</a></li>
            </ul> ";
}

function buildPersonOptions()
{
    $name = getSession()->user->firstName . " " . getSession()->user->lastName;
    return "<ul class='menu'>
                <li class='fixed'><a>{$name}</a></li>
                <li><a href='/dashboard.php'>Account</a></li>
            </ul> 
                
                ";
}

?>

<nav class="head-nav">
    <div class="logo">
        <a href="/">
            <img src="/assets/images/logo.png" />
        </a>
    </div>
    <?php
    if (!str_contains($_SERVER["REQUEST_URI"], "search")) {
        echo '<form method="GET" action="/search.php">
        <div class="search">
            <input name="query" placeholder="Search for events...." type="text" />
        </div>
    </form>';
    }
    ?>
    <div>
        <?php
        $options = getSession() !== false ?  (getSession()->user instanceof Organizer  ?  buildOrganizerOptions() : buildPersonOptions()) : "";

        if (getSession() === false) {
            echo "<div class='button-group'>
            <a title='Login as user or organizer' href='/signin.php'>Login</a>
            <a title='Register as a user' href='/signup.php'>Register</a>
            <a title='Join Evently as an organizer' href='/org-signup.php'>Become an Organizer</a>
        </div>";
        } else {
            echo "<button class='avatar focus-popover-menu'>
            <img class='avatar-img' src='/assets/images/placeholder_avatar.jpg'>
            {$options}
        </button><form class='logout-form' method='POST' action='/logout.php'>
                <button class='ui-button mini' type='submit'>Logout</button>
                </form> ";
        }
        ?>
    </div>
</nav>