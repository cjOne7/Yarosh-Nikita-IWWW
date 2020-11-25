<?php
session_start();
if (!isset($_COOKIE["authLoginProfile"])) {
    header("Location: index.php");
    exit();
}
ob_start();

function getBy($att, $value, $array) {
    foreach ($array as $key => $val) {
        if ($val[$att] == $value) {
            return $key;
        }
    }
    return null;
}

if ($_GET["action"] == "add" && !empty($_GET["id"])) {
    addToCart($_GET["id"]);
    header("Location: /");
}

if ($_GET["action"] == "remove" && !empty($_GET["id"])) {
    removeFromCart($_GET["id"]);
    header("Location: /");
}

if ($_GET["action"] == "delete" && !empty($_GET["id"])) {
    deleteFromCart($_GET["id"]);
    header("Location: /");
}

function addToCart($productId) {
    if (!array_key_exists($productId, $_SESSION["cart"])) {
        $_SESSION["cart"][$productId]["quantity"] = 1;
    } else {
        $_SESSION["cart"][$productId]["quantity"]++;
    }
}

function removeFromCart($productId) {
    if (array_key_exists($productId, $_SESSION["cart"])) {
        if ($_SESSION["cart"][$productId]["quantity"] <= 1) {
            unset($_SESSION["cart"][$productId]);
        } else {
            $_SESSION["cart"][$productId]["quantity"]--;
        }
    }
}

function deleteFromCart($productId) {
    unset($_SESSION["cart"][$productId]);
}

?>

<html>
<head>
    <?php include_once "head.php" ?>
    <title>ESHOP</title>
</head>
<body>
<?php
include_once "navbar.php";
include_once "connectionToDB.php";
$connection = ConnectionToDB::getConnection();
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$sqlQuery = "SELECT * FROM learningphpdb.products";
if ($stmt = $connection->prepare($sqlQuery)) {
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        echo "<div class='item-img'>" . $row["img"] . "</div><div>" . $row["name"] . " " . $row["price"] . "$" . "</div>";
        echo "<button class='product-btn' onclick=location.href='cartUtil.php?action=add&product_id=".$row["product_id"]."'>+</button>";
        echo "<button class='product-btn' onclick=location.href='cartUtil.php?action=remove&product_id=".$row["product_id"]."'>-</button>";
    }
}
?>

</body>
</html>