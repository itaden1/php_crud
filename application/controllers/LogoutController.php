<?php
include_once (ROOT_PATH."/framework/controllers/BaseController.php");

class LogoutController extends BaseController
{
    function __construct($auth0)
    {
        parent::__construct($auth0);
    }
    function get()
    {
        $this->auth->logout();
        $return_to = "http://" . $_SERVER["HTTP_HOST"];
        $logout_url = sprintf("http://%s/logout?client_id=%s&returnTo=%s", "dev-tn14wjv7.au.auth0.com", "Gf0jcXdC77uBWAey4eHXkytGcbqGAJdw", $return_to);
        header("Location: " . $logout_url);
        die();
    }
}

?>