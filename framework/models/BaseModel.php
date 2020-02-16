<?php

class BaseModel
{
    protected $connection;
    protected $resultQuery = Array();

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
    function getTableName()
    {
        return $this->tableName;
    }
    function getQueryResults()
    {
        return $this->resultQuery;
    }
    function create(){}
    function read_list()
    {
        // Return a list of records from the table
        $query = "SELECT * FROM " . $this->tableName . ";";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $k => $row)
        {
            $this->resultQuery[$k] = $row;
        }
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