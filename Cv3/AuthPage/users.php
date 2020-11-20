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
$sqlQuery = "SELECT * FROM learningphpdb.users WHERE role = ?";
if ($stmt = $connection->prepare($sqlQuery)) {
    $stmt->bind_param("i", $role);
    $role = Role::USER;
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Id: " . $row["user_id"] . "<br>login: " . $row["login"] . "<br>role: " . $row["role"] . "<br><br>";
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