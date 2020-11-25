<?php
session_start();
$enteredLogin = filter_var(trim($_POST["username"]), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
$enteredPassword = filter_var(trim($_POST["password"]), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);

include_once "connectionToDB.php";
$connection = ConnectionToDB::getConnection();
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sqlQuerySelect = "SELECT * FROM learningphpdb.users WHERE user_id = ?";
if ($stmt = $connection->prepare($sqlQuerySelect)) {
    $stmt->bind_param("i", $user_id);
    $user_id = $_SESSION["editedUserId"];
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    $sqlQueryUpdate = "UPDATE learningphpdb.users SET login = ?, password = ? WHERE user_id = ?";

    if ($stmt = $connection->prepare($sqlQueryUpdate)) {
        $stmt->bind_param("ssi", $enteredLogin, $enteredPassword, $user_id);
        if (mb_strlen($enteredLogin, "UTF-8") < 3) {
//            $enteredLogin = $result["login"];
            $user_id = $result["user_id"];
        } else {
//            setcookie("authLogin", $enteredLogin);
//            echo $result["login"] . "<br>" . $_COOKIE["authLogin"] . "<br>";
            if ($result["login"] == $_COOKIE["authLogin"]) {
                setcookie("authProfileId", $user_id);
            } else {
                setcookie("authLogin", $user_id);
            }
        }
        if (mb_strlen($enteredPassword, "UTF-8") < 8) {
            $enteredPassword = $result["password"];
        } else {
            $enteredPassword = password_hash($enteredPassword, PASSWORD_DEFAULT);
        }
        $user_id = $_SESSION["editedUserId"];
        $stmt->execute();
        $stmt->close();
        header("Location: homePage.php");
    }
}