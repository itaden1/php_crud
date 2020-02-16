<?php

class BaseController implements IController
{
    private $view;
    private $model;

    function __construct()
    {
        $this->view = new Baseview($renderer="HTMLRenderer");
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
        $this->view->render($data=NULL);
    }
    function post(){}
    function put(){}
    function delete(){}
}
?>