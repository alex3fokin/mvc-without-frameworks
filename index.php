<?php
session_start();
spl_autoload_register(function($class) {
    $path = 'lib'.DIRECTORY_SEPARATOR.$class.'.php';
    if(file_exists($path)) {
	include_once $path;
	return true;
    }
    return false;
});

Router::load();