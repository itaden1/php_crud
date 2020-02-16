<?php

class XMLRenderer implements IRenderer
{
    function __construct($template)
    {
        $this->template = $template;
    }
    public function render($data)
    {
        header("Content-Type: application/xml");
        return "<message>Not implemented</message>";
    }
}
?>