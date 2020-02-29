<?php
class Router
{
    private $request;
    private $img_extensions = Array("jpg", "png", "svg","pdf");
    private $css_extension = "css";
    private $js_extension = "js";
    public $routes = Array();

    function __construct($request)
    {
        $this->request = $request;
        $this->{'/'} = new BaseController($request);
    }
    
    function register($route, $controller)
    {
        $this->routes[$route] = $controller;

        // If an ID is specified on the route create a list route as well
        if (basename($route) === ':id')
        {
            $this->routes[dirname($route)] = $controller;
        }
    }

    function resolve()
    {

        $method = $this->request->request_method;
        $uri = strtok($this->request->request_uri, '?');
        $id = NULL;

        $routeID = dirname($uri)."/:id";

        // check if a route with id exists
        if (isset($this->routes[$routeID]))
        {
            if (is_numeric(basename($uri)))
            {
                $id = basename($uri);
                $uri = $routeID;
            } 

        }

        $extension = pathinfo($uri, PATHINFO_EXTENSION);
        if (in_array($extension, $this->img_extensions))
        {
            echo $uri;
        }
        $uri = rtrim($uri, '/');
        // Check we have a controller for the request url

        if (isset($this->routes[$uri]))
        {
            // call the controller
            $controller = $this->routes[$uri];
            $controller->handleHTTPMethods($id);
        }
        else
        {
            echo "<h1>404</h1><br><h5>".$this->request->request_uri." not found</h5>";
        }
    }

    function __destruct()
    {
        $this->resolve();
    }
}

?>