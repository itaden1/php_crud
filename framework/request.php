<?php

class Request
{
    function __construct()
    {
        foreach($_SERVER as $key => $val)
        {
            // TODO clean request input
            $key = strtolower($key);
            $this->$key = $val;
        }
    }
}

?>