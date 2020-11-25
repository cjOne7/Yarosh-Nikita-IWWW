<?php
session_start();
$enteredLogin = filter_var(trim($_POST["usernameLog"]), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
$enteredPassword = filter_var(trim($_POST["passwordLog"]), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);

include_once "connectionToDB.php";
$connection = ConnectionToDB::getConnection();
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$sqlQuery = "SELECT * FROM learningphpdb.users WHERE login LIKE ?";
if ($stmt = $connection->prepare($sqlQuery)) {
    $stmt->bind_param("s", $enteredLogin);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $hashPwd = $result["password"];
    $role = $result["role"];
    $userId = $result["user_id"];
    if (isset($hashPwd) || password_verify($enteredPassword, $hashPwd)) {
        setcookie("authRole", $role);
        setcookie("authLogin", $enteredLogin);

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////
        setcookie("authLoginProfile", $enteredLogin);
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////

        setcookie("authProfileId", $userId);
        $_SESSION["cart"] = array();
        header("Location: homePage.php");
    } else {
        header('HTTP/1.1 307 Temporary Redirect');
        header("Location: index.php?error=wrong_auth_data");
    }
}