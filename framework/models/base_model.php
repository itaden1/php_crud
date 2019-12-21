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
        $pdo = new PDO($dsn, $user, $pass);
        return $pdo;
    }
    function __destruct()
    {
        $this->connection = null;
    }
}

?>