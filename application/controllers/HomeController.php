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
    function get($id=NULL)
    {
        $events = $this->model->read($id);

        $data = array();
        $data["title"] = $this->model->getTableName();
        $data["events"] = $this->model->getQueryResults();

        $this->view->render($data);
    }
}
?>