<?php

class BaseController implements IController
{
    private $view;
    private $model;
    protected $request;

    function __construct($request)
    {
        $this->request = $request;
        $this->view = new Baseview($renderer=new HTMLRenderer(ROOT_PATH."/framework/views/base_template.php"));
    }

    function handleHTTPMethods($id=NULL)
    {
        //echo var_dump($this);
        if ($this->request->request_method === "GET")
        {
            $this->get($id);
        }
        elseif($this->request->request_method === "POST")
        {
            $this->post();
        }
    }
    function get(){
        $this->view->render($data=NULL);
    }
    function post()
    {
        echo "method ". $this->request->request_method. " not allowed";
    }
    function put(){}
    function delete(){}
}
?>