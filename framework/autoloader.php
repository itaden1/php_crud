<?php


spl_autoload_register(function($class_name)
{
    $subfolders = array(
        "root" => "",
        "controllers" => "controller/",
        "views" => "views/",
        "models" => "models/",
        "interface" => "interface/",
    );
    foreach($subfolders as $folder_name)
    {
        set_error_handler(function() {});
        include_once($folder_name . $class_name . ".php");
        restore_error_handler();
    }
});

?>