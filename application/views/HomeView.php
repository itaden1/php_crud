<?php
class HomeView
{
    function render_html($data)
    {
        $output = NULL;

        if (file_exists(TEMPLATE_PATH."/home_template.php"))
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