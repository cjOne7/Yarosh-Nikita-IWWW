<?php
session_start();
session_unset();
session_destroy();

include_once "connectionToDB.php";
$connection = ConnectionToDB::getConnection();
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$user_id = $_COOKIE["authProfileId"];
$sqlQuery = "DELETE FROM learningphpdb.cart WHERE user_user_id = ?";
if ($stmt = $connection->prepare($sqlQuery)) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->close();
}
if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach ($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time() - 1000);
        setcookie($name, '', time() - 1000, '/');
    }
}

header('Location: index.php');