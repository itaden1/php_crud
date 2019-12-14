<?php

class HomePage{
    function __construct($request)
    {
        $this->request = $request;
        echo $request->request_method;
    }
    function __call($method, $args)
    {
        if ($this->request->request_method == "get")
        {
            $this->get();
        }
        else
        {
            echo "method ".$this->request->request_method. " not allowed";
        }
    }
    function get()
    {
        $title = "Home";
        $content = "yabba dabba doo";
        //return homeView();
        echo "running homepage function";
        include "views/home.php";
    
    
    }
}


?>