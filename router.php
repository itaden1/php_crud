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
            $controller = new $this->{$this->request->request_method}[$this->request->request_uri]($request);
            //$controller = new $controllerClass($request);
            $controller->do_something();
            //echo call_user_function($controller->execute, $this->request);
            //echo call_user_func($this->{$this->request->request_method}[$this->request->request_uri], $this->request);
        }
    }

    function __destruct()
    {
        $this->resolve();
    }
}

?>