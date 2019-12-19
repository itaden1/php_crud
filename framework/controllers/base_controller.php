<?php

include_once(ROOT_PATH."/framework/interface/IController.php");

class BaseController implements IController
{
    function handleHTTPMethods($request)
    {
        if ($request->request_method === "get")
        {
            $this->get();
        }
        else
        {
            echo "method ".$request->request_method. " not allowed";
        }
    }
    function get(){}
    function post(){}
    function put(){}
    function delete(){}
}
?>