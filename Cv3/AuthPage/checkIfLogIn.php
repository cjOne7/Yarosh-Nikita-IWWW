<?php
session_start();
if (!isset($_COOKIE["authProfileId"])) {
    header("Location: index.php");
    exit();
}
