<?php
include_once "checkIfLogIn.php";

function addToCart($productId) {
    session_start();
    if (!array_key_exists($productId, $_SESSION["cart"])) {
        $_SESSION["cart"][$productId]["quantity"] = 1;
        addToDBCart($productId, 1);
    } else {
        $quantity = ++$_SESSION["cart"][$productId]["quantity"];
        updateDbCart($productId, $quantity);
    }
}

function removeFromCart($productId) {
    session_start();
    if (array_key_exists($productId, $_SESSION["cart"])) {
        if ($_SESSION["cart"][$productId]["quantity"] <= 1) {
            unset($_SESSION["cart"][$productId]);
            deleteFromDbCart($productId);
        } else {
            $quantity = --$_SESSION["cart"][$productId]["quantity"];
            updateDbCart($productId, $quantity);
        }
    }
}

function deleteFromCart($productId) {
    session_start();
    unset($_SESSION["cart"][$productId]);
    deleteFromDbCart($productId);
}

function addToDBCart($productId, $quantity) {
    include_once "connectionToDB.php";
    $connection = ConnectionToDB::getConnection();
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    $sqlQuery = "INSERT INTO learningphpdb.cart (user_user_id, product_product_id, quantity, price_for_one) VALUES (?, ?, ?, ?)";
    if ($stmt = $connection->prepare($sqlQuery)) {
        $stmt->bind_param("iiii", $user_user_id, $product_product_id, $quantity, $price_for_one);
        $product_product_id = $productId;
        $user_user_id = $_COOKIE["authProfileId"];
        $price_for_one = $_SESSION["catalog"][$productId - 1]["price"];
        $stmt->execute();
    }
}

function updateDbCart($productId, $quantity) {
    include_once "connectionToDB.php";
    $connection = ConnectionToDB::getConnection();
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    $sqlQuery = "UPDATE learningphpdb.cart SET quantity = ? WHERE product_product_id = ? AND user_user_id = ?";
    if ($stmt = $connection->prepare($sqlQuery)) {
        $stmt->bind_param("iii", $quantity, $product_product_id, $user_id);
        $user_id = $_COOKIE["authProfileId"];
        $product_product_id = $productId;
        $stmt->execute();
    }
}

function deleteFromDbCart($productId) {
    include_once "connectionToDB.php";
    $connection = ConnectionToDB::getConnection();
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    $sqlQuery = "DELETE FROM learningphpdb.cart WHERE user_user_id = ? AND product_product_id = ?";
    if ($stmt = $connection->prepare($sqlQuery)) {
        $stmt->bind_param("ii", $user_id, $product_product_id);
        $user_id = $_COOKIE["authProfileId"];
        $product_product_id = $productId;
        $stmt->execute();
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <?php include_once "head.php" ?>
    <title>Document</title>
</head>
<body>
<?php
include_once "navbar.php";
if ($_GET["action"] == "add" && !empty($_GET["product_id"])) {
    addToCart($_GET["product_id"]);
}

if ($_GET["action"] == "remove" && !empty($_GET["product_id"])) {
    removeFromCart($_GET["product_id"]);
}

if ($_GET["action"] == "delete" && !empty($_GET["product_id"])) {
    deleteFromCart($_GET["product_id"]);
}
echo "Do you want to <a href='products.php'>continue shopping</a> or <a href='myCart.php'>check out?</a>";
?>
</body>
</html>
