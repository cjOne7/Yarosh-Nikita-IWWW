<?php session_start() ?>
<!doctype html>
<html lang="en">
<head>
    <?php include_once "head.php" ?>
    <title>Document</title>
</head>
<body>
<?php
include_once "navbar.php";
include_once "connectionToDB.php";
include_once "role.php";
$connection = ConnectionToDB::getConnection();
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$sqlQuery = "SELECT * FROM learningphpdb.users WHERE login NOT LIKE ?";
if ($stmt = $connection->prepare($sqlQuery)) {
    $stmt->bind_param("s", $login);
    $login = $_SESSION["login"];
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Login: " . $row["login"] . "<br>Role: ";
            include_once "role.php";
            if ($row["role"] == Role::ADMIN) {
                echo "admin" . "<br><br>";
            } elseif ($row["role"] == Role::USER) {
                echo "user" . "<br>";
            }
            echo "";
        }
    }
}
?>
<table>
    <thead>
    </thead>

    <tbody>
    </tbody>
</table>
</body>
</html>