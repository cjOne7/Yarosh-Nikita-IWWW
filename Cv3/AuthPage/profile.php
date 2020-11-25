<?php include_once "checkIfLogIn.php" ?>
<!doctype html>
<html lang="en">
<head>
    <?php include_once "head.php" ?>
    <title>Document</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<?php
include_once "navbar.php";
include_once "connectionToDB.php";

$connection = ConnectionToDB::getConnection();
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$user_id = $_COOKIE["authProfileId"];
$sqlQuery = "SELECT * FROM learningphpdb.users WHERE user_id = ?";
if ($stmt = $connection->prepare($sqlQuery)) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    if (isset($result)) {
        echo "<div>Login: " . $result["login"] . "<br>Role: ";
        include_once "role.php";
        if ($result["role"] == Role::ADMIN) {
            echo "admin" . "</div>";
        } elseif ($result["role"] == Role::USER) {
            echo "user" . "</div>";
        }
        echo "<button name='editBtn' onclick=location.href='editUser.php?user_id=" . $result["user_id"] . "'>Edit</button><br><br>";
    }
}
?>
</body>
</html>