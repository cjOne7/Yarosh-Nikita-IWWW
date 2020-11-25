<?php
session_start();
//print_r($_SESSION["cart"]);
//echo "<br>";
//foreach ($_SESSION["cart"] as $key => $value) {
//    echo "Key: " . $key . ", value: " . $value["quantity"] . "<br>";
//}
//echo "User's login: " . $_COOKIE["authLoginProfile"] . "<br>";
//echo "Total price: " . $_SESSION["total_price"] . "<br>";


include_once "connectionToDB.php";
$connection = ConnectionToDB::getConnection();
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$user_id = $_COOKIE["authProfileId"];
$sqlQuery = "INSERT INTO learningphpdb.orders (date_of_order, total_price, user_user_id) VALUES (SYSDATE(), ?, ?)";
if ($stmt = $connection->prepare($sqlQuery)) {
    $stmt->bind_param("ii", $total_price, $user_id);
    $total_price = $_SESSION["total_price"];
    $stmt->execute();
}

$sqlQuery = "SELECT MAX(`order_id`) FROM learningphpdb.orders";
if ($stmt = $connection->prepare($sqlQuery)) {
    $stmt->execute();
//        echo "Last order id: " . $stmt->insert_id . "<br>";
    $result = $stmt->get_result()->fetch_assoc();
//        print_r($result);
    $order_order_id = $result["MAX(`order_id`)"];
//        echo $order_order_id . "<br>";
    foreach ($_SESSION["cart"] as $key => $value) {
//            echo "Key: " . $key . ", value: " . $value["quantity"] . "<br>";
        $sqlQuery = "INSERT INTO learningphpdb.order_product (order_order_id, product_product_id, quantity, purchased_price) VALUES (?, ?, ?, ?)";
        if ($stmt = $connection->prepare($sqlQuery)) {
            $stmt->bind_param("iiii", $order_order_id, $product_product_id, $quantity, $purchased_price);
            $product_product_id = $key;
            $quantity = $value["quantity"];
            $purchased_price = $_SESSION["catalog"][$key - 1]["price"];
            $stmt->execute();
            $_SESSION["cart"] = array();

            $sqlQuery = "DELETE FROM learningphpdb.cart WHERE user_user_id = ?";
            if ($stmt = $connection->prepare($sqlQuery)) {
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
                $stmt->close();
            }
            header("Location: myOrders.php");
        }
    }
}
