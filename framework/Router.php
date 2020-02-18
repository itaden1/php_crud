<?php
class Router
{
    private $request;
    private $file_extensions = Array("jpg", "png", "svg","pdf");
    public $routes = Array();

    function __construct($request)
    {
        $this->request = $request;
        $this->{'/'} = new BaseController();
    }
    
    function register($route, $controller)
    {
        $this->routes[$route] = $controller;
    }

    function resolve()
    {
        foreach($this->routes as $k => $route)
        {
            echo $k."<br>";
        }
        $method = $this->request->request_method;
        $uri = strtok($this->request->request_uri, '?');
        $id = NULL;

        // need to change strtok to not remove further characters from url
        $routeID = strtok($uri, basename($uri)).":id";
        echo "<h1>$routeID</h1>";
        echo "<h1>".basename($uri)."</h1>";


        // check if a route with id exists
        if (isset($this->routes[$routeID]))
        {
            $id = basename($uri);
            $uri = $routeID;

        }

        
        // $extension = pathinfo($uri);
        // if (in_array($extension, $this->file_extensions))
        // {
        //     echo $uri . "cha cha";
        // }

        // Check we have a controller for the request url
        if (!isset($this->routes[$uri]))
        {
            echo "<h1>404</h1><br><h5>".$this->request->request_uri." not found</h5>";
        }
        else
        {
            // call the controller
            $controller = $this->routes[$uri];
            $controller->handleHTTPMethods($this->request, $id);
        }
    }

    function __destruct()
    {
        $this->resolve();
    }
}

?>