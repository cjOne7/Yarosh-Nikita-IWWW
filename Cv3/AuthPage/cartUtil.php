<?php
session_start();
//if (!isset($_COOKIE["authLoginProfile"])) {
//    header("Location: index.php");
//    exit();
//}

if ($_GET["action"] == "add" && !empty($_GET["product_id"])) {
    addToCart($_GET["product_id"]);
    echo "Do you want to <a href='myCart.php'>check out</a> or ";
    echo "<a href='products.php'> continue shopping?</a>";
//    header("Location: myCart.php");
}

if ($_GET["action"] == "remove" && !empty($_GET["product_id"])) {
    removeFromCart($_GET["product_id"]);
    echo "Do you want to <a href='myCart.php'>check out</a> or ";
    echo "<a href='products.php'> continue shopping?</a>";
    //    header("Location: myCart.php");
}

if ($_GET["action"] == "delete" && !empty($_GET["product_id"])) {
    deleteFromCart($_GET["product_id"]);
    echo "Do you want to <a href='myCart.php'>check out</a> or ";
    echo "<a href='products.php'> continue shopping?</a>";
    //    header("Location: myCart.php");
}

function addToCart($productId) {
    session_start();
    if (!array_key_exists($productId, $_SESSION["cart"])) {
        $_SESSION["cart"][$productId]["quantity"] = 1;
    } else {
        $_SESSION["cart"][$productId]["quantity"]++;
    }
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

function deleteFromCart($productId) {
    session_start();
    unset($_SESSION["cart"][$productId]);
}

function getBy($att, $value, $array) {
    foreach ($array as $key => $val) {
        if ($val[$att] == $value) {
            return $key;
        }
    }
    return null;
}
