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
    <link rel="stylesheet" href="/assets/css/auth.css" />
    <title>User Signup</title>
</head>

<body class="layout">
    <main class="auth-form">
        <form class="form">
            <div class="form-group">
                <label>Organization Name</label>
                <input placeholder="enter last name..." />
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="tel" placeholder="enter phone number..." />
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" placeholder="enter email..." />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" placeholder="enter password..." />
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" placeholder="enter password..." />
            </div>
            <div class="row">
                <button type="submit" class="ui-button">
                    Submit
                </button>
            </div>
            <div class="row extra-links">
                <a class="ui-link muted" href="/signin.php">Have an account? Sign In</a>
                <a class="ui-link muted" href="/signup.php">Register as a user</a>
            </div>
        </form>
    </main>
    <section class="side-image org-signup">
        <div class="text-container">
            <h3>Join Us !</h3>
            <small>Create events with us</small>
        </div>
    </section>
</body>

</html>