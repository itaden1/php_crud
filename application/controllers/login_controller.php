<?php
include_once (ROOT_PATH."/framework/controllers/base_controller.php");

class LoginController extends BaseController
{
    function __construct($auth0)
    {
        parent::__construct($auth0);
    }
    function get()
    {
        $this->auth->login();
    }
}

?>