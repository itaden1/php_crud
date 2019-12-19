<?php
define("ROOT_PATH", __DIR__);
define("TEMPLATE_PATH", __DIR__."/application/templates/");
define("VIEW_PATH", __DIR__."/application/views/");
define("CONTROLLER_PATH", __DIR__."/application/controllers/");
define("MODEL_PATH", __DIR__."/application/models/");
// create a request object
include_once ("framework/request.php");
include_once ("framework/router.php");

include_once (CONTROLLER_PATH."/home_controller.php");
include_once (CONTROLLER_PATH."/stuff_controller.php");

$request = new Request();
$router = new Router($request);

$router->register("/", new HomeController());
$router->register("/stuff", new StuffController());


?>