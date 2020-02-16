<?php
class Router
{
    private $request;
    private $file_extensions = Array("jpg", "png", "svg","pdf");
    private $routeID = FALSE;

    function __construct($request)
    {
        $this->request = $request;
        $this->{'/'} = new BaseController();
    }
    
    function register($route, $controller)
    {
        if (basename($route) === "{id}")
        {
            $this->routID = TRUE;
            //$route = strtok($route, "{id}");
        }
        $this->{$route} = $controller;
    }

    function resolve()
    {
        $method = $this->request->request_method;
        $uri = strtok($this->request->request_uri, '?');

        if ($this->routID === TRUE)
        {
            $id = basename($uri);
        }
        echo $uri;

        
        // $extension = pathinfo($uri);
        // if (in_array($extension, $this->file_extensions))
        // {
        //     echo $uri . "cha cha";
        // }

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