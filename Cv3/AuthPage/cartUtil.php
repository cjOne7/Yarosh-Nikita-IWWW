<?php
session_start();
if (!isset($_COOKIE["authLoginProfile"])) {
    header("Location: index.php");
    exit();
}

if ($_GET["action"] == "add" && !empty($_GET["id"])) {
    addToCart($_GET["id"]);
    echo "<a href='myCart.php'>Do you want to check out?</a> or ";
    echo "<a href='products.php'>Do you want to continue shopping?</a>";
//    header("Location: myCart.php");
}

if ($_GET["action"] == "remove" && !empty($_GET["id"])) {
    removeFromCart($_GET["id"]);
//    header("Location: /");
}

function addToCart($productId) {
    session_start();
    if (!array_key_exists($productId, $_SESSION["cart"])) {
        $_SESSION["cart"][$productId]["quantity"] = 1;
    } else {
        $_SESSION["cart"][$productId]["quantity"]++;
    }
//    echo $_SESSION["cart"][$productId]["quantity"]."<br>";
}

function removeFromCart($productId) {
    session_start();
    if (array_key_exists($productId, $_SESSION["cart"])) {
        if ($_SESSION["cart"][$productId]["quantity"] <= 1) {
            unset($_SESSION["cart"][$productId]);
        } else {
            $_SESSION["cart"][$productId]["quantity"]--;
        }
    }
}
