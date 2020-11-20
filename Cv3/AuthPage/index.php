<!doctype html>
<html lang="en">
<head>
    <?php include_once "head.php" ?>
    <title>Document</title>
    <link href="css/registerWindowStyle.css" rel="stylesheet">
    <link href="css/loginWindowStyle.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="register-form">
        <svg xmlns="http://www.w3.org/2000/svg" class="site-logo" width="56" height="84"
             viewBox="77.7 214.9 274.7 412">
            <defs>
                <linearGradient id="a" x1="0%" y1="0%" y2="0%">
                    <stop offset="0%" stop-color="#8ceabb"/>
                    <stop offset="100%" stop-color="#378f7b"/>
                </linearGradient>
            </defs>
            <path fill="url(#a)"
                  d="M215 214.9c-83.6 123.5-137.3 200.8-137.3 275.9 0 75.2 61.4 136.1 137.3 136.1s137.3-60.9 137.3-136.1c0-75.1-53.7-152.4-137.3-275.9z"/>
        </svg>
        <h2>Sign Up</h2>
        <form action="check.php" method="post">
            <div class="form-field">
                <input type="text" placeholder="username..." name="username" required="required"
                       oninput="checkInputFields(3, this.name, 'signupBtn')"
                       value="<?php if (isset($_POST["username"])) echo $_POST["username"] ?>">
            </div>
            <div class="form-field">
                <input type="password" placeholder="password..." name="password" required="required"
                       oninput="checkInputFields(8, this.name, 'signupBtn')"
                       value="<?php if (isset($_POST["password"])) echo $_POST["password"] ?>">
            </div>
            <p id='errMes' style='color: #7e8ba3; font-size: 14px'>
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == 10) {
                        echo "Username too short. Minimum is 3 chars.";
                    } elseif ($_GET["error"] == 11) {
                        echo "Password too short. Minimum is 8 chars.";
                    } elseif ($_GET["error"] == "user_exist") {
                        echo "A user with the same username has already existed.";
                    }
                }
                ?>
            </p>
            <div class="form-field">
                <input id="signupBtn" type="submit" value="Sign Up" disabled="disabled">
            </div>
        </form>
        <div class="login-mess">
            <p>Already have an account?
                <button id="logModalBtn" type="submit">Log In</button>
            </p>
        </div>
    </div>
</div>

<div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="site-logo" width="56" height="84"
                 viewBox="77.7 214.9 274.7 412">
                <defs>
                    <linearGradient id="a" x1="0%" y1="0%" y2="0%">
                        <stop offset="0%" stop-color="#8ceabb"/>
                        <stop offset="100%" stop-color="#378f7b"/>
                    </linearGradient>
                </defs>
                <path fill="url(#a)"
                      d="M215 214.9c-83.6 123.5-137.3 200.8-137.3 275.9 0 75.2 61.4 136.1 137.3 136.1s137.3-60.9 137.3-136.1c0-75.1-53.7-152.4-137.3-275.9z"/>
            </svg>
        </div>
        <h2>Log In</h2>
        <form action="auth.php" method="post">
            <div class="form-field">
                <input type="text" placeholder="username..." name="usernameLog" required="required"
                       value="<?php if (isset($_POST["usernameLog"])) echo $_POST["usernameLog"] ?>">
            </div>
            <div class="form-field">
                <input type="password" placeholder="password..." name="passwordLog" required="required"
                       value="<?php if (isset($_POST["passwordLog"])) echo $_POST["passwordLog"] ?>">
            </div>
            <p style='color: #7e8ba3; font-size: 14px'>
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "wrong_auth_data") {
                        echo "Wrong login or password.";
                    }
                }
                ?>
            </p>
            <div class="form-field">
                <input id="logBtn" type="submit" value="Log In">
            </div>
        </form>
    </div>
</div>

<script src="js/modal.js"></script>
<script src="js/checkInput.js"></script>
</body>
</html>
