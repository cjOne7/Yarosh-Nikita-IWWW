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
        <th>Product name</th>
        <th>Date of purchase</th>
        <th>Quantity</th>
        <!--        <th>Price for one</th>-->
        <!--        TODO add to DB column with price of each product-->
    </tr>
    </thead>
    <tbody>
    <?php
    include_once "connectionToDB.php";
    $connection = ConnectionToDB::getConnection();
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    $sqlQuery = "SELECT * FROM learningphpdb.orders WHERE user_user_id 
                                                    IN (SELECT user_id FROM learningphpdb.users WHERE login LIKE ?)";
    if ($stmt = $connection->prepare($sqlQuery)) {
        $stmt->bind_param("s", $login);
        $login = $_COOKIE["authLoginProfile"];
        $stmt->execute();
        $orderResult = $stmt->get_result();
        while ($orderRow = $orderResult->fetch_assoc()) {
            echo "<br>";
            print_r($orderRow);
            $sqlQuery = "SELECT name FROM learningphpdb.products WHERE product_id
                                               IN (SELECT product_product_id FROM learningphpdb.order_product WHERE order_order_id = ?)";
            if ($stmt = $connection->prepare($sqlQuery)) {
                $stmt->bind_param("i", $order_id);
                $order_id = $orderRow["order_id"];
                $stmt->execute();
                $result = $stmt->get_result();
                echo "<br>";
                while ($row = $result->fetch_assoc()) {
                    print_r($row);
//                    echo "<tr><td>Product name</td></tr>";
                }
            }
        }
    }
    ?>
    </tbody>
</table>
</body>
</html>
