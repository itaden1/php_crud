<?php

include_once (ROOT_PATH."/framework/controllers/base_controller.php");
include_once (MODEL_PATH."/home_model.php");
include_once (VIEW_PATH."/home_view.php");

class HomeController extends BaseController
{

    function __construct()
    {
        $this->view = new HomeView();
        $this->model = new HomeModel();
    }
    function get()
    {
        $title = "Home";
        $speakers = $this->model->get_all();

        $data = array(
            "title" => $title,
            "speakers" => $speakers
        );
        $this->view::render($data);
    }
}
?>