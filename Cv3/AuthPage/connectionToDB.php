<?php

class ConnectionToDB {
    private static $serverName = "localhost";
    private static $username = "root";
    private static $password = "root";

    public static function getConnection() {
        return new mysqli(self::$serverName, self::$username, self::$password);
    }
}