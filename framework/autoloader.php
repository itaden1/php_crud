<?php


spl_autoload_register(function($class_name)
{
    $subfolders = array(
        "root" => "",
        "controllers" => "controller/",
        "models" => "models/",
        "interface" => "interface/",
    );
    foreach($subfolders as $folder_name)
    {
        include_once($folder_name . $class_name . ".php");
    }
});

?>