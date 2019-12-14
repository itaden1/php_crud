<?php

class Request
{
    function __construct()
    {
        foreach($_SERVER as $key => $val)
        {
            // TODO clean request input
            $key = strtolower($key);
            //echo $key. "<br>";
            $this->$key = strtolower($val);
            //echo $this->$key."<br>";
        }
        //echo $this->{"request_uri"};
    }

}

?>