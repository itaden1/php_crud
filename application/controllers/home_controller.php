<?php

include_once (ROOT_PATH."/framework/controllers/base_controller.php");
include_once (VIEW_PATH."/home_view.php");
$view = new HomeView();
$view->render();
class HomeController extends BaseController
{

    function __construct()
    {
        $this->view = new HomeView();
    }
    function get()
    {
        $title = "Home";
        $content = "yabba dabba doo";

        $data = array(
            "title" => $title,
            "content" => $content
        );
        $this->view->render($data);
    }
}
?>