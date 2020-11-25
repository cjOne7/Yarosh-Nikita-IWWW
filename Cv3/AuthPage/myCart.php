<?php include_once "checkIfLogIn.php" ?>
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
    //TODO ADD CART VALUES AFTER LOGGING IN OR DELETE ALL RECORDS AFTER LOGGING OUT

    //    print_r($GLOBALS["catalog"]["0"]);
    $totalPrice = 0;
    if (isset($_SESSION["cart"])) {
        foreach ($_SESSION["cart"] as $key => $value) {
            $item = $_SESSION["catalog"][getBy("product_id", $key, $_SESSION["catalog"])];
//            print_r($item);
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
<a href="cartUtil.php?action=add&product_id=' . $item["product_id"] . '" class="cart-button">
+
</a>
<a href="cartUtil.php?action=remove&product_id=' . $item["product_id"] . '" class="cart-button">
-
</a>
<a href="cartUtil.php?action=delete&product_id=' . $item["product_id"] . '" class="cart-button">
x
</a>
</div>
</div>';
        }
    }
    if ($totalPrice == 0) {
        echo "<p>Ups... You have an empty cart. Visit our <a href='products.php'>product page</a> to fill it ;)</p>";
    } else {
        $_SESSION["total_price"] = $totalPrice;
        echo "<div id='cart-total-price'>Total price: $totalPrice</div><button onclick=location.href='checkout.php'>Pay</button>";
    }
    ?>
</body>
</html>
