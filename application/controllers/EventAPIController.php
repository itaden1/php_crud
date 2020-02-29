<?php

include_once (ROOT_PATH."/framework/controllers/BaseController.php");
include_once (MODEL_PATH."/EventModel.php");
include_once (VIEW_PATH."/HomeView.php");

class EventAPIController extends BaseController
{

    function __construct($request)
    {
        $this->request=$request;
        $this->view = new HomeView($renderer= new JSONRenderer());
        $this->model = new EventModel();
    }
    function get($id=NULL)
    {
        $events = $this->model->read($id);

        $data = array();
        $data["title"] = $this->model->get_table_name();
        $data["events"] = $this->model->get_query_results();

        $this->view->render($data);
    }
    function post()
    {
        $this->model->create($this->request->body);
        $this->view->render(Array("message" => "created"));
    }
}
?>