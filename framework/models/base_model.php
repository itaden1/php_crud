<?php
class BaseModel
{
    function connect()
    {
        $dsn = "mysql:host=localhost;dbname=mydb";
        $user = "user123";
        $pass = "pass123";
        $pdo = new PDO($dsn, $user, $pass);
        return $pdo;
    }
    function __destruct()
    {
        $pdo = null;
    }
}

?>