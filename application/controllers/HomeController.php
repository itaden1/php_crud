<?php

include_once (ROOT_PATH."/framework/controllers/BaseController.php");
include_once (MODEL_PATH."/EventModel.php");
include_once (VIEW_PATH."/HomeView.php");

class HomeController extends BaseController
{

    function __construct()
    {
        $this->view = new HomeView($renderer="HTMLRenderer", $template=TEMPLATE_PATH."/home_template.php");
        $this->model = new EventModel();
    }
    function get()
    {
        $events = $this->model->read_list();

        $data = array();
        $data["title"] = "Home";
        $data["events"] = Array();

        foreach($events->fetchAll(PDO::FETCH_ASSOC) as $k => $row)
        {
            array_push($data["events"], $k = $row);
        }

        $this->view->render($data);
    }
}
?>