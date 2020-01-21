<?php
class Router
{
    var $request;

    function __construct($request)
    {
        $this->request = $request;
    }
    
    function register($route, $controller)
    {
        $this->{$route} = $controller;
    }

    function resolve()
    {
        $method = $this->request->request_method;
        $uri = strtok($this->request->request_uri, '?');
        
        // Check we have a controller for the request url
        if (!isset($this->{$uri}))
        {
            echo "<h1>404</h1><br><h5>".$this->request->request_uri." not found</h5>";
        }
        else
        {
            // call the controller
            $controller = $this->{$uri};
            $controller->handleHTTPMethods($this->request);
        }
    }

    function __destruct()
    {
        $this->resolve();
    }
}

?>