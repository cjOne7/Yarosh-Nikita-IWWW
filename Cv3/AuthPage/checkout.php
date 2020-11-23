<?php
session_start();
print_r($_SESSION["cart"]);
echo "<br>";
//foreach ($_SESSION["cart"] as $key => $value) {
//    echo "Key: " . $key . ", value: " . $value["quantity"] . "<br>";
//}
echo "User's login: " . $_COOKIE["authLogin"] . "<br>";
echo "Total price: " . $_SESSION["total_price"] . "<br>";

include_once "connectionToDB.php";
$connection = ConnectionToDB::getConnection();
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$sqlQuery = "SELECT user_id FROM learningphpdb.users WHERE login LIKE ?";
if ($stmt = $connection->prepare($sqlQuery)) {
    $stmt->bind_param("s", $login);
    $login = $_COOKIE["authLogin"];
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    $user_id = $result["user_id"];

    $sqlQuery = "INSERT INTO learningphpdb.orders (date_of_order, total_price, user_user_id) VALUES (SYSDATE(), ?, ?)";
    if ($stmt = $connection->prepare($sqlQuery)) {
        $stmt->bind_param("ii", $total_price, $user_id);
        $total_price = $_SESSION["total_price"];
        $stmt->execute();
        $stmt->close();
    }

    $sqlQuery = "SELECT MAX(order_id) FROM learningphpdb.orders";
    if ($stmt = $connection->prepare($sqlQuery)) {
        $stmt->execute();
        echo "Last order id: " . $stmt->insert_id . "<br>";
        $result = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        $order_order_id = $result["order_id"];
        echo $order_order_id . "<br>";
        foreach ($_SESSION["cart"] as $key => $value) {
            echo "Key: " . $key . ", value: " . $value["quantity"] . "<br>";
            $sqlQuery = "INSERT INTO learningphpdb.order_product (order_order_id, product_product_id, quantity) VALUES (?, ?, ?)";
            if ($stmt = $connection->prepare($sqlQuery)) {
                $stmt->bind_param("iii", $order_order_id, $product_product_id, $quantity);
                $product_product_id = $key;
                $quantity = $value["quantity"];
                $stmt->execute();
                $stmt->close();
            }
        }
    }
}


