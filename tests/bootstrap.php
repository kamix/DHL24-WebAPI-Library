<?php

date_default_timezone_set('Europe/Warsaw');

function DHLAutoloader($class)
{
    $class = str_replace('\\', '/', $class);
    require 'lib/' . $class  . '.php';
}

spl_autoload_register('DHLAutoloader');