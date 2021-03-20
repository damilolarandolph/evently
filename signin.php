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
    <title>Sign In</title>
</head>

<body class="layout">
    <main class="auth-form">
        <form class="form">
            <div class="form-group">
                <label>Email</label>
                <input type="email" placeholder="enter email..." />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" placeholder="enter password..." />
            </div>

            <div class="row">
                <button type="submit" class="ui-button">
                    Sign In
                </button>
            </div>
            <div class="row extra-links">
                <a class="ui-link muted" href="/signup.php">Don't have an account? Sign Up</a>
                <a class="ui-link muted" href="/org-signup.php">Register as an organizer</a>
            </div>
        </form>
    </main>
    <section class="side-image signin">
        <div class="text-container">
            <h3>Sign In !</h3>
            <small>Sign in to attend events</small>
        </div>
    </section>
</body>

</html>