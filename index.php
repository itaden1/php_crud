<?php

require "vendor/autoload.php";
require "framework/autoloader.php";

$request = new Request();

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

define("STATIC_PATH", "/static/");
define("CSS_PATH", STATIC_PATH . "css/");

define("DATABASE", Array(
    "db_engine" => "mysql",
    "host" => getenv("DB_HOST"), //"0.0.0.0:3306",
    "dbname" => "db",
    "user" => getenv("DB_USER"),
    "pass" => getenv("DB_PASSWORD"),
    "options" => Array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        )
    )
);

// Auth0 
// use Auth0\SDK\Auth0;
// $auth0 = new Auth0([
//     "domain" => getenv("AUTH0_DOMAIN"),
//     "client_id" => getenv("AUTH0_CLIENT_ID"),
//     "client_secret" => getenv("AUTH0_CLIENT_SECRET"),
//     "redirect_uri" => "http://localhost:3000",
//     "scope" => "openid profile email"
// ]);


include_once (CONTROLLER_PATH."/HomeController.php");
include_once (CONTROLLER_PATH."/EventAPIController.php");


// create a request object
$router = new Router($request);

$router->register("", new BaseController($request));
$router->register("/api/event/:id", new EventAPIController($request));
// $router->register("/login", new LoginController());
// $router->register("/logout", new LogoutController());

?>