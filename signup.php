<!DOCTYPE html>
<html lang="en">
<?php
require_once __DIR__ . "/src/routes/signup.php";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon-16x16.png">
    <link rel="stylesheet" href="./assets/css/all.min.css" />
    <link rel="stylesheet" href="./assets/css/common.css" />
    <link rel="stylesheet" href="/assets/css/auth.css" />
    <title>User Signup</title>
</head>

<body class="layout">
    <main class="auth-form">
        <form class="form" method="POST">
            <div class="form-group <?php $checker->fieldHasError("firstName") ? print("has-errors") : print(""); ?>">
                <label>First Name</label>
                <input name="firstName" value="<?php print($checker->getFieldData("firstName")) ?>" placeholder="enter first name..." />
                <p class="error"><?php echo $checker->getFieldError("firstName"); ?></p>
            </div>
            <div class="form-group <?php $checker->fieldHasError("lastName") ? print("has-errors") : ""; ?>">
                <label>Last Name</label>
                <input name="lastName" value="<?php print($checker->getFieldData("lastName")) ?>" placeholder="enter last name..." />
                <p class="error"><?php echo $checker->getFieldError("lastName"); ?></p>
            </div>
            <div class="form-group <?php $checker->fieldHasError("phone") ? print("has-errors") : "" ?>">
                <label>Phone Number</label>
                <input type="tel" name="phone" placeholder="enter phone number..." value="<?php print($checker->getFieldData("phone")); ?>" />
                <p class="error"><?php echo $checker->getFieldError("phone"); ?></p>
            </div>

            <div class="form-group <?php $checker->fieldHasError("email") ? print("has-errors") : "" ?>">
                <label>Email</label>
                <input value="<?php echo $checker->getFieldData("email"); ?>" type="email" name="email" placeholder="enter email..." />
                <p class="error"><?php echo $checker->getFieldError("email"); ?></p>
            </div>

            <div class="form-group <?php $checker->fieldHasError("password") ? print("has-errors") : "" ?>">
                <label>Password</label>
                <input type="password" name="password" placeholder="enter password..." />
                <p class="error"><?php echo $checker->getFieldError("password"); ?></p>
            </div>
            <div class="form-group <?php $checker->fieldHasError("confirmPassword") ? print("has-errors") : "" ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirmPassword" placeholder="enter password..." />
                <p class="error"><?php echo $checker->getFieldError("confirmPassword"); ?></p>
            </div>
            <div class="row">
                <button type="submit" class="ui-button">
                    Submit
                </button>
            </div>
            <div class="row extra-links">
                <a class="ui-link muted" href="/signin.php">Have an account? Sign In</a>
                <a class="ui-link muted" href="/org-signup.php">Register as an organizer</a>
            </div>
        </form>
    </main>
    <section class="side-image signup">
        <div class="text-container">
            <h3>Sign Up !</h3>
            <small>Start enjoying events with us</small>
        </div>
    </section>
</body>

</html>