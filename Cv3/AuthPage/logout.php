<?php
session_start();
session_unset();
session_destroy();
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

//TODO ADD CART VALUES AFTER LOGGING IN OR DELETE ALL RECORDS AFTER LOGGING OUT
