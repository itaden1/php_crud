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
        $dsn = DATABASE["db_engine"].":host=".DATABASE["host"].";dbname=".DATABASE["dbname"];
        $user = DATABASE["user"];
        $pass = DATABASE["pass"];
        $options = DATABASE["options"];
        $pdo = new PDO($dsn, $user, $pass, $options);
        return $pdo;
    }
    function create(){}
    function read_list()
    {
        $query = "SELECT * FROM " . $this->table_name . ";";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;

    }
    function read_one($id){}
    function update(){}
    function delete(){}
    function __destruct()
    {
        $this->connection = null;
    }
}

?>