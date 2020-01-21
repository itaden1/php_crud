<?php

include_once (ROOT_PATH."/framework/controllers/BaseController.php");
include_once (MODEL_PATH."/EventModel.php");
include_once (VIEW_PATH."/HomeView.php");

class HomeController extends BaseController
{

    function __construct($auth0)
    {
        BaseController::__construct($auth0);
        $this->view = new HomeView();
        $this->model = new EventModel();
    }
    function get()
    {
        $user = $this->auth->getUser();
        $title = "Home";
        $events = $this->model->read();

        $data = array(
            "user" => $user,
            "title" => $title,
            "events" => $events
        );
        $this->view::render_json($events);
    }
}
?>