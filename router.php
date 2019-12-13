<?php
class Router
{
    function __construct($request)
    {
        $this->request = $request;
    }
    
    function __call($method, $args)
    {
        list($route, $callback) = $args;
        //$this->{$route} = $callback;
        $this->{$method}[$this->$route] = $callback;
    }

    function resolve()
    {
        echo "resolving<br>---<br>";
        //echo call_user_func($this->get->);
    }

    function __destruct()
    {
        $this->resolve();
    }
}

?>