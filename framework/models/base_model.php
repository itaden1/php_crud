<?php
class BaseModel
{
    function __construct()
    {
        $this->connection = $this->connect();
    }
    function connect()
    {
        $dsn = "mysql:host=127.0.0.1;dbname=db";
        $user = "user";
        $pass = "password";
        $options = Array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        );
        $pdo = new PDO($dsn, $user, $pass, $options);
        return $pdo;
    }
    function __destruct()
    {
        $this->connection = null;
    }
}

?>