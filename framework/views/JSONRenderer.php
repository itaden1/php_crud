<?php

// Render Data as Json to the view

class JSONRenderer implements IRenderer
{
    public function render($data)
    {
        header("Content-Type: application/json");
        $dict = Array();
        foreach($data as $k => $v)
        {
            $dict[$k] = $v;
        }
        return json_encode($dict);
    }
}
?>