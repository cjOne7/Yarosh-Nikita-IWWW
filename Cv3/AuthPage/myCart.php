<?php
session_start();
if (!isset($_COOKIE["authLoginProfile"])) {
    header("Location: index.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <?php include_once "head.php" ?>
    <title>Document</title>
    <style>
        .catalog-item {
            width: 200px;
            background-color: beige;
            height: 300px;
            margin: 5px;
        }

        .catalog-img {
            font-size: 100px;
        }

        .cart-button, .catalog-buy-button {
            margin: 5px;
            padding: 5px;
            border: 1px solid yellow;
            background-color: yellowgreen;
            text-align: center;
        }

        #catalog-items {
            display: flex;
        }

        a.catalog-buy-button {
            display: block;
        }

        .cart-item {
            justify-content: space-between;
            display: flex;
            margin: 5px;
            border: 1px solid yellowgreen;
            padding: 5px;
        }

        .cart-quantity {
            margin: 10px;
        }

        .cart-price {
            margin: 10px;
        }

        .cart-control {
            display: flex;
        }

        #cart-total-price {
            font-weight: bold;
        }

    </style>
</head>
<body>
<?php
include_once "navbar.php";
$banana = array(
    "id" => 1,
    "img" => "&#127820",
    "name" => "banana",
    "price" => "29",
);
$apple = array(
    "id" => 2,
    "img" => "&#127823",
    "name" => "apple",
    "price" => "39",
);
$pepper = array(
    "id" => 3,
    "img" => "&#127817",
    "name" => "watermelon",
    "price" => "59",
);
$potato = array(
    "id" => 4,
    "img" => "&#129364",
    "name" => "potato",
    "price" => "19",
);
$catalog = array($banana, $apple, $pepper, $potato);
function getBy($att, $value, $array) {
    foreach ($array as $key => $val) {
        if ($val[$att] == $value) {
            return $key;
        }
    }
    return null;
}
?>

<section>
    <h2>Shopping cart</h2>
    <?php

    $totalPrice = 0;
    if (isset($_SESSION["cart"])) {
        foreach ($_SESSION["cart"] as $key => $value) {
            $item = $catalog[getBy("id", $key, $catalog)];
            $totalPrice = $totalPrice + ($value["quantity"] * $item["price"]);
            echo '
<div class="cart-item">
<div class="cart-img">
' . $item["img"] . '
</div>
<div>
' . $item["name"] . '
</div>
<div class="cart-control">
<div class="cart-price">
' . $item["price"] . '
</div>
<div class="cart-quantity">
' . ($value["quantity"]) . '
</div>
<div class="cart-quantity">
' . ($value["quantity"] * $item["price"]) . '
</div>
<a href="/?action=add&id=' . $item["id"] . '" class="cart-button">
+
</a>
<a href="/?action=remove&id=' . $item["id"] . '" class="cart-button">
-
</a>
<a href="/?action=delete&id=' . $item["id"] . '" class="cart-button">
x
</a>
</div>
</div>';

        }
    }

    echo "<div id='cart-total-price'>Total price: $totalPrice</div>";

    ?>
</body>
</html>
