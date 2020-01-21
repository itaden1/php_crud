<?php
include_once (ROOT_PATH."/framework/controllers/BaseController.php");

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