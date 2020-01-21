<?php

class BaseModel
{
    protected $connection;

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
    function create(){}
    function read()
    {
        $query = "SELECT * FROM " . $this->table_name . ";";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;

    }
    function update(){}
    function delete(){}
    function __destruct()
    {
        $this->connection = null;
    }
}

?>