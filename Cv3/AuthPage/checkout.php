<?php
session_start();
//print_r($_SESSION["cart"]);
foreach ($_SESSION["cart"] as $key => $value) {
    echo "Key: " . $key . ", value: " . $value["quantity"] . "<br>";
}
echo $_COOKIE["authLogin"];
