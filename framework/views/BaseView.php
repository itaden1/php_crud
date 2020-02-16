<?php

// Base view for displaying data
// The BaseView can be used in most circumstances as its render functionality is established by using dependency injection
// requires a renderer (HTMLRenderer, JSONRenderer) to be injected
// when using an HTMLRenderer a template is required

class BaseView implements IView
{
    public $renderer;
    public $template;

    function __construct($renderer, $template=NULL)
    {
        // set up renderer and template
        if(!$template)
        {
            $this->template = ROOT_PATH."/framework/views/base_template.php";
        }
        else
        {
            $this->template = $template;
        }
    
        $this->renderer = new $renderer($this->template);
    }
    function render($data)
    {
       echo $this->renderer->render($data);
    }
}
?>