<?php
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
</head>
<body>
<?php include_once "navbar.php"; ?>
</body>
</html>