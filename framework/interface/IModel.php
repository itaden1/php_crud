<?php
interface IModel
{
    public function create($data);
    public function read($id);
    public function update();
    public function delete();
}
?>