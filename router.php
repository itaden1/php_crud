<?php
class Router
{
    var $request;

    function __construct($request)
    {
        $this->request = $request;
    }
    
    function __call($method, $args)
    {
        list($route, $callback) = $args;
        $this->{$method}[$route] = $callback;
    }

    function resolve()
    {
 
        if (!isset($this->{$this->request->request_method}[$this->request->request_uri]))
        {
            echo "<h1>404</h1><br><h5>".$this->request->request_uri." not found</h5>";
        }
        else
        {
            $method = $this->request->request_method;
            $uri = $this->request->request_uri;
            $controller = $this->{$method}[$uri];//($this->request);
            $controller->do_something();
        }
    }

    function __destruct()
    {
        $this->resolve();
    }
}

?>