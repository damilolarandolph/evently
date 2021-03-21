<?php

include_once __DIR__ . "/../../utils/keystore.php";

class PDOConn
{
    private static $instance;
    private static $pdo;

    public function __construct()
    {

        $opt = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES   => FALSE,
        );
        global $Keystore;
        $dsn = "mysql:host=" . $Keystore->getKey(Keys::$MYSQL_HOST) . ";dbname=" . $Keystore->getKey(Keys::$MYSQL_DATABASE) . ";charset=utf8";
        $this->pdo = new PDO($dsn, $Keystore->getKey(Keys::$MYSQL_USER), $Keystore->getKey(Keys::$MYSQL_PASSWORD), $opt);
    }

    public static function instance()
    {
        if (PDOConn::$instance === null) {
            PDOConn::$instance = new self;
        }

        return self::$instance;
    }
}
