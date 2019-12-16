<?php

include_once("interface/IController.php");

class BaseController implements IController
{
    var $request;
    function __construct($request)
    {
        $this->request = $request;
    }
    function __call($method, $args)
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
    function get()
    {
        pass;
    }
}


?>