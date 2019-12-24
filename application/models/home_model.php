<?php

include_once (ROOT_PATH."/framework/models/base_model.php");

class HomeModel extends BaseModel
{
    function get_all()
    {
        $query = $this->connection->query("SELECT * FROM event");
        return $query->fetchAll();
    }
}


?>