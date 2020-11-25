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
<table>
    <thead>
    <tr>
        <th>Role</th>
        <th>Login</th>
        <th>Edit</th>
    </tr>
    </thead>
    <tbody>
    <?php
    include_once "navbar.php";
    include_once "connectionToDB.php";
    include_once "role.php";
    $connection = ConnectionToDB::getConnection();
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    $sqlQuery = "SELECT * FROM learningphpdb.users WHERE role = ?";
    if ($stmt = $connection->prepare($sqlQuery)) {
        $stmt->bind_param("i", $role);
        $role = Role::USER;
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>user</td><td>" . $row["login"] . "</td> "
                    . "<td><button name='editBtn' onclick=location.href='editUser.php?user_id=" . $row["user_id"] . "'>Edit</button></td></tr>";
            }
        }
    }
    ?>
    </tbody>
</table>
</body>
</html>