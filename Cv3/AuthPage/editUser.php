<?php session_start() ?>
<!doctype html>
<html lang="en">
<head>
    <?php include_once "head.php" ?>
    <title>Edit</title>
    <link href="css/registerWindowStyle.css" rel="stylesheet">
    <link href="css/loginWindowStyle.css" rel="stylesheet">
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
}

?>

<form action="" method="post">
    <div class="form-field">
        <input type="text" placeholder="username..." name="username" required="required"
               oninput="checkInputFields(3, this.name, 'signupBtn')"
               value="<?php echo $_POST["username"] ?>">
    </div>
    <div class="form-field">
        <input type="password" placeholder="password..." name="password" required="required"
               oninput="checkInputFields(8, this.name, 'signupBtn')"
               value="<?php echo $_POST["password"] ?>">
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
<script src="js/checkInput.js"></script>
</body>
</html>