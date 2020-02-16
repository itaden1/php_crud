<?php

// Render Data as Json to the view

class JSONRenderer implements IRenderer
{
    public function render($data)
    {
        header("Content-Type: application/json");
        return json_encode($data);
    }
}
?>