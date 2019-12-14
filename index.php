<?php
echo "hello world<br>";
// create a request object
include_once "request.php";
include_once "router.php";

include_once "controllers/home.php";

$request = new Request();
$router = new Router($request);

$router->get("/", HomePage);
$router->get("/stuff", function($request){
    echo "<h2>stuff</h2>";
});

?>