<?php

include_once("../../framework/base_controller.php");

class HomeController extends BaseController
{
    function get()
    {
        $title = "Home";
        $content = "yabba dabba doo";
        $data = array(
            "title" => &$title,
            "content" => &$content
        );
        $output = NULL;
        if (file_exists("views/home.php"))
        {
            extract($data);
            ob_start();
            include "views/home.php";
            $output = ob_get_clean();
        }
        echo $output;
    }
}
?>