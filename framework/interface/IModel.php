<?php
interface IModel
{
    public function create();
    public function read($id);
    public function update();
    public function delete();
}
?>