<?php
interface IView
{
    public function render_html($data);
    public function render_json($data);
    public function render_xml($data);
}
?>