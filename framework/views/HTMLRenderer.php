<?php

// Render data as HTML

class HTMLRenderer implements IRenderer
{
    function __construct($template)
    {
        $this->template =  $template;
    }
    public function render($data)
    {
        header("Content-Type: text/html");

        $output = NULL;
        if (file_exists($this->template))
        {
            ob_start();
            include ($this->template);
            if ($data)
            {
                extract($data);
            }
            $output = ob_get_clean();
        }
        return $output;
    }
}


?>