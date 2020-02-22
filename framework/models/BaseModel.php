<?php

class BaseModel
{
    protected $connection;
    protected $resultQuery = Array();

    function __construct($connect=TRUE)
    {
        if ($connect) $this->connection = $this->connect();
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
        return $this->table_name;
    }
    private function populate_data($data)
    {
        foreach($data as $k => $v)
        {
            if (property_exists($this, $k)) $this->{$k} = $v;
        }
    }
    function getQueryResults()
    {
        return $this->result_query;
    }
    function create(){
        $query = "INSERT INTO $this->table_name VALUES (";
        foreach((array)$this as $k => $v)
        {
            $query = $query . ":$v,";
        }
        $query = $query . ");";
        echo $query;
    }
    function read($id)
    {
        // Return a list of records from the table
        // if ID is specified select only that record
        $q = ($id ? "WHERE id=:id;" : ";");
        $query = "SELECT * FROM $this->table_name $q";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(["id" => $id]);
        foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $k => $row)
        {
            $class = get_class($this);
            $instance = new $class($connect=FALSE);
            $instance->populate_data($row);
            $this->result_query[$k] = $instance;
        }
    }
    function update(){}
    function delete(){}
    function __destruct()
    {
        $this->connection = null;
    }
}

?>