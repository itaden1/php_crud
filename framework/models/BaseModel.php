<?php

class BaseModel
{
    protected $connection;
    protected $result_query = Array();

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
    function get_table_name()
    {
        return $this->table_name;
    }
    private function populate_data($data)
    {
        foreach($data as $k => $v)
        {
            if (in_array($k, array_keys($this->columns))) $this->columns[$k] = $v;
        }

    }
    function get_query_results()
    {
        return $this->result_query;
    }
    function create($data){
        // Populate the object with data
        $this->populate_data($data, $set_pk=FALSE);

        // Construct the query based on the objects column array
        // First pass sets the column names
        // Second pass appends placeholder parameters
        $query = "INSERT INTO $this->table_name (";
        foreach($this->columns as $k => $v)
        {
            if ($k != 'id') $query = $query . "$k, ";
        }
        $query = rtrim($query, ", ").") VALUES (";
        foreach($this->columns as $k => $v)
        {
            if ($k != 'id') $query = $query . ":$k, ";
        }
        $query = rtrim($query, ", ").");";
        $stmt = $this->connection->prepare($query);

        // create a copy of column data and remove primary key
        $arr = $this->columns;
        if (!$set_pk) unset($arr['id']);
        $stmt->execute($arr);
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