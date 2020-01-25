<?php

require "vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

if (getenv("SERVER_ENV") == "development")
{
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

define("ROOT_PATH", __DIR__);
define("TEMPLATE_PATH", __DIR__."/application/templates/");
define("VIEW_PATH", __DIR__."/application/views/");
define("CONTROLLER_PATH", __DIR__."/application/controllers/");
define("MODEL_PATH", __DIR__."/application/models/");

define("STATIC_PATH", "/application/static/");
define("CSS_PATH", STATIC_PATH."css/");

// Auth0 
use Auth0\SDK\Auth0;
$auth0 = new Auth0([
    "domain" => getenv("AUTH0_DOMAIN"),
    "client_id" => getenv("AUTH0_CLIENT_ID"),
    "client_secret" => getenv("AUTH0_CLIENT_SECRET"),
    "redirect_uri" => "http://localhost:3000",
    "scope" => "openid profile email"
]);
include_once("framework/autoloader.php");

include_once (CONTROLLER_PATH."/HomeController.php");
include_once (CONTROLLER_PATH."/LoginController.php");
include_once (CONTROLLER_PATH."/LogoutController.php");

// create a request object
$request = new Request();
$router = new Router($request);

$router->register("/", new HomeController($auth0));
$router->register("/login", new LoginController($auth0));
$router->register("/logout", new LogoutController($auth0));

?>