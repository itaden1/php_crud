<?php

include_once (ROOT_PATH."/framework/controllers/BaseController.php");
include_once (MODEL_PATH."/EventModel.php");
include_once (VIEW_PATH."/HomeView.php");

class HomeAPIController extends HomeController
{

    function __construct()
    {
        $this->view = new HomeView($renderer="JSONRenderer");
        $this->model = new EventModel();
    }
}
?>