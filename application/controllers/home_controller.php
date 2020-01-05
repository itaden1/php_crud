<?php

include_once (ROOT_PATH."/framework/controllers/base_controller.php");
include_once (MODEL_PATH."/home_model.php");
include_once (VIEW_PATH."/home_view.php");

class HomeController extends BaseController
{

    function __construct($auth0)
    {
        BaseController::__construct($auth0);
        $this->view = new HomeView();
        $this->model = new HomeModel();
    }
    function get()
    {
        $user = $this->auth->getUser();
        $title = "Home";
        $events = $this->model->get_all();

        $data = array(
            "user" => $user,
            "title" => $title,
            "events" => $events
        );
        $this->view::render($data);
    }
}
?>