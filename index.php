<?php
echo "hello world<br>";
// create a request object
include_once ("request.php");
include_once ("router.php");

include_once("controllers/home_controller.php");
include_once("controllers/stuff_controller.php");

$request = new Request();
$router = new Router($request);

$router->register("/", new HomeController($request));
$router->register("/stuff", new StuffController($request));


?>