<?php session_start() ?>
<!doctype html>
<html lang="en">
<head>
    <?php include_once "head.php" ?>
    <title>Edit</title>
        <link href="css/registerWindowStyle.css" rel="stylesheet">
</head>
<body>
<?php
include_once "navbar.php";
include_once "connectionToDB.php";

$connection = ConnectionToDB::getConnection();
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sqlQuery = "SELECT * FROM learningphpdb.users WHERE user_id = ?";
if ($stmt = $connection->prepare($sqlQuery)) {
    $stmt->bind_param("i", $user_id);
    $user_id = $_GET["user_id"];
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $login = $result["login"];
    $_SESSION["editedUserId"] = $user_id;
}

?>
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
        <h2>Edit user's data window</h2>
        <form action="updateUserData.php" method="post">
            <div class="form-field">
                <input type="text" placeholder="Enter new username" name="username"
                       oninput="checkInputFields(3, this.name, 'signupBtn')"
                       value="<?= $GLOBALS['login'] ?>">
            </div>
            <div class="form-field">
                <input type="password" placeholder="Enter new password" name="password"
                       oninput="checkInputFields(8, this.name, 'signupBtn')">
            </div>
            <p id='errMes' style='color: #7e8ba3; font-size: 14px'>

            </p>
            <div class="form-field">
                <input id="signupBtn" type="submit" value="Save">
            </div>
        </form>
    </div>
</div>
<script src="js/checkInput.js"></script>
</body>
</html>