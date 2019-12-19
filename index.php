<?php
// create a request object
include_once ("framework/request.php");
include_once ("framework/router.php");

include_once ("application/controllers/home_controller.php");
include_once ("application/controllers/stuff_controller.php");

$BASE_URL = '/';

$request = new Request();
$router = new Router($request);

$router->register("/", new HomeController($request));
$router->register("/stuff", new StuffController($request));


?>