<?php

include_once("interface/IController.php");

class BaseController implements IController
{
    var $request;
    function __construct($request)
    {
        $this->request = $request;
    }
    function handleHTTPMethods()
    {
        if ($this->request->request_method == "get")
        {
            $this->get();
        }
        else
        {
            echo "method ".$this->request->request_method. " not allowed";
        }
    }
    function get(){}
    function post(){}
    function put(){}
    function delete(){}
}


?>