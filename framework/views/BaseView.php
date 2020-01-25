<?php


class BaseView implements IView
{
    private $template;
    function __construct()
    {
        $this->template = __DIR__ . "/base_template.php";
    }
    function render_html($data=Null)
    {
   
        $output = NULL;
        if (file_exists($this->template))
        {
            ob_start();
            if ($data != Null)
            {
                extract($data);
            }
            include ($this->template);
            $output = ob_get_clean();
        }
        
        echo $output;
    }
    function render_json($data){}
    function render_xml($data){}
}
?>