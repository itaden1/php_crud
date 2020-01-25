<?php
class HomeView
{
    function __construct()
    {
        $this->template = TEMPLATE_PATH."/home_template.php";
    }
    function render_html($data)
    {
        $output = NULL;

        if (file_exists($this->template))
        {
            ob_start();
            extract($data);
            include (TEMPLATE_PATH."/home_template.php");
            $output = ob_get_clean();
        }
        echo $output;
    }
    function render_json($data)
    {
        $read = array();
        foreach($data->fetchAll() as $k => $row)
        {
            array_push($read, $row);
        }
        echo json_encode($read);
    }
}
?>