<?php
session_start();
$enteredLogin = filter_var(trim($_POST["username"]), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
$enteredPassword = filter_var(trim($_POST["password"]), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);

if (mb_strlen($enteredLogin, "UTF-8") < 3) {
    header("Location: index.php?error=10");
    exit();
} elseif (mb_strlen($enteredPassword, "UTF-8") < 8) {
    header("Location: index.php?error=11");
    exit();
}
include_once "connectionToDB.php";
include_once "role.php";
$connection = ConnectionToDB::getConnection();
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$sqlQuery = "SELECT login FROM learningphpdb.users WHERE login LIKE ?";
if ($stmt = $connection->prepare($sqlQuery)) {
    $stmt->bind_param("s", $enteredLogin);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc()["login"];
    if (isset($row)) {
        header('HTTP/1.1 307 Temporary Redirect');
        header("Location: index.php?error=user_exist");
    } else {
        $sqlQuery = "INSERT INTO learningphpdb.users (login, password, role) VALUES (?, ?, ?)";
        if ($stmt = $connection->prepare($sqlQuery)) {
            $stmt->bind_param("ssi", $enteredLogin, $enteredPassword, $role);
            $enteredPassword = password_hash($enteredPassword, PASSWORD_DEFAULT);
            $role = Role::USER;
            $stmt->execute();
            $stmt->close();
            $_SESSION["login"] = $enteredLogin;
            $_SESSION["role"] = $role;
            header("Location: homePage.php");
        }
    }
} else {
    echo "Query cannot be prepared<br>";
    exit();
}