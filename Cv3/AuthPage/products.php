<?php
include_once "checkIfLogIn.php";
ob_start();
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
$_SESSION["catalog"] = array();
$sqlQuery = "SELECT * FROM learningphpdb.products";
if ($stmt = $connection->prepare($sqlQuery)) {
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $_SESSION["catalog"][] = $row;
        echo "<div class='item-img'>" . $row["img"] . "</div><div>" . $row["name"] . " " . $row["price"] . "$" . "</div>";
        echo "<button class='product-btn' onclick=location.href='cartUtil.php?action=add&product_id=" . $row["product_id"] . "'>+</button>";
        echo "<button class='product-btn' onclick=location.href='cartUtil.php?action=remove&product_id=" . $row["product_id"] . "'>-</button>";
    }
}

//echo "<br>";
//print_r($_SESSION["catalog"]);
?>

</body>
</html>