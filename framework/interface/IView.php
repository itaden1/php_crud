<?php
interface IView
{
    function __construct(IRenderer $renderer, $template);
    public function render($data);
}
?>