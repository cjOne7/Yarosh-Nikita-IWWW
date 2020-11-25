<?php include_once "checkIfLogIn.php" ?>
<!doctype html>
<html lang="en">
<head>
    <?php include_once "head.php" ?>
    <title>Document</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<?php include_once "navbar.php" ?>
<h2>My orders</h2>
<table>
    <thead>
    <tr>
        <th>Order number</th>
        <th>Product name</th>
        <th>Date of purchase</th>
        <th>Quantity</th>
        <th>Price for one</th>
    </tr>
    </thead>
    <tbody>
    <?php
    include_once "connectionToDB.php";
    $connection = ConnectionToDB::getConnection();
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    $sqlQuery = "SELECT name, purchased_price, quantity, date_of_order, user_user_id, order_id FROM learningphpdb.products
         RIGHT OUTER JOIN learningphpdb.order_product ON products.product_id = order_product.product_product_id
         RIGHT OUTER JOIN learningphpdb.orders ON order_product.order_order_id = orders.order_id WHERE user_user_id = ?";
    if ($stmt = $connection->prepare($sqlQuery)) {
        $stmt->bind_param("i", $user_id);
        $user_id = $_COOKIE["authProfileId"];
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["order_id"] . " </td><td> " . $row["name"] . " </td><td> " . $row["date_of_order"] . " </td>
<td> " . $row["quantity"] . " </td><td> " . $row["purchased_price"] . " </td></tr>";
        }
    }
    ?>
    </tbody>
</table>
</body>
</html>
