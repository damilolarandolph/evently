<?php

include_once __DIR__ . "/../../utils/keystore.php";

class PDOConn
{
    /** @var \PDO $pdo */
    private static $pdo;


    /** @return \PDO */
    public static function instance()
    {
        if (PDOConn::$pdo === null) {
            self::makeConn();
        }

        return self::$pdo;
    }

    private static function makeConn()
    {
        $opt = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_CLASS,
            PDO::ATTR_EMULATE_PREPARES   => FALSE,
        );
        global $Keystore;
        $dsn = "mysql:host=" . $Keystore->getKey(Keys::$MYSQL_HOST) . ";dbname=" . $Keystore->getKey(Keys::$MYSQL_DATABASE) . ";charset=utf8";
        self::$pdo = new PDO($dsn, $Keystore->getKey(Keys::$MYSQL_USER), $Keystore->getKey(Keys::$MYSQL_PASSWORD), $opt);
    }
}
