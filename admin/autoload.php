<?php

// autoloader function to autoload classes
function autoloader($classname){
    $lastSlash=strpos($classname,'\\');
    $classname=substr($classname, $lastSlash);
    $directory=str_replace('\\','/', $classname);
    $filename=__dir__ . $directory . '.php';
    require_once $filename;
}

spl_autoload_register('autoloader');