<?php
echo "hello world<br>";
// create a request object
include_once "request.php";
include_once "router.php";
$request = new Request();
$router = new Router();

$router->get("/", function($request){
    echo "<h2>Home</h2>";
});
$router->get("/stuff", function($request){
    echo "<h2>stuff</h2>";
});

?>