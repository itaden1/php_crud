<?php

class BaseController implements IController
{
    private $view;
    private $model;

    function __construct()
    {
        $this->model = new BaseModel();
        $this->view = new BaseView();
    }
    function handleHTTPMethods($request)
    {
        if ($request->request_method === "GET")
        {
            $this->get();
        }
        else
        {
            echo "method ".$request->request_method. " not allowed";
        }
    }
    function get(){
        $this->view->render_html();
    }
    function post(){}
    function put(){}
    function delete(){}
}
?>