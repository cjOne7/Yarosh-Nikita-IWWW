<?php
session_start();
if (!isset($_COOKIE["authLoginProfile"])) {
    header("Location: index.php");
    exit();
}

if ($_GET["action"] == "add" && !empty($_GET["product_id"])) {
    addToCart($_GET["product_id"]);
    echo "Do you want to <a href='products.php'>continue shopping</a> or ";
    echo "<a href='myCart.php'>check out?</a>";
//    header("Location: myCart.php");
}

if ($_GET["action"] == "remove" && !empty($_GET["product_id"])) {
    removeFromCart($_GET["product_id"]);
    echo "Do you want to <a href='products.php'>continue shopping</a> or ";
    echo "<a href='myCart.php'>check out?</a>";
    //    header("Location: myCart.php");
}

if ($_GET["action"] == "delete" && !empty($_GET["product_id"])) {
    deleteFromCart($_GET["product_id"]);
    echo "Do you want to <a href='products.php'>continue shopping</a> or ";
    echo "<a href='myCart.php'>check out?</a>";
    //    header("Location: myCart.php");
}

function addToCart($productId) {
    session_start();
    include_once "connectionToDB.php";
    $connection = ConnectionToDB::getConnection();
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    if (!array_key_exists($productId, $_SESSION["cart"])) {
        $_SESSION["cart"][$productId]["quantity"] = 1;
        $sqlQuery = "INSERT INTO learningphpdb.cart (user_user_id, product_product_id, quantity) VALUES (?, ?, ?)";
        if ($stmt = $connection->prepare($sqlQuery)) {
            $stmt->bind_param("iii", $user_id, $product_id, $quantity);

            $stmt->execute();
        }
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