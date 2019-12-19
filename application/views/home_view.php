<?php
class HomeView
{
    function render($data)
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
}
?>