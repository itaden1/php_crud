<?php
interface IModel
{
    public function create();
    public function read_list();
    public function read_one($id);
    public function update();
    public function delete();
}
?>